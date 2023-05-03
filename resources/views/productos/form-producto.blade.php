@php
    use App\Enums\Productos\TallesProducto;
    use App\Models\Categoria;
@endphp

<div class="form-group mb-3">
    <label class="form-label">Precio</label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio') ? old('precio') : '0' }}" min="0" step="1000">
    </div>
    @error('precio')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>            

<div class="form-group mb-3">
    <label  class="form-label">Imagen</label>
    <input type="text" name="imagen_ruta" class="form-control @error('imagen_ruta') is-invalid @enderror" value="{{old('imagen_ruta')}}">
    @error('imagen_ruta')
        <span class="tex-danger">
        <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label  class="form-label">Modelo</label>
    <input type="text" name="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{old('modelo')}}">
    @error('modelo')
        <span class="tex-danger">
        <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label class="form-label">Marca</label>
    <input type="text" name="marca" class="form-control @error('marca') is-invalid @enderror" value="{{old('marca')}}">
    @error('marca')
        <span class="tex-danger">
        <strong>{{$message}}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label class="form-label" for="categoria">Categoría</label>
    <select id="categoria" name="categoria" class="form-select @error('categoria') is-invalid @enderror">
        <option value="0" selected hidden>Seleccione la categoría</option>
        @foreach(Categoria::all() as $categoria)
            <option value="{{ $categoria->id }}" {{ old('categoria') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nombre }}
            </option>
        @endforeach
    </select>
    @error('categoria')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label class="form-label" for="talle">Talle</label>
    <select id="talle" name="talle" class="form-select @error('talle') is-invalid @enderror">
        <option value="0" selected hidden>Seleccione el talle</option>
        @foreach(TallesProducto::asArray() as $talle)
            <option value="{{ $talle }}" {{ old('talle') == $talle ? 'selected' : '' }}>{{ $talle }}</option>
        @endforeach
    </select>
    @error('talle')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    <a href="/productos" class="btn btn-light">Go Back</a>
    <button type="submit" class="btn btn-success">Submit</button>
</div>