<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json([
            "data" => auth()->user()->mahasiswa->notes
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
            "mata_kuliah_kode_matkul" => 'required|string|exists:mata_kuliah,kode_matkul',
            "tanggal" => 'required|date',
            "note" => 'required|string',
        ]);
        $note = Note::create([
            "mata_kuliah_kode_matkul" => $request->mata_kuliah_kode_matkul,
            "tanggal" => $request->tanggal,
            "note" => $request->note,
        ]);
        return response()->json([
            'data' => $note,
            'message' => 'date created successfully'
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
        $isExist = Note::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Note not found"], 404);
        }
        $note = Note::find($id);
        return response()->json([
            'data' => $note
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
            "mata_kuliah_kode_matkul" => 'required|string|exists:mata_kuliah,kode_matkul',
            "tanggal" => 'required|date',
            "note" => 'required|string',
        ]);
        $isExist = Note::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Note not found"], 404);
        }
        $note = Note::find($id);
        $note->mata_kuliah_kode_matkul = $request->mata_kuliah_kode_matkul;
        $note->tanggal = $request->tanggal;
        $note->note = $request->note;
        $note->save();
        return response()->json([
            'data' => $note,
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
        $isExist = Note::where('id', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Note not found"], 404);
        }
        Note::destroy($id);
        return response()->json([
            'message' => "Note deleted"
        ]);
    }
}
