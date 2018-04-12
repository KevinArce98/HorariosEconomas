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
<form action="{{ route('hours.store') }}" method="POST" role="form">
	{{ csrf_field() }}
	
	<div class="form-group">
		<label for="name" class="control-label">Desde:</label>
		<input class="timepicker form-control" name="from" required readonly>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">A</label>
        <input class="timepicker form-control" name="to" required readonly>
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
@endsection