@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ url('/units') }}">Academic units</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('/subscriptions') }}">Subscriptions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
