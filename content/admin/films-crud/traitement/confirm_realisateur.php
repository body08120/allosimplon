<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Que voulez-vous faire ?</title>
    <base href="/allosimplon/">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../../includes/navbar.php'); ?>

    <div class="flex flex-col items-center my-6">
        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Faites votre choix
        </h2>

        <div class="my-6 flex flex-col items-center">
            <a class="underline uppercase" href="content/admin/films-crud/film_realisateur.php">Ajoutez un autre réalisateur</a><br>
            <span class="uppercase">OU</span><br>
            <a class="underline uppercase" href="content/admin/films-crud/film_acteur.php">Poursuivez et ajoutez un
                acteur</a><br>
        </div>
    </div>

    <?php include('../../../includes/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>