<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CutiUpdateRequest extends FormRequest
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
            'mulai_cuti' => 'nullable',
            'akhir_cuti' => 'nullable',
            'id_jenis_cuti' => 'nullable',
            'jumlah_cuti' => 'nullable',
            'sisa_cuti' => 'nullable',
            'keterangan' => 'nullable',
            'status_cuti' => 'nullable',
            'tgl_updated_status' => 'nullable',
        ];
    }
}
