@extends('layouts.app')

@section('content')

<form method="POST" action="/units">
    @csrf
    @include('units.form', ['title' => 'New unit'])
</form>
@endsection
