@extends('layouts.default')
    
@section('content')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Mostrar Usuario</h2>
    </div>
</div>
<div class="container" style="color: white;">
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

        <div class="form-group ">
            <a href="{{ route('users.index') }}" class="btn btn-warning">Volver a la lista</a>
        </div>
</div>
@endsection