<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
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
        $matkul = $mahasiswa->mataKuliah()->get();
        return response()->json([
            "data" => $matkul,
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
            'kode_matkul' => 'required|string|unique:mata_kuliah',
            'nama' => 'required|string',
            'sks' => 'required|integer',
            'link_kelas' => 'required|string',
            'nama_dosen' => 'required|string',
            'hari_kuliah' => 'required|string',
            'waktu_kuliah' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai'
        ]);
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where("users_id", $user->id)->first();
        $matakuliah = MataKuliah::create([
            'kode_matkul' => $request->kode_matkul,
            'nama' => $request->nama,
            'mahasiswa_nim' => $mahasiswa->nim,
            'sks' => $request->sks,
            'link_kelas' => $request->link_kelas,
            'nama_dosen' => $request->nama_dosen,
            'hari_kuliah' => $request->hari_kuliah,
            'waktu_kuliah' => $request->waktu_kuliah,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai
        ]);
        return response()->json([
            'data' => $matakuliah,
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
        $isExist = MataKuliah::where('kode_matkul', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Mata Kuliah not found"], 404);
        }
        $matakuliah = MataKuliah::find($id);
        return response()->json([
            'data' => $matakuliah
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
            'kode_matkul' => 'required|string|unique:mata_kuliah',
            'sks' => 'required|integer',
            'link_kelas' => 'required|string',
            'nama_dosen' => 'required|string',
            'hari_kuliah' => 'required|string',
            'waktu_kuliah' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after:tanggal_mulai'
        ]);
        $isExist = MataKuliah::where('kode_matkul', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Mata Kuliah not found"], 404);
        }
        $matakuliah = MataKuliah::find($id);
        $matakuliah->kode_matkul = $request->kode_matkul;
        $matakuliah->nama = $request->nama;
        $matakuliah->sks = $request->sks;
        $matakuliah->link_kelas = $request->link_kelas;
        $matakuliah->nama_dosen = $request->nama_dosen;
        $matakuliah->hari_kuliah = $request->hari_kuliah;
        $matakuliah->waktu_kuliah = $request->waktu_kuliah;
        $matakuliah->tanggal_mulai = $request->tanggal_mulai;
        $matakuliah->tanggal_selesai = $request->tanggal_selesai;
        $matakuliah->save();
        return response()->json([
            'data' => $matakuliah,
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
        $isExist = MataKuliah::where('kode_matkul', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Mata Kuliah not found"], 404);
        }
        $matakuliah = MataKuliah::find($id);
        $matakuliah->delete();
        return response()->json([
            'message' => "Mata Kuliah deleted"
        ]);
    }
}
