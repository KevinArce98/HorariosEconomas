@extends('layouts.default')

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Editando</h2>
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
	@if(session()->has('message'))
	    <div class="alert alert-success">
	        {{ session()->get('message') }}
	    </div>
	@endif
	<form action="{{ route('schedules.update', $schedule->id) }}" method="post">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<div class="form-group">
			<label for="user_id" class="control-label">Colaborador:</label>
			<input type="text" value="{{ $schedule->user->name}} {{ $schedule->user->lastname}}" readonly class="form-control">
		</div>
		<div class="form-group">
			<label for="market_id" class="control-label">Punto de Venta:</label>
			<input type="text" value="{{ $schedule->market->name }}" readonly class="form-control">
		</div>

		<div class="form-group">
			<label for="week_id" class="control-label">Numero Semana:</label>
			<input type="text" value="{{ $schedule->week->number }}" readonly class="form-control">
		</div>
		<p style="font-size: 17px;">Si el colaborador no trabaja "X" día en dicho punto de venta por favor dejarlo en blanco</p>
		<div class="form-group">
			<label for="lunes" class="control-label">Lunes:</label>
			<select class="form-control" id="lunes" name="lunes">
				<option value=""></option>
	                @forelse($hours as $hour)
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("lunes", $schedule->lunes) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("martes", $schedule->martes) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("miercoles", $schedule->miercoles) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("jueves", $schedule->jueves) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("viernes", $schedule->viernes) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("sabado", $schedule->sabado) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
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
	                    <option style="background-color: {{ $hour->color }};" value="{{ $hour->id }}" {{ (old("domingo", $schedule->domingo) == $hour->id ? "selected":"") }}>
	                    	{{ $hour->showHour($hour->id) }}
	                    </option>
	                @empty
	                    <option>No hay registros</option>
	                @endforelse
	        </select>
		</div>
		<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Guadar</button> | 
		<a href="{{route('schedules.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
	</form>
</div>
@endsection


