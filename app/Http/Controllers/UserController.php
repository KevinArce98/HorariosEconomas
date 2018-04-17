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
        $user = User::findOrFail($id);
        $this->validator($request->all(), $user)->validate();

        if (!empty($request['password'])) {
            $this->validatePassword($request->all())->validate();
            $user->password = bcrypt($request['password']);
        }

        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->phone = $request['phone'];
        $user->role_id = $request['role_id'];
        $user->position_id = $request['position_id'];
        $user->username = $request['username'];
        if (isset($request['avatar'])) {
            $image = $request['avatar'];
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/users');
            $image->move($destinationPath, $input['imagename']);
            $avatar = "/img/users/" . $input['imagename'];
            $user->avatar = $avatar;
        }
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

    protected function validator(array $data, User $user)
    {
         return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role_id' => 'required',
            'position_id' => 'required',
            'username' => 'required|string|max:20|unique:users,username,' . $user->id,
        ], [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'phone.required' => 'El campo teléfono es requerido',
            'role_id.required' => 'El campo rol es requerido',
            'position_id.required' => 'El campo puesto es requerido',
            'username.required' => 'El campo nombre de usuario es requerido',
            'name.string' => 'El campo nombre tiene que ser texto.',
            'lastname.string' => 'El campo apellido tiene que ser texto.',
            'phone.string' => 'El campo teléfono tiene que ser texto.',
            'username.string' => 'El campo nombre de usuario tiene que ser texto.',
            'name.max' => 'El campo nombre tiene que tener máximo 255 caracteres.',
            'lastname.max' => 'El campo apellido tiene que tener máximo 255 caracteres.',
            'phone.max' => 'El campo teléfono tiene que tener máximo 255 caracteres.',
            'username.max' => 'El campo nombre de usuario tiene que tener máximo 20 caracteres.',
            'username.unique' => 'El nombre de usuario ya esta en uso.',
        ]);
    }

    protected function validatePassword(array $data)
    {
         return Validator::make($data, [
            'password' => 'required|string|min:6|confirmed',
        ], [
            'password.required' => 'El campo contraseña es requerido',
            'password.string' => 'El campo contraseña tiene que ser texto.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
        ]);
    }
}
