<div class="row mt-2">
    <div class="col-md-3">
        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" class="form-control form-control-sm" onkeyup="pesquisacep(this.value)">
    </div>
    <div class="col-md-6">
        <label for="logradouro">Logradouro</label>
        <input type="text" name="logradouro" id="logradouro" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="numero">Número</label>
        <input type="text" name="numero" id="numero" class="form-control form-control-sm">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" class="form-control form-control-sm">
    </div>
    <div class="col-md-3">
        <label for="uf">UF</label>
        <select name="uf" id="uf" class="form-control form-control-sm">
            <option value="">Selecione</option>
            @foreach($estados_brasileiros as $key => $uf)
                <option value="{{ $key }}">{{ $uf }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="complemento">Complemento</label>
        <textarea name="complemento" id="complemento" cols="30" rows="1" class="form-control form-control-sm"></textarea>
    </div>
</div>
