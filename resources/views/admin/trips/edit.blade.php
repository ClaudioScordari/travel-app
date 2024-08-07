@extends('layouts.app')

@section('page-title', $trip->destination)

@section('main-content')
    <div>
        <h1>Aggiungi un viaggio</h1>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.trips.update', ['trip' => $trip->id]); }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="destination">Destinazione</label>
                <input required value="{{ old('destination', $trip->destination) }}" type="text" name="destination" id="destination" maxlength="64">
            </div>

            <div>
                <label for="img_destination">Scegli un' immagine</label>
                <input type="file" name="img_destination" id="img_destination" min="0" maxlength="255">

                @if ($trip->img_destination != null)    
                    <div class="my-3">
                        <img style="width: 300px" src="/storage/{{ $trip->img_destination }}" alt="{{ $trip->destination }}">
                    </div>

                    <div class="mb-3">
                        <label for="remove_img">Rimuovi l'immagine</label>
                        <input value="1" name="remove_img" type="checkbox" id="remove_img">
                    </div>
                @endif
            </div>

            <div>
                <label for="departure_date">Data di partenza</label>
                <input value="{{ old('departure_date', $trip->departure_date) }}" type="date" name="departure_date" id="departure_date">
            </div>

            <div>
                <label for="arrival_date">Data di ritorno</label>
                <input value="{{ old('arrival_date', $trip->arrival_date) }}" type="date" name="arrival_date" id="arrival_date">
            </div>

            <div>
                <label for="num_people">Numero di persone</label>
                <input value="{{ old('num_people', $trip->num_people) }}" type="number" name="num_people" id="num_people" min="0" max="30">
            </div>

            <div>
                <label for="transport">Con quale mezzo</label>
                <input value="{{ old('transport', $trip->transport) }}" type="text" name="transport" id="transport" min="0" max="24">
            </div>

            <div>
                <label for="price">Costo €</label>
                <input value="{{ old('price', $trip->price) }}" step="0.01" type="number" name="price" id="price" min="0" max="9999.99">
            </div>

            <div>
                <input
                    @if ($trip->price == 0.00)
                        checked
                    @endif 
                    value="1" type="checkbox" name="free" id="free">

                <label for="free">FREE</label>
            </div>

            <div>
                <input 
                    @if ($trip->reservation == true)
                        checked
                    @endif 
                    value="1" type="checkbox" name="reservation" id="reservation">

                <label for="reservation">Già prenotato?</label>
            </div>

            <div>
                <label for="food">Cibo da provare</label>
                <textarea name="food" id="food" cols="30" rows="5" maxlength="4096">{{ old('food', $trip->food) }}</textarea>
            </div>

            <div>
                <label for="notes">Note da aggiungere</label>
                <textarea name="notes" id="notes" cols="30" rows="5" maxlength="4096">{{ old('notes', $trip->notes) }}</textarea>
            </div>

            <div>
                <input 
                    @if ($trip->travel_completed == true)
                        checked
                    @endif 
                    value="1" type="checkbox" name="travel_completed" id="travel_completed">

                <label for="travel_completed">Hai finito il viaggio?</label>
            </div>

            <div>
                <button type="submit" class="btn btn-warning">Aggiorna</button>
            </div>
        </form>
    </div>
@endsection