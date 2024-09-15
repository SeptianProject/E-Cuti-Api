<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanRequest;
use App\Http\Resources\JabatanResource;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return JabatanResource::collection(Jabatan::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanRequest $request)
    {
        return new JabatanResource(Jabatan::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return new JabatanResource($jabatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanRequest $request, Jabatan $jabatan)
    {
        $currentData = $jabatan->getAttributes();
        $validatedData = $request->validated();
        $updateData = array_merge($currentData, array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        }));

        $jabatan->update($updateData);

        return new JabatanResource($jabatan);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return response()->noContent();
    }
}
