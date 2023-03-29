<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
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
                $email = $row['mail_user'];
                $pseudo = $row['pseudo_user'];
                $password = $row['mdp_user'];
                $role = $row['id_role'];
            }

            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <base href="/allosimplon/">
                <title>Update users - Allosimplon</title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
            </head>

            <body class="bg-[#412234] font-mono text-[#B49FCC]">

                <?php include('../../includes/navbar.php'); ?>

                <section class="flex flex-col items-center">

                    <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">User Update Form
                    </h2>

                    <form action="content/admin/users-crud/traitement-update.php" method="POST">

                        <fieldset class="flex flex-col items-center">

                            <legend>Informations du compte</legend>

                            <span>Nom:</span><br>

                            <input type="text" name="nom-user" value="<?php echo $nom; ?>">

                            <input type="hidden" name="id-user" value="<?php echo $id; ?>">

                            <br>

                            <span>Prénom:</span><br>

                            <input type="text" name="prenom-user" value="<?php echo $prenom; ?>">

                            <br>

                            <span>Email:</span><br>

                            <input type="email" name="mail-user" value="<?php echo $email; ?>">

                            <br>

                            <span>Pseudonyme:</span><br>

                            <input type="text" name="pseudo-user" value="<?php echo $pseudo; ?>">

                            <br>

                            <span>Mot de passe:</span><br>

                            <input type="password" name="mdp-user" value="<?php echo $password; ?>">

                            <br>

                            <span>Rôle:</span><br><span>1 = utilisateur <br> 2 = admin</span><br>

                            <input type="number" name="id-role" value="<?php echo $role; ?>">

                            <br>

                            <br><br>

                            <input type="submit" value="Update" name="update" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0">

                        </fieldset>

                    </form>
                    <br>
                    <a class="underline text-[#EAD7D7]" href="content/admin/users-crud/admin-view.php">Retour à la gestion des utilisateurs</a>
                </section>


                <?php include('../../includes/footer.php'); ?>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
            </body>

            </html>

            <?php

        }
    } else {

        // header('Location: admin-view.php');
        echo 'error';
    }

}

?>