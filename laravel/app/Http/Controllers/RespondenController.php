<?php

namespace App\Http\Controllers;

use App\DataLain;
use App\Http\Requests\RespondenRequest;
use App\Instrumen;
use App\Responden;
use App\Services\RespondenService;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    private $respondenService;

    public function __construct(RespondenService $respondenService)
    {
        $this->respondenService = $respondenService;
    }
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
    public function store(RespondenRequest $request)
    {
        $this->respondenService->createResponden($request);

        return redirect('/selesai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Responden  $responden
     * @return \Illuminate\Http\Response
     */
    public function show(Responden $responden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Responden  $responden
     * @return \Illuminate\Http\Response
     */
    public function edit(Responden $responden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Responden  $responden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Responden $responden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Responden  $responden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Responden $responden)
    {
        //
    }
}
