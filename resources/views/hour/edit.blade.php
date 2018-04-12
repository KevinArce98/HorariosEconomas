@extends('layouts.default')

@section('styles')
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endsection

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Editar Hora</h2>
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
<form action="{{ route('hours.update', $hour->id) }}" method="POST" role="form">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	
	<div class="form-group">
		<label for="name" class="control-label">Desde:</label>
		<input class="timepicker form-control" name="from" value="{{ $hour->convertTimeToNormal($hour->from) }}" required readonly>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">A</label>
        <input class="timepicker form-control" name="to" value="{{ $hour->convertTimeToNormal($hour->to) }}" required readonly>
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Guardar</button> | 
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
		    interval: 5,
		    dropdown: true,
		    scrollbar: true
		});
	</script>
@endsection