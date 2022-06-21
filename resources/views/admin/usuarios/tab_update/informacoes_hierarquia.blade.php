<div class="row mt-2">
    <div class="col-md-4">
        <label for="lider">Irá assumir posição de liderança?</label>
        <select name="lider" id="lider" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
            @foreach($lider as $key => $value)
                <option value="{{ $key }}" {{ $usuario->lider == $key ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label for="lider_responsavel">Lider Responsável</label>
        <select name="lider_responsavel" id="lider_responsavel" class="custom-select custom-select-sm">
            <option value="">Selecione</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="lider_responsavel">Lider Atual</label>
        <input type="text" id="lider_responsavel_read" class="form-control form-control-sm" readonly value="{{ $lider_responsavel }}">
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-4 offset-md-4">
        <button type="button" class="btn btn-sm btn-primary btn-block" onclick="salvar()">Salvar</button>
    </div>
</div>
