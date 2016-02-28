<?php

namespace App\Http\Controllers\Auth;

use Lang;
use Auth;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|username|unique:users',
            'password' => 'required|min:6',
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);

        $user->assignRole('user');

        return $user;
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if (!isset($data['name'])) {
            $data['name'] = $data['username'];
        }

        $validator = $this->validator($data);

        if ($validator->fails()) {
            return redirect(route('auth.register'))
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        $this->create($data);

        return redirect(route('auth.login'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $identifier = $request->input('identifier');
        $password = $request->input('password');

        $data = ['identifier' => $identifier];
        $rules = ['identifier' => 'email'];

        $isEmail = Validator::make($data, $rules)->passes();

        if ($isEmail) {
            if (Auth::attempt(['email' => $identifier, 'password' => $password])) {
                return redirect()->intended(route('home'));
            }
        } else {
            if (Auth::attempt(['username' => $identifier, 'password' => $password])) {
                return redirect()->intended(route('home'));
            }
        }

        return redirect()
            ->back()
            ->withErrors(Lang::get('auth.failed'))
            ->withInput(['identifier' => $identifier]);
    }
}
