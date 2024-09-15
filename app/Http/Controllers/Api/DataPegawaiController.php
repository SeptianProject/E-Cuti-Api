<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiStoreRequest;
use App\Http\Requests\PegawaiUpdateRequest;
use App\Http\Resources\PegawaiResource;
use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PegawaiResource::collection(DataPegawai::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiStoreRequest $request)
    {
        return new PegawaiResource(DataPegawai::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPegawai $dataPegawai)
    {
        return new PegawaiResource($dataPegawai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PegawaiUpdateRequest $request, DataPegawai $dataPegawai)
    {
        $currentData = $dataPegawai->getAttributes();
        $validatedData = $request->validated();
        $updateData = array_merge($currentData, array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        }));

        $dataPegawai->update($updateData);

        return new PegawaiResource($dataPegawai);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPegawai $dataPegawai)
    {
        $dataPegawai->delete();
        return response()->noContent();
    }
}
