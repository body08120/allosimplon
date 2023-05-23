<?php
session_start();

// Si l'user est connecter on le renvoie
if (!empty($_SESSION['logged_in'])) {
    header('Location: http://localhost/allosimplon/index.php');
}

// On vérifie si un jeton un générer, si non on le génère
if (!isset($_SESSION['csrf_token'])) {
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/projets/allosimplon/">
    <title>AlloSimplon - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234]">

    <!--navbar-->
    <?php include('../includes/navbar.php') ?>



    <div class="xl:px-52 xl:mb-44 2xl:mx-52 ">
        <!-- text Inscription -->
        <div class="py-5 px-10">
            <h1 class="text-center uppercase font-semibold text-[24px] text-[#EAD7D7] tracking-[.15em]">Connexion<h1>
                    <p class="py-5 text-center font-light text-[#EAD7D7] text-[18px] tracking-[.10em]">
                        Découvrez des milliers de titres de films et de séries TV populaires,
                        ainsi que des productions originales captivantes que vous ne trouverez nulle part ailleurs.
                        Connectez-vous et commencez à explorer dès maintenant!
                    </p>
        </div>


        <!--form connexion-->
        <div class=" bg-[#6D466B] py-5 px-10 md:py-10 md:px-20 lg:px-52 xl:rounded-lg">
            <form action="content/formulaires-traitement/traitement-connexion.php" method="POST" class="flex flex-col">

                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="email"
                    placeholder="Adresse email" name="mail-user" />

                <!-- gestion erreur champs vide -->
                <?php if (isset($_SESSION['error_co_vide'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_co_vide']; ?>
                    </p>
                <?php endif; ?>

                <!-- gestion erreur champs incorrect -->
                <?php if (isset($_SESSION['error_co_incor'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_co_incor']; ?>
                    </p>
                    <?php unset($_SESSION['error_co_incor']); ?>
                <?php endif; ?>

                <!-- password -->
                <div class="relative w-full my-3 focus:border-transparent focus:ring-0 md:my-5">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle focus:border-transparent focus:ring-0" id="toggle"
                            type="checkbox" />
                        <label
                            class="bg-gray-300 hover:bg-gray-400 rounded-full px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label"
                            for="toggle">Voir</label>
                    </div>
                    <input class="w-full js-password rounded-full focus:border-transparent focus:ring-0" id="password"
                        type="password" placeholder="Mot de passe" name="mdp-user" autocomplete="off" />
                </div>

                <!-- gestion erreur champs vide -->
                <?php if (isset($_SESSION['error_co_vide'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_co_vide']; ?>
                    </p>
                    <?php unset($_SESSION['error_co_vide']); ?>
                <?php endif; ?>


                <!---->
                <input type="submit" value="VALIDER" name="" class="py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
                md:px-16 md:py-2 
                lg:py-4 lg:my-10" />
                <form>
                    <div class="text-[#EAD7D7] text-center hover:underline"><a
                            href="content/formulaires/inscription.php">Cliquez ici pour créez un compte !</a></div>
        </div>
    </div>
    <!-------------------------------------->
    <div class="h-1 divide-[#412234]"></div>


    <!--footer-->
    <?php include('../includes/footer.php') ?>


    <script src="/projets/allosimplon/assets/js/form-js-password.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>