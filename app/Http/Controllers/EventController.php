<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event_photo;
use App\Models\event;
use App\Services\admin\adminServices;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    private adminServices $adminServices;
    public function __construct(adminServices $adminServices)
    {
        $this->adminServices = $adminServices;
    }

    public function index_event()
    {
        $user = Auth::user()->id;
        $event = event::join('event_photo', 'events.event_id', '=', 'event_photo.id')->get();
        // dd($event);
        return view('admin.events.home', compact('event'));
    }

    public function add_event()
    {
        return view('admin.events.tambah');
    }

    public function store_event(EventRequest $request)
    {
        $image_path_4 = $request->file('image_task_4')->store('image', 'public');
        $image_path_5 = $request->file('image_task_5')->store('image', 'public');
        $image_path_6 = $request->file('image_task_6')->store('image', 'public');

        $photo_event = event_photo::create([
            'event_photo1' => $image_path_4,
            'event_photo2' => $image_path_5,
            'event_photo3' => $image_path_6,
        ]);

        $data_event = event::create([
            'event_name' => $request->event_name,
            'event_id' => $request->event_id,
            'event_location' => $request->event_location,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'penyelenggara' => $request->penyelenggara,
            'event_desc' => $request->event_desc,
        ]);

        if($data_event)
        {
            return redirect()->route('event');
        } else {
            Session::flash('error', 'Tambah Data Gagal');
        }
    }

    public function edit_event($id)
    {
        $event = event::find($id);
        $photo = event_photo::find($id);

        return view('admin.events.edit', compact('event', 'photo'));
    }

    public function delete_event($id)
    {
        $data = event::destroy($id);
        $data_photo = event_photo::destroy($id);
        if (!$data && !$data_photo)
        {
            Session::flash('error', 'Delete Event Gagal');
        } else {
            Session::flash('berhasil', 'Delete Event Berhasil');
            return redirect()->route('event');
        }
    }
}
