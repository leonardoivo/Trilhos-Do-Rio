function validaFormAssociado() {
    erro = false;
    if ($('#nome').val() == '') {
        alert('Voc� precisa preencher o campo Nome');
        erro = true;
    }
    if ($('#email').val() == '') {
        alert('Voc� precisa preencher o campo E-mail');
        erro = true;
    }
    if ($('#sobrenome').val() == '') {
        alert('Voc� precisa preencher o campo sobrenome');
        erro = true;
    }
    if ($('#cpf').val() == '') {
        alert('Voc� precisa preencher o campo cpf');
        erro = true;
    }
    if ($('#cep').val() == '') {
        alert('Voc� precisa preencher o campo cep');
        erro = true;
    }
    if ($('#telefone').val() == '') {
        alert('Voc� precisa preencher o campo telefone');
        erro = true;
    }
    if ($('#pai').val() == '') {
        document.getElementById('pai').value = 'Não informado';
        erro = false;
    }
    if ($('#mae').val() == '') {
        document.getElementById('mae').value = 'Não informado';
        erro = false;
    }
    if ($('#endereco').val() == '') {
        alert('Voc� precisa preencher o campo endereco');
        erro = true;
    }
    if ($('#numero').val() == '') {
        document.getElementById('numero').value = '0';
        erro = true;
    }
    if ($('#Complemento').val() == '') {
        document.getElementById('Complemento').value = '0';
        erro = true;
    }
    if ($('#bairro').val() == '') {
        alert('Voc� precisa preencher o campo bairro');
        erro = true;
    }
    if ($('#cidade').val() == '') {
        alert('Voc� precisa preencher o campo cidade');
        erro = true;
    }
    if ($('#Pais').val() == '') {
        alert('Voc� precisa preencher o campo Pais');
        erro = true;
    }

    //se nao tiver erros
    if (!erro) {
        $('#Cadastro').submit();
    }
};

function validaFormUsuario() {
    erro = false;
    if ($('#nome').val() == '') {
        alert('Voc� precisa preencher o campo Nome');
        erro = true;
    }
    if ($('#login').val() == '') {
        alert('Voc� precisa preencher o campo Login');
        erro = true;
    }
    if ($('#email').val() == '') {
        alert('Voc� precisa preencher o campo E-mail');
        erro = true;
    }
    if ($('#sobrenome').val() == '') {
        alert('Voc� precisa preencher o campo sobrenome');
        erro = true;
    }
    if ($('#cpf').val() == '') {
        alert('Voc� precisa preencher o campo cpf');
        erro = true;
    }

    if ($('#celular').val() == '') {
        alert('Voc� precisa preencher o campo celular');
        erro = true;
    }

    if ($('#senha').val() == '') {
        alert('Voc� precisa preencher o campo senha');
        erro = true;
    }
    if ($('#re-senha').val() == '') {
        alert('Voc� precisa preencher o campo senha no campo seguinte');
        erro = true;
    }
    if ($('#senha').val() != $('#re-senha').val()) {
        alert('Os campos de senha precisam serem iguais');
        erro = true;
    }
    //se nao tiver erros
    if (!erro) {
        $('#CadastroUser').submit();
    }
};





function SomenteNumero(e) {
    var tecla = (window.event) ? event.keyCode : e.which;
    if ((tecla > 47 && tecla < 58)) return true;
    else {
        if (tecla == 8 || tecla == 0) return true;
        else return false;
    }
}