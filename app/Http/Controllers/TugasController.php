<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTugasRequest;
use App\Http\Requests\UpdateTugasRequest;
use App\Models\Tugas;
use Illuminate\Http\Response;

class TugasController extends Controller
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
     * @param StoreTugasRequest $request
     * @return Response
     */
    public function store(StoreTugasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Tugas $tugas
     * @return Response
     */
    public function show(Tugas $tugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tugas $tugas
     * @return Response
     */
    public function edit(Tugas $tugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTugasRequest $request
     * @param Tugas $tugas
     * @return Response
     */
    public function update(UpdateTugasRequest $request, Tugas $tugas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tugas $tugas
     * @return Response
     */
    public function destroy(Tugas $tugas)
    {
        //
    }
}
