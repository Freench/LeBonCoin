// import { ajax } from "../Ajax/ajax.js";

selecteur = document.getElementById('#categorie');

selecteur.addEventListener("change", function(){
    console.log(selecteur.value)
})

ajax('Ajax/selectSpecificiteOfCategorie.php', id_categorie);


function genereFormSpecificite(specificites){
    for(specificite of specificites){
        input = document.createElement('input');
        input.placeholder = specificite['nom_data'];
        input.name = specificite['nom_data'];
    }
}