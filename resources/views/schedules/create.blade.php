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
	<form action="{{ route('schedules.store') }}" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="week_id" value="{{ $week->id }}" required="">
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
		<p style="font-size: 17px;">Si el colaborador no trabaja "X" día en dicho punto de venta por favor dejarlo en blanco</p>
		<div class="form-group">
			<label for="lunes" class="control-label">Lunes:</label>
			<select class="form-control" id="lunes" name="lunes">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="martes" class="control-label">Martes:</label>
			<select class="form-control" id="martes" name="martes">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="miercoles" class="control-label">Miercoles:</label>
			<select class="form-control" id="miercoles" name="miercoles">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="jueves" class="control-label">Jueves:</label>
			<select class="form-control" id="jueves" name="jueves">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="viernes" class="control-label">Viernes:</label>
			<select class="form-control" id="viernes" name="viernes">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="sabado" class="control-label">Sabado:</label>
			<select class="form-control" id="sabado" name="sabado">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group">
			<label for="domingo" class="control-label">Domingo:</label>
			<select class="form-control" id="domingo" name="domingo">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}">{{ $hour->convertTimeToNormal($hour->from). " - ". $hour->convertTimeToNormal($hour->to) }}</option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Crear</button> | 
		<a href="{{route('schedules.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
	</form>
</div>
@endsection


