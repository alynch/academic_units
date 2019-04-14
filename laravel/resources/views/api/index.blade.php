@extends('layouts.app')

@section('content')

<div class="container">

<h2>Academic Units API</h2>

<p>
The Academic Units API is REST-based, uses OAuth2 for authentication, and always returns responses in JSON format.
</p>


<p>
Authorization: This API requires a key to authorize users.

api key: fd4698c940c6d1da602a70ac34f0b147

</p>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Units</h3>
        </div>

        <div class="card-body">
            <div>
                <code>GET /units</code> Get all units
            </div>
            <div>
                <code>GET /units/{unit_code}</code> Get details about a specific unit
            </div>
        </div>


<pre>
<code>
    {
        "id":          15,
        "code":	       "ANT",
        "name":        "Department of Anthropology",
        "short_name":  "Anthropology",
        "type":        "Department",
        "area":        "Social Sciences",
        "created_at":  "2019-01-03 20:01:04",
        "updated_at":  "2019-04-11 23:13:57"
    }
</code>
</pre>

    </div>
</div>
@endsection
