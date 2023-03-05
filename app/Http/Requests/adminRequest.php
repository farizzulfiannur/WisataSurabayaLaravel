<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class adminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
<<<<<<< HEAD

=======
    
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'dest_name.required' => 'Isi Form Nama',
            'dest_category.required' => 'Pilih Kategori',
            'dest_location.required' => 'Isi Form Lokasi',
            'dest_desc.required' => 'Tambahkan Deskripsi',
            'image_task_1.required' => 'Tambahkan Foto',
        ];
    }
<<<<<<< HEAD

    public function msgEvent()
    {
        return [
            'event_name.required' => 'Isi Nama Event',
            'event_location.required' => 'Isi Lokasi',
            'tanggal_mulai.required' => 'Isi tanggal mulai',
            'tanggal_akhir.required' => 'Isi tanggal selesai',
            'penyelenggara.required' => 'Isi Penyelenggara',
            'event_desc.required' => 'Isi Deskripsi',
        ];
    }

=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
    public function rules()
    {
        return [
            'dest_name' => 'required',
            'dest_category' => 'required',
            'dest_location' => 'required',
            'dest_desc' => 'required',
            'image_task_1' => 'required',
<<<<<<< HEAD
            'event_name' => 'required',
            'event_location' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'penyelenggara' => 'required',
            'event_desc' => 'required',
=======
>>>>>>> ade34ea82bbfe3cee5dd489f13c0aa23a43f19fe
        ];
    }
}
