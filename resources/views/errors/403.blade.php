{{-- LAYOUT PRINCIPAL --}}
@extends("layouts.app")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <h3>{{ $exception->getMessage() }}</h3>
            </div>
        </div>
    </div>
@endsection