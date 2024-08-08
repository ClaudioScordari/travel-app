@extends('layouts.app')

@section('page-title', $place->name)

@section('main-content')
    <div>
        <h1>{{ $place->name }}</h1>

        {{-- bottoni --}}
        <div>
            <a class="btn btn-primary" href="{{ route('admin.trips.show', ['trip' => $place->trip->id]); }}">
                Torna al viaggio
            </a>
    
            <a class="btn btn-success" href="{{ route('admin.trips.index'); }}">
                Torna ai viaggi
            </a>
    
            <a class="btn btn-warning" href="{{ route('admin.places.edit', ['place' => $place->id]); }}">
                Modifica tappa
            </a>
    
            <form onsubmit="return confirm('Sicuro che vuoi eliminare questa tappa?')" action="{{ route('admin.places.destroy', ['place' => $place->id]) }}" method="POST">
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger">
                    Elimina tappa
                </button>
            </form>
        </div>

        {{-- info tappa --}}
        <div>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col">ID tappa</th>
                        <td>Nome del viaggio</td>

                    </tr>
                </thead>
    
                {{-- <tbody>   
                    <tr class="text-center">
                        <th scope="row">{{ $trip->id }}</th>

                        <td>-</td>
                    </tr>
                </tbody> --}}
            </table>
        </div>
    </div>
@endsection