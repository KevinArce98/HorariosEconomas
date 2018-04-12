@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Horas Para Horarios</h2>
      </div>
    </div>
    <div class=" container text-right mb-2">
    	<a href="{{ route('hours.create') }}" class="btn btn-success">Crear Nueva</a>
    </div>
    <div class="d-flex justify-content-center">
    	<table class="table table-light table-hover text-center">
    		<thead>
    			<tr>
    				<th>Desde</th>
    				<th>Hasta</th>
    				<th>Acciones</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($hours as $hour)
					<tr>
	    				<td>{{ $hour->convertTimeToNormal($hour->from) }}</td>
	    				<td>{{ $hour->convertTimeToNormal($hour->to) }}</td>
	    				<td>
	    					
	    					<form action="{{ route('hours.destroy', $hour->id) }}" method="POST" >
					    		{{ csrf_field() }}
					    		{{ method_field('DELETE') }}
					    		<button href="{{ route('hours.edit', $hour->id) }}" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
	    						<button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	    					</form>
	    				</td>
	    			</tr>
    			@empty
					<tr>
						<td colspan="3">No hay registros</td>
					</tr>
    			@endforelse
    		</tbody>
    	</table>
    </div>
@endsection