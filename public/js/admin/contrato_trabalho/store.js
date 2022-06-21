jQuery(function($) {
    $("#cep_empregador, #cep_posto_trabalho").mask('00.000-000', {placeholder: '00.000-000'});

    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    $("#funcionario").select2({
        pladeholder: 'Selecione',
        ajax: {
            url: baseUrl + '/ajax/lider_responsavel',
            datatype: 'json',
            type: 'get',
            data: function( params ) {
                return {
                    search: params.term
                };
            },
            processResults: function( data ) {
                return {
                    results: data.map( function( item ) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    } )
                }
            }
        }
    });

    $("#cargo").select2({
        placeholder: 'Selecione',
        ajax: {
            url: baseUrl + '/ajax/cargos',
            dataType: 'json',
            type: 'get',
            data: function( params ) {
                return {
                    search: params.term
                };
            },
            processResults: function( data ) {
                return {
                  results: data.map( function( item ) {
                      return {
                          id: item.id,
                          text: item.nome_departamento + ' - ' + item.cargo
                      }
                  } )
                };
            }
        }
    });
});
