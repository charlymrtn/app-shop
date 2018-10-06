<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:15|min:10',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ];
        $messages = [
            'name.required' => 'Campo obligatorio',
            'username.required' => 'Campo obligatorio',
            'email.required' => 'Campo obligatorio',
            'password.required' => 'Campo obligatorio',
            'phone.required' => 'Campo obligatorio',
            'address.required' => 'Campo obligatorio',
            'username.unique' => 'este usuario ya ha sido tomado.',
            'email.unique' => 'este correo ya ha sido usado.',
            'password.min' => 'la contraseña debe de ser mínimo de 3 carácteres',
            'password.confirmed' => 'las contraseñas no coínciden',
            'phone.max' => 'Máximo 15 carácteres',
            'phone.min' => 'Mínimo 10 carácteres',
        ];
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        return view('auth.register')->with(compact('name','email'));
    }
}
