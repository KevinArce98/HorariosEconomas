<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>{{ config('app.name', 'Laravel') }}</title>
    
  </head>
  <body>
    


	<div class="page-header">
        <div class="container-fluid">
         
        </div>
      </div>
      <div class="container" style="color: black;">
          @if(count($schedules) > 0)
              <h2 align="center" class="text-success">{{ $schedules[0]->market->name }}</h2>
              <h3  align="center"class="text-danger">{{ $schedules[0]->week->weekShow($schedules[0]->week) }}</h3>
              <br>
              <h3 align="center"class="text-danger">Total de Horas trabajadas en la semana: {{$hourWorks}}.</h3>
              <h3 align="center"class="text-danger">Monto a pagar en colones: {{$payTotal}}.</h3>
              <br>
              <h3 align="center"class="text-danger">Desglose de Salario.</h3>
              <br>
              <h4 align="center"class="text-danger">Total de horas extra Laboradas: {{$horasExtra}}.</h4>
              <h4 align="center"class="text-danger">Monto a pagado por horas extra en colones: {{$payHorasExtra}}.</h4>
              <h4 align="center"class="text-danger">Salario por Hora: {{$payforhour}}.</h4>
              
          @endif
          <h3 align="center" class="text-danger">HORARIO EMPLEADO</h3>
          <table align="center" class="table table-hover table-responsive" width="10%" id="allSchedules">
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
                          <td class="text-center" width="50px">{{ $schedule->user->name }}</td>
                          <td class="text-center" width="50px">{{ $schedule->user->position->name }}</td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->lunes) }}>
                              {{ (isset($schedule->lunes)) ? $schedule->showHour($schedule->lunes) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->martes) }}>
                              {{ (isset($schedule->martes)) ? $schedule->showHour($schedule->martes) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->miercoles) }}>
                              {{ (isset($schedule->miercoles)) ? $schedule->showHour($schedule->miercoles) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->jueves) }}>
                              {{ (isset($schedule->jueves)) ? $schedule->showHour($schedule->jueves) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->viernes) }}>
                              {{ (isset($schedule->viernes)) ? $schedule->showHour($schedule->viernes) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->sabado) }}>
                              {{ (isset($schedule->sabado)) ? $schedule->showHour($schedule->sabado) : '' }}
                          </td>
                          <td class="text-center" width="50px" {{ $schedule->setClass($schedule->domingo) }}>
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
      
          
          
      </div>





<br>
<br>

        <footer class="footer" align="center">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p align="center" class="no-margin-bottom">{{Carbon\Carbon::now()->year}} &copy; ECONOMás. Diseñado por <a href="https://jakadesign.com">JAKADesign</a>.</p>
            </div>
          </div>
        </footer>
    
   
  </body>
</html> 