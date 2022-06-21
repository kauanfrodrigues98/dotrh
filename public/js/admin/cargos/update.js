jQuery(function($) {
    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    $("#departamento").select2({
      placeholder: 'Selecione',
      ajax: {
          url: baseUrl + '/ajax/departamentos',
          datatype: 'json',
          type: 'get',
          data: function( params ) {
              return {
                  search: params.term
              };
          },
          beforeSend: function( xhr ) {

          },
          processResults: function( data ) {
              return {
                  results: data.map( function( item ) {
                      return {
                          id: item.id,
                          text: item.nome_departamento
                      }
                  } )
              }
          }
      }
  });
});

const salvar = () => {
    let cargo = $("#cargo").val();

    if(empty(cargo))
    {
        showToast('Aviso!', 'Campos obrigatórios devem ser preenchidos.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}
