@extends('layouts.app')

@section('page-title', 'Crea un viaggio')

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

        <form action="{{ route('admin.trips.store'); }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="destination">Destinazione</label>
                <input required value="{{ old('destination') }}" type="text" name="destination" id="destination" maxlength="64">
            </div>

            <div>
                <label for="img_destination">Scegli un' immagine</label>
                <input type="file" name="img_destination" id="img_destination" min="0" maxlength="255">
            </div>

            <div>
                <label for="departure_date">Data di partenza</label>
                <input value="{{ old('departure_date') }}" type="date" name="departure_date" id="departure_date">
            </div>

            <div>
                <label for="arrival_date">Data di ritorno</label>
                <input value="{{ old('arrival_date') }}" type="date" name="arrival_date" id="arrival_date">
            </div>

            <div>
                <label for="num_people">Numero di persone</label>
                <input value="{{ old('num_people') }}" type="number" name="num_people" id="num_people" min="0" max="30">
            </div>

            <div>
                <label for="transport">Con quale mezzo</label>
                <input value="{{ old('transport') }}" type="text" name="transport" id="transport" min="0" max="24">
            </div>

            <div>
                <label for="price">Costo €</label>
                <input value="{{ old('price') }}" step="0.01" type="number" name="price" id="price" min="0" max="9999.99">
            </div>

            <div>
                <input value="1" type="checkbox" name="free" id="free">
                <label for="free">FREE</label>
            </div>

            <div>
                <input value="1" type="checkbox" name="reservation" id="reservation">
                <label for="reservation">Già prenotato?</label>
            </div>

            <div>
                <label for="food">Cibo da provare</label>
                <textarea name="food" id="food" cols="30" rows="5" maxlength="4096">{{ old('food') }}</textarea>
            </div>

            <div>
                <label for="notes">Note da aggiungere</label>
                <textarea name="notes" id="notes" cols="30" rows="5" maxlength="4096">{{ old('notes') }}</textarea>
            </div>

            <div>
                <input value="1" type="checkbox" name="travel_completed" id="travel_completed">
                <label for="travel_completed">Hai finito il viaggio?</label>
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Aggiungi</button>
            </div>
        </form>
    </div>
@endsection