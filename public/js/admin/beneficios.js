$(document).ready(function() {
    checkFlash();

    $("#tabela_beneficios").DataTable({
        responsive: true,
        autoFill: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        }
    });

   $("#valor_desconto, #valor_beneficio").mask('#.##0,00', {placeholder: '0,00', reverse: true});
});

const salvar = () => {

    // const VA = 1;
    // const VR = 2;
    // const VT= 3;
    // const AUXILIO_COMBUSTIVEL = 4;
    // const AUXILIO_HOME_OFFICE = 5;
    // const PLANO_SAUDE = 6;
    // const CREDITO = 7;
    // const DINHEIRO = 8;
    // const DESCONTO = 9;
    const OUTROS = 10;

    let nome_beneficio = $("#nome_beneficio").val();
    let valor_desconto = $("#valor_desconto").val();
    let tipo_beneficio = $("#tipo_beneficio").val();
    let outro_beneficio = $("#outro_beneficio").val();
    let valor_beneficio = $("#valor_beneficio").val();
    let obrigatorio = [nome_beneficio, tipo_beneficio, valor_beneficio];

    if ($("#havera_desconto").is(':checked') && empty(valor_desconto)) {
        showToast('Aviso!', 'Já que haverá desconto o valor do desconto deve ser informado.', 'fas fa-exclamation-triangle');
        $("#valor_desconto").focus();
        return false;
    }

    if (tipo_beneficio == OUTROS && empty(outro_beneficio)) {
        showToast('Aviso!', 'Você deve informar o nome do benefício.', 'fas fa-exclamation-triangle');
        $("#outro_beneficio").focus();
        return false;
    }

    if(in_array("", obrigatorio)) {
        showToast('Aviso!', 'Todos os campos obrigatórios devem ser preenchidos.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}

const valor_descontado = () => {
    if($("#havera_desconto").is(':checked')) {
        $("#valor_desconto").removeAttr('readonly');
    } else {
        $("#valor_desconto").attr('readonly', 'readonly');
        $("#valor_desconto").val('');
    }
}

const outro_benef = (value) => {
    if(value == 10) {
        $("#outro_beneficio").removeAttr('readonly');
    } else {
        $("#outro_beneficio").attr('readonly', 'readonly');
        $("#outro_beneficio").val('');
    }
}
