(function () {
    var form = document.forms['pessoa'];
    form.radio1[0].onfocus = function () {
        form.nome.disabled = form.rg.disabled = false;
        form.cpf.disabled = form.data_nasc.disabled = false;
        form.rua.disabled = form.cep.disabled = false;
        form.bairro.disabled = form.cidade.disabled = false;
        form.estado.disabled = form.telefone.disabled = false;
        form.email.disabled = false;
        form.funcao.disabled = form.data_admsc.disabled = true;
        form.salario.disabled = form.status.disabled = true;
        form.login.disabled = form.senha.disabled = true;
    };
    form.radio1[1].onfocus = function () {
        form.nome.disabled = form.rg.disabled = false;
        form.cpf.disabled = form.data_nasc.disabled = false;
        form.rua.disabled = form.cep.disabled = false;
        form.bairro.disabled = form.cidade.disabled = false;
        form.estado.disabled = form.telefone.disabled = false;
        form.email.disabled = false;
        form.funcao.disabled = form.data_admsc.disabled = false;
        form.salario.disabled = form.status.disabled = false;
        form.login.disabled = form.senha.disabled = false;
    };
})();