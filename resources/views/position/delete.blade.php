@extends('layouts.default')

@section('content')
	<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Eliminar Puesto</h2>
      </div>
    </div>
    <div class="container">
    	<h3 class="text-danger text-center">¿Estás seguro que quieres eliminar este puesto?</h3>
    	<div class="bg-light p-4 mb-2">
    		<h4>{{ $position->name }}</h4>
    		<hr>
    		<label for="description">Descripción:</label><input class="form-control" type="text" name="description" value="{{ $position->description }}" readonly="">
    	</div>
    	<form action="{{ route('position.destroy', $position->id) }}" method="POST" accept-charset="utf-8">
    		{{ csrf_field() }}
    		{{ method_field('DELETE') }}
    		<button type="submit" class="btn btn-danger">Eliminar</button> <span class="text-light">|</span> 
			<a href="{{route('position.index')}}" class="btn btn-warning">Volver a la lista</a>
    	</form>
    </div>
@endsection