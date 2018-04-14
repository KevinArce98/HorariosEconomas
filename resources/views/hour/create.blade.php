@extends('layouts.default')

@section('styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Crear Hora</h2>
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
	<div class="checkbox">
	  <label><input type="checkbox" id="empty"><span style="font-size: 18px">Crear Libre</span></label>
	</div>
	<p style="font-size: 14px" class="text-danger">Para crear un día libre, marca la casilla y da click en crear</p>
<form action="{{ route('hours.store') }}" method="POST" role="form">
	{{ csrf_field() }}
	<div id="formHours">
		<div class="form-group">
			<label for="name" class="control-label">Desde:</label>
			<input class="timepicker form-control" name="from" required readonly>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">A</label>
	        <input class="timepicker form-control" name="to" required readonly>
		</div>
		<div class="form-group">
			<label for="description" class="control-label">Color</label>
	        <select name="color" class="form-control" id="selectColor">
	        	<option value="#769fd1" style="background-color: #769fd1;">Celeste</option>
	        	<option value="#eb6a3b" style="background-color: #eb6a3b; color: white;">Naranja</option>
	        	<option value="#f6e455" style="background-color: #f6e455;">Amarillo</option>
	        	<option value="#ffffff">Blanco</option>
	        	<option value="#80e455" style="background-color: #80e455;">Verde</option>
	        	<option value="#d1d7c0" style="background-color: #d1d7c0;">Gris</option>

	        </select>
		</div>
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Crear</button> | 
		<a href="{{route('hours.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
</form>

</div>

@endsection

@section('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
	<script>
		$('.timepicker').timepicker({
		    timeFormat: 'h:mm p',
		    defaultTime: '1',
		    interval: 5,
		    dropdown: true,
		    scrollbar: true
		});
	</script>
	<script src="{{ asset('js/hours.js') }}"></script>
@endsection