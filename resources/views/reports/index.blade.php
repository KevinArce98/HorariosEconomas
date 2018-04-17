@extends('layouts.default')

@section('content')
 <div class="page-header">
	<div class="container-fluid">
	  <h2 align="center" class="h5 no-margin-bottom">Reportes Disponibles</h2>
	</div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
	<div class="jumbotron">
        <h1 class="display-4">Horario</h1>
        <p class="lead">Para acceder a un reporte de Horario de una semana determinada, favor dale click al siguiente link</p>
        <hr class="my-4">
        <p>Te brinda la posibilidad de descarga por sede.</p>
        <a align="center" class="btn btn-primary btn-lg" href="{{ route('schedules.index') }}" role="button">Horarios</a>
      </div>
    </div>
  



  <div class="col">
	<div class="jumbotron">
        <h1 class="display-4">Empleado</h1>
        <p class="lead">Para ingresar al reporte de horas por empleado trabajadas en las sedes, favor acceda al siguiente link.</p>
        <hr class="my-4">
        <p>Te brinda la posibilidad de descarga por empleado.</p>
        <a align="center"class="btn btn-primary btn-lg" href="{{ route('empHour.index') }}" role="button">Empleados</a>
      </div>
</div>
</div>
</div>
    	
@endsection