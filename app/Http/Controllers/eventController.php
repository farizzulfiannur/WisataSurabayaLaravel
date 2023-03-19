<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Photoevent;
use App\Models\Event_photo;
use App\Models\eventbaru;
use App\Models\photoeventbaru;
use App\Services\admin\adminServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class eventController extends Controller
{
    // public function __construct(adminServices $adminServices)
    // {
    //     $this->adminServices = $adminServices;
    // }

    public function index_event()
    {
        $user = Auth::user()->id;
        $event = eventbaru::paginate(2);
        return view('admin.event.home', compact('event'));
    }

    public function addEvent()
    {
        return view('admin.event.tambah');
    }

    public function store_event(Request $request)
    {

        if ($request->hasFile('cover')) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);
            $data = eventbaru::create([
                'event_name' => $request->event_name,
                'event_location' => $request->event_location,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'event_desc' => $request->event_desc,
                'event_cover' => $imageName,
            ]);
            $data->save();
        }

        if ($request->hasFile("images")) {
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['event_id'] = $data->id;
                $request['eventphoto'] = $imageName;
                $file->move(\public_path("/event"), $imageName);
                photoeventbaru::create($request->all());
            }
        }

        return redirect()->route('event');
    }

    public function edit_event($id)
    {
        $event = eventbaru::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function update_event(Request $request, $id)
    {
        $event = eventbaru::findOrFail($id);
        if ($request->hasFile("cover")) {
            if (File::exists("cover/" . $event->event_cover)) {
                File::delete("cover/" . $event->event_cover);
            }
            $file = $request->file("cover");
            $event->event_cover = time() . "_" . $file->getClientOriginalName();
            $file->move(\public_path("/cover"), $event->event_cover);
            $request['cover'] = $event->event_cover;
        }
        $event->update([
            'event_name' => $request->event_name,
            'event_location' => $request->event_location,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'event_desc' => $request->event_desc,
            'event_cover' => $event->event_cover,
        ]);

        $photoevent =  $event->photoevent;
        foreach ($photoevent as $photo) {
            if (!$photo) {
                continue;
            }

            $img_id = 'image_' . $photo->id;

            if ($request->has($img_id)) {
                $newPhoto = $request[$img_id];
                $photoevent = photoeventbaru::findOrFail($photo->id);
                $imageName = time() . '_' . $newPhoto->getClientOriginalName();
                $newPhoto->move(\public_path("/event"), $imageName);
                $photoevent->update([
                    'eventphoto' => $imageName,
                ]);
            }
        }

        return redirect()->route('event');
    }

    public function delete_event($id)
    {
        $event = eventbaru::findOrFail($id);
        $photoevent = photoeventbaru::where("event_id", $event->id)->get();

        foreach ($photoevent as $photo) {
            if (File::exists('event/' . $photo->eventphoto)) {
                File::delete("event/" . $photo->eventphoto);
            }
        }
        // destination::destroy($id);
        $event->delete();
        return back();
    }

    public function search_event(Request $request)
    {
        if ($request->search) {
            $event =  eventbaru::where('event_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_mulai', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_akhir', 'LIKE', '%' . $request->search . '%')
            ->paginate(2);
        } else {
            $event = eventbaru::all();
        }

        return view('admin.event.home', compact('event'));
    }
}

