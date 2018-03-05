@extends('layouts.default')

@section('content')
	<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Eliminar Rol</h2>
      </div>
    </div>
    <div class="container">
    	<h3 class="text-danger text-center">¿Estás seguro que quieres eliminar este rol?</h3>
    	<h4>{{ $role->name }}</h4>
    </div>
@endsection