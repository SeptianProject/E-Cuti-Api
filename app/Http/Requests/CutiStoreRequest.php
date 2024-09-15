<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiStoreRequest extends FormRequest
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
            'id_jabatan' => 'required',
            'nama_pegawai' => 'required',
            'mulai_cuti' => 'required',
            'akhir_cuti' => 'required',
            'id_jenis_cuti' => 'required',
            'jumlah_cuti' => 'required',
            'sisa_cuti' => 'required',
            'keterangan' => 'required',
            'status_cuti' => 'required',
            'tgl_updated_status' => 'required',
        ];
    }
}
