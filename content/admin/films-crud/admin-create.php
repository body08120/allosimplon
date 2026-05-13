<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");

$genres       = $pdo->query("SELECT * FROM genres ORDER BY nom_genre")->fetchAll();
$realisateurs = $pdo->query("SELECT * FROM realisateurs ORDER BY nom_realisateur")->fetchAll();
$acteurs      = $pdo->query("SELECT * FROM acteurs ORDER BY nom_acteur")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajouter un film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-[#1a0d14] pt-20 font-mono min-h-screen flex flex-col">
    <?php include('../../includes/navbar.php'); ?>

    <div class="flex-1 px-4 py-10 max-w-3xl mx-auto w-full">
        <h1 class="text-2xl font-bold text-[#EAD7D7] tracking-widest uppercase mb-8 text-center">Ajouter un film</h1>

        <form action="/content/admin/films-crud/traitement/create-film.php" method="POST" class="flex flex-col gap-6">

            <!-- Infos principales -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6 flex flex-col gap-4">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-2">Informations</h2>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Titre</label>
                    <input type="text" name="nom_film" required placeholder="ex: Inception"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Année</label>
                    <input type="number" name="date_film" min="1900" max="2099" required placeholder="ex: 2010"
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Affiche (URL)</label>
                    <input type="text" name="img_film" required placeholder="https://..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Synopsis</label>
                    <textarea name="synopsis_film" required rows="4" placeholder="Résumé du film..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-xl px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none resize-none"></textarea>
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Bande annonce (URL YouTube)</label>
                    <input type="text" name="ba_film" placeholder="https://youtube.com/..."
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>
            </div>

            <!-- Genres -->
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-4">Genres</h2>
                <div id="genres-list" class="flex flex-wrap gap-2">
                    <?php foreach ($genres as $g): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="genres[]" value="<?php echo $g['id_genre']; ?>" class="accent-[#B49FCC]" />
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
                    <?php foreach ($realisateurs as $r): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="realisateurs[]" value="<?php echo $r['id_realisateur']; ?>" class="accent-[#B49FCC]" />
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
                    <?php foreach ($acteurs as $a): ?>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-3 py-1 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="checkbox" name="acteurs[]" value="<?php echo $a['id_acteur']; ?>" class="accent-[#B49FCC]" />
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
                <button type="submit" name="submit"
                    class="px-8 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-sm tracking-widest uppercase transition-colors duration-200">
                    Ajouter le film
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