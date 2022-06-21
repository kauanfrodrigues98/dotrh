$(document).ready(function() {
    checkFlash();

    $("#tabela_equipamentos").DataTable({
        responsive: true,
        autoFill: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        }
    });

    $("#valor_equipamento").mask('#.##0,00', {placeholder: '0,00', reverse: true});
});

const salvar = () => {
    let nome_equipamento = $("#nome_equipamento").val();
    let valor_equipamento = $("#valor_equipamento").val();
    let tipo_equipamento = $("#tipo_equipamento").val();
    let outro_tipo_equipamento = $("#outro_tipo_equipamento").val();
    let tag_identificacao = $("#tag_identificacao").val();
    let detalhes = $("#detalhes").val();
    let obrigatorio = [nome_equipamento, valor_equipamento, tipo_equipamento, tag_identificacao];

    if(tipo_equipamento == 11 && empty(outro_tipo_equipamento)) {
        showToast('Aviso!', 'Voce deve informar nome para o outro tipo de equipamento.', 'fas fa-exclamation-triangle');
        return false;
    }

    if(in_array("", obrigatorio)) {
        showToast('Aviso!', 'Todos os campos obrigatórios devem ser preenchidos.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}

const outro_tipo = (value) => {
    if(value == 11) {
        $("#outro_tipo_equipamento").removeAttr('readonly');
    } else {
        $("#outro_tipo_equipamento").attr('readonly', 'readonly');
        $("#outro_tipo_equipamento").val('');
    }
}
