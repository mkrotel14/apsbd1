function validaEstado(){
   var campoUF = document.getElementById("uf");
   var campoNomeE = document.getElementById("nomeestado");
   
   if((campoUF.value === "")||(campoNomeE.value === "")){
       alert("Campos obrigatorios não preenchido!!");
       return false;
   } 
   return true;
}

function validaCategoria(){
    var campoCategoria = document.getElementById("categoria");
    
    if(campoCategoria.value === ""){
        alert("Campo obrigatorio não preenchido!");
        return false;
    }
    return true;
}


