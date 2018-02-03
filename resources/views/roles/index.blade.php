@extends('layouts.default')

@section('content')
    <div class="page-header">
      <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Roles de Usuario</h2>
      </div>
    </div>
    <div class="container">
    	<div class="row">
	    	<table class="table table-responsive table-light table-hover text-center">
	    		<thead>
	    			<tr>
	    				<th>Nombre</th>
	    				<th>Nombre Mostrado</th>
	    				<th>Descripción</th>
	    				<th>Acciones</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<tr>
	    				<td>CA</td>
	    				<td>Cajero</td>
	    				<td>Tiene caja para cobrar</td>
	    				<td>
	    					<button type="button" class="btn-sm btn-success"><i class="fa fa-eye"></i></button>
	    					<button type="button" class="btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
	    					<button type="button" class="btn-sm btn-danger"><i class="fa fa-trash"></i></button>
	    				</td>
	    			</tr>
	    		</tbody>
	    	</table>
    	</div>
    </div>
@endsection
