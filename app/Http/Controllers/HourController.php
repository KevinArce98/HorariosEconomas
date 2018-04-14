<?php

namespace App\Http\Controllers;

use App\Hour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use \Illuminate\Support\MessageBag;

class HourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hours = Hour::all();
        return view('hour.index', compact('hours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hour.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hour = new Hour;
        $validate = $hour->validateHours($request->from, $request->to);

        if ($validate <= 0) {
            $errors = new MessageBag();
            $errors->add('hour', 'La hora "Desde" tiene que ser mayor 1h que la hora "A"');
            return redirect()->back()->with(compact('errors')); 
        }else{
            $hour->from =  $hour->convertToSQLTime($request->from);
            $hour->to =  $hour->convertToSQLTime($request->to);
            $hour->color =  $request->color;
            $hour->save();
            return redirect()->route('hours.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hour = Hour::find($id);
        return view('hour.edit', compact('hour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hour = Hour::find($id);
        $validate = $hour->validateHours($request->from, $request->to);
         if ($validate <= 0) {
            $errors = new MessageBag();
            $errors->add('hour', 'La hora "Desde" tiene que ser mayor 1h que la hora "A"');
            return redirect()->back()->with(compact('errors')); 
        }else{
            $hour->from =  $hour->convertToSQLTime($request->from);
            $hour->to =  $hour->convertToSQLTime($request->to);
            $hour->color =  $request->color;
            $hour->save();
            return redirect()->route('hours.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $hour = Hour::find($id);
        $hour->delete();
        return redirect()->route('hours.index');
    }
}
