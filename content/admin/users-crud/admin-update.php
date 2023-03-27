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

    if(is_array($result)) {
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

            <body>

                <h2>User Update Form</h2>

                <form action="content/admin/users-crud/traitement-update.php" method="POST">

                    <fieldset>

                        <legend>Personal information:</legend>

                        First name:<br>

                        <input type="text" name="nom-user" value="<?php echo $nom; ?>">

                        <input type="hidden" name="id-user" value="<?php echo $id; ?>">

                        <br>

                        Last name:<br>

                        <input type="text" name="prenom-user" value="<?php echo $prenom; ?>">

                        <br>

                        Email:<br>

                        <input type="email" name="mail-user" value="<?php echo $email; ?>">

                        <br>

                        Pseudo:<br>

                        <input type="text" name="pseudo-user" value="<?php echo $pseudo; ?>">

                        <br>

                        Password:<br>

                        <input type="password" name="mdp-user" value="<?php echo $password; ?>">

                        <br>

                        Role:<br>

                        <input type="number" name="id-role" value="<?php echo $role; ?>">

                        <br>

                        <br><br>

                        <input type="submit" value="Update" name="update">

                    </fieldset>

                </form>

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