<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CutiStoreRequest;
use App\Http\Requests\CutiUpdateRequest;
use App\Http\Resources\CutiResource;
use App\Http\Resources\KalenderResource;
use App\Models\DataCuti;
use App\Models\DataJenisCuti;
use Illuminate\Http\Request;

class DataCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CutiResource::collection(DataCuti::all());
    }

    public function indexKalenderCuti()
    {
        return KalenderResource::collection(DataCuti::all());
    }

    public function showKalenderCuti($kalender)
    {
        $dataCuti = DataCuti::where('id_cuti', $kalender)->firstOrFail();
        return new KalenderResource($dataCuti);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CutiStoreRequest $request)
    {
        return new CutiResource(DataCuti::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DataCuti $dataCuti)
    {
        return new CutiResource($dataCuti);
    }

    public function showByNik($nik)
    {
        $dataCuti = DataCuti::where('nik', $nik)->firstOrFail();

        return new CutiResource($dataCuti);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CutiUpdateRequest $request, DataCuti $dataCuti)
    {
        $currentData = $dataCuti->getAttributes();
        $validatedData = $request->all();
        $updateData = array_merge($currentData, array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        }));

        $dataCuti->update($updateData);

        return new CutiResource($dataCuti);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataCuti $dataCuti)
    {
        $dataCuti->delete();
        return response()->noContent();
    }
}
