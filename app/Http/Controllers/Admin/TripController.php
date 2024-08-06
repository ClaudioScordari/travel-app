<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Trip;

// Form request
use App\Http\Requests\StoreTripRequest;

// Facades
use Illuminate\Support\Facades\Storage;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();

        return view('admin.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request)
    {
        $validDatas = $request->validated();
        
        /*
            Controllare:
            - se il viaggio è free,
                -- nella col costo metto 0 

            - se è prenotato,
                -- nella col reservation metto true

            - se ho finito il viaggio
                -- nella col travel_completed metto true

            - controllare anche img
        */
        if (isset($validDatas['free'])) {
            $validDatas['price'] = 0;
        }

        $prenotazione = false; // default
        if (isset($validDatas['reservation'])) {
            $prenotazione = true;
        }

        $fineViaggio = false; // default
        if (isset($validDatas['travel_completed'])) {
            $fineViaggio = true;
        }

        $imgPath = null; // default
        if (isset($validDatas['img_destination'])) {
            $imgPath = Storage::disk('public')->put('img', $validDatas['img_destination']);
        }

        $trip = Trip::create([
            'destination' => $validDatas['destination'],
            'img_destination' => $imgPath,
            'departure_date' => $validDatas['departure_date'],
            'arrival_date' => $validDatas['arrival_date'],
            'num_people' => $validDatas['num_people'],
            'transport' => $validDatas['transport'],
            'price' => $validDatas['price'],
            'reservation' => $prenotazione,
            'travel_completed' => $fineViaggio,
            'food' => $validDatas['food'],
            'notes' => $validDatas['food'],
        ]);

        return redirect()->route('admin.trips.show', compact('trip'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        return view('admin.trips.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
