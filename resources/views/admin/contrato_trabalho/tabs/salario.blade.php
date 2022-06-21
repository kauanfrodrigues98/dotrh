<div class="row mt-2">
    <div class="col-md-3">
        <label for="vinculo_empregaticio">Vinculo Empregaticio</label>
        <input type="text" name="vinculo_empregaticio" id="vinculo_empregaticio" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="salario_bruto">Salário Bruto</label>
        <input type="text" name="salario_bruto" id="salario_bruto" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="salario_adicional">Salário Adicional</label>
        <input type="text" name="salario_adicionarl" id="salario_adicionarl" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="data_ultimo_reajuste">Data Último Reajuste</label>
        <input type="date" name="data_ultimo_reajuste" id="data_ultimo_reajuste" class="form-control form-control-sm">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="percentual_insalubridade">Percentual de Insalubridade</label>
        <input type="text" name="percentual_insalubridade" id="percentual_insalubridade" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="percentual_periculosidade">Percentual de Periculosidade</label>
        <input type="text" name="percentual_periculosidade" id="percentual_periculosidade" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="tipo_salario">Tipo Salário</label>
        <select name="tipo_salario" id="tipo_salario" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($tipo_salario as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="jornada_trabalho">Jornada de Trabalho</label>
        <select name="jornada_trabalho" id="jornada_trabalho" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($jornada_trabalho as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <button type="button" class="btn btn-sm btn-primary btn-block" onclick="salvar()">Salvar</button>
    </div>
</div>
