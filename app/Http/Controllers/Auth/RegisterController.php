<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:120', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'role' => ['required', Rule::in([User::SELLER, User::BUYER])],
        ]);
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
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
    public function registered(Request $request, $user)
    {
        if ($request->ajax()) {
            return response()->json(['message' => __('Muchas gracias por registrarse')]);
        }
        if (auth()->user() == 'SELLER') {
            return redirect()->route('seller.index')->with('status', 'Te has registrado correctamente, ya puedes acceder a tu perfil');
        } else {
            return redirect()->route('registro')->with('status', 'Te has registrado correctamente, ya puedes acceder a tu perfil');
        }

    }

    public function redirectPath()
    {
        // si el usuario que se ha identificado es vendedor, lo redireccionamos al perfil de vendedor y si no a la raiz

        if (auth()->user()->isSeller()) {
            return '/seller';
        }
        return "/";
    }
}
