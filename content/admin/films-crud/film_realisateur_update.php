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
    $sql = "SELECT * FROM realisateurs";
    $stmt = $pdo->query($sql);
    $realisateurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($realisateurs);
    // die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/projets/allosimplon/">
    <title>Allosimplon - Modifiez les réalisateurs du film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../includes/navbar.php'); ?>

    <section class="flex flex-col items-center">

        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Film réalisateurs
            update
            Form
        </h2>

        <form action="content/admin/films-crud/traitement/realisateurs_update.php?id=<?php echo $film_id; ?>"
            method="POST">
            <fieldset class="flex flex-col items-left">

                <?php foreach ($realisateurs as $realisateur) { ?>

                    <div>
                        <input type="checkbox" id="realisateur<?php echo $realisateur['id_realisateur']; ?>"
                            value="<?php echo $realisateur['id_realisateur']; ?>" name="realisateurs[]">

                        <label for="realisateur<?php echo $realisateur['id_realisateur']; ?>">
                            <?php echo $realisateur['nom_realisateur']; ?>
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