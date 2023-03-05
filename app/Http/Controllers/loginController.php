<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function prosesLogin(Request $request){
        $data = [
            'email' => $request->email,
            'password' =>$request->password
        ];

        if(Auth::attempt($data)){
            // dd('Berhasil Login');
            $role = Auth::user()->role;
            if($request->user()->role == User::ROLE_ADMIN){
                return redirect()->route('admin');
<<<<<<< HEAD
            }else{
=======
            }else {
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
                return redirect()->route('contri');
            }
        }else{
            // dd('Gagal Login');
<<<<<<< HEAD
            Session::flash('error','Gagal Login');
=======
            Session::flash('gagal','Email / Password Anda Salah');
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
            return redirect()->route('login');
        }
    }
}
