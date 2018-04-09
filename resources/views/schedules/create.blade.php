@extends('layouts.default')

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Creando</h2>
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

	<div class="form-group">
		<label for="user_id" class="control-label">Colaborador:</label>
		<select class="form-control" id="user_id" name="user_id" required>
                @forelse($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }} | {{ $user->position->name }}</option>
                @empty
                    <option>No hay registros</option>
                @endforelse
        </select>
	</div>

	<div class="form-group">
		<label for="market_id" class="control-label">Punto de Venta:</label>
		<select class="form-control" id="market_id" name="market_id" required>
                @forelse($markets as $market)
                    <option value="{{ $market->id }}">{{ $market->name }}</option>
                @empty
                    <option>No hay registros</option>
                @endforelse
        </select>
	</div>
	<div class="form-group">
		<label for="lunes" class="control-label">Lunes:</label>
		<div class="row">
			<div class="form-check mx-3">
			  <input class="form-check-input" type="radio" name="select_hour" id="create_hour" value="create_hour" checked>
			  <label class="form-check-label" for="create_hour">
			    Crear Hora
			  </label>
			</div>
			<div class="form-check">
			  <input class="form-check-input" type="radio" name="select_hour" id="selected_hour" value="selected_hour">
			  <label class="form-check-label" for="selected_hour">
			    Seleccionar Hora Creada
			  </label>
			</div>
		</div>
	</div>
</div>
@endsection