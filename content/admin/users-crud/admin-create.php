<?php
session_start();
include_once("../../../assets/config/config.php");

if (isset($_POST['submit'])) {

    $nom = $_POST['nom-user'];
    $prenom = $_POST['prenom-user'];
    $email = $_POST['mail-user'];
    $pseudo = $_POST['pseudo-user'];
    $password = $_POST['mdp-user'];
    $role = $_POST['id-role'];


    // $sql = "INSERT INTO `users`(`nom_user`, `prenom_user`, `mail_user`, `pseudo_user`, `mdp_user`, `id_role`) VALUES ('$nom','$prenom','$email','$pseudo','$password')";
    // $result = $pdo->query($sql);


    // Vérification si l'email est déjà utilisé
    $stmt = $pdo->prepare("SELECT * FROM users WHERE mail_user = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        echo "Cet email est déjà utilisé.";
        die();
    }


    // Hashage du mot de passe avant enregistrement dans la base de données
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Enregistrement de l'utilisateur dans la base de données
$stmt = $pdo->prepare("INSERT INTO users (nom_user, prenom_user, mail_user, pseudo_user, mdp_user, id_role) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bindParam(1, $nom);
$stmt->bindParam(2, $prenom);
$stmt->bindParam(3, $email);
$stmt->bindParam(4, $pseudo);
$stmt->bindParam(5, $hashed_password);
$stmt->bindParam(6, $role);
$stmt->execute();

header('Location: admin-view.php');
}
include_once("../../../assets/config/close.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Créez un utilisateur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>


<body>
    <?php include('../../includes/navbar.php'); ?>
<div class="flex flex-col items-center">
    <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Créez un utilisateur</h2>
    <form action="" method="POST">

        <fieldset class="flex flex-col my-6">

            <legend class="underline mt-6">Informations:</legend>

            Nom:<br>

            <input type="text" name="nom-user" required>

            <br>

            Prénom:<br>

            <input type="text" name="prenom-user" required>

            <br>

            Email:<br>

            <input type="email" name="mail-user" required>

            <br>

            Pseudo:<br>

            <input type="text" name="pseudo-user" required>

            <br>

            Mdp:<br>

            <input type="password" name="mdp-user" required>

            <br>

            Role:<br>

            <input type="number" name="id-role" placeholder="1=user ou 2=admin" required>

            <br><br>

            
            <input type="submit" name="submit" value="Valider" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0"> 

        </fieldset>

    </form>
    <a class="underline" href="../panel.php">Retour au panneau d'administration</a>
</div>

    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>