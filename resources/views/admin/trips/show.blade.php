@extends('layouts.app')

@section('page-title', $trip->destination)

@section('main-content')
    <div>
        <h1>{{ $trip->destination }}</h1>

        <a class="btn btn-primary mb-3" href="{{ route('admin.trips.index'); }}">
            Torna ai viaggi
        </a>

        <a class="btn btn-warning mb-3" href="{{ route('admin.trips.edit', ['trip' => $trip->id]); }}">
            Modifica questo viaggio
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

                    {{-- data di partenza --}}
                    @if ($trip->departure_date != null)
                        <td>{{ $trip->departure_date }}</td>
                    @else
                        <td>-</td>
                    @endif

                    {{-- data di ritorno --}}
                    @if ($trip->arrival_date != null)
                        <td>{{ $trip->arrival_date }}</td>
                    @else
                        <td>-</td>
                    @endif

                    {{-- numero persone --}}
                    @if ($trip->num_people != null)
                        <td>{{ $trip->num_people }}</td>
                    @else
                        <td>-</td>
                    @endif

                    {{-- numero persone --}}
                    @if ($trip->transport != null)
                        <td>{{ $trip->transport }}</td>
                    @else
                        <td>Non ancora stabilito</td>
                    @endif

                    {{-- prezzo --}}
                    @if ($trip->price == 0.00)
                        <td>Free</td>
                    @else
                        <td>€ {{ $trip->price }}</td>
                    @endif

                    {{-- prenotazione --}}
                    @if ($trip->reservation == 1)
                        <td>SI</td>
                    @else
                        <td>NO</td>
                    @endif
                    
                    {{-- cibo --}}
                    @if ($trip->food != null)
                        <td>{{ $trip->food }}</td>
                    @else
                        <td>Ancora nessun cibo</td>
                    @endif

                    {{-- note --}}
                    @if ($trip->notes != null)
                        <td>{{ $trip->notes }}</td>
                    @else
                        <td>Ancora nessuna nota</td>
                    @endif

                    {{-- fine viaggio --}}
                    @if ($trip->travel_completed == 1)
                        <td>Viaggio terminato</td>
                    @else
                        <td>Viaggio non ancora finito</td>
                    @endif
                </tr>
            </tbody>
        </table>

        {{-- img --}}
        <div>
            @if ($trip->img_destination != null)
                <img style="width: 300px" src="/storage/{{ $trip->img_destination }}" alt="{{ $trip->destination }}">
            @else
                Ancora nessuna immagine
            @endif
        </div>
    </div>
@endsection