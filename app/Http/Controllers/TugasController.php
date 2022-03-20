<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Tugas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where("users_id", $user->id)->first();
        return response()->json([
            "data" => $mahasiswa->tugas()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            "kode_matkul_id" => 'required|string|exists:mata_kuliah,kode_matkul',
            "nama" => 'required|string',
            "tanggal_pengumpulan" => 'required|date',
            "link_pengumpulan" => 'required|string',
        ]);
        $tugas = Tugas::create([
            "kode_matkul_id" => $request->kode_matkul_id,
            "nama" => $request->nama,
            "tanggal_pengumpulan" => $request->tanggal_pengumpulan,
            "link_pengumpulan" => $request->link_pengumpulan,
            "status" => false
        ]);
        return response()->json([
            'data' => $tugas,
            'message' => 'data created successfully'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $isExist = Tugas::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Tugas not found"], 404);
        }
        $tugas = Tugas::find($id);
        return response()->json([
            'data' => $tugas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "kode_matkul_id" => 'required|string|exists:mata_kuliah,kode_matkul',
            "nama" => 'required|string',
            "tanggal_pengumpulan" => 'required|date',
            "link_pengumpulan" => 'required|string',
            "status" => 'required|boolean'
        ]);
        $isExist = Tugas::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Tugas not found"], 404);
        }
        $tugas = Tugas::find($id);
        $tugas->kode_matkul_id = $request->kode_matkul_id;
        $tugas->nama = $request->nama;
        $tugas->tanggal_pengumpulan = $request->tanggal_pengumpulan;
        $tugas->link_pengumpulan = $request->link_pengumpulan;
        $tugas->status = $request->status;
        $tugas->save();
        return response()->json([
            'data' => $tugas,
            'message' => 'data updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $isExist = Tugas::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Tugas not found"], 404);
        }
        Tugas::destroy($id);
        return response()->json([
            'message' => "Tugas deleted"
        ]);
    }
}
