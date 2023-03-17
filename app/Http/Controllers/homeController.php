<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\destination;
use App\Models\event;
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

    public function destinasi(){
        $destinasi = destination::paginate(2);
        return view('destinasi', compact('destinasi'));
    }

    public function event(){
        $event = event::paginate(2);
        return view('event', compact('event'));
    }

    public function contri(){
        return view('contri.home');
    }

}
