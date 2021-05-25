@extends('layouts.plantillabase')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Categorías <a href="categoria/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('categoria.search')
	</div>
</div>


<table class="table table-dark table-striped mt-4">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Código</th>
      <th scope="col">Descripción</th>

      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($categoria as $categoria)
    <tr>
        <td>{{$categoria->idcategoria}}</td>
        <td>{{$categoria->nombre}}</td>
        <td>{{$categoria->descripcion}}</td>
        <td>
         <form action="{{ route('categoria.destroy',$categoria->idcategoria) }}" method="POST">
          <a href="/categoria/{{$categoria->idcategoria}}/edit" class="btn btn-info">Editar</a>         
              @csrf
              @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
         </form>          
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

@endsection