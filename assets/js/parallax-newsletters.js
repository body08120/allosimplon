//créer un effet de parallaxe sur les éléments ayant la classe "thumbnail" en utilisant la bibliothèque SimpleParallax
var image = document.getElementsByClassName('thumbnail');
new simpleParallax(image, {
    scale: 1.5
});