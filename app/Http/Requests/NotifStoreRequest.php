<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nik' => 'required',
            'pesan' => 'required',
            'tgl_notifikasi' => 'required',
            'jenis_notifikasi' => 'required',
            'status_notifikasi' => 'required'
        ];
    }
}
