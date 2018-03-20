@extends('layouts.default')

@section('content')
	<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Eliminar Punto de Venta</h2>
      </div>
    </div>
    <div class="container">
    	<h3 class="text-danger text-center">¿Estás seguro que quieres eliminar este punto de venta?</h3>
    	<div class="bg-light p-4 mb-2">
    		<h4>{{ $market->name }}</h4>
    		<hr>
            <label for="location">Ubicación:</label><input class="form-control" type="text" name="location" value="{{ $market->location }}" readonly="">
    		<label for="description">Descripción:</label><input class="form-control" type="text" name="description" value="{{ $market->description }}" readonly="">
    	</div>
    	<form action="{{ route('markets.destroy', $market->id) }}" method="POST" accept-charset="utf-8">
    		{{ csrf_field() }}
    		{{ method_field('DELETE') }}
    		<button type="submit" class="btn btn-danger">Eliminar</button> <span class="text-light">|</span> 
			<a href="{{route('markets.index')}}" class="btn btn-warning">Volver a la lista</a>
    	</form>
    </div>
@endsection