<?php

namespace App\Http\Controllers;

use App\Unit;
use App\UnitArea;
use App\UnitType;
use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\UnitsForm;

class UnitsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with('type')->with('area')->orderBy('code')->get();
        return view('units.index')
            ->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = new Unit;
        $types = UnitType::all();
        $areas = UnitArea::all();
        return view('units.create')
            ->with('types', $types)
            ->with('areas', $areas)
            ->with('unit', $unit);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitsForm $request)
    {
        $validatedData = $request->validated();
        $unit = Unit::create($validatedData);

        $this->notifySubscribers($unit, 'create');
        return redirect('/units');
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

    /**
     * Show the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $unit->load('type', 'area');

        $types = UnitType::all();
        $areas = UnitArea::all();

        return view('units.edit')
            ->with('types', $types)
            ->with('areas', $areas)
            ->with('unit', $unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitsForm $request, Unit $unit)
    {

        $validatedData = $request->validated();
        $unit->update($validatedData);

        $this->notifySubscribers($unit, 'update');

        return redirect('/units');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $this->notifySubscribers($unit, 'delete');
        $unit->delete();

        return redirect('/units');
    }

    private function notifySubscribers($unit, $event)
    {
        $subscribers = Subscription::all();

        $client = new \GuzzleHttp\Client();
        foreach ($subscribers as $subscriber) {
            $data = [ 'json' => [ 'event' => $event, 'unit' => $unit ] ];
            $response = $client->post($subscriber->url, $data);
        }
    }
}
