<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function authorize()
    {
        return [
            'event_name.required' => 'Isi Form Nama',
            'event_location.required' => 'Isi Form Lokasi',
            'tanggal_mulai.required' => 'Isi Tanggal Mulai',
            'tanggal_akhir.required' => 'Isi Tanggal Akhir',
            'penyelenggara.required' => 'Isi Penyelenggara',
            'event_desc.required' => 'Isi Event Deskripsi',
        ];
    }

    public function rules()
    {
        return [
            'event_name' => 'required',
            'event_location' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'penyelenggara' => 'required',
            'event_desc' => 'required',
        ];
    }
}
