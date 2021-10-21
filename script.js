console.log('Js loaded');

let input_categorie = document.getElementById('categorie');
let categorie_section = document.querySelectorAll('categorie-section div')
console.log(input_categorie)
input_categorie.addEventListener('change', function(){
    console.log(input_categorie.value);
    document.getElementById('voiture-form').className="";

});