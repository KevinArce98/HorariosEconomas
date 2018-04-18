@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Usuarios</h2>
      </div>
    </div>
    <div class=" container text-right mb-2">
    	<a href="{{ route('register') }}" class="btn btn-success">Crear Nuevo</a>
    </div>
    <div class="d-flex justify-content-center">
    	<table class="table table-light table-hover text-center table-responsive">
    		<thead>
    			<tr>
                    <th>Nombre de Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Puesto</th>
    				<th>Rol</th>
    				<th>Acciones</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($users as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->position->name }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('users.delete', $user->id) }}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
