<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");


// On récupère les genres existant
$sql = "SELECT * FROM genres";
$stmt = $pdo->query($sql);
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);


// var_dump($genres);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>Ajouter un genre à votre film !</title>
    
</head>

<body>

    <section>
        <form action="content/admin/films-crud/traitement/genres.php" method="POST">
            <select>
                <option value=""><?php echo $genres[0]['nom_genre'];?></option>
                <option value=""><?php echo $genres[2]['nom_genre'];?></option>
                <option value=""><?php echo $genres[3]['nom_genre'];?></option>
                <option value=""><?php echo $genres[4]['nom_genre'];?></option>
                <option value=""><?php echo $genres[5]['nom_genre'];?></option>
                <option value=""><?php echo $genres[6]['nom_genre'];?></option>
                <option value=""><?php echo $genres[7]['nom_genre'];?></option>
                <option value=""><?php echo $genres[8]['nom_genre'];?></option>
            </select>
            <input type="submit" value="Valider" name="submit" />
            <form>
    </section>

</body>

</html>