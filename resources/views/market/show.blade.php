@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Mostrar Punto de venta</h2>
      </div>
    </div>
<div class="container" style="color: white;">	
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" placeholder="Nombre" value="{{ $market->name }}" name="name" readonly>
	</div>
	<div class="form-group">
		<label for="location" class="control-label">Ubicación:</label>
		<input type="text" class="form-control" id="location" placeholder="Ubicación" value="{{ $market->location }}"readonly>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Descripción</label>
        <input type="text" class="form-control" id="description" placeholder="Descripción" value="{{ $market->description }}" readonly>
	</div>
	 <div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Foto</label>
            <div class="col-lg-6">
                <img class="col-sm-6"  src="{{ $market->picture }}" ></img>
            </div>
        </div>
	<div class="form-group text-right">
		<a href="{{route('markets.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>

</div>

@endsection