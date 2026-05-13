<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /index.php');
}
include_once("../../../assets/config/config.php");

if (isset($_POST['submit'])) {

    $nom = $_POST['nom-user'];
    $prenom = $_POST['prenom-user'];
    $email = $_POST['mail-user'];
    $password = $_POST['mdp-user'];
    $role = $_POST['id-role'];


    // $sql = "INSERT INTO `users`(`nom_user`, `prenom_user`, `mail_user`, `pseudo_user`, `mdp_user`, `id_role`) VALUES ('$nom','$prenom','$email','$pseudo','$password')";
    // $result = $pdo->query($sql);


    // Vérification si l'email est déjà utilisé
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email_user = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        echo "Cet email est déjà utilisé.";
        die();
    }


    // Hashage du mot de passe avant enregistrement dans la base de données
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Enregistrement de l'utilisateur dans la base de données
    $stmt = $pdo->prepare("INSERT INTO users (nom_user, prenom_user, email_user, mdp_user, role_user) VALUES (?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $prenom);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $hashed_password);
    $stmt->bindParam(5, $role);
    $stmt->execute();

    header('Location: admin-view.php');
}
include_once("../../../assets/config/close.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Créer un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-[#1a0d14] pt-20 font-mono min-h-screen flex flex-col">
    <?php include('../../includes/navbar.php'); ?>

    <div class="flex-1 px-4 py-10 max-w-xl mx-auto w-full">
        <h1 class="text-2xl font-bold text-[#EAD7D7] tracking-widest uppercase mb-8 text-center">Créer un utilisateur</h1>

        <form action="" method="POST" class="flex flex-col gap-6">
            <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-6 flex flex-col gap-4">
                <h2 class="text-[#B49FCC] text-xs tracking-widest uppercase font-bold mb-2">Informations</h2>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Nom</label>
                    <input type="text" name="nom-user" required
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Prénom</label>
                    <input type="text" name="prenom-user" required
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Email</label>
                    <input type="email" name="mail-user" required
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Mot de passe</label>
                    <input type="password" name="mdp-user" required
                        class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-2 text-[#EAD7D7] text-sm focus:border-[#B49FCC] focus:ring-0 focus:outline-none" />
                </div>

                <div class="flex flex-col gap-1">
                    <label class="text-[#EAD7D7]/60 text-xs tracking-widest uppercase">Rôle</label>
                    <div class="flex gap-3 mt-1">
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-4 py-2 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="radio" name="id-role" value="1" checked class="accent-[#B49FCC]" /> Utilisateur
                        </label>
                        <label class="flex items-center gap-2 bg-[#1a0d14]/60 border border-[#6D466B]/40 hover:border-[#B49FCC] rounded-full px-4 py-2 cursor-pointer text-sm text-[#EAD7D7]/80 transition-colors has-[:checked]:bg-[#B49FCC]/20 has-[:checked]:border-[#B49FCC] has-[:checked]:text-[#EAD7D7]">
                            <input type="radio" name="id-role" value="2" class="accent-[#B49FCC]" /> Admin
                        </label>
                    </div>
                </div>
            </div>

            <div class="flex gap-4 justify-center">
                <a href="/content/admin/users-crud/admin-view.php"
                    class="px-6 py-3 border border-[#6D466B]/60 hover:border-[#B49FCC] text-[#EAD7D7]/70 hover:text-[#B49FCC] rounded-full text-sm tracking-widest uppercase transition-colors">
                    Annuler
                </a>
                <button type="submit" name="submit"
                    class="px-8 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-sm tracking-widest uppercase transition-colors duration-200">
                    Créer
                </button>
            </div>
        </form>
    </div>

    <?php include('../../includes/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>