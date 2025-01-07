<?php

namespace App\Http\Controllers;

use App\Instrumen;
use Illuminate\Http\Request;

class InstrumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function show(Instrumen $instrumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Instrumen $instrumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $instrumen = Instrumen::find($id);
        $instrumen->instrumen = $request->instrumen;
        // $instrumen->bagian = $request->bagian;
        // $instrumen->nomor = $request->nomor;
        // $instrumen->jenis = $request->jenis;
        $instrumen->save();
        return redirect('/admin/edit-data/instrumen/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instrumen  $instrumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instrumen $instrumen)
    {
        //
    }
}
