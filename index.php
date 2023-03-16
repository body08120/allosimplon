<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloSimplon - Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
</head>
<body class="bg-[#412234]">  

   <!--navbar-->
<?php include('content/includes/navbar.php') ?>

   <!--carousel-->
<div id="controls-carousel" class="relative w-full" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-96 lg:h-[38rem] xl:h-[48rem]">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="http://localhost/allosimplon/assets/img/carousel/carousel-1.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="http://localhost/allosimplon/assets/img/carousel/carousel-2.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="http://localhost/allosimplon/assets/img/carousel/carousel-3.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="http://localhost/allosimplon/assets/img/carousel/carousel-4.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="http://localhost/allosimplon/assets/img/carousel/carousel-5.png" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#B49FCC]/50 dark:bg-gray-800/30 group-hover:bg-[#B49FCC]/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-[#B49FCC] dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-[#6D466B] dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Précédent</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-[#B49FCC]/50 dark:bg-gray-800/30 group-hover:bg-[#B49FCC]/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-[#B49FCC] dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-[#6D466B] dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Suivant</span>
        </span>
    </button>
</div>


   <!--bg-top-carousel-->
<div class="bg-[#6D466B]">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#EAD7D7" class="w-14 h-14 mx-auto">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
</svg>
</div>


   <!--form-newsletters-->
<div class="bg-[#EAD7D7] py-5 px-10">
  <h2 class="text-center uppercase font-semibold text-[24px] text-[#B49FCC] tracking-[.15em]">newsletters</h2>
  <p class="py-5 text-center font-light text-[#6D466B] text-[18px] tracking-[.10em] lg:py-10">Abonnez-vous à notre newsletters pour recevoir nos futurs offres et promotions.
    <br>On vous attend !</p>
    <!---->

  <form method="" action="" class="flex flex-col">
    <div class="flex justify-between items-center bg-white rounded-full lg:mx-20">
      <input type="email" placeholder="exemple.du-08@gmail.fr" name="input-form-email-newsletters" class="border-none bg-transparent focus:border-transparent focus:ring-0"/>
        <!--icone mail-->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
    </div>
      <input type="submit" value="S'ABONNER" name="button-form-newsletters" 
      class="py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                            focus:text-[24px] focus:bg-[#412234]
                            md:px-16 md:py-2 
                            lg:py-4 lg:my-10" />
  </form>
</div>


   <!--footer-->
<?php include('content/includes/footer.php') ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>