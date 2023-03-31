<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");

// $sql = "SELECT * 
//         FROM films";

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

        GROUP BY films.id_film";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

// $num_rows = count($result);
$num_rows = $stmt->rowCount();

include_once("../../../assets/config/close.php");
// var_dump($result);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>Tableau films - Allosimplon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono">
    <?php include('../../includes/navbar.php'); ?>

    <div class="flex flex-col items-center">


        <table class="">

            <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">vos films
            </h2>

            <thead>

                <tr class="text-[#B49FCC]">

                    <th class="px-2 py-2 border-2">ID</th>

                    <th class="px-2 py-2 border-2">Image</th>

                    <th class="px-2 py-2 border-2">Titre</th>

                    <th class="px-2 py-2 border-2">Date</th>

                    <th class="px-2 py-2 border-2">Synopsis</th>

                    <th class="px-2 py-2 border-2">Bande Annonce</th>

                    <th class="px-2 py-2 border-2">Genres</th>

                    <th class="px-2 py-2 border-2">Réalisateurs</th>

                    <th class="px-2 py-2 border-2">Acteurs</th>

                    <th class="px-2 py-2 border-2">Action</th>

                </tr>

            </thead>

            <tbody>
                <?php

                if ($num_rows > 0) {

                    // while ($row = $stmt->fetch(PDO::FETCH_ASSOC))   { //retourne la prochaine ligne de résultats sous forme d'un tableau associatif.
                    ?>

                    <?php foreach ($result as $row): ?>
                        <tr class="text-[#EAD7D7]">
                            <td class="px-2 py-2 border-2">
                                <?php echo $row['id_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['img_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['nom_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['date_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['synopsis_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['ba_film']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['genres']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['realisateurs']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <?php echo $row['acteurs']; ?>
                            </td>

                            <td class="px-2 py-2 border-2">
                                <a class="px-2 py-2 border-2 bg-green-400 text-[#6D466B]"
                                    href="content/admin/films-crud/admin-update.php?id=<?php echo $row['id_film']; ?>">Edit</a>&nbsp;<a
                                    class="px-2 py-2 border-2 bg-red-400 text-[#6D466B]"
                                    href="content/admin/films-crud/traitement/delete-film.php?id=<?php echo $row['id_film']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php
                    //  }
                
                }

                ?>

            </tbody>
        </table>
        <a class="underline text-[#EAD7D7]" href="content/admin/films-crud/admin-create.php">Ajouter un film</a>
        <br>
        <a class="underline text-[#EAD7D7]" href="content/admin/panel.php">Retour au panneau d'administration</a>
    </div>


    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>