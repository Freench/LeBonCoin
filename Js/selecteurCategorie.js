
let input_categorie = document.getElementById('categorie');
let form = document.getElementById('recherche_form');
let categorie_section = document.querySelectorAll('#categorie-section div')
// input_categorie1.addEventListener('change', function(){
//     console.log(input_categorie1.value);
//     if(input_categorie1.value=="voiture"){
//         document.getElementById('categorie-section').innerHTML = "";
//         document.getElementById('categorie-section').insertAdjacentHTML('afterbegin', voitureSelected());
//     }
//     if(input_categorie1.value=="immobilier"){
//         document.getElementById('categorie-section').innerHTML = "";
//         document.getElementById('categorie-section').insertAdjacentHTML('afterbegin', immobilierSelected());
//     }
//     if(input_categorie1.value=="multimedia"){
//         document.getElementById('categorie-section').innerHTML = "";
//         document.getElementById('categorie-section').insertAdjacentHTML('afterbegin', multimediaSelected());
//     }
    // for(let i=0; i<categorie_section.length; i++){
    //     if(i==parseInt(input_categorie1.value)){
    //         categorie_section[i].className="";
    //     }else{
    //         categorie_section[i].className="display-none";
    //     }
    // }
// });
// input_categorie2.addEventListener('change', function(){
//     for(let i=3; i<categorie_section.length; i++){
//         console.log(i)
//         if(i==parseInt(input_categorie2.value)){
//             categorie_section[i].className="";
//         }else{
//             categorie_section[i].className="display-none";
//         }
//     }
// });

// function voitureSelected(){
//     return '<div><p>Voiture</p><input type="text"placeholder="Marque" value="" name="marque"><input type="text" placeholder="Modèle" value="" name="modele"><input type="number" placeholder="Kilométrage" value="" name="kilométrage"><!-- <input list="carburant" placeholder="Carburant" name="carburant"> --><select id="carburant" name="carburant"><option value="essence">Essence</option><option value="diesel">Diesel</option><option value="electrique">Électrique</option></select><!-- <input list="btvitesse" placeholder="Boite de Vitesse" name="btvitesse"> --><select id="btvitesse" name="btvitesse"><option value="manuelle">Manuelle</option><option value="automatique">Automatique</option></select><input type="text" placeholder="Couleur" value="" name="couleur"><input type="number" placeholder="Nombre de porte" value="" name="nbporte"><input type="number" placeholder="Puissance" value="" name="puissance"><input type="number" placeholder="Nombre de place" value="" name="nbplace"></div>'
// }
// function immobilierSelected(){
//     return '<div class="display-none"><p>Immobilier</p><select id="typedebien" name="typedebien"><option value="maison">Maison</option><option value="appartement">Appartement</option></select><input type="number" placeholder="Surface" value="" name="surface"><input type="number" placeholder="Nombre de pièce" value="" name="pieces"></div>'
// }
// function multimediaSelected(){
//     return '<div class="display-none"><p>Multimedia</p><select id="categorie2" name="categorie2"><option value="3">Informatique</option><option value="4">Console et jeux vidéo</option><option value="5">Téléphonie</option></select></div>'
// }

function categorieLine(id, value){
    option = document.createElement('option');
    option.value = id;
    option.innerText = value;
    return option;
}

function getAllCategories(){
    return allCategories;
}

function genererCategorieSelelecteur(node, allCategories){
    selecteur = document.createElement('select');
    selecteur.id = "categorie";
    selecteur.name = "categorie";
    selecteur.innerText = "Catégorie";
    console.log('allCategorie dans generator', allCategories)
    for(cat of allCategories){
        selecteur.appendChild(categorieLine(cat[0], cat[1]))
    }
    node.appendChild(selecteur);

}
// allCategories = [[1, "Sanglier"], [2,"Renard"], [3, "Loutre"]]

// addCategorieLine(525, "Bonjour", input_categorie);

ajax('test.php', []);

function ajax(url, params){
    var httpRequest;
    makeRequest(url, params);
    function makeRequest(url, ){
        httpRequest = new XMLHttpRequest();
        if(!httpRequest){
            console.log('Abandon: ( Impossible de créer unt instance de XMLHTTP');
            return false;
        }
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('params=' + encodeURIComponent(params));
    }
    function alertContents(){
        try {
            if (httpRequest.readyState === XMLHttpRequest.DONE) {
                if (httpRequest.status === 200) {
                    var response = JSON.parse(httpRequest.responseText);
                    genererCategorieSelelecteur(form, response);
                } else {
                    console.log('Il y a eu un problème avec la requête.');
                }
            }
        }
        catch(e){
            console.log("Une exception s’est produite : " + e.description);
        }
    }
};

