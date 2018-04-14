@extends('layouts.default')


@section('content')
<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Mostrar Horario</h2>
  </div>
</div>
<div class="container" style="color: white;">
  <form action="{{ route('schedules.showSchedule') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="market_id" class="control-label">Punto de venta:</label>
        <input type="text" value="{{ $market->name }}" class="form-control" readonly="">
        <input type="hidden" name="market_id" value="{{ $market->id }}" required="">
    </div>
    <div class="form-group">
        <label for="market_id" class="control-label">Seleccione la semana:</label>
        <select class="form-control" id="week" name="week">
            @foreach($weeks as $week)
                <option value="{{ $week->id }}">#{{ $week->number }} {{ $week->from }} | {{ $week->to }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Ver Horario</button>
  </form>
</div>
@endsection