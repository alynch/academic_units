@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2>Subscriptions</h2>
        <div>
            <a class="btn btn-primary" href="/subscriptions/create">Add a subscription</a>
        </div>
    </div>

    <ul class="list-group list-group-flush">
        @foreach ($subscriptions as $subscription)
            <li class="list-group-item">
                <a href="/subscriptions/{{ $subscription->id }}/edit">
                     {{ $subscription->name }}</a>

                <form method="POST" class="float-right" action="/subscriptions/{{ $subscription->id }}">
                    @csrf
                    <input type="hidden" name="_method" value="delete"/>
                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                </form>

            </li>
        @endforeach
    </ul>
</div>
</div>
@endsection
