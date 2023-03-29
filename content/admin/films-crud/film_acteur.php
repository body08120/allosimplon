<?php
session_start();
$id_film = $_SESSION['id_film'];

$admin = '2';
if ($_SESSION['role_user'] != $admin) {
    header('Location: http://localhost/allosimplon/index.php');
}
include_once("../../../assets/config/config.php");

// On récupère les acteurs existant
$sql = "SELECT * FROM acteurs";
$stmt = $pdo->query($sql);
$acteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($acteurs);
// die();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajoutez des réalisateur à votre film !</title>
    <base href="/allosimplon/">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-[#B49FCC]">

    <?php include('../../includes/navbar.php'); ?>

    <div class="flex flex-col items-center">
        <h2 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Ajoutez un, ou
            plusieurs acteurs à
            votre film</h2>
        <form action="content/admin/films-crud/traitement/acteurs.php" method="POST">
            <fieldset class="flex flex-col my-6">
                <input type="hidden" name="action" value="selectionner">
                <select name="acteur">
                    <?php foreach ($acteurs as $acteur): ?>
                        <option value="<?php echo $acteur['id_acteur']; ?>">
                            <?php echo $acteur['nom_acteur']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <input type="submit" value="Valider" name="submit"
                    class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                                                                            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0" />
            </fieldset>
        </form>

        <form action="content/admin/films-crud/traitement/acteurs.php" method="post">
            <h2 class=" text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Ajoutez un
            acteur qui n'est pas dans la liste</h2>
            <fieldset class="flex flex-col my-6">
                <input type="hidden" name="action" value="ajouter">
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" name="img_acteur"
                    type="text" placeholder="https://pinterest.com/exemple/exemple" />
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" name="nom_acteur"
                    type="text" placeholder="Tom Hardy" />
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" name="desc_acteur"
                    type="text" placeholder="Une courte description, par exemple de la biographie" />

                <input type="submit" value="Valider" name="submit"
                    class="py-1 px-8 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                                                                            focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0" />
            </fieldset>
        </form>

        <a class="underline" href="content/admin/panel.php">Retour au panneau d'administration</a>

    </div>

    <?php include('../../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>