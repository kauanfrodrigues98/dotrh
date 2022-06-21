jQuery(function($) {
    checkFlash();

    $("input[type='file']").on('change', function () {
        let fileCount = this.files.length;
        if(fileCount > 1) {
            $(".label_anexo").html(fileCount + ' arquivos anexados');
        } else {
            $(".label_anexo").html(fileCount + ' arquivo anexado');
        }
    })
});

const salvar = () => {
    let horas = $(".clock").html();
    let ponto = $("#ponto").val(horas);

    if ( empty(ponto) ) {
        showToast('Aviso!', 'Não conseguimos capturar o horário.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}
