<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request){
        
        $credenciais= $request->validate([
            'email'=>['required','email'],
            'password'=> ['required'],
        ],
        ['email.required'=>'Email é obrigatorio',
        'email.email'=>'Email é obrigatorio',
        'password.required'=>'Senha é obrigatorio',]
    );
        //dd($credencias);
        if (Auth::attempt($credenciais)) {

            $request->session()->regenerate();
            //dd($request);
            return redirect()->intended(route('inicio'));
        }else {
            return redirect()->back()->with('erro','Usuario ou Senha incorreto');
        }

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('login.login');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome= $request->username;
        $email= $request->email;
        $password= $request->password;

        User::create([
            'name'=>$nome,
            'email'=>$email,
            'password'=>Hash::make($password),
        ]);
        return view('login.login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function inicio(){
        return view('layouts.layouts');
    }
}
