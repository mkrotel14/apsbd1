function validaEstado(){
   var campoUF = document.getElementById("uf");
   var campoNomeE = document.getElementById("nomeestado");
   
   if((campoUF.value === "")||(campoNomeE.value === "")){
       alert("Campos obrigatorio UF ou Nome do Estado não preenchidos!!");
       return false;
   } 
   return true;
}
function validaCidade(){
   var campoNomeC = document.getElementById("nomecidade");
   var campoId_Estado = document.getElementById("id_estado");
   
   if((campoNomeC.value === "")||(campoId_Estado.value === "")){
       alert("Campos obrigatorio Nome da Cidade ou UF não preenchidos!!");
       return false;
   } 
   return true;
}
function validaCategoria(){
    var campoCategoria = document.getElementById("categoria");
    
    if(campoCategoria.value === ""){
        alert("Campo obrigatorio Nome da Categoria não preenchido!");
        return false;
    }
    return true;
}

function validaSecao(){
    var campoSecao = document.getElementById("secao");
    
    if(campoSecao.value === ""){
        alert("Campo obrigatorio Nome da Seção não preenchido!");
        return false;
    }
    return true;
}

