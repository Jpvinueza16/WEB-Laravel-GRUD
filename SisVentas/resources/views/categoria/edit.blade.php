@extends('layouts.plantillabase')

@section('contenido')
<h2>EDITAR REGISTROS</h2>

<form action="/categoria/{{$categoria->idcategoria}}" method="POST">
    @csrf    
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="nombre" type="text" class="form-control" value="{{$categoria->nombre}}">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <input id="descripcion" name="descripcion" type="text" class="form-control" value="{{$categoria->descripcion}}">
  </div>
  <a href="/categoria" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection