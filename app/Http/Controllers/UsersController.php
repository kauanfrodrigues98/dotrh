<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSenhaRequest;
use App\Models\User;
use App\Services\UsersServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller {
    const estado_civil = [
        1 => 'Casado(a)',
        2 => 'Solteiro(a)',
        3 => 'Divorciado(a)',
        4 => 'Viúvo(a)',
        5 => 'União Estável',
        6 => 'Noivo(a)',
        7 => 'Outro'
    ];

    const pep = [
        1 => 'Sim',
        2 => 'Não'
    ];

    const sexo = [
        1 => 'Masculino',
        2 => 'Feminino',
        3 => 'Outro'
    ];

    const estados_brasileiros = [
        "AC" => "Acre",
        "AL" => "Alagoas",
        "AP" => "Amapá",
        "AM" => "Amazonas",
        "BA" => "Bahia",
        "CE" => "Ceará",
        "DF" => "Distrito Federal",
        "ES" => "Espírito Santo",
        "GO" => "Goiás",
        "MA" => "Maranhão",
        "MT" => "Mato Grosso",
        "MS" => "Mato Grosso do Sul",
        "MG" => "Minas Gerais",
        "PA" => "Pará",
        "PB" => "Paraíba",
        "PR" => "Paraná",
        "PE" => "Pernambuco",
        "PI" => "Piauí",
        "RJ" => "Rio de Janeiro",
        "RN" => "Rio Grande do Norte",
        "RS" => "Rio Grande do Sul",
        "RO" => "Rondônia",
        "RR" => "Roraima",
        "SC" => "Santa Catarina",
        "SP" => "São Paulo",
        "SE" => "Sergipe",
        "TO" => "Tocantins"
    ];

    const orgao_emissor = [
        'ABNC'=>'Academia Brasileira de Neurocirurgia',
        'CGPI'=>'Coordenação-Geral de Privilégios e Imunidades',
        'CNIG'=>'Conselho Nacional de Imigração',
        'CNT'=>'Carteira Nacional de Habilitação',
        'COREN'=>'Conselho Regional de Enfermagem',
        'CORECON'=>'Conselho Regional de Economia',
        'CRA'=>'Conselho Regional de Administração',
        'CRAS'=>'Conselho Regional de Assistentes Sociais',
        'CRB'=>'Conselho Regional de Biblioteconomia',
        'CRC'=>'Conselho Regional de Contabilidade',
        'CREA'=>'Conselho Regional de Engenharia e Agronomia',
        'CRECI'=>'Conselho Regional de Corretores de Imóveis',
        'CREFIT'=>'Conselho Regional de Fisioterapia e Terapia Ocupacional',
        'CRF'=>'Conselho Regional de Farmácia',
        'CRM'=>'Conselho Regional de Medicina',
        'CRN'=>'Conselho Regional de Nutrição',
        'CRO'=>'Conselho Regional de Odontologia',
        'CRP'=>'Conselho Regional de Psicologia',
        'CRPRE'=>'Conselho Regional de Profissionais de Relações Públicas',
        'CRQ'=>'Conselho Regional de Química',
        'CRRC'=>'Conselho Regional de Representantes Comerciais',
        'CRMV'=>'Conselho Regional de Medicina Veterinária',
        'CSC'=>'Carteira Sede Carpina de Pernambuco',
        'CTPS'=>'Carteira de Trabalho e Previdência Social',
        'DIC'=>'Diretoria de Identificação Civil',
        'DIREX'=>'Diretoria-Executiva',
        'DPF'=>'Polícia Federal',
        'DPMAF'=>'Divisão de Polícia Marítima, Área e de Fronteiras',
        'DPT'=>'Departamento de Polícia Técnica Geral',
        'DST'=>'Programa Municipal DST/Aids',
        'EST'=>'Carteira de Estrangeiro',
        'FGTS'=>'Fundo de Garantia do Tempo de Serviço',
        'FIPE'=>'Fundação Instituto de Pesquisas Econômicas',
        'FLS'=>'Fundação Lyndolpho Silva',
        'GOVGO'=>'Governo do Estado de Goiás',
        'IFP'=>'Instituto Félix Pacheco',
        'IGP'=>'Instituto Geral de Perícias',
        'IICCECF/RO'=>'Instituto de Identificação Civil e Criminal Engrácia da Costa Francisco de Rondônia',
        'IIMG'=>'Inter-institutional Monitoring Group',
        'IML'=>'Instituto Médico-Legal',
        'IPC'=>'Índice de Preços ao Consumidor',
        'IPF'=>'Instituto Pereira Faustino',
        'MAE'=>'Ministério da Aeronáutica',
        'MEX'=>'Ministério do Exército',
        'MMA'=>'Ministério da Marinha',
        'OAB'=>'Ordem dos Advogados do Brasil',
        'OMB'=>'Ordens dos Músicos do Brasil',
        'PCMG'=>'Policia Civil do Estado de Minas Gerais',
        'PMMG'=>'Polícia Militar do Estado de Minas Gerais',
        'POF'=>'Polícia Federal',
        'POM'=>'Polícia Militar',
        'SDS'=>'Secretaria de Defesa Social (Pernambuco)',
        'SNJ'=>'Secretaria Nacional de Justiça / Departamento de Estrangeiros',
        'SECC'=>'Secretaria de Estado da Casa Civil',
        'SEJUSP'=>'Secretaria de Estado de Justiça e Segurança Pública – Mato Grosso',
        'SES'=>'Carteira de Estrangeiro',
        'SESP'=>'Secretaria de Estado da Segurança Pública do Paraná',
        'SJS'=>'Secretaria da Justiça e Segurança',
        'SJTC'=>'Secretaria da Justiça do Trabalho e Cidadania',
        'SJTS'=>'Secretaria da Justiça do Trabalho e Segurança',
        'SPTC'=>'Secretaria de Polícia Técnico-Científica',
        'SSP'=>'Secretaria de Segurança Pública',
    ];

    const lider = [
        1 => 'Sim',
        0 => 'Não'
    ];

    const possui_cnh = [
        1 => 'Sim',
        2 => 'Não'
    ];

    /**
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Exibe os usuarios cadastrados.
     */
    public function index() {
        $usuarios = UsersServices::getWithPagination();

        return view('admin.usuarios.users_index')->with(['usuarios' => $usuarios]);
    }

    /**
     * Exibe o formulario de cadastro de usuario
     */
    public function cadastrar() {
        return view('admin.usuarios.users_store')->with([
            'estado_civil' => self::estado_civil,
            'pep' => self::pep,
            'sexo' => self::sexo,
            'estados_brasileiros' => self::estados_brasileiros,
            'orgao_emissor' => self::orgao_emissor,
            'lider' => self::lider,
            'possui_cnh' => self::possui_cnh
        ]);
    }

    /**
     * Cadastra um novo usuario
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        UsersServices::store($request);

        return redirect()->route('users.cadastrar');
    }

    /**
     * Exibe detalhes do usuario atraves do seu ID
     *
     * @param int $id
     */
    public function detalhes(int $id) {
        $result = UsersServices::getDetails($id);

        $lider_responsavel = UsersServices::getLiderUser( $id )->name;

        return view('admin.usuarios.users_update')->with([
            'usuario' => $result,
            'estado_civil' => self::estado_civil,
            'pep' => self::pep,
            'sexo' => self::sexo,
            'estados_brasileiros' => self::estados_brasileiros,
            'orgao_emissor' => self::orgao_emissor,
            'lider' => self::lider,
            'possui_cnh' => self::possui_cnh,
            'lider_responsavel' => $lider_responsavel
        ]);
    }

    /**
     * Atualiza os dados do usuario cadastrado
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        UsersServices::update($request->idUsuario, $request);

        return redirect()->route('users.detalhes', [
                'id' => $request->idUsuario,
                'estado_civil' => self::estado_civil,
                'pep' => self::pep,
                'sexo' => self::sexo,
                'estados_brasileiros' => self::estados_brasileiros,
                'orgao_emissor' => self::orgao_emissor,
                'lider' => self::lider,
                'possui_cnh' => self::possui_cnh
            ]);
    }

    public function getLiderResponsavel()
    {
        return UsersServices::getLiderResponsavel();
    }

    public function alterarSenha()
    {
        return view('guest.alterar_senha.index');
    }

    public function updateSenha(UpdateSenhaRequest $request)
    {
        UsersServices::updateSenha( $request );

        return redirect()->route('alterar_senha');
    }
}
