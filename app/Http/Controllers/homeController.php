<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function home(){
        $home = Auth::user();
        return view('home', compact('home'));
    }

    // public function destinasi() {
    //     $destinasi = destination::paginate(2);
    //     return view('destinasi', compact('destinasi'));
    // }

    public function admin(){
        return view('admin.home');
    }
    public function contri(){
        return view('contri.home');
    }

    public function destinasi(){
        $destinasi = destination::paginate(9);
        return view('destinasi',compact('destinasi'));
    }

    public function detail($id){
        $destinasi = destination::findOrFail($id);
        return view('detaildestinasi', compact('destinasi'));
    }

}
