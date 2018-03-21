@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Mostrar Puesto</h2>
      </div>
    </div>
<div class="container" style="color: white;">	
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" value="{{ $position->name }}" readonly>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Descripción</label>
        <input type="text" class="form-control" id="description" value="{{ $position->description }}" readonly>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Paga por Hora</label>
        <input type="text" class="form-control" id="payforhour" value="{{ $position->payforhour }}" readonly>
	</div>
	<div class="form-group text-right">
		<a href="{{route('positions.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>

</div>

@endsection