@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h2>Academic units</h2>
                    <div>
                        <a class="btn btn-primary" href="/units/create">Add a unit</a>
                    </div>
                </div>


                    <table class="table">
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Area</th>
                        </tr>
                    @foreach ($units as $unit)
                        <tr>
                            <td>
                                <a href="{{ url('/units/' . $unit->code . '/edit') }}">
                                    {{ $unit->code }}
                                </a>
                            </td>
                            <td>
                            {{ $unit->name }}
                            </td>
                            <td>
                            {{ $unit->type->code ?? '' }}
                            </td>
                            <td>
                            {{ $unit->area->name ?? '' }}
                            </td>
                            <td>
                <form method="POST" class="float-right" action="/units/{{ $unit->code }}">
                    @csrf
                    <input type="hidden" name="_method" value="delete"/>
                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">
                </form>
                            </td>

                        </tr>
                    @endforeach
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection
