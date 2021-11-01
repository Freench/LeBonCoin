// import { ajax } from "../Ajax/ajax.js"
genererCategorieSelelecteur(document.getElementById('categorie'), ajax('Ajax/selectAllCategories.php', []));


function genererCategorieSelelecteur(node, allCategories){
    selecteur = document.createElement('select');
    selecteur.id = "categorie";
    selecteur.name = "categorie";
    selecteur.innerText = "Catégorie";
    console.log('allCategorie dans generator', allCategories)
    for(cat of allCategories){
        selecteur.appendChild(categorieLine(cat['id_categorie'], cat['nom_categorie']))
    }
    node.appendChild(selecteur);
}


function categorieLine(id, value){
    option = document.createElement('option');
    option.value = id;
    option.innerText = value;
    return option;
}



