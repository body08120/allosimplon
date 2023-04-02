<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");


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
            $genres = explode(", ", $genres);
            $realisateurs = explode(", ", $realisateurs);
            $acteurs = explode(", ", $acteurs);


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
                <title>Update films - Allosimplon</title>
                <script src="https://cdn.tailwindcss.com"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
            </head>

            <body class="bg-[#412234] font-mono text-[#B49FCC]">

                <?php include('../../includes/navbar.php'); ?>

                <section class="flex flex-col items-center">

                    <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Film Update Form
                    </h2>

                    <form action="content/admin/films-crud/traitement/update.php" method="POST">

                        <fieldset class="flex flex-col items-center">

                            <legend>Informations du compte</legend>

                            <span>Image:</span><br>

                            <input type="text" name="img-film" value="<?php echo $img; ?>">

                            <input type="hidden" name="id-film" value="<?php echo $id; ?>">

                            <br>

                            <span>Titre:</span><br>

                            <input type="text" name="nom-film" value="<?php echo $titre; ?>">

                            <br>

                            <span>Date:</span><br>

                            <input type="date" name="date-film" value="<?php echo $date; ?>">

                            <br>

                            <span>Synopsis:</span><br>

                            <input type="text" name="synopsis-film" value="<?php echo $synopsis; ?>">

                            <br>

                            <span>Bande Annonce:</span><br>

                            <input type="text" name="ba-film" value="<?php echo $ba; ?>">

                            <br>

                            <span>Genres:</span><br>

                            <span>
                                <?php foreach ($genres as $genre):
                                    echo "$genre <br>";
                                endforeach; ?>
                            </span>

                            <a class="underline text-[#EAD7D7]"
                                href="content/admin/films-crud/film_genre_update.php?id=<?php echo $film_id; ?>">Modifiez les
                                genres</a>
                            <br>

                            <span>Réalisateurs:</span><br>


                            <span>
                                <?php foreach ($realisateurs as $realisateur):
                                    echo "$realisateur <br>";
                                endforeach; ?>
                            </span>

                            <a class="underline text-[#EAD7D7]"
                                href="content/admin/films-crud/film_realisateur_update.php?id=<?php echo $film_id; ?>">Modifiez les
                                réalisateurs</a>
                            <br>

                            <span>Acteurs:</span><br>

                            <span>
                                <?php foreach ($acteurs as $acteur):
                                    echo "$acteur <br>";
                                endforeach; ?>
                            </span>


                            <br><br>

                            <input type="submit" value="Update" name="update" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0">

                        </fieldset>

                    </form>
                    <br>
                    <a class="underline text-[#EAD7D7]" href="content/admin/films-crud/admin-view.php">Retour à la gestion des
                        films</a>
                </section>


                <?php include('../../includes/footer.php'); ?>

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