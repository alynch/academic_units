<?php

namespace App\Http\Controllers\API;

use App\Unit;
use Illuminate\Http\Request;

class UnitsController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with('type')->with('area')->orderBy('code')->get();

        return $units;
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        $unit->load('type', 'area');
        return $unit;
    }

}
