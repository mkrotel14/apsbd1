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

function validaProduto(){
    var campoNomeP = document.getElementById("nomeproduto");
    var campoLoteP = document.getElementById("lote");
    var campoVVP = document.getElementById("valorvenda");
    var campoVCP = document.getElementById("valorcompra");
    var campoQtdEst = document.getElementById("qtdestoque");
    var campoCategP = document.getElementById("categoriaproduto");
    var campoSecaoP = document.getElementById("localproduto");
    
    if((campoNomeP === "")||(campoLoteP === "")||(campoVVP === "")||(campoVCP === "")||(campoQtdEst === "")||(campoCategP === "")||(campoSecaoP === "")){
       alert("Campos obrigatorios de Produto não preenchidos!");
        return false;
    }
    return true; 
}

function validaPJuridica(){
    var campoRazao = document.getElementById("razaosocial");
    var campoNomeF = document.getElementById("nomefantasia");
    var campoCNPJ = document.getElementById("cnpj");
    var campoInscE = document.getElementById("inscrestad");
    var campoTel = document.getElementById("telefone");
    var campoEmail = document.getElementById("email");
    var campoLog = document.getElementById("logradouro");
    var campoCEP = document.getElementById("cep");
    var campoBairro = document.getElementById("bairro");
    var campoNum = document.getElementById("numero");
    var campoCid = document.getElementById("id_cidade");
    
    if((campoRazao === "")||(campoNomeF === "")||(campoCNPJ === "")||(campoInscE === "")||(campoTel === "")||(campoEmail === "")||(campoLog === "")||(campoCEP === "")||(campoBairro === "")||(campoNum === "")||(campoCid === "")){
        alert("Campos obrigatorios de Pessoa não preenchidos!");
        return false;
    }
    return true;
}
