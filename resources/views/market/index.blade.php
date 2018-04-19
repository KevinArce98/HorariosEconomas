@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Puntos de Venta</h2>
      </div>
    </div>
    <div class=" container text-right mb-2">
    	<a href="{{ route('markets.create') }}" class="btn btn-success">Crear Nuevo</a>
    </div>
    <div class="d-flex justify-content-center">
    	<table class="table table-light table-hover text-center">
    		<thead>
    			<tr>
    				<th>Nombre</th>
                    <th>Ubicación</th>
    				<th>Descripción</th>
    				<th>Acciones</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($markets as $market)
                    <tr>
                        <td>{{ $market->name }}</td>
                        <td>{{ $market->location }}</td>
                        <td>{{ $market->description }}</td>
                        <td>
                            <a href="{{ route('markets.show', $market->id) }}" class="btn-sm btn-success"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('markets.edit', $market->id) }}" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('markets.delete', $market->id) }}" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
