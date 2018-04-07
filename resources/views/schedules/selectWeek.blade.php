@extends('layouts.default')

@section('styles')
<link href="{{ asset('css/jquery-ui-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="page-header">
	<div class="container-fluid">
	  <h2 class="h5 no-margin-bottom">Semana</h2>
	</div>
</div>
<div class="container" style="color: white;">
  @if($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div>
  @endif
	@if(count($weeks) != 0)
  	<form action="{{ route('week.selected') }}" method="post" accept-charset="utf-8">
      {{ csrf_field() }}
       <h3>Seleccionar Semana</h3>
  		 <div class="form-group row">
  	        <label class="col-lg-4 col-form-label text-lg-right">Seleccione una semana</label>
  	        <div class="col-md-6">
  	            <select class="form-control" id="week" name="week">
  	                @foreach($weeks as $week)
  	                    <option value="{{ $week->id }}">#{{ $week->number }} {{ $week->from }} - {{ $week->to }}</option>
  	                @endforeach
  	            </select>
  	        </div>
  	    </div>
        <div class="row d-flex justify-content-center">
          <button type="submit" class="btn btn-primary">Aceptar</button>
        </div>
    </form>
  @endif
  <form action="{{ route('week.store') }}" method="post">
    {{ csrf_field() }}
      <h3>Crear Semana</h3>
      <div class="row">
        <div class="col-sm-4">
          <div class="week-picker"></div>
        </div>
        <div class="col-md-8 text-center">
            <label for="from">Desde</label>
              <input type="text" id="from" name="from" readonly>
            <label for="to">A</label>
              <input type="text" id="to" name="to" readonly>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-primary">Crear y Seleccionar</button>
                </div>
              </div>
        </div>
      </div>
  </form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-ui-datepicker.min.js') }}"></script>
<script type="text/javascript">
$(function() {
    var startDate;
    var endDate;

    var selectCurrentWeek = function() {
        window.setTimeout(function () {
            $('.week-picker').find('.ui-datepicker-current-day a').addClass('ui-state-active')
        }, 1);
    }

    $('.week-picker').datepicker( {
      firstDay: 1,
      dateFormat: 'dd/mm/yy',
      showOtherMonths: true,
      selectOtherMonths: true,
      showWeek: true,
        onSelect: function(dateText, inst) { 
            var date = $(this).datepicker('getDate');
            startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 1);
            endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 7);
            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
            $('#from').val($.datepicker.formatDate( dateFormat, startDate, inst.settings ));
            $('#to').val($.datepicker.formatDate( dateFormat, endDate, inst.settings ));

            selectCurrentWeek();
        },
        beforeShowDay: function(date) {
            var cssClass = '';
            if(date >= startDate && date <= endDate)
                cssClass = 'ui-datepicker-current-day';
            return [true, cssClass];
        },
        onChangeMonthYear: function(year, month, inst) {
            selectCurrentWeek();
        }
    });
});
</script>
@endsection