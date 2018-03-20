@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Roles de Usuario</h2>
      </div>
    </div>
    <div class=" container text-right mb-2">
    	<a href="{{ route('roles.create') }}" class="btn btn-success">Crear Nuevo</a>
    </div>
    <div class="d-flex justify-content-center">
    	<table class="table table-light table-hover text-center">
    		<thead>
    			<tr>
    				<th>Nombre</th>
    				<th>Descripción</th>
    				<th>Acciones</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($roles as $rol)
					<tr>
	    				<td>{{ $rol->name }}</td>
	    				<td>{{ $rol->description }}</td>
	    				<td>
	    					<a href="{{ route('roles.show', $rol->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
	    					<a href="{{ route('roles.edit', $rol->id) }}" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
	    					<a href="{{ route('roles.delete', $rol->id) }}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
	    				</td>
	    			</tr>
    			@empty
					<tr>
						<td colspan="4">No hay registros</td>
					</tr>
    			@endforelse
    		</tbody>
    	</table>
    </div>
@endsection
