<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>Admin - Ajouter un film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>


<body class="bg-[#412234] font-mono text-[#B49FCC]">
    <?php include('../../includes/navbar.php'); ?>
    <div class="flex flex-col items-center">
        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Ajoutez un film
        </h2>
        <form action="content/admin/films-crud/traitement/create-film.php" method="POST">

            <fieldset class="flex flex-col my-6">

                <legend class="underline mt-6">Informations:</legend>

                Affiche(url):<br>

                <input type="text" name="img_film" required>

                <br>

                Nom:<br>

                <input type="text" name="nom_film" required>

                <br>

                Date:<br>

                <input type="date" name="date_film" required>

                <br>

                Sysnopsis:<br>

                <input type="text" name="synopsis_film" required>

                <br>

                Bande annonce(url):<br>

                <input type="text" name="ba_film" required>

                <br><br>


                <input type="submit" name="submit" value="Valider" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0">

            </fieldset>

        </form>
        <a class="underline" href="content/admin/films-crud/admin-view.php">Retour à la gestion des films</a>
    </div>

    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>

</body>

</html>