@extends('layouts.default')

@section('content')
 <div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Horarios</h2>
	</div>
</div>
<div class=" container text-right mb-2">
	@if(count($markets) != 0)
    	<a href="{{ route('schedules.select') }}" class="btn btn-success">Crear Nuevo</a>
    @endif
</div>
    <div class="d-flex justify-content-center">
    	@forelse($markets as $market)
    	<a href="{{ route('schedules.show', $market->id) }}">
			<div class="card" style="width: 18rem;">
			<h4 class="p-1 text-center text-primary">{{ $market->name }}</h4>
			  <img class="card-img-top" src="{{ $market->picture }}" alt="{{ $market->description }}" width="286px" height="160px">
			  <div class="card-body">
			    <p class="card-text">{{ $market->description }}</p>
			  </div>
			</div>
		</a>
    	@empty
			<h3 class="text-center text-success">No Hay puntos de venta</h3>
    	@endforelse
    </div>
@endsection