<?php
session_start();
require_once('../../assets/config/config.php');

if (isset($_GET['id'])) {

    $film_id = $_GET['id'];

    $sql = "SELECT films.id_film, films.img_film, films.nom_film, films.date_film, films.synopsis_film, films.ba_film, 
            
            -- On groupe les genres, réalisateurs, acteurs si besoin
            GROUP_CONCAT(DISTINCT genres.nom_genre SEPARATOR ', ') AS genres,
            GROUP_CONCAT(DISTINCT realisateurs.nom_realisateur SEPARATOR ', ') AS realisateurs,
            GROUP_CONCAT(DISTINCT acteurs.nom_acteur SEPARATOR ', ') AS acteurs
            FROM films

        -- On joint le genre
        LEFT JOIN possede ON films.id_film = possede.id_film
        LEFT JOIN genres ON genres.id_genre = possede.id_genre

        -- On joint le réalisateur
        LEFT JOIN tourner ON films.id_film = tourner.id_film
        LEFT JOIN realisateurs ON realisateurs.id_realisateur = tourner.id_realisateur

        -- On joint l'acteur
        LEFT JOIN possede2 ON films.id_film = possede2.id_film
        LEFT JOIN acteurs ON acteurs.id_acteur = possede2.id_acteur
            
            WHERE films.id_film = :id
            GROUP BY films.id_film";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $film_id);
    $result = $stmt->execute();

    $row_count = $stmt->rowCount();
    $result = $stmt->fetchAll();

    // var_dump($result);
    // die();


    if (is_array($result)) {
        if ($row_count > 0) {

            foreach ($result as $row) {
                $id = $row['id_film'];
                $img = $row['img_film'];
                $titre = $row['nom_film'];
                $date = $row['date_film'];
                $synopsis = $row['synopsis_film'];
                $ba = $row['ba_film'];
                $genres = $row['genres'];
                $realisateurs = $row['realisateurs'];
                $acteurs = $row['acteurs'];
            }

            // On convertit le string en array
            // $genres = explode(", ", $genres);
            // $realisateurs = explode(", ", $realisateurs);
            // $acteurs = explode(", ", $acteurs);


            // var_dump($genres);
            // die();

            ?>

            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <base href="/projets/allosimplon/">
                <title>AlloSimplon - <?php echo $titre; ?></title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
            </head>

            <body class="bg-[#412234] text-[#EAD7D7] font-mono">

                <!--navbar-->
                <?php include('../includes/navbar.php') ?>

                <!-- Film -->
                <section class="my-9 mx-9 text-[18px]">

                    <!-- Affiche du film -->
                    <div class="h-[650px] flex justify-center mx-9">
                        <img src="<?php echo $img; ?>" alt="" class="h-full" />
                    </div>
                    <!-- Lien -->
                    <div class="flex justify-evenly mt-9">
                        <!-- <a class="underline" href="">Voir en streaming</a> -->
                        <a class="underline" href="<?php echo $ba; ?>">Voir la bande-annonce</a>
                    </div>

                    <br>
                    <!-- Date et titre -->
                    <div class="flex flex-col font-semibold uppercase tracking-[.15em] mx-9">
                        <span><?php echo $titre; ?></span>
                        <span><?php echo $date; ?></span>
                    </div>

                    <br>
                    <!-- Genres, réalisateurs et acteurs -->
                    <div class="flex flex-col mx-9">
                        <span>Genres: <?php echo $genres; ?></span>
                        <span>Distributions: <?php echo $realisateurs; ?>/<?php echo $acteurs; ?></span>
                    </div>

                    <br>
                    <!-- Synopsis -->
                    <div class="mx-9">
                        <p>Synopsis: <?php echo $synopsis; ?>
                        </p>
                    </div>

                    <br>
                    <!-- Vidéo -->
                    <div class="w-full">
                        <iframe class="w-full h-screen" allowfullscreen src="<?php echo $ba; ?>">
                        </iframe>
                    </div>


                </section>

                <!--footer-->
                <?php include('../includes/footer.php') ?>

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