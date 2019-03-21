@extends('layouts.app')

@section('content')

<form method="POST" action="/subscriptions">
    @csrf
    @include('subscriptions.form', ['title' => 'New subscription'])
</form>
@endsection
