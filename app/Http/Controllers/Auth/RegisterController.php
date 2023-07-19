<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\Pemagang;
use App\Models\Supervisor;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
    protected $redirectTo = RouteServiceProvider::HomeSupervisor;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->redirectTo = route('home');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    { 
        // dd($data);
        $user = User::create([
            'nama' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 1
        ]);   
        // echo $users->id;

        // dd($user->type);

        if($user->type == 'supervisor'){
            Supervisor::create([
                'namaSupervisor' => $user->nama,
                'userId' => $user->id,
                'noTelp' => ''
            ]);
        } elseif ($user->type == 'pemagang'){
            $magang = Pemagang::create([
                'userId' => $user->id,
                'email' => $data['email'],
                'namaPemagang' => $user['nama'],
                'namaUniversitas' => '',
                'fotoProfil' => '',
                'noTelp' => '',
            ]); 
        }
         

        // dd($users);
    
        return $user;
        // return redirect()->route('home');
        // print_r(User, Pemagang);
    }
}
