<div class="row">
    <div class="col-md-6">
        <label for="funcionario">Funcionário</label>
        <select name="funcionario" id="funcionario" class="custom-select custom-select-sm"></select>
    </div>
    <div class="col-md-3">
        <label for="tipo_contrato">Tipo Contrato</label>
        <select name="tipo_contrato" id="tipo_contrato" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($tipo_contrato as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="data_contratacao">Data da Contratação</label>
        <input type="date" name="data_contratacao" id="data_contratacao" class="form-control form-control-sm">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="data_demissao">Data Demissão</label>
        <input type="date" name="data_demissao" id="data_demissao" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="numero_cadastro">Nº do Cadastro</label>
        <input type="text" name="numero_cadastro" id="numero_cadastro" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="numero_contrato">Nº do Contrato</label>
        <input type="text" name="numero_contrato" id="numero_contrato" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="ficha_registro">Ficha de Registro</label>
        <input type="text" name="ficha_registro" id="ficha_registro" class="form-control form-control-sm">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="cargo">Cargo</label>
        <select name="cargo" id="cargo" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="cbo">CBO</label>
        <input type="text" name="cbo" id="cbo" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="centro_custo">Centro de Custo</label>
        <input type="text" name="centro_custo" id="centro_custo" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="posto_trabalho">Posto de Trabalho</label>
        <input type="text" name="posto_trabalho" id="posto_trabalho" class="form-control form-control-sm">
    </div>
</div>
