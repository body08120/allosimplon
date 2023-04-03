<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlloSimplon - Trouvez ce que vous aimez</title>
    <base href="/allosimplon/">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-[#412234] font-mono">

    <!--navbar-->
    <?php include('../includes/navbar.php') ?>
    <!---->


    <!--section tri-->
    <div class="px-10 mb-6 bg-[#6D466B] border-t-2 border-[#412234] lg:px-20 lg:mx-64 2xl:px-40 2xl:mx-96">
        <form class="flex flex-col text-[18px] font-thin" action="" method="GET">
            <select
                class="uppercase text-[#B49FCC] tracking-[.10em] py-1 px-8 rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5"
                name="genre">
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
                <option value="genre1">genre1</option>
            </select>

            <select
                class="uppercase text-[#B49FCC] tracking-[.10em] py-1 px-8 rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5"
                name="année">
                <option>année</option>
                <option value="1940">1940</option>
                <option value="1941">1941</option>
                <option value="1942">1942</option>
                <option value="1943">1943</option>
                <option value="1944">1944</option>
                <option value="1945">1945</option>
                <option value="1946">1946</option>
                <option value="1947">1947</option>
                <option value="1948">1948</option>
                <option value="1949">1949</option>
                <option value="1950">1950</option>
                <option value="1951">1951</option>
                <option value="1952">1952</option>
                <option value="1953">1953</option>
                <option value="1954">1954</option>
                <option value="1955">1955</option>
                <option value="1956">1956</option>
                <option value="1957">1957</option>
                <option value="1958">1958</option>
                <option value="1959">1959</option>
                <option value="1960">1960</option>
                <option value="1961">1961</option>
                <option value="1962">1962</option>
                <option value="1963">1963</option>
                <option value="1964">1964</option>
                <option value="1965">1965</option>
                <option value="1966">1966</option>
                <option value="1967">1967</option>
                <option value="1968">1968</option>
                <option value="1969">1969</option>
                <option value="1970">1970</option>
                <option value="1971">1971</option>
                <option value="1972">1972</option>
                <option value="1973">1973</option>
                <option value="1974">1974</option>
                <option value="1975">1975</option>
                <option value="1976">1976</option>
                <option value="1977">1977</option>
                <option value="1978">1978</option>
                <option value="1979">1979</option>
                <option value="1980">1980</option>
                <option value="1981">1981</option>
                <option value="1982">1982</option>
                <option value="1983">1983</option>
                <option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
            </select>

            <input type="submit" value="VALIDER" name="" class="py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
                md:px-16 md:py-2 
                lg:my-10" />
        </form>
        <!--____________________-->
        <form class="flex flex-col" action="" method="GET">
            <input class="rounded-full my-3 focus:border-transparent focus:ring-0 md:my-5 text-[#B49FCC]" type="search"
                placeholder="Ou tapez votre recherche..." name="search-input-catalogue" />
            <input type="submit" value="VALIDER" name="" class="py-1 px-8 my-6 bg-[#B49FCC] rounded-full mx-auto text-semibold text-[18px] text-white uppercase tracking-[0.15em] 
                focus:text-[24px] focus:bg-[#412234] focus:border-transparent focus:ring-0
                md:px-16 md:py-2 
                lg:my-10" />
        </form>
    </div>
    <!---->



    <!--catalogue-->
    <section>
        <div class="text-[#EAD7D7] uppercase grid grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <div class="w-4/5 h-96 mx-auto my-6">
                <img class="h-72" src="https://picsum.photos/id/11/2500/1667" alt="Affiche" />
                <span>titre</span>
            </div>
        </div>
    </section>
    <!---->


    <!-------------------------------------->
    <div class="h-1 divide-[#412234]"></div>
    <!--footer-->
    <?php include('../includes/footer.php') ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>