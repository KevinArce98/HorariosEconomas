<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Role;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'role_id' => 'required',
            'position_id' => 'required',
            'username' => 'required|string|max:20|unique:users',
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'phone.required' => 'El campo teléfono es requerido',
            'role_id.required' => 'El campo rol es requerido',
            'position_id.required' => 'El campo puesto es requerido',
            'username.required' => 'El campo nombre de usuario es requerido',
            'avatar.required' => 'El campo avatar es requerido',
            'password.required' => 'El campo contraseña es requerido',

            'name.string' => 'El campo nombre tiene que ser texto.',
            'lastname.string' => 'El campo apellido tiene que ser texto.',
            'phone.string' => 'El campo teléfono tiene que ser texto.',
            'username.string' => 'El campo nombre de usuario tiene que ser texto.',
            'password.string' => 'El campo contraseña tiene que ser texto.',

            'name.max' => 'El campo nombre tiene que tener máximo 255 caracteres.',
            'lastname.max' => 'El campo apellido tiene que tener máximo 255 caracteres.',
            'phone.max' => 'El campo teléfono tiene que tener máximo 255 caracteres.',
            'username.max' => 'El campo nombre de usuario tiene que tener máximo 20 caracteres.',

            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',

            'avatar.image'      => 'El campo foto tiene que ser una imagen.',
            'avatar.max'      => 'El tamaño de la imagen tiene que ser menor a 2mb.',
            'avatar.mimes'      => 'El formato de la imagen tiene que ser jpeg, png o jpg.',

            'username.unique' => 'El nombre de usuario ya esta en uso.',

        ]);
    }

    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $positions = Position::all();
        $roles = Role::all();
        return view('user.create', compact('roles', 'positions'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $users = User::all();
        return view('user.index', compact('users'));
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $image = $data['avatar'];
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/img/users');
        $image->move($destinationPath, $input['imagename']);

        $avatar = "/img/users/" . $input['imagename'];
        return User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'phone' => $data['phone'],
            'role_id' => $data['role_id'],
            'position_id' => $data['position_id'],
            'username' => $data['username'],
            'avatar' => $avatar,
            'password' => bcrypt($data['password']),
        ]);
    }
}
