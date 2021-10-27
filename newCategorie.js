numero = 1;
btn_new_line = document.getElementById('btn-new-line');
btn_new_line.addEventListener("click", function(){
    addLine(numero);
    numero+=1;
})


function addLine(numero){
    form = document.getElementById('add-categorie');
    span1 = document.createElement('span');
    span1.innerText = "Numéro d'ordre :";
    input1 = document.createElement('input');
    input1.type = "number";
    input1.name = "ordre[]";
    input1.value= numero;

    span2 = document.createElement('span');
    span2.innerText = "Nom critère :";
    input2 = document.createElement('input');
    input2.type = "text";
    input2.name = "donnee[]";
    input2.placeholder= "Nom critère";
    lineBreak = document.createElement('br');


    form.appendChild(span1);
    form.appendChild(input1);
    form.appendChild(span2);
    form.appendChild(input2);
    form.appendChild(lineBreak);
}
