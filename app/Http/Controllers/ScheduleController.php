<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Market;
use App\Week;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\MessageBag;

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
        return view('schedules.create', compact('week', 'users', 'markets'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
