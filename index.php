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
<nav class="bg-[#6D466B] border-gray-200 px-2 sm:px-4 py-1 rounded dark:bg-gray-900">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a href="#" class="flex items-center">
      <img src="http://localhost/allosimplon/assets/img/allosimplon.png" class="h-16 mr-3 lg:h-20" alt="AlloSimplon Logo" />
      <!-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> -->
  </a>
  <div class="flex items-center md:order-2">
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-[#B49FCC]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 rounded-full" src="http://localhost/allosimplon/assets/img/avatar.png" alt="user photo">
      </button>
      
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-[#B49FCC] divide-y divide-[#6D466B] rounded-lg shadow" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900">user</span>
          <span class="block text-sm font-medium text-gray-500 truncate">user@gmail.com</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
          </li>
          <!-- <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"></a>
          </li> -->
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
          </li>
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-900 rounded-lg md:hidden focus:bg-[#B49FCC] focus:outline-none" aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
    <ul class="flex flex-col p-4 mt-4 border border-gray-900 rounded-lg bg-[#B49FCC] md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-[#B49FCC]">
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-[#6D466B] rounded md:bg-transparent md:text-[#6D466B] md:p-0 dark:text-white" aria-current="page">Accueil</a>
      </li>
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0">Catalogue</a>
      </li>
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0">Contact</a>
      </li>
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0">Plus d'infos</a>
      </li>
      <li>
        <a href="#" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0">Admin</a>
      </li>
    </ul>
  </div>
  </div>
</nav>


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
      <input type="email" placeholder="exemple.du-08@gmail.fr" name="input-form-email-newsletters" class="border-none bg-transparent focus:rounded-full"/>
        <!--icone mail-->
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
        </svg>
    </div>
      <input type="submit" value="S'ABONNER" name="button-form-newsletters" class="py-1 px-8 my-5 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] md:px-16 md:py-2 lg:py-4 lg:my-10"/>
  </form>
</div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>