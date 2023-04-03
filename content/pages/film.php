<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>AlloSimplon - nom_film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono">

    <!--navbar-->
    <?php include('../includes/navbar.php') ?>

    <!-- Film -->
    <section>

        <!-- Affiche du film -->
        <div>
            <img src="" alt="" />
        </div>

        <!-- Date et titre -->
        <div>
            <span>Date de sortie:</span>
            <span>Titre:</span>
        </div>

        <!-- Genres, réalisateurs et acteurs -->
        <div>
            <span>Genres:</span>
            <span>Distributions:</span>
        </div>

        <!-- Synopsis -->
        <div>
            <p>Synopsis:</p>
        </div>

        <!-- Lien -->
        <div>
            <a href="">Voir en streaming</a>
            <a href="">Voir la bande-annonce</a>
        </div>

    </section>

    <!--footer-->
    <?php include('../includes/footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>