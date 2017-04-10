<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('admin');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed',
            'empresa' =>'required|unique:users,empresa',
            'RFC' => 'required',
            'direccion' => 'required',
            'tel1' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        User::create([
            'empresa' => $data['empresa'],
            'email' => $data['email'],
            'name' => $data['name'],            
            'direccion' => $data['direccion'],
            'RFC' => $data['RFC'],
            'tel1' => $data['tel1'],
            'tel2' => $data['tel2'],
            'cel1' => $data['cel1'],
            'cel2' => $data['cel2'],
//            'password' => bcrypt($data['password']),
            'password' => bcrypt('prueba'),
            
            
        ]);
        
        return User::where('id', 1)->first();
        
//        echo 'create';
    }
    public function customResgister(Request $request) {                                              
         
         $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
            'empresa' =>'required|unique:users,empresa',
            'RFC' => 'required',
            'direccion' => 'required',
            'tel1' => 'required',               
            ]); 
//         
//         $request->name = strtoupper($request->name);
//         $request->email = strtoupper($request->email);
//         $request->empresa = strtoupper($request->empresa);
//         $request->RFC = strtoupper($request->RFC);
//         $request->direccion = strtoupper($request->direccion);
         
//         $password = substr($request->name,0,3) . substr($request->empresa,0,5);
//         echo $password;
         
//         echo $request->name;
         
         User::create([
            'empresa' => $request->empresa,
            'email' => $request->email,
            'name' => $request->name,
            'direccion' => $request->direccion,
            'RFC' => $request->RFC,
            'tel1' => $request->tel1,
            'tel2' => $request->tel2,
            'cel1' => $request->cel1,
            'cel2' => $request->cel2,
            'password' => bcrypt($request->password),
//            'password' => bcrypt('prueba'),
        ]); 
//         
        return back()->with(['msj' => 'Contacto creado']);
    }
}
