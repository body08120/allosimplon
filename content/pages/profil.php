<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/allosimplon/">
    <title>AlloSimplon - ???USER???</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
</head>
<body class="bg-[#412234] font-mono">  


<!--navbar-->
<?php include('../includes/navbar.php') ?>



<!--Section USER-->
<section class="w-auto h-96 
                bg-[url('http://localhost/allosimplon/assets/img/background/bg-user-profil.png')] bg-cover bg-no-repeat
                flex justify-center items-center 
                xl:h-[680px]">
        <!-- cadre user -->
        <div class="flex flex-col items-center">
            <div class="rounded-full w-1/5 border-4 border-[#B49FCC] overflow-hidden">
                <img class="h-2/6" src="http://localhost/allosimplon/assets/img/avatar.png" alt="Avatar utilisateur" />
            </div>
                <span class="text-[#B49FCC] font-bold my-8">???USER???</span>
        </div>
</section>


<!--Section vos favoris -->
<section class="py-10 text-[18px] text-[#EAD7D7]">
    <div class="py-5 px-10">
        <div class="w-2/4 h-2 bg-[#EAD7D7]"></div>
        <h2 class="text-[24px] tracking-[.15em]">Vos favoris</h2>
    </div>

<!-- <hr class="bg-[#EAD7D7] mb-20"> -->

<div class="lg:px-10">
<!--container1 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container2 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container3 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container4 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container5 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container6 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container7 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>

<!---->

<!--container8 cards fav-->
<div class="bg-[#6D466B] mb-20 border-y-2 lg:border-x-2 ">

    <!--affiche-->
    <img src="http://localhost/allosimplon/assets/img/affiche.png" alt="" class="py-5 mx-auto w-2/3"/>
    
<div class="py-5 px-10">
    <!--année-->
    <span class="text-[24px] font-bold tracking-[.15em]">2000</span>

    <!--titre-->
    <h4 class="text-[24px] font-bold tracking-[.15em]">La ligne verte</h4>
    
    <!--lien vers voir-->    
    <div class=" flex justify-around font-bold underline tracking-[.10em]">
        <a href="">Voir en streaming</a>
        <a href="">Voir la bande-annonce</a>
    </div>

    <div class="flex justify-around font-bold underline tracking-[.10em]">
    <a href="">Voir plus</a>
    </div>

</div>   
</div>
<!---->
</div>

</section>


<!-------------------------------------->
<div class="h-1 divide-[#412234]"></div>
<!--footer-->
<?php include('../includes/footer.php') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>   
</body>
</html>