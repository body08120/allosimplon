<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");

if (!isset($_GET['id'])) {
    header('Location: /content/admin/films-crud/admin-view.php');
    exit;
}

$film_id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT films.id_film, films.img_film, films.nom_film, films.date_film, films.synopsis_film, films.ba_film,
    GROUP_CONCAT(DISTINCT possede.id_genre) AS genre_ids,
    GROUP_CONCAT(DISTINCT tourner.id_realisateur) AS real_ids,
    GROUP_CONCAT(DISTINCT possede2.id_acteur) AS acteur_ids
    FROM films
    LEFT JOIN possede ON films.id_film = possede.id_film
    LEFT JOIN tourner ON films.id_film = tourner.id_film
    LEFT JOIN possede2 ON films.id_film = possede2.id_film
    WHERE films.id_film = :id GROUP BY films.id_film");
$stmt->execute([':id' => $film_id]);
$row = $stmt->fetch();

if (!$row) {
    header('Location: /content/admin/films-crud/admin-view.php');
    exit;
}

$checked_genres    = $row['genre_ids']  ? explode(',', $row['genre_ids'])  : [];
$checked_reals     = $row['real_ids']   ? explode(',', $row['real_ids'])   : [];
$checked_acteurs   = $row['acteur_ids'] ? explode(',', $row['acteur_ids']) : [];

$allGenres       = $pdo->query("SELECT * FROM genres ORDER BY nom_genre")->fetchAll();
$allRealisateurs = $pdo->query("SELECT * FROM realisateurs ORDER BY nom_realisateur")->fetchAll();
$allActeurs      = $pdo->query("SELECT * FROM acteurs ORDER BY nom_acteur")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un film - AlloSimplon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-[#1a0d14] pt-20 font-mono min-h-screen flex flex-col">
    <?php include('../../includes/navbar.php'); ?>

    <div class="flex-1 px-4 py-10 max-w-3xl mx-auto w-full">
        <h1 class="text-2xl font-bold text-[#EAD7D7] tracking-widest uppercase mb-8 text-center">Modifier le film</h1>

        <form action="/content/admin/films-crud/traitement/update.php" method="POST" class="flex flex-col gap-6">
            <input type="hidden" name="id-film" value="<?php echo $row['id_film']; ?>">

            <!-- Infos principales -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6 flex flex-col gap-4">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-2">Informations</h2>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Titre</label>
                    <input type="text" name="nom-film" required value="<?php echo htmlspecialchars($row['nom_film']); ?>"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Année</label>
                    <input type="number" name="date-film" min="1900" max="2099" required value="<?php echo htmlspecialchars($row['date_film']); ?>"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Affiche (URL)</label>
                    <input type="text" name="img-film" required value="<?php echo htmlspecialchars($row['img_film']); ?>"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Synopsis</label>
                    <textarea name="synopsis-film" required rows="4"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-xl px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none resize-none"><?php echo htmlspecialchars($row['synopsis_film']); ?></textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Bande annonce (URL)</label>
                    <input type="text" name="ba-film" value="<?php echo htmlspecialchars($row['ba_film']); ?>"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>
            </div>

            <!-- Genres -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-4">Genres</h2>
                <div id="genres-list" class="flex flex-wrap gap-2">
                    <?php foreach ($allGenres as $g): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="genres[]" value="<?php echo $g['id_genre']; ?>" class="accent-[#B49FCC]"
                                <?php echo in_array($g['id_genre'], $checked_genres) ? 'checked' : ''; ?> />
                            <?php echo htmlspecialchars($g['nom_genre']); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <input type="text" id="new-genre-input" placeholder="Nouveau genre..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-1.5 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                    <button type="button" onclick="addNewTag('new-genre-input','genres-list','new_genres[]')"
                        class="px-3 py-1.5 bg-[#6D466B] hover:bg-[#B49FCC] text-white rounded-full text-sm font-bold transition-colors">+ Ajouter</button>
                </div>
            </div>

            <!-- Réalisateurs -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-4">Réalisateurs</h2>
                <div id="reals-list" class="flex flex-wrap gap-2">
                    <?php foreach ($allRealisateurs as $r): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="realisateurs[]" value="<?php echo $r['id_realisateur']; ?>" class="accent-[#B49FCC]"
                                <?php echo in_array($r['id_realisateur'], $checked_reals) ? 'checked' : ''; ?> />
                            <?php echo htmlspecialchars($r['nom_realisateur']); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <input type="text" id="new-real-input" placeholder="Nouveau réalisateur..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-1.5 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                    <button type="button" onclick="addNewTag('new-real-input','reals-list','new_realisateurs[]')"
                        class="px-3 py-1.5 bg-[#6D466B] hover:bg-[#B49FCC] text-white rounded-full text-sm font-bold transition-colors">+ Ajouter</button>
                </div>
            </div>

            <!-- Acteurs -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-4">Acteurs</h2>
                <div id="acteurs-list" class="flex flex-wrap gap-2">
                    <?php foreach ($allActeurs as $a): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="acteurs[]" value="<?php echo $a['id_acteur']; ?>" class="accent-[#B49FCC]"
                                <?php echo in_array($a['id_acteur'], $checked_acteurs) ? 'checked' : ''; ?> />
                            <?php echo htmlspecialchars($a['nom_acteur']); ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3 flex items-center gap-2">
                    <input type="text" id="new-acteur-input" placeholder="Nouvel acteur..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-1.5 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                    <button type="button" onclick="addNewTag('new-acteur-input','acteurs-list','new_acteurs[]')"
                        class="px-3 py-1.5 bg-[#6D466B] hover:bg-[#B49FCC] text-white rounded-full text-sm font-bold transition-colors">+ Ajouter</button>
                </div>
            </div>

            <div class="flex gap-4 justify-center">
                <a href="/content/admin/films-crud/admin-view.php"
                    class="px-6 py-3 border border-[#6D466B]/60 hover:border-[#B49FCC] text-[#EAD7D7]/70 hover:text-[#B49FCC] rounded-full text-sm tracking-widest uppercase transition-colors">
                    Annuler
                </a>
                <button type="submit" name="update"
                    class="px-8 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-sm tracking-widest uppercase transition-colors duration-200">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>

    <?php include('../../includes/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script>
    function addNewTag(inputId, listId, fieldName) {
        const input = document.getElementById(inputId);
        const val = input.value.trim();
        if (!val) return;
        const list = document.getElementById(listId);
        const label = document.createElement('label');
        label.className = 'flex items-center gap-2 bg-[#B49FCC]/20 border border-[#B49FCC] rounded-full px-3 py-1 text-sm text-[#EAD7D7] cursor-pointer';
        label.innerHTML = `<input type="checkbox" name="${fieldName}" value="${val}" class="accent-[#B49FCC]" checked /> ${val}`;
        list.appendChild(label);
        input.value = '';
        input.focus();
    }
    document.querySelectorAll('#new-genre-input, #new-real-input, #new-acteur-input').forEach(el => {
        el.addEventListener('keydown', e => {
            if (e.key === 'Enter') { e.preventDefault(); el.nextElementSibling.click(); }
        });
    });
    </script>
</body>
</html>