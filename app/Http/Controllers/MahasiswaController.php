<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Mahasiswa;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param Mahasiswa $mahasiswa
     * @return Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMahasiswaRequest $request
     * @param Mahasiswa $mahasiswa
     * @return Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Mahasiswa $mahasiswa
     * @return Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
