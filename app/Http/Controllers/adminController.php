<?php

namespace App\Http\Controllers;

use App\Http\Requests\adminRequest;
use App\Models\dest_photo;
use App\Models\destination;
use App\Models\Photodest; //
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

    public function index_dest()
    {
        $user = Auth::user()->id;
        $destinasi = destination::join('dest_photos', 'destinations.dest_id', '=', 'dest_photos.id')->get();
        // dd($destinasi);
        return view('admin.destinasi.home', compact('destinasi'));
    }



    public function add_dest()
    {
        return view('admin.destinasi.tambah');
    }

    public function store_dest(adminRequest $request)
    {
        if ($request->hasFile("images"))
        {
            $data = destination::create([
                'dest_name' => $request->dest_name,
                'dest_category' => $request->dest_category,
                'dest_location' => $request->dest_location,
                'dest_desc' => $request->dest_desc,
            ]);
            $data -> save();
            $files = $request->file("images");
            foreach ( $files as $file )
            {
                $imageName = time() . "_" . $file->getClientOriginalFilename();
                $request['dest_id'] = $data->id;
                $request['dest_photo'] = $imageName;
                $file->move(\public_path("/destinasi"), $imageName);
                Photodest::create($request->all());
            }
        }

        return redirect()->route('destinasi');

        // $image_path_1 = $request->file('image_task_1')->store('image', 'public');
        // $image_path_2 = $request->file('image_task_2')->store('image', 'public');
        // $image_path_3 = $request->file('image_task_3')->store('image', 'public');

        // $image_path_1 = $request->file('image_task_1');
        // $image_path_2 = $request->file('image_task_2');
        // $image_path_3 = $request->file('image_task_3');
        // $image_path_1->storeAs('public', $image_path_1->hashName());
        // $image_path_2->storeAs('public', $image_path_2->hashName());
        // $image_path_3->storeAs('public', $image_path_3->hashName());

        // $photo = dest_photo::create([
        //     'dest_photo1' => $image_path_1,
        //     'dest_photo2' => $image_path_2,
        //     'dest_photo3' => $image_path_3,
        // ]);

        // $data = destination::create([
        //     'dest_name' => $request->dest_name,
        //     'dest_id' => $photo->id,
        //     'dest_category' => $request->dest_category,
        //     'dest_location' => $request->dest_location,
        //     'dest_desc' => $request->dest_desc,
        // ]);
        // if($data){
        //     return redirect()->route('destinasi');
        // }else{
        //     Session::flash('error','Tambah Data Gagal');
        // }
    }

    public function edit_dest($id){
        $destinasi = destination::findOrFail($id);
        // $photo = dest_photo::find($id);
        // dd($destinasi,$photo);
        return view('admin.destinasi.edit',compact('destinasi'));
    }

    public function update_dest(adminRequest $request, $id)
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

    public function delete_dest($id)
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


}
