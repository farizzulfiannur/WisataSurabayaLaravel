<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Models\dest_photo;
<<<<<<< HEAD
use App\Models\event_photo;
use App\Models\destination;
use App\Models\event;
=======
use App\Models\destination;
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
use App\Services\admin\adminServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    private adminServices $adminServices;
    public function __construct(adminServices $adminServices)
    {
        $this->adminServices = $adminServices;
    }

    public function index()
    {
        $user = Auth::user()->id;
        $destinasi = destination::join('dest_photos', 'destinations.dest_id', '=', 'dest_photos.id')->get();
<<<<<<< HEAD
        // $event = event::join('event_photos', 'events.event_id', '=', 'event_photos.id')->get();
=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
        // dd($destinasi);
        return view('admin.destinasi.home', compact('destinasi'));
    }

<<<<<<< HEAD
    public function index_event()
    {
        $user = Auth::user()->id;
        $event = event::join('event_photo', 'events.event_id', '=', 'event_photos.id')->get(); 
        //Masih dipertanyakan

        return view('admin.event.home', compact('event'));
    }

=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
    public function tambahDestinasi()
    {
        return view('admin.destinasi.tambah');
    }

<<<<<<< HEAD
    public function tambahEvent()
    {
        return view ('admin.event.tambah');
    }

=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
    public function store(adminRequest $request)
    {
        $image_path_1 = $request->file('image_task_1')->store('image', 'public');
        $image_path_2 = $request->file('image_task_2')->store('image', 'public');
        $image_path_3 = $request->file('image_task_3')->store('image', 'public');

        // $image_path_1 = $request->file('image_task_1');
        // $image_path_2 = $request->file('image_task_2');
        // $image_path_3 = $request->file('image_task_3');
        // $image_path_1->storeAs('public', $image_path_1->hashName());
        // $image_path_2->storeAs('public', $image_path_2->hashName());
        // $image_path_3->storeAs('public', $image_path_3->hashName());

        $photo = dest_photo::create([
            'dest_photo1' => $image_path_1,
            'dest_photo2' => $image_path_2,
            'dest_photo3' => $image_path_3,
        ]);

        $data = destination::create([
            'dest_name' => $request->dest_name,
            'dest_id' => $photo->id,
            'dest_category' => $request->dest_category,
            'dest_location' => $request->dest_location,
            'dest_desc' => $request->dest_desc,
        ]);
        if($data){
            return redirect()->route('destinasi');
        }else{
            Session::flash('error','Tambah Data Gagal');
        }
    }

<<<<<<< HEAD
    public function store_event(adminRequest $request)
    {
        $image_path_4 = $request->file('image_task_4')->store('image', 'public');
        $image_path_5 = $request->file('image_task_5')->store('image', 'public');
        $image_path_6 = $request->file('image_task_6')->store('image', 'public');

        $photo_ev = event_photo::create([
            'event_photo1' => $image_path_4,
            'event_photo2' => $image_path_5,
            'event_photo3' => $image_path_6,
        ]);

        $data_event = event::create([
            'event_id' => $photo_ev->id,
            'event_name' => $request->event_name,
            'event_location' => $request->event_location,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'penyelenggara' => $request->penyelenggara,
            'event_desc' => $request->event_desc,
        ]);
    }

=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
    public function edit($id){
        $destinasi = destination::find($id);
        $photo = dest_photo::find($id);
        // dd($destinasi,$photo);
        return view('admin.destinasi.edit',compact('destinasi','photo'));
    }

<<<<<<< HEAD
    public function edit_event($id){
        $event = event::find($id);
        $event_photo = event_photo::find($id);
        return view('admin.event.edit',compact('event','photo'));
    }

=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
    public function delete($id)
    {
        $data = destination::destroy($id);
        $data_photo = dest_photo::destroy($id);
        if (!$data && !$data_photo){
            Session::flash('error','Delete Task Gagal');
        }else{
            Session::flash('berhasil','Delete Task Berhasil');
            return redirect()->route('destinasi');
        }
    }
<<<<<<< HEAD

    public function delete_event($id){
        $data = event::destroy($id);
        $data_event = event_photo::destroy($id);
        if (!$data && !$data_event){
            Session::flash('error','Delete Event Gagal');
        } else {
            Session::flash('berhasil','Delete Event Berhasil');
            return redirect()->route('event');
        }
    }
=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
}
