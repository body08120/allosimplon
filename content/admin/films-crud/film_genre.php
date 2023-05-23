<?php
session_start();
$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: /projets/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");


// On récupère les genres existant
$sql = "SELECT * FROM genres";
$stmt = $pdo->query($sql);
$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    <title>Ajouter un genre à votre film !</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../includes/navbar.php'); ?>

    <div class="flex flex-col items-center">
        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Ajoutez un genre à
            votre film</h2>
        <form action="content/admin/films-crud/traitement/genres.php" method="POST">
            <fieldset class="flex flex-col my-6">

                <select name="genre">

                    <?php foreach ($genres as $genre): ?>
                        <option value="<?php echo $genre['id_genre']; ?>">
                            <?php echo $genre['nom_genre']; ?>
                        </option>
                    <?php endforeach; ?>

                </select>
                <br><br>
                <input type="submit" value="Valider" name="submit" class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0" />
            </fieldset>
        </form>
        <a class="underline" href="content/admin/panel.php">Retour au panneau d'administration</a>
    </div>

    <?php include('../../includes/footer.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>