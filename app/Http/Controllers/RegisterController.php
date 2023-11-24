<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use function Laravel\Prompts\password;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }
    public function store(Request $request) {

        $request->request->add(['username'=>Str::slug($request->username)]);

        $this->validate($request, [
            'name'=>'required | max:30',
            'username'=>'required | unique:users|min:3|max:30',
            'email' =>'required | unique:users|email|max:60',
            'password' =>'required|confirmed|min:6'
        ]);
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        /*auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('post.index', auth()->user());
    }
}
