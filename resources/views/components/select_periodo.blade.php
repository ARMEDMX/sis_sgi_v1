<div class="mb-3 row">
    <label for="{{$nombre}}" class="col-4 col-form-label">{{$nombre}}:</label>
    <div class="col-8">
        <select class="form-select " name="{{$campo}}" id="{{$campo}}">
            <option value="ENE/JUN" {{ old($campo, $valorcampo) == 'ENE/JUN' ? 'selected' : '' }}>ENE/JUN</option>
            <option value="AGO/DIC" {{ old($campo, $valorcampo) == 'AGO/DIC' ? 'selected' : '' }}>AGO/DIC</option>
            <!-- Agrega más opciones aquí -->
        </select>
        
        <div class="error">
            @error($campo)
                <span style="color: brown;">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
