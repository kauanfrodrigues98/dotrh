jQuery(function($) {
    checkFlash();

    $("#tabela_ponto").DataTable({
        responsive: true,
        autoFill: false,
        order: [[1, 'desc'], [2, 'desc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        }
    });
});
