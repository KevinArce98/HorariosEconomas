@extends('layouts.default')

@section('styles')
	<style>
		tr[id]:hover{
			cursor: pointer;
		}
	</style>
@endsection

@section('content')
	<div class="page-header">
  <div class="container-fluid">
    <h2 class="h5 no-margin-bottom">Mostrar Horario</h2>
  </div>
</div>
<div class="container" style="color: white;">
	@if(count($schedules) > 0)
		<h2 class="text-success">{{ $schedules[0]->market->name }}</h2>
		<h3 class="text-danger">{{ $schedules[0]->week->weekShow($schedules[0]->week) }}</h3>
	@endif
	<p class="text-center text-warning">¡Selecione un horario para editarlo!</p>
	<table class="table table-hover table-responsive" width="100%" id="allSchedules">
		<thead>
			<tr>
				<th class="text-center">Colaborador</th>
				<th class="text-center">Puesto</th>
				<th class="text-center">Lunes</th>
				<th class="text-center">Martes</th>
				<th class="text-center">Miércoles</th>
				<th class="text-center">Jueves</th>
				<th class="text-center">Viernes</th>
				<th class="text-center">Sábado</th>
				<th class="text-center">Domingo</th>
			</tr>
		</thead>
		<tbody>
			@forelse($schedules as $schedule)
				<tr id="{{$schedule->id}}">
					<td class="text-center" width="120px">{{ $schedule->user->name }}</td>
					<td class="text-center" width="120px">{{ $schedule->user->position->name }}</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->lunes) }}>
						{{ (isset($schedule->lunes)) ? $schedule->showHour($schedule->lunes) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->martes) }}>
						{{ (isset($schedule->martes)) ? $schedule->showHour($schedule->martes) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->miercoles) }}>
						{{ (isset($schedule->miercoles)) ? $schedule->showHour($schedule->miercoles) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->jueves) }}>
						{{ (isset($schedule->jueves)) ? $schedule->showHour($schedule->jueves) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->viernes) }}>
						{{ (isset($schedule->viernes)) ? $schedule->showHour($schedule->viernes) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->sabado) }}>
						{{ (isset($schedule->sabado)) ? $schedule->showHour($schedule->sabado) : '' }}
					</td>
					<td class="text-center" width="120px" {{ $schedule->setClass($schedule->domingo) }}>
						{{ (isset($schedule->domingo)) ? $schedule->showHour($schedule->domingo) : '' }}
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="9" class="text-center">No existen horarios para este punto de venta</td>
				</tr>
			@endforelse
		</tbody>
	</table>

	<a href="{{route('schedules.index')}}" class="btn btn-warning">Volver a la lista</a>
</div>
@endsection

@section('scripts')
<script>
	$(function(){
	$('#allSchedules tr[id]').each(function(){
		$(this).click(function(){
				window.location.href="/schedules/edit/"+$(this).attr('id');
			});
		});
	});
</script>
@endsection