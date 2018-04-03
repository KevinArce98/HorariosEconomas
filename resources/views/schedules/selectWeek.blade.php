@extends('layouts.default')

@section('styles')
<link href="{{ asset('css/jquery-ui-datepicker.min.css') }}" rel="stylesheet">
@endsection

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
	    	<div class="col-sm-1">
	    		<label for="from">From</label>
	    	</div>	    		
	        <div class="col-md-5">
	            <input type="text" id="from" name="from">
	        </div>
	        <div class="col-sm-1">
	        	<label for="to">to</label>
	    	</div>
	        <div class="col-md-5">
	      	      <input type="text" id="to" name="to">
	        </div>
	    </div>
	</form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-ui-datepicker.min.js') }}"></script>
<script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3,
          showWeek: true
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3,
        showWeek: true
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
</script>
@endsection