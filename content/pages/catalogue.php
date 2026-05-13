<?php
session_start();

// On vérifie on est sur quel page
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

// On se connecte à la db
require_once('../../assets/config/config.php');

// On détermine le nombre de film et on renomme
$sql = "SELECT COUNT(*) AS nb_films 
        FROM films";
$stmt = $pdo->prepare($sql);
$stmt->execute();

//On récupère le nombre de film
$result = $stmt->fetch();
// on force en nombre entier, autre sécu si on veut
$nbFilms = (int) $result['nb_films'];

// On détermine le nombre de film par page
$parPage = 10;
$pages = ceil($nbFilms / $parPage);

// Calcul du premier film de la page
$premier = ($currentPage * $parPage) - $parPage;

// On récupère les id, img et nom des films
$sql = "SELECT id_film, img_film, nom_film
        FROM films
        LIMIT :premier, :parpage";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':premier', $premier, PDO::PARAM_INT);
$stmt->bindValue(':parpage', $parPage, PDO::PARAM_INT);
$stmt->execute();

// On stock les films dans un tableau associatif
$films = $stmt->fetchAll();

// var_dump($films);
// die();


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloSimplon - Catalogue</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <style>
        .film-card:hover .film-overlay { opacity: 1; }
        .film-card img { transition: transform 0.3s ease; }
        .film-card:hover img { transform: scale(1.05); }
        .film-overlay { transition: opacity 0.3s ease; }
    </style>
</head>

<body class="bg-[#1a0d14] pt-20 font-mono min-h-screen flex flex-col">

    <?php include('../includes/navbar.php') ?>

    <!-- Mini hero -->
    <div class="relative px-4 md:px-8 pt-12 pb-10 text-center overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"%23B49FCC\" fill-opacity=\"0.4\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E');"></div>
        <div class="relative z-10">
            <p class="text-[#B49FCC] text-xs tracking-widest uppercase mb-2"><?php echo $nbFilms; ?> films disponibles</p>
            <h1 class="text-4xl md:text-5xl font-bold text-[#EAD7D7] tracking-tight mb-6">Notre <span class="text-[#B49FCC]">Catalogue</span></h1>
            <div id="form-search" class="max-w-lg mx-auto">
                <form class="flex items-center gap-2" action="/content/formulaires-traitement/search.php" method="GET">
                    <div class="flex-1 flex items-center bg-[#412234]/80 border border-[#6D466B]/60 rounded-full px-4 py-3 focus-within:border-[#B49FCC] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#B49FCC] flex-shrink-0 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 111 11a6 6 0 0116 0z"/>
                        </svg>
                        <input class="bg-transparent border-none focus:ring-0 focus:outline-none text-[#EAD7D7] placeholder-[#EAD7D7]/40 w-full text-sm tracking-wide"
                            type="search" placeholder="Rechercher un film..." name="search-input-catalogue" />
                    </div>
                    <button type="submit" class="px-5 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-sm tracking-widest uppercase transition-colors duration-200">
                        Chercher
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Grille films -->
    <section class="px-4 md:px-8 pb-16">
        <div id="result-zone" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-3">
            <?php foreach ($films as $film): ?>
                <a href="/content/pages/film.php?id=<?php echo $film['id_film']; ?>" class="film-card relative rounded-lg overflow-hidden cursor-pointer block" style="aspect-ratio: 2/3;">
                    <img class="w-full h-full object-cover" src="<?php echo htmlspecialchars($film['img_film']); ?>" alt="<?php echo htmlspecialchars($film['nom_film']); ?>" />
                    <div class="film-overlay absolute inset-0 opacity-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent flex items-end p-3">
                        <span class="text-white text-xs font-bold leading-tight tracking-wide uppercase"><?php echo htmlspecialchars($film['nom_film']); ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <?php if ($pages > 1): ?>
        <nav class="mt-12 flex justify-center items-center gap-2">
            <?php if ($currentPage > 1): ?>
                <a href="/content/pages/catalogue.php?page=<?php echo $currentPage - 1; ?>"
                    class="px-4 py-2 rounded-full border border-[#6D466B]/60 text-[#EAD7D7]/70 hover:border-[#B49FCC] hover:text-[#B49FCC] text-sm tracking-widest uppercase transition-colors">
                    ← Préc.
                </a>
            <?php endif; ?>

            <?php for ($page = 1; $page <= $pages; $page++): ?>
                <a href="/content/pages/catalogue.php?page=<?php echo $page; ?>"
                    class="w-10 h-10 flex items-center justify-center rounded-full text-sm font-bold transition-colors
                    <?php echo $page === $currentPage ? 'bg-[#B49FCC] text-[#412234]' : 'border border-[#6D466B]/60 text-[#EAD7D7]/70 hover:border-[#B49FCC] hover:text-[#B49FCC]'; ?>">
                    <?php echo $page; ?>
                </a>
            <?php endfor; ?>

            <?php if ($currentPage < $pages): ?>
                <a href="/content/pages/catalogue.php?page=<?php echo $currentPage + 1; ?>"
                    class="px-4 py-2 rounded-full border border-[#6D466B]/60 text-[#EAD7D7]/70 hover:border-[#B49FCC] hover:text-[#B49FCC] text-sm tracking-widest uppercase transition-colors">
                    Suiv. →
                </a>
            <?php endif; ?>
        </nav>
        <?php endif; ?>
    </section>

    <?php include('../includes/footer.php') ?>

    <script src="/assets/js/cata-search.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>