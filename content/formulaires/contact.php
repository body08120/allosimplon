<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/projets/allosimplon/">
    <title>AlloSimplon - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
</head>
<body class="bg-[#412234]">


<!--navbar-->
<?php include('../includes/navbar.php') ?>

<div class="xl:mb-44 xl:px-56 xl:mb-32 2xl:mx-52 ">

<!-- text contact-->
<div class="py-5 px-10">
    <h1 class="text-center uppercase font-semibold text-[24px] text-[#EAD7D7] tracking-[.15em]">Contactez-nous<h1>
    <p class="py-5 text-center font-light text-[#EAD7D7] text-[18px] tracking-[.10em]">
    Nous sommes toujours ravis d'avoir de vos nouvelles. Si vous avez des questions, des commentaires ou des préoccupations, 
    veuillez remplir le formulaire ci-dessous et nous vous répondrons dès que possible. 
    Nous apprécions grandement votre avis et nous nous efforçons de fournir à nos utilisateurs une expérience exceptionnelle. 
    Merci d'avance pour votre message et à bientôt!
    </p>
</div>

<!-- form contact -->
<div class="bg-[#6D466B] py-5 px-10 md:py-10 md:px-20 lg:px-32 xl:rounded-lg">
        <form action="content/formulaires-traitement/traitement-contact.php" method="post" class="flex flex-col">
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="text" placeholder="Nom" name="nom-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="email" placeholder="Adresse email" name="mail-user" />
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5" type="text" placeholder="Objet" name="motif" />
            <input class="rounded-[64px] my-3 focus:border-transparent focus:ring-0 md:my-5 h-96" type="text" name="message" />

            <!--button form inscription-->
            <input  
        type="submit" 
        value="ENVOYER" 
        name="" 
        class="
        py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
        focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
        md:px-16 md:py-2 
        lg:py-4 lg:my-10" />
        </form>
    </div>

</div>


<!-------------------------------------->
<div class="h-1 divide-[#412234]"></div>
<!--footer-->
<?php include('../includes/footer.php') ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>
