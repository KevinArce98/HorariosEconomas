@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Crear Punto de venta</h2>
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
<form action="{{ route('markets.store') }}" method="POST" role="form" enctype="multipart/form-data">
	{{ csrf_field() }}
	
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required autofocus>
	</div>
	<div class="form-group">
		<label for="location" class="control-label">Ubicación:</label>
		<input type="text" class="form-control" id="location" placeholder="Ubicación" name="location" required autofocus>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Descripción</label>
        <input type="text" class="form-control" id="description" placeholder="Descripción"  name="description" required>
	</div>
	<div class="form-group row">
            <label class="col-lg-4 col-form-label text-lg-right">Picture</label>

            <div class="col-lg-6">
                <input data-preview="#picture" name="picture" type="file" id="picture">
                <img class="col-sm-6" id="picture"  src="" ></img>
                <p class="help-block">Formatos: jpeg,png,jpg <br> Tamaño: max 2048mb</p>
                @if ($errors->has('picture'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('picture') }}</strong>
                    </div>
                @endif
            </div>
        </div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Crear</button> | 
		<a href="{{route('markets.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
</form>

</div>

@endsection