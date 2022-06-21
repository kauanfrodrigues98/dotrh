<div class="row">
    <div class="col-md-6">
        <label for="nome_completo">Nome Completo</label>
        <input type="text" name="nome_completo" id="nome_completo" class="form-control form-control-sm" value="{{ $usuario->name }}">
    </div>

    <div class="col-md-6">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control form-control-sm" value="{{ $usuario->email }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="data_nascimento">Data Nascimento</label>
        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control form-control-sm" value="{{ $usuario->data_nascimento }}">
    </div>
    <div class="col-md-3">
        <label for="sexo">Sexo</label>
        <select name="sexo" id="sexo" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($sexo as $key => $value)
                <option value="{{ $key }}" {{ $usuario->sexo == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6">
        <label for="nome_mae">Nome da Mãe</label>
        <input type="text" name="nome_mae" id="nome_mae" class="form-control form-control-sm" value="{{ $usuario->nome_mae }}">
    </div>
</div>

<div class="row mt-2">
    <div class="col-md-3">
        <label for="estado_civil">Estado Civil</label>
        <select name="estado_civil" id="estado_civil" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($estado_civil as $key => $value)
                <option value="{{ $key }}" {{ $usuario->estado_civil == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="naturalidade">Naturalidade</label>
        <input type="text" name="naturalidade" id="naturalidade" class="form-control form-control-sm" value="{{ $usuario->naturalidade }}">
    </div>
    <div class="col-md-3">
        <label for="nacionalidade">Nacionalidade</label>
        <input type="text" name="nacionalidade" id="nacionalidade" class="form-control form-control-sm" value="{{ $usuario->nacionalidade }}">
    </div>
    <div class="col-md-3">
        <label for="pep">PEP</label>
        <select name="pep" id="pep" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($pep as $key => $value)
                <option value="{{ $key }}" {{ $usuario->pep == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
