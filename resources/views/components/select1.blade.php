<div class="mb-3 row">
        <label for="{{ $leyenda }}" class="col-4 col-form-label">{{ $nombrelbl }}</label>
    <div class="col-8">
        <select class="form-select" name="{{ $leyenda }}"  id="{{ $leyenda }}">
        <option selected>Seleccionar</option>
                
                @foreach ($arreglos as $arreglo)
                <option value="{{ $arreglo->$pk }}" {{ $arreglo->$pk == $fk ? 'selected' : ''}}>
                    {{ $arreglo->$display }}</option>
                @endforeach
        </select>
    
    </div>
</div>

    {{-- <div class="mb-3">
        <label for="{{ $llaveforanea }}" class="form-label">Carrera</label>
        <select class="form-select form-select-lg" name="{{ $llaveforanea }}" >
            <option value="" selected>Seleccione una carrera</option>
            @foreach ($arreglo as $arr)
                <option value="{{ $arr[0] }}">{{ $arr[1] }}</option>
            @endforeach
        </select>
    </div> --}}

     {{-- <option value="{{ $arr->id }}">{{ $arr->nombre }}</option> --}}