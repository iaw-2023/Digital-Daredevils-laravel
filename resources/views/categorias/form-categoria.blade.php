<div class="form-group mb-3">
    <label  class="form-label">Imagen</label>
    <input type="file" name="imagen_ruta" class="form-control @error('imagen_ruta') is-invalid @enderror bg-white" value="{{isset($categoria) ? $categoria->imagen_ruta : old('imagen_ruta')}}">
    @error('imagen_ruta')
        <span class="tex-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror bg-white" value="{{ isset($categoria) ? $categoria->nombre : old('nombre') }}">
    @error('nombre')
        <span class="tex-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group mb-3">
    <label class="form-label" for="descripcion">Descripción</label>
    <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror bg-white" value="{{ isset($categoria) ? $categoria->descripcion : old('descripcion') }}">
    @error('descripcion')
        <span class="tex-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class ="form-group">
    <a href="/categorias" class="btn btn-dark">Go Back</a>
    <button type="submit" class="btn btn-dark">Submit</button>
</div>