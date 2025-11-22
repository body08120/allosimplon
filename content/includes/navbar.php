<nav class="text-[18px] text-[#EAD7D7] bg-[#6D466B] border-gray-200 px-2 py-1 rounded text-[24px] sm:px-4">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
  <a href="#" class="flex items-center">
      <img src="/assets/img/allosimplon.png" class="h-16 mr-3 lg:h-20" alt="AlloSimplon Logo" />
      <!-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> -->
  </a>
  <div class="flex items-center md:order-2">
  <?php
  $admin = "2";
  if(isset($_SESSION['mail-user']) && $_SESSION['logged_in'] === true) {
    ?>
      <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-[#B49FCC]" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-10 h-10 rounded-full" src="/assets/img/avatar.png" alt="user photo">
      </button>
      
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-[#B49FCC] divide-y divide-[#6D466B] rounded-lg shadow" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900"><?php echo $_SESSION['pseudo_user']; ?></span>
          <span class="block text-sm font-medium text-gray-500 truncate"><?php echo $_SESSION['mail-user']; ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
        <!--  <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
          </li>
           <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"></a>
          </li> 
          <li>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Paramètres</a>
          </li>-->
          <li>
            <a href="/content/formulaires-traitement/traitement-deconnexion.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Déconnexion</a>
          </li>
        </ul>
      </div><?php } else { ?>
      <div><a class="text-[18px] lg:text-[24px]" href="/content/formulaires/connexion.php">Connectez-vous</a></div>
  <?php  }  
    ?>
    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-900 rounded-lg md:hidden focus:bg-[#B49FCC] focus:outline-none" aria-controls="mobile-menu-2" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 md:text-[18px]" id="mobile-menu-2">
    <ul class="flex flex-col p-4 mt-4 border border-gray-900 rounded-lg bg-[#B49FCC] md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-[#B49FCC]">
      <li>
        <a href="/index.php" class="block py-2 pl-3 pr-4 text-white bg-[#6D466B] rounded md:bg-transparent md:text-[#6D466B] md:p-0 dark:text-white lg:text-[18px]" aria-current="page">Accueil</a>
      </li>
      <li>
        <a href="/content/pages/catalogue.php" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0 lg:text-[18px]">Catalogue</a>
      </li>
      <li>
        <a href="/content/formulaires/contact.php" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0 lg:text-[18px]">Contact</a>
      </li>
      <li>
        <a href="/content/pages/informations.php" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0 lg:text-[18px]">Plus d'infos</a>
      </li>
      <?php if (!empty($_SESSION['role_user']) && $_SESSION['role_user'] == $admin) {?>
      <li>
        <a href="/content/admin/panel.php" class="block py-2 pl-3 pr-4 text-gray-200 rounded hover:bg-[#6D466B] md:hover:bg-transparent md:hover:text-[#6D466B] md:p-0 lg:text-[18px]">Admin</a>
      </li>
      <?php } else{ } ?>
    </ul>
  </div>
  </div>
</nav>
