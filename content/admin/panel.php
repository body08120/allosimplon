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
    <title>Allosimplon - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono text-black">

    <?php include('../includes/navbar.php'); ?>

    <section class="flex flex-col items-center">
        <h1 class="text-center uppercase font-semibold text-[24px] text-[#6D466B] tracking-[.15em]">Administration</h1>
        <div class="flex flex-col justify-around">
            <div class="py-1 px-8 my-6 mx-6 bg-[#B49FCC] rounded-full"><a href="content/admin/users-crud/admin-view.php">Gestion des
                    utilisateurs</a></div>
            <div class="py-1 px-8 my-6 mx-6 bg-[#B49FCC] rounded-full"><a href="content/admin/films-crud/admin-view.php">Gestion des
                    films</a></div>
        </div>
    </section>

    <?php include('../includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>