<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdateRequest extends FormRequest
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
            'nik' => 'nullable',
            'id_jabatan' => 'nullable',
            'nama_pegawai' => 'nullable',
            'tempat_lahir' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'jenis_kelamin'  => 'nullable',
            'nomer_telepon'  => 'nullable',
            'status'  => 'nullable',
            'pendidikan'  => 'nullable',
            'alamat'  => 'nullable'
        ];
    }
}
