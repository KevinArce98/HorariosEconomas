@extends('layouts.default')

@section('content')
 <div class="page-header">
	<div class="container-fluid">
	  <h2 align="center" class="h5 no-margin-bottom">Seleccione Empleado</h2>
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
        <form action="{{ route('schedules.showEmpHour') }}" method="post">
          {{ csrf_field() }}
          
          <div class="form-group">
              <label for="market_id" class="control-label">Seleccione la Empleado:</label>
              <select class="form-control" id="user" name="user">
                  @foreach($users as $user)
                      <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }} | {{ $user->username }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
                <label for="weeks_id" class="control-label">Seleccione la semana:</label>
                <select class="form-control" id="week" name="week">
                    @foreach($weeks as $week)
                        <option value="{{ $week->id }}">#{{ $week->number }} {{ $week->from }} | {{ $week->to }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Descargar</button>
            </div>
        </form>
      </div>      

@endsection