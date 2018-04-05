<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Market;
use App\Week;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($week)
    {
        dd($week);
    }

    public function selectMarketWeek()
    {
        $weeks = Week::all();
        return view('schedules.selectWeek', compact('weeks'));
    }

    public function storeWeek(Request $request)
    {
        
        $week = new Week;
        $week->from = $week->convertToSQL($request['from']);
        $week->to = $week->convertToSQL($request['to']);
        $week->number = $this->numberWeek($request['from']);
        $week->save();
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
