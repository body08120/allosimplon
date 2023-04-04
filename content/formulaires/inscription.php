<?php
session_start();

// Si l'user est connecter on le renvoie
if (!empty($_SESSION['logged_in'])) {
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
    <title>AlloSimplon - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234]">

    <!--navbar-->
    <?php include('../includes/navbar.php') ?>

    <div class="xl:px-64 xl:mb-44 2xl:mx-52 2xl:px-76">
        <!-- text Inscription -->
        <div class="py-5 px-10">
            <h1 class="text-center uppercase font-semibold text-[24px] text-[#EAD7D7] tracking-[.15em]">Inscription<h1>
                    <p class="py-5 text-center font-light text-[#EAD7D7] text-[18px] tracking-[.10em]">
                        Remplissez simplement le formulaire ci-dessous avec vos informations de base
                        et commencez votre voyage à travers notre monde de divertissement de haute qualité.
                    </p>
        </div>


        <!--formulaire-->
        <div class="bg-[#6D466B] py-5 px-10 md:py-10 md:px-20 lg:px-32 xl:rounded-lg">
            <form action="content/formulaires-traitement/traitrement-inscription.php" method="POST"
                class="flex flex-col">
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="text"
                    placeholder="Nom" name="nom-user" />
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="text"
                    placeholder="Prénom" name="prenom-user" />

                <!-- email -->
                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="email"
                    placeholder="Adresse email" name="mail-user" />

                <!-- gestion erreur email -->
                <?php if (isset($_SESSION['error_message_email'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_email']; ?>
                    </p>
                <?php endif; ?>

                <!-- gestion erreur email -->
                <?php if (isset($_SESSION['error_message_email1'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_email1']; ?>
                    </p>
                <?php endif; ?>


                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="email"
                    placeholder="Re-tapez votre adresse email" name="mail-user" />

                <!-- gestion erreur email -->
                <?php if (isset($_SESSION['error_message_email'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_email']; ?>
                    </p>
                    <?php unset($_SESSION['error_message_email']); ?>
                <?php endif; ?>

                <!-- gestion erreur email invalid -->
                <?php if (isset($_SESSION['error_message_email1'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_email1']; ?>
                    </p>
                    <?php unset($_SESSION['error_message_email1']); ?>
                <?php endif; ?>

                <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="text"
                    placeholder="Pseudonyme" name="pseudo-user" />

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
                <!---->

                <!-- gestion erreur mdp -->
                <?php if (isset($_SESSION['error_message_mdp'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_mdp']; ?>
                    </p>
                <?php endif; ?>

                <!-- gestion erreur mdp ne correspondent pas -->
                <?php if (isset($_SESSION['error_message_mdp1'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_mdp1']; ?>
                    </p>
                <?php endif; ?>


                <!-- password -->
                <div class="relative w-full my-3 focus:border-transparent focus:ring-0 md:my-5">
                    <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-repassword-toggle focus:border-transparent focus:ring-0" id="retoggle"
                            type="checkbox" />
                        <label
                            class="bg-gray-300 hover:bg-gray-400 rounded-full px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-repassword-label"
                            for="retoggle">Voir</label>
                    </div>
                    <input class="w-full js-repassword rounded-full focus:border-transparent focus:ring-0"
                        id="repassword" type="password" placeholder="Re-tapez votre mot de passe" name="remdp-user"
                        autocomplete="off" />
                </div>
                <!---->

                <!-- gestion erreur mdp -->
                <?php if (isset($_SESSION['error_message_mdp'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_mdp']; ?>
                    </p>
                    <?php unset($_SESSION['error_message_mdp']); ?>
                <?php endif; ?>

                <!-- gestion erreur mdp ne correspondent pas -->
                <?php if (isset($_SESSION['error_message_mdp1'])): ?>
                    <p class="text-red-500 text-xs italic bg-red-100 p-1">
                        <?php echo $_SESSION['error_message_mdp1']; ?>
                    </p>
                    <?php unset($_SESSION['error_message_mdp1']); ?>
                <?php endif; ?>

                <!--button form inscription-->
                <input type="submit" value="VALIDER" name="" class="
                    py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                    focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
                    md:px-16 md:py-2 
                    lg:py-4 lg:my-10" />
            </form>
            <div class="text-[#EAD7D7] text-center hover:underline"><a href="content/formulaires/connexion.php">Cliquez
                    ici pour vous connectez !</a></div>
        </div>
    </div>



    <!-------------------------------------->
    <div class="h-1 divide-[#412234]"></div>



    <!--footer-->
    <?php include('../includes/footer.php') ?>



    <script src="http://localhost/allosimplon/assets/js/form-js-password.js"></script>
    <script src="http://localhost/allosimplon/assets/js/form-js-repassword.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>