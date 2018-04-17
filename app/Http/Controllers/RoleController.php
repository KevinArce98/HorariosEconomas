<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;


class RoleController extends Controller
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
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
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
             'description' => 'required|string'
        ]);

        //Save Model Role
        Role::create($request->all());

         $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validations
        $validatedData = $request->validate([
             'name' => 'required|string',
             'description' => 'required|string'
        ]);

        $role = Role::find($id);
        $role->name = $request['name'];
        $role->description = $request['description'];
        $role->save();

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $role = Role::find($id);
        return view('roles.delete', compact('role'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errors = new MessageBag();
        $role = Role::find($id);
        if(count($role->users) > 0){
            $errors->add('destroyRole', 'No se puede eliminar este rol porque tiene usuarios.');
            return redirect()->back()->with(compact('errors'));
        }
        $role->delete();

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
}
