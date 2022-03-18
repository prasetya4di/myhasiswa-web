<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;
use App\Models\MataKuliah;
use Illuminate\Http\Response;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMataKuliahRequest $request
     * @return Response
     */
    public function store(StoreMataKuliahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param MataKuliah $mataKuliah
     * @return Response
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MataKuliah $mataKuliah
     * @return Response
     */
    public function edit(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMataKuliahRequest $request
     * @param MataKuliah $mataKuliah
     * @return Response
     */
    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MataKuliah $mataKuliah
     * @return Response
     */
    public function destroy(MataKuliah $mataKuliah)
    {
        //
    }
}
