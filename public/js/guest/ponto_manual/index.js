jQuery(function($) {
    checkFlash();

    $("#tabela_ponto").DataTable({
        responsive: true,
        autoFill: false,
        order: [[0, 'desc'], [1, 'desc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        }
    });
});
