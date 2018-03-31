@extends('layouts.default')

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">First Step</h2>
	</div>
</div>
<div class="container" style="color: white;">
	
	<form action="" method="get" accept-charset="utf-8">
		 <div class="form-group row">
	        <label class="col-lg-4 col-form-label text-lg-right">Punto de Venta</label>
	        <div class="col-md-6">
	            <select class="form-control" id="market" name="market">
	                @foreach($markets as $market)
	                    <option value="{{ $market->id }}">{{ $market->name }}</option>
	                @endforeach
	            </select>
	        </div>
	    </div>
	    <div class="form-group row">
	        <label class="col-lg-4 col-form-label text-lg-right">Semana</label>
	        <div class="col-md-3">
	            <select class="form-control" id="market" name="market">
	                @foreach($markets as $market)
	                    <option value="{{ $market->id }}">{{ $market->name }}</option>
	                @endforeach
	            </select>
	        </div>
	        <div class="col-md-3">
	            <select class="form-control" id="market" name="market">
	                @foreach($markets as $market)
	                    <option value="{{ $market->id }}">{{ $market->name }}</option>
	                @endforeach
	            </select>
	        </div>
	    </div>
	</form>
</div>
@endsection