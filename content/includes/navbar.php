<nav id="main-nav" class="fixed top-0 left-0 right-0 z-50 font-mono transition-all duration-300 px-4 sm:px-8 py-3" style="background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, transparent 100%);">
  <div class="max-w-7xl mx-auto flex items-center justify-between">

    <a href="/index.php" class="flex items-center flex-shrink-0">
      <img src="/assets/img/allosimplon.png" class="h-12 lg:h-14" alt="AlloSimplon Logo" />
    </a>

    <div class="hidden md:flex items-center gap-8 text-[15px] tracking-widest uppercase">
      <a href="/index.php" class="text-[#EAD7D7] hover:text-[#B49FCC] transition-colors duration-200">Accueil</a>
      <a href="/content/pages/catalogue.php" class="text-[#EAD7D7]/80 hover:text-[#B49FCC] transition-colors duration-200">Catalogue</a>
      <a href="/content/formulaires/contact.php" class="text-[#EAD7D7]/80 hover:text-[#B49FCC] transition-colors duration-200">Contact</a>
      <a href="/content/pages/informations.php" class="text-[#EAD7D7]/80 hover:text-[#B49FCC] transition-colors duration-200">Infos</a>
      <?php
      $admin = "2";
      if (!empty($_SESSION['role_user']) && $_SESSION['role_user'] == $admin) { ?>
        <a href="/content/admin/panel.php" class="text-[#B49FCC] hover:text-[#EAD7D7] transition-colors duration-200">Admin</a>
      <?php } ?>
    </div>

    <div class="flex items-center gap-3">
      <?php
      if (!isset($admin)) $admin = "2";
      if(isset($_SESSION['mail-user']) && $_SESSION['logged_in'] === true) { ?>
        <div class="relative">
          <button type="button" id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom"
            class="flex items-center gap-2 bg-[#412234]/80 border border-[#B49FCC]/40 rounded-full pl-3 pr-1 py-1 text-[#EAD7D7] text-sm hover:border-[#B49FCC] transition-all">
            <span><?php echo htmlspecialchars($_SESSION['pseudo_user']); ?></span>
            <img class="w-8 h-8 rounded-full" src="/assets/img/avatar.png" alt="avatar">
          </button>
          <div class="z-50 hidden my-2 text-base list-none bg-[#1a0d14] border border-[#6D466B]/50 divide-y divide-[#6D466B]/30 rounded-lg shadow-xl" id="user-dropdown">
            <div class="px-4 py-3">
              <span class="block text-sm text-[#B49FCC] font-bold"><?php echo htmlspecialchars($_SESSION['pseudo_user']); ?></span>
              <span class="block text-xs text-[#EAD7D7]/50 truncate"><?php echo htmlspecialchars($_SESSION['mail-user']); ?></span>
            </div>
            <ul class="py-1">
              <li><a href="/content/formulaires-traitement/traitement-deconnexion.php" class="block px-4 py-2 text-sm text-[#EAD7D7]/80 hover:bg-[#412234] hover:text-[#B49FCC]">Déconnexion</a></li>
            </ul>
          </div>
        </div>
      <?php } else { ?>
        <a href="/content/formulaires/connexion.php" class="px-5 py-2 border border-[#B49FCC]/60 hover:border-[#B49FCC] hover:bg-[#B49FCC]/10 text-[#EAD7D7] text-sm tracking-widest uppercase rounded-full transition-all duration-200">Connexion</a>
      <?php } ?>

      <button data-collapse-toggle="mobile-menu-2" type="button" class="md:hidden p-2 text-[#EAD7D7]" aria-controls="mobile-menu-2">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
      </button>
    </div>
  </div>

  <div class="hidden md:hidden mt-3 pb-3 border-t border-[#6D466B]/30" id="mobile-menu-2">
    <ul class="flex flex-col gap-2 pt-3 px-2 text-sm tracking-widest uppercase">
      <li><a href="/index.php" class="block py-2 text-[#EAD7D7] hover:text-[#B49FCC]">Accueil</a></li>
      <li><a href="/content/pages/catalogue.php" class="block py-2 text-[#EAD7D7]/80 hover:text-[#B49FCC]">Catalogue</a></li>
      <li><a href="/content/formulaires/contact.php" class="block py-2 text-[#EAD7D7]/80 hover:text-[#B49FCC]">Contact</a></li>
      <li><a href="/content/pages/informations.php" class="block py-2 text-[#EAD7D7]/80 hover:text-[#B49FCC]">Infos</a></li>
      <?php if (!empty($_SESSION['role_user']) && $_SESSION['role_user'] == $admin) { ?>
        <li><a href="/content/admin/panel.php" class="block py-2 text-[#B49FCC]">Admin</a></li>
      <?php } ?>
    </ul>
  </div>
</nav>

<script>
  const nav = document.getElementById('main-nav');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 60) {
      nav.style.background = 'rgba(20, 8, 18, 0.95)';
      nav.style.backdropFilter = 'blur(12px)';
      nav.style.borderBottom = '1px solid rgba(109,70,107,0.3)';
    } else {
      nav.style.background = 'linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, transparent 100%)';
      nav.style.backdropFilter = 'none';
      nav.style.borderBottom = 'none';
    }
  });
</script>
