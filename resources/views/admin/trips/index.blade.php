@extends('layouts.app')

@section('page-title', 'Viaggi')

@section('main-content')
    <div>
        <h1>Viaggi</h1>

        <ol>
            @foreach ($trips as $trip)
                <li class="my-4">
                    {{ $trip->destination }} | <a class="btn btn-primary" href="{{ route('admin.trips.show', ['trip' => $trip->id]) }}">Guarda il viaggio</a>
                </li>
            @endforeach
        </ol>
    </div>
@endsection