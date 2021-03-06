@extends('layouts.default')

@section('content')
	<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Eliminar Rol</h2>
      </div>
    </div>
    <div class="container">
         @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    	<h3 class="text-danger text-center">¿Estás seguro que quieres eliminar este rol?</h3>
    	<div class="bg-light p-4 mb-2">
    		<h4>{{ $role->name }}</h4>
    		<hr>
    		<label for="description">Descripción:</label><input class="form-control" type="text" name="description" value="{{ $role->description }}" readonly="">
    	</div>
    	<form action="{{ route('roles.destroy', $role->id) }}" method="POST" accept-charset="utf-8">
    		{{ csrf_field() }}
    		{{ method_field('DELETE') }}
    		<button type="submit" class="btn btn-danger">Eliminar</button> <span class="text-light">|</span> 
			<a href="{{route('roles.index')}}" class="btn btn-warning">Volver a la lista</a>
    	</form>
    </div>
@endsection