<?php

namespace App\Http\Controllers;

use App\Resource\Hue;
use App\Resource\Light;
use Illuminate\Http\Request;

class LightController extends Controller
{
    private Hue $hue;

    /**
     * LightController constructor.
     * @param Hue $hue
     */
    public function __construct(Hue $hue)
    {
        $this->hue = $hue;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->hue->getLights();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->hue->findLight($id)->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return array|\Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $light = $this->hue->findLight($id);

        $light->update($request->all());

        return $light->toArray();
    }
}
