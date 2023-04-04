const searchForm = document.querySelector('#form-search form');
const resultZone = document.querySelector('#result-zone');

searchForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche le formulaire de s'envoyer

    const searchValue = searchForm.elements['search-input-catalogue'].value;
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `content/formulaires-traitement/search.php?search-input-catalogue=${searchValue}`);
    xhr.onload = function() {
        if (xhr.status === 200) {
            resultZone.innerHTML = xhr.responseText;
        } else {
            console.log('Une erreur est survenue.');
        }
    };
    xhr.send();
});