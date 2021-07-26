@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Horas Para Horarios</h2>
      </div>
    </div>
    <div class="container">
         @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
    				<th>Color</th>
    				<th>Acciones</th>
    			</tr>
    		</thead>
    		<tbody>
    			@forelse($hours as $hour)
					<tr>
	    				<td>{{ ($hour->from != '00:00:00') ? $hour->convertTimeToNormal($hour->from) : 'Libre'}}</td>
                        <td>{{ ($hour->from != '00:00:00') ? $hour->convertTimeToNormal($hour->to) : 'Libre'}}</td>
	    				<td style="background-color: {{ $hour->color }};">&nbsp;</td>
	    				<td>
	    					
	    					<form action="{{ route('hours.destroy', $hour->id) }}" method="POST" >
					    		{{ csrf_field() }}
					    		{{ method_field('DELETE') }}
                                @if($hour->from != '00:00:00')
					    		     <a href="{{ route('hours.edit', $hour->id) }}" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                @endif
	    						<button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	    					</form>
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