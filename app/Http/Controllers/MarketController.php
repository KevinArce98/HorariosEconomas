<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;
use App\Http\Requests\MarketRequest;
use Validator;
use Illuminate\Support\MessageBag;

class MarketController extends Controller
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
    public function store(MarketRequest $request)
    {
        $data = $request->all();

        $image = $request['picture'];
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/markets');
        $image->move($destinationPath, $input['imagename']);

        $avatar = "/img/markets/" . $input['imagename'];
        $data['picture'] = $avatar;
        Market::create($data);

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
        $rules =[
            'name'    => 'required|string',
            'location' => 'required|string',
            'description'   => 'required|string',
        ];
        $messages = [
            'name.required'     => 'El campo nombre es requerido.',
            'name.string'      => 'El campo nombre tiene que ser texto.',
            'location.required'     => 'El campo ubicación es requerido.',
            'location.string'      => 'El campo ubicación tiene que ser texto.',
            'description.required'     => 'El campo descripción es requerido.',
            'description.string'      => 'El campo descripción tiene que ser texto.',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();
        
        $market = Market::find($id);
        $market->name = $request['name'];
        $market->description = $request['description'];
        $market->location = $request['location'];
        if (isset($request['picture'])) {
            $image = $request['picture'];
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/markets');
            $image->move($destinationPath, $input['imagename']);
            $avatar = "/img/markets/" . $input['imagename'];
           $market->picture = $avatar;
        }
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
        $errors = new MessageBag();
        $market = Market::find($id);
        if(count($market->schedules) > 0){
            $errors->add('destroyMarket', 'No se puede eliminar este punto de venta porque tiene horarios.');
            return redirect()->back()->with(compact('errors'));
        }
        $market->delete();
        $markets = Market::all();
        return view('market.index', compact('markets'));
    }
}
