<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NotifStoreRequest;
use App\Http\Requests\NotifUpdateRequest;
use App\Http\Resources\NotifikasiResource;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return NotifikasiResource::collection(Notifikasi::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotifStoreRequest $request)
    {
        return new NotifikasiResource(Notifikasi::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Notifikasi $notifikasi)
    {
        return new NotifikasiResource($notifikasi);
    }

    public function showByNik($nik)
    {
        $notifikasi = Notifikasi::where('nik', $nik)->get();

        return NotifikasiResource::collection($notifikasi);
    }

    public function showByStatus($status)
    {
        $notifikasi = Notifikasi::where('status_notifikasi', $status)->get();

        return NotifikasiResource::collection($notifikasi);
    }

    public function showByNikAndStatus($nik, $status)
    {
        $notifikasi = Notifikasi::where('nik', $nik)->where('status_notifikasi', $status)->get();
        return NotifikasiResource::collection($notifikasi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotifUpdateRequest $request, Notifikasi $notifikasi)
    {
        $currentData = $notifikasi->getAttributes();
        $validatedData = $request->validated();
        $updateData = array_merge($currentData, array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        }));

        $notifikasi->update($updateData);
        return new NotifikasiResource($notifikasi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notifikasi $notifikasi)
    {
        $notifikasi->delete();
        return response()->noContent();
    }
}
