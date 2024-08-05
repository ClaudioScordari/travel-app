@extends('layouts.app')

@section('page-title', $trip->destination)

@section('main-content')
    <div>
        <h1>{{ $trip->destination }}</h1>

        <a class="btn btn-primary mb-3" href="{{ route('admin.trips.index'); }}">
            Torna ai viaggi
        </a>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Destinazione</th>
                    <th scope="col">Data di partenza</th>
                    <th scope="col">Data di ritorno</th>
                    <th scope="col">Quante persone</th>
                    <th scope="col">Mezzo</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Prenotato</th>
                    <th scope="col">Cibo da mangiare</th>
                    <th scope="col">Note</th>
                    <th scope="col">Viaggio completato</th>
                </tr>
            </thead>

            <tbody>   
                <tr class="text-center">
                    <th scope="row">{{ $trip->id }}</th>
                    <td>{{ $trip->destination }}</td>
                    <td>{{ $trip->departure_date }}</td>
                    <td>{{ $trip->arrival_date }}</td>
                    <td>{{ $trip->num_people }}</td>
                    <td>{{ $trip->transport }}</td>
                    <td>{{ $trip->price }}</td>
                    <td>{{ $trip->reservation }}</td>
                    <td>{{ $trip->food }}</td>
                    <td>{{ $trip->notes }}</td>
                    <td>{{ $trip->travel_completed }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection