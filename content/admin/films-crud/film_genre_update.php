<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /projets/allosimplon/index.php');
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
    <base href="/projets/allosimplon/">
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

                <?php foreach ($genres as $genre) { ?>
                    <div>
                        <input type="checkbox" id="genre<?php echo $genre['id_genre']; ?>"
                            value="<?php echo $genre['id_genre']; ?>" name="genres[]">
                        <label for="genre<?php echo $genre['id_genre']; ?>">
                            <?php echo $genre['nom_genre']; ?>
                        </label>
                    </div>
                    <br>
                <?php } ?>

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