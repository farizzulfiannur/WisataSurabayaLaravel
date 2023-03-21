<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\photoevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    public function indexEvent(){
        $user = Auth::user()->id;
        $event = event::paginate(2);
        return view('admin.event.home', compact('event'));
    }

    public function tambahEvent()
    {
        return view('admin.event.tambah');
    }

    public function storeEvent(Request $request)
    {

        if ($request->hasFile('cover')) {
            $file = $request->file("cover");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);
            $data = event::create([
                'event_name' => $request->event_name,
                'event_location' => $request->event_location,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_akhir' => $request->tanggal_akhir,
                'event_desc' => $request->event_desc,
                'event_penyelenggara' => $request->event_penyelenggara,
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
                $file->move(\public_path("event/"), $imageName);
                photoevent::create($request->all());
            }
        }

        return redirect()->route('event');
    }

    public function editEvent($id){
        $event = event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        $event = event::findOrFail($id);
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
            'tanggal_mulai' => $request -> tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'event_cover' => $event->event_cover,
            'event_desc' => $request->event_desc,
            'event_penyelenggara' => $request->event_penyelenggara,
        ]);

        $photoevents =  $event->photoevents;
        foreach ($photoevents as $photo) {
            if (!$photo) {
                continue;
            }

            $img_id = 'image_' . $photo->id;

            if ($request->has($img_id)) {
                $newPhoto = $request[$img_id];
                $photoDest = photoevent::findOrFail($photo->id);
                $imageName = time() . '_' . $newPhoto->getClientOriginalName();
                $newPhoto->move(\public_path("/event"), $imageName);
                $photoDest->update([
                    'eventphoto' => $imageName,
                ]);
            }
        }

        return redirect()->route('event');
    }

    public function deleteEvent($id)
    {
        $event = event::findOrFail($id);
        $photoevents = photoevent::where("event_id", $event->id)->get();

        foreach ($photoevents as $photo) {
            if (File::exists('event/' . $photo->eventphoto)) {
                File::delete("event/" . $photo->eventphoto);
            }
        }
        // destination::destroy($id);
        $event->delete();
        return back();
    }

    public function searchEvent(Request $request)
    {
        if ($request->search) {
            $event =  event::where('event_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_desc', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_location', 'LIKE', '%' . $request->search . '%')
            ->orWhere('event_cover', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_mulai', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tanggal_akhir', 'LIKE', '%' . $request->search . '%')
            ->paginate(2);
        } else {
            $event = event::all();
        }

        return view('admin.event.home', compact('event'));
    }
}
