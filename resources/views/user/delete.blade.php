@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Eliminar Usuario</h2>
      </div>
    </div>
    <div class="container" style="color: white;">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    	<h3 class="text-danger text-center">¿Estás seguro que quieres eliminar este usuario?</h3>
    	 <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Nombre</label>

            <div class="col-lg-6">
                <input type="text" class="form-control" value="{{ $user->name }}"  readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Apellido</label>
            <div class="col-md-6">
                <input type="text" class="form-control" value="{{ $user->lastname }}"  readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Nombre de usuario</label>
            <div class="col-md-6">
                <input type="text" class="form-control" value="{{ $user->username }}"  readonly>
            </div>
        </div>

         

         <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Teléfono</label>
            <div class="col-md-6">
                <input type="text" class="form-control"  value="{{ $user->phone }}"  readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Rol</label>
            <div class="col-md-6">
                <input type="text" class="form-control" value="{{ $user->role->name }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Puesto</label>
            <div class="col-md-6">
                <input type="text" class="form-control" value="{{ $user->position->name }}" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Avatar</label>
            <div class="col-lg-6">
                <img class="col-sm-6"  src="{{ $user->avatar }}" ></img>
            </div>
        </div>
    	<form action="{{ route('users.destroy', $user->id) }}" method="POST" accept-charset="utf-8">
    		{{ csrf_field() }}
    		{{ method_field('DELETE') }}
    		<button type="submit" class="btn btn-danger">Eliminar</button> <span class="text-light">|</span> 
			<a href="{{route('users.index')}}" class="btn btn-warning">Volver a la lista</a>
    	</form>
    </div>
    <div class="mb-5">
    	
    </div>
@endsection