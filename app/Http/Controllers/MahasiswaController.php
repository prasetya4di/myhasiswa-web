<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $isExist = Mahasiswa::where('nim', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Mahasiswa not found"], 404);
        }
        $mahasiswa = Mahasiswa::find($id);
        return response()->json([
            'data' => $mahasiswa
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
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:1',
            'study_plan' => 'required|string',
            'phone_number' => 'required|string'
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->name = $request->name;
        $mahasiswa->address = $request->address;
        $mahasiswa->birth_date = $request->birth_date;
        $mahasiswa->gender = $request->gender;
        $mahasiswa->study_plan = $request->study_plan;
        $mahasiswa->phone_number = $request->phone_number;
        $mahasiswa->save();
        return response()->json([
            'data' => $mahasiswa
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
        $isExist = Mahasiswa::where('nim', $id)->exists();
        if (!$isExist) {
            return response()->json(["message" => "Mahasiswa not found"], 404);
        }
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response()->json([
            'message' => "Mahasiswa deleted"
        ]);
    }
}
