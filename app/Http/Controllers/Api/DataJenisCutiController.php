<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisCutiRequest;
use App\Http\Resources\JenisCutiResource;
use App\Models\DataJenisCuti;
use Illuminate\Http\Request;

class DataJenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JenisCutiResource::collection(DataJenisCuti::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JenisCutiRequest $request)
    {
        return new JenisCutiResource(DataJenisCuti::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(DataJenisCuti $dataJenisCuti)
    {
        return new JenisCutiResource($dataJenisCuti);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisCutiRequest $request, DataJenisCuti $dataJenisCuti)
    {
        $currentData = $dataJenisCuti->getAttributes();
        $validatedData = $request->validated();
        $updateData = array_merge($currentData, array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        }));

        $dataJenisCuti->update($updateData);

        return new JenisCutiResource($dataJenisCuti);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataJenisCuti $dataJenisCuti)
    {
        $dataJenisCuti->delete();
        return response()->noContent();
    }
}
