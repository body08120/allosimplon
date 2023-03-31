<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}


if (isset($_GET['id'])) {

    $film_id = $_GET['id'];


include_once("../../../assets/config/config.php");

// On récupère les genres existant
$sql = "SELECT * FROM genres";
$stmt = $pdo->query($sql);
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($genres);die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>Allosimplon - Modifiez les genres du film</title>
</head>

<body>

    <form action="content/admin/films-crud/traitement/genres_update.php?id=<?php echo $film_id; ?>" method="POST">
        <fieldset>
            <legend>Selectionnez TOUT les genres du film:</legend>

            <div>
                <input type="checkbox" id="genre1" value="<?php echo $genres[0]['id_genre']; ?>" name="genres[]">
                <label for="genre1">
                    <?php echo $genres[0]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre2" value="<?php echo $genres[1]['id_genre']; ?>" name="genres[]">
                <label for="genre2">
                    <?php echo $genres[1]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre3" value="<?php echo $genres[2]['id_genre']; ?>" name="genres[]">
                <label for="genre3">
                    <?php echo $genres[2]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre4" value="<?php echo $genres[3]['id_genre']; ?>" name="genres[]">
                <label for="genre4">
                    <?php echo $genres[3]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre5" value="<?php echo $genres[4]['id_genre']; ?>" name="genres[]">
                <label for="genre5">
                    <?php echo $genres[4]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre6" value="<?php echo $genres[5]['id_genre']; ?>" name="genres[]">
                <label for="genre6">
                    <?php echo $genres[5]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre7" value="<?php echo $genres[6]['id_genre']; ?>" name="genres[]">
                <label for="genre7">
                    <?php echo $genres[6]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre8" value="<?php echo $genres[7]['id_genre']; ?>" name="genres[]">
                <label for="genre8">
                    <?php echo $genres[7]['nom_genre']; ?>
                </label>
            </div>

            <div>
                <input type="checkbox" id="genre9" value="<?php echo $genres[8]['id_genre']; ?>" name="genres[]">
                <label for="genre9">
                    <?php echo $genres[8]['nom_genre']; ?>
                </label>
            </div>

            <br><br>
            <input type="submit" value="Valider" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                    focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0" />

        </fieldset>
    </form>
</body>

</html>