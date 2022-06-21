<div class="row mt-2">
    <div class="col-md-3">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control form-control-sm" value="{{ $usuario->cpf }}">
    </div>
    <div class="col-md-3">
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" class="form-control form-control-sm" value="{{ $usuario->rg }}">
    </div>
    <div class="col-md-3">
        <label for="orgao_emissor">Órgão Emissor</label>
        <select name="orgao_emissor" id="orgao_emissor" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($orgao_emissor as $key => $value)
                <option value="{{ $key }}" {{ $usuario->orgao_emissor == $key ? 'selected' : '' }}>{{ $key . ' - ' . $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="data_emissao_rg">Data Emissão</label>
        <input type="date" name="data_emissao_rg" id="data_emissao_rg" class="form-control form-control-sm" value="{{ $usuario->data_emissao }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="possui_cnh">Possui CNH</label>
        <select name="possui_cnh" id="possui_cnh" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($possui_cnh as $key => $value)
                <option value="{{ $key }}" {{ $usuario->possui_cnh == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="categoria_cnh">Categoria CNH</label>
        <input type="text" name="categoria_cnh" id="categoria_cnh" class="form-control form-control-sm" value="{{ $usuario->categoria_cnh }}">
    </div>
    <div class="col-md-3">
        <label for="numero_cnh">Nº CNH</label>
        <input type="text" name="numero_cnh" id="numero_cnh" class="form-control form-control-sm" value="{{ $usuario->numero_cnh }}">
    </div>
    <div class="col-md-3">
        <label for="data_primeira_cnh">Data Primeira CNH</label>
        <input type="date" name="data_primeira_cnh" id="data_primeira_cnh" class="form-control form-control-sm" value="{{ $usuario->data_primeira_cnh }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="data_vencimento_cnh">Data Vencimento CNH</label>
        <input type="date" name="data_vencimento_cnh" id="data_vencimento_cnh" class="form-control form-control-sm" value="{{ $usuario->data_vencimento_cnh }}">
    </div>
    <div class="col-md-3">
        <label for="pis_pasep">PIS/PASEP</label>
        <input type="text" name="pis_pasep" id="pis_pasep" class="form-control form-control-sm" value="{{ $usuario->pis_pasep }}">
    </div>
    <div class="col-md-3">
        <label for="numero_ctps">Nº CTPS</label>
        <input type="text" name="numero_ctps" id="numero_ctps" class="form-control form-control-sm" value="{{ $usuario->numero_ctps }}">
    </div>
    <div class="col-md-3">
        <label for="serie_ctps">Série CTPS</label>
        <input type="text" name="serie_ctps" id="serie_ctps" class="form-control form-control-sm" value="{{ $usuario->serie_ctps }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="uf_ctps">UF CTPS</label>
        <select name="uf_ctps" id="uf_ctps" class="form-control form-control-sm">
            <option value="">Selecione</option>
            @foreach($estados_brasileiros as $key => $value)
                <option value="{{ $key }}" {{ $usuario->uf_ctps == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="data_emissao_ctps">Data Emissão CTPS</label>
        <input type="date" name="data_emissao_ctps" id="data_emissao_ctps" class="form-control form-control-sm" value="{{ $usuario->data_emissao_ctps }}">
    </div>
    <div class="col-md-3">
        <label for="cartao_sus">Cartão SUS</label>
        <input type="text" name="cartao_sus" id="cartao_sus" class="form-control form-control-sm" value="{{ $usuario->cartao_sus }}">
    </div>
</div>
