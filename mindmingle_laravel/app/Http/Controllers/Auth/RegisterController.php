<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'full_name' => 'required|string|regex:/^[a-zA-Z\s]+$/|min:3|max:50',
            'username' => 'required|string|unique:users|regex:/^[a-zA-Z\s]+$/|min:5|max:50',
            'email' => 'required|string|email:dns|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'regex' => 'Only letters and white space allowed'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $color = array('bg-primary', 'bg-warning', 'bg-info', 'bg-danger', 'bg-success', 'bg-dark');
        $generate = array_rand($color, 1);
        $default_pic_color = $color[$generate];

        $role = Role::select('role_id')->where('role_name', 'student')->first();

        return User::create([
            'full_name' => $data['full_name'],
            'username' => ucfirst(Str::slug($data['username'])),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $role->role_id,
            'profile_picture' => $default_pic_color,
        ]);
    }

    /**
     * The user has been registered.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect($this->redirectPath())
            : view('auth.verify');
    }
}
