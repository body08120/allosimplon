<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloSimplon - Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234]">

    <!--navbar-->
    <?php include('../includes/navbar.php') ?>


    <!-- text Inscription -->
    <div class="py-5 px-10">
        <h1 class="text-center uppercase font-semibold text-[24px] text-[#EAD7D7] tracking-[.15em]">Inscription<h1>
                <p class="py-5 text-center font-light text-[#EAD7D7] text-[18px] tracking-[.10em]">
                    Remplissez simplement le formulaire ci-dessous avec vos informations de base
                    et commencez votre voyage à travers notre monde de divertissement de haute qualité.
                </p>
    </div>


    <!--formulaire-->
    <div class="bg-[#6D466B] py-5 px-10">
        <form action="" method="post" class="flex flex-col">
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0" type="text" placeholder="Nom" name="nom-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0" type="text" placeholder="Prénom" name="prenom-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0" type="email" placeholder="Adresse email" name="mail-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0" type="email" placeholder="Re-tapez votre adresse email" name="mail-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0" type="text" placeholder="Pseudonyme" name="pseudo-user" />

                    <!-- password -->
                    <div class="relative w-full my-3 focus:border-transparent focus:ring-0">
                        <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-password-toggle focus:border-transparent focus:ring-0" id="toggle" type="checkbox" />
                        <label class="bg-gray-300 hover:bg-gray-400 rounded-full px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-password-label" for="toggle">Voir</label>
                        </div>
                        <input class="w-full js-password rounded-full focus:border-transparent focus:ring-0" id="password" type="password" placeholder="Mot de passe" name="mdp-user" autocomplete="off" />
                    </div>
                    <!---->

                    <!-- password -->
                    <div class="relative w-full my-3 focus:border-transparent focus:ring-0">
                        <div class="absolute inset-y-0 right-0 flex items-center px-2">
                        <input class="hidden js-repassword-toggle focus:border-transparent focus:ring-0" id="retoggle" type="checkbox" />
                        <label class="bg-gray-300 hover:bg-gray-400 rounded-full px-2 py-1 text-sm text-gray-600 font-mono cursor-pointer js-repassword-label" for="retoggle">Voir</label>
                        </div>
                        <input class="w-full js-repassword rounded-full focus:border-transparent focus:ring-0" id="repassword" type="password" placeholder="Re-tapez votre mot de passe" name="mdp-user" autocomplete="off" />
                    </div>
                    <!---->                    
                    
                    <!--button form inscription-->
                    <input  
                    type="submit" 
                    value="VALIDER" 
                    name="" 
                    class="
                    py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                    focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
                    md:px-16 md:py-2 
                    lg:py-4 lg:my-10" />
        </form>
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