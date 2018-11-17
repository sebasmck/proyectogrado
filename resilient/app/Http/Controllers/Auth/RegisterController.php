<?php

namespace App\Http\Controllers\Auth;

use App\Cuidador;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/handleAuthentication';

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
        $messages = [
            'unique' => 'El :attribute ya existe en nuestros registros por favor escoja otro',
            'max' => 'el campo :attribute excede el máximo permitido',
            'string' => 'el campo :attribute debe contener caracteres alfanuméricos'
        ];

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->id_estado = 1;
        $user->save();

       $cuidador = new Cuidador();
       $cuidador->Nombre_Acudiente = $data['name'];
       $cuidador->Apellido_Acudiente = $data['last-name'];
       $cuidador->Id_TipoDocumento = $data['tipo-documento'];
       $cuidador->NumeroDocumento_Acudiente = $data['identity-id'];
       $cuidador->Correo_Acudiente = $data['email'];
       $cuidador->id_usuario = $user->id;

       $cuidador->save();

        return $user;
    }

    protected function goToMain(){
        return view('welcome');
    }


}
