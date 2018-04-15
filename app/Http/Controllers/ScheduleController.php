<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Market;
use App\Week;
use App\User;
use App\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\MessageBag;
use App\Http\Requests\ScheduleRequest; 
use Barryvdh\DomPDF\Facade as PDF; 

class ScheduleController extends Controller
{
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::all();
        return view('schedules.index', compact('markets'));
    }

    public function create($week)
    {
        $markets = Market::all();
        $week = Week::findOrFail($week);
        $users  = User::all();
        $hours = Hour::all();
        return view('schedules.create', compact('week', 'users', 'markets', 'hours'));
    }
    

    public function selectMarketWeek()
    {
        $weeks = Week::orderBy('number')->get();
        return view('schedules.selectWeek', compact('weeks'));
    }

    public function selectedWeek(Request $request)
    {
        return redirect()->route('schedules.create', $request->week); 
    }

    public function storeWeek(Request $request)
    {
        $from = Week::convertToSQL($request['from']);
        $response = Week::where('from', '=', $from)->first();
        if ($response == null) {
            $numerOfWeek = $this->numberWeek($request['from']);
            $week = new Week;
            $week->from = $week->convertToSQL($request['from']);
            $week->to = $week->convertToSQL($request['to']);
            $week->number = $numerOfWeek;
            $week->save();
        }else { 
            $errors = new MessageBag();
            $errors->add('numerOfWeek', 'La semana selecionada ya ha sido creada, por favor selecione otra.');
            return redirect()->back()->with(compact('errors')); 
        }
        return redirect()->route('schedules.create', $week->id); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSchedule(ScheduleRequest $request)
    {
        $schedule = Schedule::where(['market_id' => $request->market_id,'week_id' => $request->week_id, 'user_id' => $request->user_id])->get();
    
        if (count($schedule) != 0) {
            $week = Week::find($request->week_id);
            $errors = new MessageBag();
            $errors->add('schedule', "El colaborador ya tiene un horario en este punto de venta y para la semana #$week->number");
            return redirect()->back()->with(compact('errors'))->withInput(); 
        }
        $errors = $this->validateStoreSchedule($request->all());
        if (count($errors)== 0) {
            Schedule::create($request->all());
            return redirect()->route('schedules.index');
        }
        return redirect()->back()->with(compact('errors'))->withInput(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $market = Market::find($id);
        $weeks = Week::all();
        return view('schedules.showWeek', compact('market', 'weeks'));
    }

    public function showSchedule(Request $request)
    {
      
        $schedules =  Schedule::where(['market_id' => $request->market_id,'week_id' => $request->week])->get();
       
        return view('schedules.show', compact('schedules'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        $hours = Hour::all();
        return view('schedules.edit', compact('schedule', 'hours'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $schedule = Schedule::find($id);
        $data = $request->all();
        $data += [ "user_id" => $schedule->user_id, "week_id" => $schedule->week_id, "id" => $id ];
  
        $errors = $this->validateUpdateSchedule($data);
        if (count($errors) > 0) {
            return redirect()->back()->with(compact('errors'))->withInput();
        }

        $schedule->lunes = $data['lunes'];
        $schedule->martes = $data['martes'];
        $schedule->miercoles = $data['miercoles'];
        $schedule->jueves = $data['jueves'];
        $schedule->viernes = $data['viernes'];
        $schedule->sabado = $data['sabado'];
        $schedule->domingo = $data['domingo'];
        $schedule->save();

        return redirect()->back()->with('message', 'Horario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function numberWeek($dateString)
    {
        $now = Carbon::createFromFormat('d/m/Y', $dateString);
        return $now->weekOfYear;
    }

    private function validateStoreSchedule($data){
        $errors = new MessageBag();
      
        $user = User::find($data['user_id']);
        $week = Week::find($data['week_id']);
        $days = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        foreach ($days as $day) {
           $schedules = Schedule::select($day)->where(['week_id' => $week->id, 'user_id' => $user->id])->get();
           if (count($schedules) > 0) {
               foreach ($schedules as $schedule) {
                   if ($schedule->$day != null) {
                       if ($schedule->$day == $data[$day]) {
                          $errors->add($day, "El colaborador ya tiene la misma hora para el día $day en este u otro punto de venta");
                       }
                   }
               }
           }
        }
        return $errors;
    }

    private function validateUpdateSchedule($data){
        $errors = new MessageBag();
        $user = User::find($data['user_id']);
        $week = Week::find($data['week_id']);
        $days = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        foreach ($days as $day) {
           $schedules = Schedule::select($day)
           ->where([
            ['week_id', '=', $week->id], 
            ['user_id', '=', $user->id], 
            ['id', '!=', $data['id']]
            ])->get();
           if (count($schedules) > 0) {
               foreach ($schedules as $schedule) {
                   if ($schedule->$day != null) {
                       if ($schedule->$day == $data[$day]) {
                          $errors->add($day, "El colaborador ya tiene la misma hora para el día $day en este u otro punto de venta");
                       }
                   }
               }
           }
        }
        return $errors;
    }

    public function pdf($idmarket ,$idweek)
    {        
        $schedules =  Schedule::where(['market_id' => $idmarket,'week_id' => $idweek])->get();
        
        //set_time_limit(0);
        $pdf = PDF::loadView('schedules.show', compact('schedules'));
       
        return $pdf->stream('schedules.pdf');
    }
}
