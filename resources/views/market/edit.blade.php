@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Editar Punto de venta</h2>
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
<form action="{{ route('markets.update', $market->id) }}" method="POST" role="form" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" placeholder="Nombre" value="{{ old('name', $market->name) }}" name="name" required autofocus>
	</div>
	<div class="form-group">
		<label for="location" class="control-label">Ubicación:</label>
		<input type="text" class="form-control" id="location" placeholder="Ubicación" value="{{ old('location',$market->location) }}" name="location" required >
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Descripción</label>
        <input type="text" class="form-control" id="description" placeholder="Descripción" value="{{ old('description', $market->description) }}" name="description" required>
	</div>
	<div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Foto</label>

            <div class="col-lg-6">
                <input data-preview="#picture" name="picture" type="file" id="picture" value="{{ $market->picture }}">
                <img class="col-sm-6" id="picture" name="picture" src="{{ $market->picture }}" width="286px" height="140px"></img>
                <p class="help-block">Formatos: jpeg,png,jpg <br> Tamaño: max 2048mb</p>
                @if ($errors->has('picture'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('picture') }}</strong>	
                    </div>
                @endif
            </div>
        </div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Guardar</button> | 
		<a href="{{route('markets.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
</form>

</div>

@endsection