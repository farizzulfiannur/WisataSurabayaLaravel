<?php

namespace App\Http\Controllers;

use App\Models\destination;
use App\Models\Event;
use App\Models\eventbaru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function home(){
        $home = Auth::user();
        $destinasi = destination::inRandomOrder()->limit(3)->get();
        // dd($destinasi);
        return view('home', compact('home','destinasi'));
    }


    public function admin(){
        return view('admin.home');
    }
    public function contri(){
        return view('contri.home');
    }

    public function destinasi(){
        $destinasi = destination::paginate(6);
        return view('destinasi',compact('destinasi'));
    }

    public function event(){
        $event = Event::paginate(6);
        return view('event', compact('event'));
    }

    public function detail($id){
        $destinasi = destination::findOrFail($id);
        return view('detaildestinasi', compact('destinasi'));
    }

    public function detailEvent($id){
        $event = event::findOrFail($id);
        return view('detailevent', compact('event'));
    }

    public function filter(Request $request){
        $destinasi = destination::where('dest_category', 'LIKE', '%' . $request->selectcategory . '%')
            ->paginate(6);
        $destinasi->withPath('filter');
        $destinasi->appends($request->all());
        return view('destinasi',compact('destinasi'));
    }

    public function filterEvent(Request $request){

        $event =  event::where('event_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_desc', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_location', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_cover', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_mulai', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_akhir', 'LIKE', '%' . $request->search . '%')
            ->paginate(6);
        
        $event->withPath('filter');
        $event->appends($request->all());
        return view('event', compact('event'));
    }

    public function team(){
        return view('card');
    }
}
