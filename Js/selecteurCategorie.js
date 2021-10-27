ajax('Ajax/selectAllCategories.php', [], document.getElementById('categorie'));


function ajax(url, params, node){
    var httpRequest;
    console.log(url)
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
                    genererCategorieSelelecteur(node, response);
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



