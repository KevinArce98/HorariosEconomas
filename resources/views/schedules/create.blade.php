@extends('layouts.default')

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Creando</h2>
	</div>
</div>
<div class="container" style="color: white;">
	{{ $week->number }}
	{{ $market->namespace }}
</div>
@endsection