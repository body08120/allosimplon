<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /projets/allosimplon/index.php');
}


if (isset($_GET['id'])) {

    $film_id = $_GET['id'];


    include_once("../../../assets/config/config.php");

    // On récupère les acteurs existant
    $sql = "SELECT * FROM acteurs";
    $stmt = $pdo->query($sql);
    $acteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     var_dump($aceturs);
//     die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/projets/allosimplon/">
    <title>Allosimplon - Modifiez les acteurs du film</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../includes/navbar.php'); ?>

    <section class="flex flex-col items-center">

        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Film acteurs update
            Form </h2>

        <form action="content/admin/films-crud/traitement/acteurs_update.php?id=<?php echo $film_id; ?>" method="POST">
            <fieldset class="flex flex-col items-left">

                <?php foreach ($acteurs as $acteur) { ?>

                    <div>
                        <input type="checkbox" id="acteur<?php echo $acteur['id_acteur']; ?>"
                            value="<?php echo $acteur['id_acteur']; ?>" name="acteurs[]">

                        <label for="acteur<?php echo $acteur['id_acteur']; ?>">
                            <?php echo $acteur['nom_acteur']; ?>
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

</body>

</html>