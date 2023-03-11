<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Models\dest_photo;
use App\Models\destination;
use App\Models\Photodest;
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
        $destinasi = destination::all();
        // $photodests = Photodest::all();
        // dd($photodests);
        return view('admin.destinasi.home', compact('destinasi'));
    }

    public function tambahDestinasi()
    {
        return view('admin.destinasi.tambah');
    }

    public function store(Request $request)
    {

        if ($request->hasFile("images")) {
            $data = destination::create([
                'dest_name' => $request->dest_name,
                'dest_category' => $request->dest_category,
                'dest_location' => $request->dest_location,
                'dest_desc' => $request->dest_desc,
            ]);
            $data->save();
            $files = $request->file("images");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $request['destination_id'] = $data->id;
                $request['destphoto'] = $imageName;
                $file->move(\public_path("/destinasi"), $imageName);
                Photodest::create($request->all());
            }
        }

        return redirect()->route('destinasi');
    }

    public function edit($id)
    {
        $destinasi = destination::findOrFail($id);
        // $photodests = Photodest::findOrFail($id);
        // $photo = dest_photo::find($id);
        // $posts=Post::findOrFail($id);
        // return view('edit')->with('posts',$posts);
        // dd($destinasi,$photo);
        return view('admin.destinasi.edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = destination::findOrFail($id);
        $destinasi->update([
            'dest_name' => $request->dest_name,
            'dest_category' => $request->dest_category,
            'dest_location' => $request->dest_location,
            'dest_desc' => $request->dest_desc,
        ]);

        $photodests = $destinasi->photodests;
        foreach ($photodests as $photo) {
            if (!$photo) {
                continue;
            }
            $img_id = 'image_' . $photo->id;
            
            if ($request->has($img_id)) {
                $newPhoto = $request[$img_id];
                $photoDest = Photodest::findOrFail($photo->id);
                $imageName = time() . '_' . $newPhoto->getClientOriginalName();
                $newPhoto->move(\public_path("/destinasi"), $imageName);
                $photoDest->update([
                    'destphoto' => $imageName,
                ]);
            }
        }

        return redirect()->route('destinasi');
    }

    public function delete($id)
    {
        $data = destination::destroy($id);
        $data_photo = dest_photo::destroy($id);
        if (!$data && !$data_photo) {
            Session::flash('error', 'Delete Task Gagal');
        } else {
            Session::flash('berhasil', 'Delete Task Berhasil');
            return redirect()->route('destinasi');
        }
    }
}
