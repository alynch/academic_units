@extends('layouts.app')

@section('content')
<div class="container">

    <form method="POST" action="/units/{{ $unit->code }}">
        @csrf
        <input type="hidden" name="_method" value="patch"/>

        @include('units.form')
    </form>
</div>
@endsection



