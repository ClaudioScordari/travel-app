<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Trip;

// Form request
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;

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
            'destination' => ucfirst($validDatas['destination']),
            'img_destination' => $imgPath,
            'departure_date' => $validDatas['departure_date'],
            'arrival_date' => $validDatas['arrival_date'],
            'num_people' => $validDatas['num_people'],
            'transport' => $validDatas['transport'],
            'price' => $validDatas['price'],
            'reservation' => $prenotazione,
            'travel_completed' => $fineViaggio,
            'food' => $validDatas['food'],
            'notes' => $validDatas['notes'],
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
    public function edit(Trip $trip)
    {
        return view('admin.trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripRequest $request, Trip $trip)
    {
        $validDatas = $request->validated();
        
        // se è gratis
        if (isset($validDatas['free'])) {
            $validDatas['price'] = 0;
        }

        // prenotazione
        $prenotazione = false; // default
        if (isset($validDatas['reservation'])) {
            $prenotazione = true;
        }

        // fine viaggio
        $fineViaggio = false; // default
        if (isset($validDatas['travel_completed'])) {
            $fineViaggio = true;
        }

        // default -> setto img a quella che è presente nell'istanza
        $imgPath = $trip->img_destination;

        // se arriva l'img
        if (isset($validDatas['img_destination'])) {

            // Controllo se il percorso corrente è pieno...
            if ($trip->img_destination != null) {

                // Elimino il percorso corrente
                Storage::disk('public')->delete($trip->img_destination);
            }

            // Setto il nuovo percorso
            $imgPath = Storage::disk('public')->put('img', $validDatas['img_destination']);

        }
        // Altrimenti se voglio eliminare l'img (mi arriva true da una checkbox)
        else if (isset($validDatas['remove_img'])) {

            // elimino il percorso
            Storage::disk('public')->delete($trip->img_destination);
            
            // mi riempio la var del percorso a null
            $imgPath = null;
        }

        $trip->update([
            'destination' => ucfirst($validDatas['destination']),
            'img_destination' => $imgPath,
            'departure_date' => $validDatas['departure_date'],
            'arrival_date' => $validDatas['arrival_date'],
            'num_people' => $validDatas['num_people'],
            'transport' => $validDatas['transport'],
            'price' => $validDatas['price'],
            'reservation' => $prenotazione,
            'travel_completed' => $fineViaggio,
            'food' => $validDatas['food'],
            'notes' => $validDatas['notes'],
        ]);

        return redirect()->route('admin.trips.show', compact('trip'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        if ($trip->img_destination != null) {
            Storage::disk('public')->delete($trip->img_destination);
        }

        $trip->delete();

        return redirect()->route('admin.trips.index');
    }
}
