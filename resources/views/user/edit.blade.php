@extends('layouts.default')
    
@section('content')
<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Editar Usuario</h2>
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
    <form role="form" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        {{ method_field('PATCH') }}

         <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Nombre</label>

            <div class="col-lg-6">
                <input
                        type="text"
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        required>
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('lastname') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-form-label text-lg-right">Apellido</label>
            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" name="lastname" value="{{ old('lastname', $user->lastname) }}" required>
                @if ($errors->has('lastname'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('lastname') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('username') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-form-label text-lg-right">Nombre de usuario</label>
            <div class="col-md-6">
                <input id="username" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" name="username" value="{{ old('username', $user->username) }}" required>
                @if ($errors->has('username'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

         

         <div class="form-group row {{ $errors->has('phone') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-form-label text-lg-right">Teléfono</label>
            <div class="col-md-6">
                <input id="phone" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" name="phone" value="{{ old('phone', $user->phone) }}" required>
                @if ($errors->has('phone'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group row {{ $errors->has('role_id') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-form-label text-lg-right">Rol</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" id="role_id" name="role_id">
              
                    @forelse($roles as $role)
                        <option {{ old('role_id',$user->role->id) == $role->id ? ' selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                    @empty
                        <option>No hay registros</option>
                    @endforelse
                </select>
                @if ($errors->has('role_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row {{ $errors->has('position_id') ? ' has-error' : '' }}">
            <label class="col-lg-4 col-form-label text-lg-right">Puesto</label>
            <div class="col-md-6">
                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"" id="position_id" name="position_id">
                    @forelse($positions as $position)
                        <option {{ old('position_id', $user->position->id) == $position->id ? ' selected' : '' }} value="{{ $position->id }}">{{ $position->name }}</option>
                    @empty
                        <option>No hay registros</option>
                    @endforelse
                </select>
                @if ($errors->has('position_id'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('position_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Contraseña</label>

            <div class="col-lg-6">
                <input
                        type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        name="password">
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Confirmar Contraseña</label>

            <div class="col-lg-6">
                <input
                        type="password"
                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                        name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Avatar</label>

            <div class="col-lg-6">
                <input data-preview="#avatar" name="avatar" type="file" id="avatar">
                <img class="col-sm-6" id="avatar" name="avatarShow" src="{{ $user->avatar }}" ></img>
                <p class="help-block">Formatos: jpeg,png,jpg <br> Tamaño: max 2048mb</p>
                @if ($errors->has('avatar'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-6 offset-lg-4 text-right">
                <button type="submit" class="btn btn-success">
                    Guardar
                </button> | <a href="{{ route('users.index') }}" class="btn btn-warning">Volver a la lista</a>
            </div>
        </div>
    </form>
</div>
@endsection