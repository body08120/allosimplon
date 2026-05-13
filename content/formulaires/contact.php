<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloSimplon - Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-[#1a0d14] pt-20 min-h-screen flex flex-col font-mono">

<?php include('../includes/navbar.php') ?>

<div class="flex-1 flex items-center justify-center px-4 py-16">
    <div class="w-full max-w-xl">

        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-[#EAD7D7] tracking-widest uppercase mb-3">Contactez-nous</h1>
            <p class="text-[#EAD7D7]/60 text-sm leading-relaxed">
                Une question, un commentaire ? Remplissez le formulaire ci-dessous,<br>nous vous répondrons dès que possible.
            </p>
        </div>

        <!-- Formulaire -->
        <div class="bg-[#412234]/60 border border-[#6D466B]/40 rounded-2xl p-8 backdrop-blur">
            <form action="/content/formulaires-traitement/traitement-contact.php" method="post" class="flex flex-col gap-4">

                <div class="flex items-center bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-3 focus-within:border-[#B49FCC] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#B49FCC] mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <input class="bg-transparent border-none focus:ring-0 focus:outline-none text-[#EAD7D7] placeholder-[#EAD7D7]/40 w-full text-sm tracking-wide"
                        type="text" placeholder="Votre nom" name="nom-user" required />
                </div>

                <div class="flex items-center bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-3 focus-within:border-[#B49FCC] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#B49FCC] mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <input class="bg-transparent border-none focus:ring-0 focus:outline-none text-[#EAD7D7] placeholder-[#EAD7D7]/40 w-full text-sm tracking-wide"
                        type="email" placeholder="Votre adresse email" name="mail-user" required />
                </div>

                <div class="flex items-center bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-full px-4 py-3 focus-within:border-[#B49FCC] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#B49FCC] mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <input class="bg-transparent border-none focus:ring-0 focus:outline-none text-[#EAD7D7] placeholder-[#EAD7D7]/40 w-full text-sm tracking-wide"
                        type="text" placeholder="Objet" name="motif" required />
                </div>

                <div class="bg-[#1a0d14]/60 border border-[#6D466B]/50 rounded-2xl px-4 py-3 focus-within:border-[#B49FCC] transition-colors">
                    <textarea class="bg-transparent border-none focus:ring-0 focus:outline-none text-[#EAD7D7] placeholder-[#EAD7D7]/40 w-full text-sm tracking-wide resize-none h-36"
                        placeholder="Votre message..." name="message" required></textarea>
                </div>

                <button type="submit"
                    class="mt-2 px-8 py-3 bg-[#B49FCC] hover:bg-[#EAD7D7] text-[#412234] font-bold rounded-full text-sm tracking-widest uppercase transition-colors duration-200 mx-auto">
                    Envoyer le message
                </button>

            </form>
        </div>

    </div>
</div>

<?php include('../includes/footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>
