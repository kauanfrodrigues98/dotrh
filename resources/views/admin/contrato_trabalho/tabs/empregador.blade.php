<div class="row mt-2">
    <div class="col-md-3">
        <label for="cep_empregador">CEP</label>
        <input type="text" name="cep_empregador" id="cep_empregador" class="form-control form-control-sm" onkeyup="pesquisacepoutro(this.value, 2)">
    </div>
    <div class="col-md-6">
        <label for="logradouro_empregador">Logradouro</label>
        <input type="text" name="logradouro_empregador" id="logradouro_empregador" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="numero_empregador">Número</label>
        <input type="text" name="numero_empregador" id="numero_empregador" class="form-control form-control-sm">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="bairro_empregador">Bairro</label>
        <input type="text" name="bairro_empregador" id="bairro_empregador" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="cidade_empregador">Cidade</label>
        <input type="text" name="cidade_empregador" id="cidade_empregador" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="uf_empregador">UF</label>
        <select name="uf_empregador" id="uf_empregador" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
        </select>
    </div>
    <div class="col-md-3">
        <label for="complemento_empregador">Complemento</label>
        <textarea name="complemento_empregador" id="complemento_empregador" cols="30" rows="1" class="form-control form-control-sm"></textarea>
    </div>
</div>
