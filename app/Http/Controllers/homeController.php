<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function home(){
        return view('home');
    }
    public function admin(){
        return view('admin.home');
    }
    public function contri(){
        return view('contri.home');
    }

}
