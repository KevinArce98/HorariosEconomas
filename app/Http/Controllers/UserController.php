<?php

namespace App\Http\Controllers;

use App\User;
use App\Position;
use App\Role;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        $users = User::all();
        return view('user.index', compact('users'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $positions = Position::all();
        $roles = Role::all();

        return view('user.edit', compact('user','roles', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $user = User::findOrFail($id);

        if (!empty($request['password'])) {
            $user->password = bcrypt($request['password']);
        }

        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->phone = $request['phone'];
        $user->role_id = $request['role_id'];
        $user->position_id = $request['position_id'];
        $user->username = $request['username'];
        $user->avatar = $request['avatar'];

        $user->save();

        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        return view('user.delete', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $errors = new MessageBag();
        $user = User::find($id);
        if(count($user->schedules) > 0){
            $errors->add('destroyUser', 'No se puede eliminar este usuario porque tiene horarios.');
            return redirect()->back()->with(compact('errors'));
        }
        $user->delete();

        $users = User::all();
        return view('user.index', compact('users'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role_id' => 'required',
            'position_id' => 'required',
            'username' => 'required|string|max:20',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    }
}
