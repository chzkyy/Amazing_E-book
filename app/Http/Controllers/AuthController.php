<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    //

    public function getLogin()
    {
        return view('auth.login');
    }

    public function getRegister()
    {
        return view('auth.register',[
            'gender' => Gender::all(),
            'role'   => Role::all(),
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }
        return back();
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name'    => ['required', 'string', 'max:25'],
            'middle_name'   => ['max:25', 'string', 'nullable'],
            'last_name'     => ['required', 'string', 'max:25'],
            'email'         => ['required ', 'email', 'unique:users'],
            'picture'       => ['required', 'file', 'image', 'mimes:jpeg,jpg,png'],
            'password'      => ['required', 'string', 'min:8'],
            'gender_id'     => ['required'],
            'role_id'       => ['required'],
        ]);

        $password = Hash::make($request->password);
        $images = $request->file('picture');
        User::create([
            'first_name'   => $request->first_name,
            'middle_name'  => $request->middle_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'gender_id'    => $request->gender_id,
            'password'     => $password,
            'role_id'      => $request->role_id,
            'picture'      => $images->getClientOriginalName(),
        ]);
        $images->move(public_path('img'), $images->getClientOriginalName());
        return redirect()->route('get.login')->with('success', 'Register Successfully');
    }

    public function logout()
    {
        Auth::logout();
        return view('pages.logout');
    }

    public function getProfile()
    {
        return view('auth.profile', [
            'user'      => User::find(Auth::user()->id),
            'gender'    => Gender::all(),
            'role'      => Role::all(),
            'title'     => 'Profile',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name'    => ['required', 'string', 'max:25'],
            'middle_name'   => ['max:25', 'string', 'nullable'],
            'last_name'     => ['required', 'string', 'max:25'],
            'email'         => ['required ', 'email'],
            'picture'       => ['required', 'file', 'image', 'mimes:jpeg,jpg,png'],
            'password'      => ['required', 'string', 'min:8'],
            'gender_id'     => ['required'],
            'role_id'       => ['required'],
        ]);

        $password = Hash::make($request->password);
        $images = $request->file('picture');

        User::find(Auth::user()->id)->update ([
            'first_name'   => $request->first_name,
            'middle_name'  => $request->middle_name,
            'last_name'    => $request->last_name,
            'email'        => $request->email,
            'gender_id'    => $request->gender_id,
            'password'     => $password,
            'role_id'      => $request->role_id,
            'picture'      => $images->getClientOriginalName(),
        ]);
        $images->move(public_path('img'), $images->getClientOriginalName());
        
        return view('pages.saved',[
            'title' => 'Profile Updated',
        ]);
    }
}
