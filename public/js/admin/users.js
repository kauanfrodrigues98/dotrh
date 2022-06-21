jQuery(function($) {
    $("#cpf").mask('000.000.000-00', {placeholder: '000.000.000-00'});
    $("#cep").mask('00.000-000', {placeholder: '00.000-000'});

    let getUrl = window.location;
    let baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

    checkFlash();

    $("#tabela_usuarios").DataTable({
        responsive: true,
        autoFill: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/pt-BR.json'
        }
    });

    $("#lider_responsavel").select2({
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
            beforeSend: function( xhr ) {

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
});

const salvar = () => {
    let nome = $("#nome_completo").val();
    let email = $("#email").val();
    let senha = $("#senha").val();
    let data_nascimento = $("#data_nascimento").val();
    let sexo = $("#sexo").val();
    let nome_mae = $("#nome_mae").val();
    let estado_civil = $("#estado_civil").val();
    let naturalidade = $("#naturalidade").val();
    let nacionalidade = $("#nacionalidade").val();
    let pep = $("#pep").val();
    let cep = $("#cep").val();
    let logradouro = $("#logradouro").val();
    let numero = $("#numero").val();
    let bairro = $("#bairro").val();
    let cidade = $("#cidade").val();
    let uf = $("#uf").val();
    let complemento = $("#complemento").val();
    let cpf = $("#cpf").val();
    let rg = $("#rg").val();
    let orgao_emissor = $("#orgao_emissor").val();
    let data_emissao = $("#data_emissao").val();
    let possui_cnh = $("#possui_cnh").val();
    let categoria_cnh = $("#categoria_cnh").val();
    let numero_cnh = $("#numero_cnh").val();
    let data_primeira_cnh = $("#data_primeira_cnh").val();
    let data_vencimento_cnh = $("#data_vencimento_cnh").val();
    let pis_pasep = $("#pis_pasep").val();
    let numero_ctps = $("#numero_ctps").val();
    let serie_ctps = $("#serie_ctps").val();
    let uf_ctps = $("#uf_ctps").val();
    let data_emissao_ctps = $("#data_emissao_ctps").val();
    let cartao_sus = $("#cartao_sus").val();
    let lider = $("#lider").val();
    let lider_responsavel = $("#lider_responsavel").val();

    let obrigatorio = [nome, email, senha];

    if(in_array("", obrigatorio)) {
        showToast('Aviso!', 'Campos obrigatórios devem ser preenchidos.', 'fas fa-exclamation-triangle');
        return false;
    }

    $("form").submit();
}
