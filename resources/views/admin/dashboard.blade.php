@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Sei loggato!
                    </h1>

                    <div>
                        <h1>
                            Vedi i viaggi
                        </h1>

                        <a href="{{ route('admin.trips.index') }}">Vai</a>
                    </div>

                    <br>
                    La dashboard è una pagina privata (protetta dal middleware)
                </div>
            </div>
        </div>
    </div>
@endsection
