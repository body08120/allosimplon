<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");


if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id_user = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id);
    $result = $stmt->execute();

    $row_count = $stmt->rowCount();
    $result = $stmt->fetchAll();

    if (is_array($result)) {
        if ($row_count > 0) {

            foreach ($result as $row) {
                $id = $row['id_user'];
                $nom = $row['nom_user'];
                $prenom = $row['prenom_user'];
                $email = $row['email_user'];
                $password = $row['mdp_user'];
                $role = $row['role_user'];
            }
            ?>
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Modifier un utilisateur - AlloSimplon</title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
            </head>
            <body class="bg-[#1a0d14] pt-20 font-mono min-h-screen flex flex-col">
                <?php include('../../includes/navbar.php'); ?>

                <div class="flex-1 px-4 py-10 max-w-xl mx-auto w-full">
                    <h1 class="text-2xl font-bold text-[#EAD7D7] tracking-widest uppercase mb-8 text-center">Modifier l'utilisateur</h1>

                    <form action="/content/admin/users-crud/traitement-update.php" method="POST" class="flex flex-col gap-6">
                        <input type="hidden" name="id-user" value="<?php echo $id; ?>">

                        <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6 flex flex-col gap-4">
                            <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-2">Informations</h2>

                            <div class="flex flex-col gap-1">
                                <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Nom</label>
                                <input type="text" name="nom-user" required value="<?php echo htmlspecialchars($nom); ?>"
                                    class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Prénom</label>
                                <input type="text" name="prenom-user" required value="<?php echo htmlspecialchars($prenom); ?>"
                                    class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Email</label>
                                <input type="email" name="mail-user" required value="<?php echo htmlspecialchars($email); ?>"
                                    class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Nouveau mot de passe <span class="normal-case text-[#EAD7D7]/30">(laisser vide = inchangé)</span></label>
                                <input type="password" name="mdp-user" placeholder="••••••••"
                                    class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                            </div>

                            <div class="flex flex-col gap-1">
                                <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Rôle</label>
                                <div class="flex gap-3 mt-1">
                                    <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-4 py-2 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                                        <input type="radio" name="id-role" value="1" class="accent-[#B49FCC]" <?php echo $role == 1 ? 'checked' : ''; ?> /> Utilisateur
                                    </label>
                                    <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-4 py-2 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                                        <input type="radio" name="id-role" value="2" class="accent-[#B49FCC]" <?php echo $role == 2 ? 'checked' : ''; ?> /> Admin
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 justify-center">
                            <a href="/content/admin/users-crud/admin-view.php"
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
            </body>
            </html>
            <?php
        }
    } else {
        header('Location: /content/admin/users-crud/admin-view.php');
        exit;
    }
}
?>