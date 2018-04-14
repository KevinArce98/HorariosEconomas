@extends('layouts.default')

@section('content')
	<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Mostrar Horario</h2>
  </div>
</div>
<div class="container" style="color: white;">
<h2 class="text-success">{{ $schedules[0]->market->name }}</h2>
<h3 class="text-danger">{{ $schedules[0]->week->weekShow($schedules[0]->week) }}</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Colaborador</th>
				<th>Puesto</th>
				<th>Lunes</th>
				<th>Martes</th>
				<th>Miércoles</th>
				<th>Jueves</th>
				<th>Viernes</th>
				<th>Sábado</th>
				<th>Domingo</th>
			</tr>
		</thead>
		<tbody>
			@foreach($schedules as $schedule)
				<tr>
					<td>{{ $schedule->user->name }}</td>
					<td>{{ $schedule->user->position->name }}</td>
					<td {{ $schedule->setClass($schedule->lunes) }}>
						{{ (isset($schedule->lunes)) ? $schedule->showHour($schedule->lunes) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->martes) }}>
						{{ (isset($schedule->martes)) ? $schedule->showHour($schedule->martes) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->miercoles) }}>
						{{ (isset($schedule->miercoles)) ? $schedule->showHour($schedule->miercoles) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->jueves) }}>
						{{ (isset($schedule->jueves)) ? $schedule->showHour($schedule->jueves) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->viernes) }}>
						{{ (isset($schedule->viernes)) ? $schedule->showHour($schedule->viernes) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->sabado) }}>
						{{ (isset($schedule->sabado)) ? $schedule->showHour($schedule->sabado) : '' }}
					</td>
					<td {{ $schedule->setClass($schedule->domingo) }}>
						{{ (isset($schedule->domingo)) ? $schedule->showHour($schedule->domingo) : '' }}
					</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
</div>
@endsection