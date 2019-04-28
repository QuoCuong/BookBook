<?php

namespace Book\Http\Controllers\Auth;

use Book\Http\Controllers\Controller;
use Book\Http\Requests\RegisterRequest;
use Book\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/';

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
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $data = $request->all();
        
        if (!empty($data['birthday'])) {
            $data['birthday'] = convert_to_default_date_format($data['birthday']);
        }
        $data['password'] = bcrypt($data['password']);
        $data['role_id']  = 2;

        $user = User::create($data);

        Auth::guard()->login($user);

        return $this->registered($request, $user)
        ?: redirect($this->redirectPath());
    }
}
