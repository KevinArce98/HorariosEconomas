<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::all();
        return view('market.index', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('market.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Validations
        $validatedData = $request->validate([
             'name' => 'required|string',
             'location' => 'required|string',
             'description' => 'required|string'
        ]);
         
        Market::create($request->all());

        $markets = Market::all();
        return view('market.index', compact('markets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $market = Market::find($id);
        return view('market.show', compact('market'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $market = Market::find($id);
        return view('market.edit', compact('market'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          // Validations
        $validatedData = $request->validate([
             'name' => 'required|string',
             'location' => 'required|string',
             'description' => 'required|string'
        ]);
        $market = Market::find($id);
        $market->name = $request['name'];
        $market->description = $request['description'];
        $market->location = $request['location'];
        $market->save();

        $markets = Market::all();
        return view('market.index', compact('markets'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $market = Market::find($id);
        return view('market.delete', compact('market'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = Market::find($id);
        $market->delete();
        $markets = Market::all();
        return view('market.index', compact('markets'));
    }
}
