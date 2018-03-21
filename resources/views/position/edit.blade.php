@extends('layouts.default')

@section('content')
<div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Editar Puesto</h2>
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
<form action="{{ route('position.update', $role->id) }}" method="POST" role="form">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
	
	<div class="form-group">
		<label for="name" class="control-label">Nombre:</label>
		<input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name" required autofocus>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Descripción</label>
        <input type="text" class="form-control" id="description" value="{{ $role->description }}"  name="description" required>
	</div>
	<div class="form-group">
		<label for="description" class="control-label">Paga por hora</label>
        <input type="text" class="form-control" id="payforhour" value="{{ $position->payforhour }}"  name="payforhour" required>
	</div>
	<div class="form-group text-right">
		<button type="submit" class="btn btn-success">Guardar</button> | 
		<a href="{{route('position.index')}}" class="btn btn-warning">Volver a la lista</a>
	</div>
</form>

</div>

@endsection