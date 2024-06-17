<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function signIn()
    {
        return view('sign.in.index');
    }

    public function signUp()
    {
        return view('sign.up.index');
    }

    public function checkSignIn(Request $request)
    {
        $request->validate([
            'password' => 'string|max:100',
            'email' => 'email',
        ]);  

        $data = $request->only('email', 'password');
        $data['UserEmail'] = $data['email'];
        unset($data['email']);
    
        if (auth()->attempt($data)) {

            $user = auth()->user();

            if ($user->RoleID == 1) {
                return redirect()->route('product.index');          
            } elseif ($user->RoleID == 2) {
                return redirect()->route('home.index');          
            }
        }

        return redirect()->back()->with('error', 'Email or password is wrong');
    }    

    public function checkSignUp(){
        // request()->validate([
        //     'name' => 'string|max:50',
        //     'email' => 'email|unique:users,email',
        //     'password' => 'string|max:100',
        //     'confirmpassword' => 'string|max:100|same:password',
        // ]);

        $data = request()->only('email','name');
        $data['UserEmail'] = $data['email'];
        unset($data['email']);
        $data['RoleID'] = 2;
        $data['password'] = bcrypt(request('password'));

        User::create($data);
        return redirect()->route('login')->with('success', 'Account successfully created');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home.index');
    }
}
