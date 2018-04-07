@extends('layouts.default')

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Seleccionar Punto de Venta</h2>
	</div>
</div>
<div class="container" style="color: white;">
	<form action="{{ route('schedules.makeUrl') }}" method="post" accept-charset="utf-8">
		{{ csrf_field() }}
		<label>Numero de semana selecionada</label>	
		<input type="text" value="{{ $week->number }}" readonly class="form-control">
		<input type="hidden" name="week" value="{{ $week->id }}" required>
		<label for="market">Punto de Venta</label>	
		<select class="form-control" id="market" name="market">
	        @foreach($markets as $market)
				<option value="{{ $market->id }}">{{ $market->name }}</option>
			@endforeach    
	    </select>
	    <button type="submit" class="btn btn-success my-3">Seleccionar</button>
	</form>
</div>
@endsection