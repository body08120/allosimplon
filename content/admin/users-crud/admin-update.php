<?php

include_once("../../../assets/config/config.php");


// Récupération données formulaires si formulaire n'est pas vide
if (isset($_POST['update'])) {

    $id = $_POST['id-user'];
    $nom = $_POST['nom-user'];
    $prenom = $_POST['prenom-user'];
    $email = $_POST['mail-user'];
    $pseudo = $_POST['pseudo-user'];
    $password = $_POST['mdp-user'];
    $role = $_POST['id-role'];

    //On prépare la reqûte de modification et puis on l'exécute 
    $sql = "UPDATE users SET nom_user=:nom, prenom_user=:prenom, mail_user=:email, pseudo_user=:pseudo, mdp_user=:password, id_role=:role WHERE id_user=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':role', $role);
    // $stmt->bindParam(':id', $id);
    $result = $stmt->execute();

    if ($result) {
        echo "Record updated successfully.";
    } else {
        $error = $stmt->errorInfo();
        echo "Error: " . $error[2];
    }

} 


    if (isset($_GET['id'])) {

        $user_id = $_GET['id'];

        $sql = "SELECT * FROM users WHERE id_user = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $user_id);
        $result = $stmt->execute();
        
        $result = $stmt->fetchAll();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
            <title>Document</title>
            <script src="https://cdn.tailwindcss.com"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
        </head>

        <body>

            <h2>User Update Form</h2>

            <form action="" method="POST">

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

                    <input type="password" name="password" value="<?php echo $password; ?>">

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

} else{ 

    header('Location: admin-view.php');

} 

    }

?> 