<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use Illuminate\Support\MessageBag;

class PositionController extends Controller
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
        $positions = Position::all();
        return view('position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {

       //Save Model Position
       Position::create($request->all());

        $positions = Position::all();
       return view('position.index', compact('positions'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        return view('position.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
       $position = Position::find($id);
       $position->name = $request['name'];
       $position->description = $request['description'];
       $position->payforhour = $request['payforhour'];
       $position->save();

       $positions = Position::all();
       return view('position.index', compact('positions'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errors = new MessageBag();
        $position = Position::find($id);
        if(count($position->users) > 0){
            $errors->add('destroyPosition', 'No se puede eliminar este puesto porque tiene usuarios.');
            return redirect()->back()->with(compact('errors'));
        }
        $position->delete();

        $positions = Position::all();
        return view('position.index', compact('positions'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $position = Position::find($id);
        return view('position.delete', compact('position'));
    }
}
