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
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../includes/navbar.php'); ?>


    <section class="flex flex-col items-center">
        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Film genre update
            Form
        </h2>
        <form action="content/admin/films-crud/traitement/genres_update.php?id=<?php echo $film_id; ?>" method="POST">
            <fieldset class="flex flex-col items-left">
                <!-- <legend>Selectionnez TOUT les genres du film:</legend> -->
                <br>

                <div>
                    <input type="checkbox" id="genre1" value="<?php echo $genres[0]['id_genre']; ?>" name="genres[]">
                    <label for="genre1">
                        <?php echo $genres[0]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre2" value="<?php echo $genres[1]['id_genre']; ?>" name="genres[]">
                    <label for="genre2">
                        <?php echo $genres[1]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre3" value="<?php echo $genres[2]['id_genre']; ?>" name="genres[]">
                    <label for="genre3">
                        <?php echo $genres[2]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre4" value="<?php echo $genres[3]['id_genre']; ?>" name="genres[]">
                    <label for="genre4">
                        <?php echo $genres[3]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre5" value="<?php echo $genres[4]['id_genre']; ?>" name="genres[]">
                    <label for="genre5">
                        <?php echo $genres[4]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre6" value="<?php echo $genres[5]['id_genre']; ?>" name="genres[]">
                    <label for="genre6">
                        <?php echo $genres[5]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre7" value="<?php echo $genres[6]['id_genre']; ?>" name="genres[]">
                    <label for="genre7">
                        <?php echo $genres[6]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre8" value="<?php echo $genres[7]['id_genre']; ?>" name="genres[]">
                    <label for="genre8">
                        <?php echo $genres[7]['nom_genre']; ?>
                    </label>
                </div>
                <br>
                <div>
                    <input type="checkbox" id="genre9" value="<?php echo $genres[8]['id_genre']; ?>" name="genres[]">
                    <label for="genre9">
                        <?php echo $genres[8]['nom_genre']; ?>
                    </label>
                </div>
                <br>

                <!-- <br><br> -->
                <input type="submit" value="Valider" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                    focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0" />

            </fieldset>
        </form>
        <br><br>
        <a class="underline text-[#EAD7D7]"
            href="content/admin/films-crud/admin-update.php?id=<?php echo $film_id; ?>">Retour à la gestion du film</a>
    </section>

    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>