<?php
session_start();
require_once('assets/config/config.php');

$derniersAjouts = $pdo->query("SELECT f.id_film, f.img_film, f.nom_film FROM films f ORDER BY f.id_film DESC LIMIT 6")->fetchAll();

$actionSF = $pdo->query("SELECT DISTINCT f.id_film, f.img_film, f.nom_film FROM films f JOIN possede p ON f.id_film=p.id_film JOIN genres g ON p.id_genre=g.id_genre WHERE g.nom_genre IN ('Action','Science-Fiction') LIMIT 6")->fetchAll();

$drameThriller = $pdo->query("SELECT DISTINCT f.id_film, f.img_film, f.nom_film FROM films f JOIN possede p ON f.id_film=p.id_film JOIN genres g ON p.id_genre=g.id_genre WHERE g.nom_genre IN ('Drame','Thriller') LIMIT 6")->fetchAll();

$aventure = $pdo->query("SELECT DISTINCT f.id_film, f.img_film, f.nom_film FROM films f JOIN possede p ON f.id_film=p.id_film JOIN genres g ON p.id_genre=g.id_genre WHERE g.nom_genre IN ('Aventure','Animation','Comédie') LIMIT 6")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AlloSimplon - Accueil</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
  <style>
    .film-card:hover .film-overlay { opacity: 1; }
    .film-card img { transition: transform 0.3s ease; }
    .film-card:hover img { transform: scale(1.05); }
    .film-overlay { transition: opacity 0.3s ease; }
    .row-scroll { display: flex; gap: 0.5rem; overflow-x: auto; padding-bottom: 0.5rem; scroll-behavior: smooth; }
    .row-scroll::-webkit-scrollbar { height: 4px; }
    .row-scroll::-webkit-scrollbar-track { background: #412234; }
    .row-scroll::-webkit-scrollbar-thumb { background: #6D466B; border-radius: 2px; }
  </style>
</head>

<body class="bg-[#1a0d14] font-mono min-h-screen flex flex-col">

  <?php include('content/includes/navbar.php') ?>

  <!-- HERO -->
  <section class="relative w-full h-screen flex flex-col items-center justify-center text-center overflow-hidden">
    <!-- Image de fond -->
    <img src="assets/img/carousel/carousel-2.png" alt="" class="absolute inset-0 w-full h-full object-cover object-center" />
    <!-- Overlay noir global pour assombrir -->
    <div class="absolute inset-0" style="background: rgba(0,0,0,0.55);"></div>
    <!-- Fondu violet sur le centre/bas -->
    <div class="absolute inset-0" style="background: linear-gradient(to top, #1a0d14 0%, rgba(65,34,52,0.7) 40%, transparent 100%);"></div>

    <div class="relative z-10 px-6 max-w-4xl mx-auto">
      <div class="mb-4 inline-flex items-center gap-2 bg-[#B49FCC]/20 border border-[#B49FCC]/40 rounded-full px-4 py-1 text-[#B49FCC] text-sm tracking-widest uppercase">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/></svg>
        Votre cinéma en ligne
      </div>
      <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-[#EAD7D7] tracking-tight mb-6" style="text-shadow: 0 0 60px rgba(180,159,204,0.4);">Allo<span class="text-[#B49FCC]">Simplon</span></h1>
      <p class="text-lg md:text-xl text-[#EAD7D7]/70 max-w-2xl mx-auto mb-10 leading-relaxed">Découvrez des milliers de films, séries et documentaires. Explorez notre catalogue et trouvez votre prochain coup de cœur.</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="/content/pages/catalogue.php" class="px-8 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-lg tracking-wide transition-all duration-200 uppercase">Explorer le catalogue</a>
        <a href="/content/formulaires/connexion.php" class="px-8 py-3 border-2 border-[#B49FCC]/60 hover:border-[#B49FCC] text-[#EAD7D7] font-bold rounded-full text-lg tracking-wide transition-all duration-200 uppercase">Se connecter</a>
      </div>
    </div>

    <!-- Flèche flottante -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#B49FCC" class="w-10 h-10 opacity-70">
        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
      </svg>
    </div>
  </section>

  <!-- CONTENU -->
  <div class="bg-[#1a0d14]">

    <?php
    function renderRow($title, $films) {
      if (empty($films)) return;
      echo '<section class="pt-10 px-4 md:px-8">';
      echo '<h2 class="text-[#EAD7D7] text-lg md:text-xl font-bold tracking-widest uppercase mb-4 pl-1">' . htmlspecialchars($title) . '</h2>';
      echo '<div class="row-scroll">';
      foreach ($films as $film) {
        echo '<a href="/content/pages/film.php?id=' . $film[0] . '" class="film-card relative flex-none w-32 md:w-40 lg:w-44 rounded-md overflow-hidden cursor-pointer">';
        echo '<img src="' . htmlspecialchars($film[1]) . '" alt="' . htmlspecialchars($film[2]) . '" class="w-full h-48 md:h-60 lg:h-64 object-cover">';
        echo '<div class="film-overlay absolute inset-0 opacity-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex items-end p-2">';
        echo '<span class="text-white text-xs font-bold leading-tight">' . htmlspecialchars($film[2]) . '</span>';
        echo '</div></a>';
      }
      echo '</div></section>';
    }
    renderRow('🎬 Derniers ajouts', $derniersAjouts);
    renderRow('💥 Action & Science-Fiction', $actionSF);
    renderRow('🎭 Drame & Thriller', $drameThriller);
    renderRow('🌍 Aventure & Animation', $aventure);
    ?>

    <!-- NEWSLETTERS -->
    <div class="relative overflow-hidden mt-10">
      <img class="thumbnail absolute inset-0 w-full h-full object-cover" src="assets/img/background/parallax-newsletters.png" alt="" />
      <div class="relative z-10 py-16 px-6 bg-black/40">
      <div class="max-w-xl mx-auto text-center">
        <h2 class="text-2xl font-bold text-[#B49FCC] tracking-widest uppercase mb-4">Newsletter</h2>
        <p class="text-[#EAD7D7]/70 mb-8 leading-relaxed">Abonnez-vous pour recevoir nos futurs offres et promotions.</p>

        <form method="POST" action="" class="flex flex-col">
          <div class="flex justify-between items-center bg-white rounded-full lg:mx-20 xl:mx-64">
            <input type="email" placeholder="exemple.du08@gmail.fr" name="input-form-email-newsletters"
              class="border-none bg-transparent focus:border-transparent focus:ring-0" />
            <!--icone mail-->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6 mx-2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
          </div>
          <input type="submit" value="S'ABONNER" name="button-form-newsletters" class="py-1 px-8 mt-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                            focus:text-[24px] focus:bg-[#412234]
                            md:px-16 md:py-2 
                            lg:py-4 lg:mt-10" />
        </form>
      </div>
      </div>
    </div>
  </div>

  <?php include('content/includes/footer.php') ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.6.2/dist/simpleParallax.min.js"></script>
  <script src="assets/js/parallax-newsletters.js"></script>
</body>

</html>