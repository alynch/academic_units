@extends('layouts.app')

@section('content')

<form method="POST" action="/subscriptions/{{ $subscription->id }}">
    @csrf
    <input type="hidden" name="_method" value="patch"/>

    @include('subscriptions.form')

</form>

@endsection
