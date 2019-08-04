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
            <p>
                A <code>unit</code> represents an academic unit (department, extra-deparmental unit, college).
            </p>

                <table class="table">
                    <caption style="caption-side: top;">Attributes</caption>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Example</th>
                    </tr>

                    <tr>
                        <td>id</td>
                        <td>Integer</td>
                        <td>Unique id</td>
                        <td>1</td>
                    </tr>

                    <tr>
                        <td>code</td>
                        <td>String</td>
                        <td>Unit code</td>
                        <td>ANT</td>
                    </tr>

                    <tr>
                        <td>name</td>
                        <td>String</td>
                        <td>Name of the unit</td>
                        <td>Department of Anthopology</td>
                    </tr>

                    <tr>
                        <td>short_name</td>
                        <td>String</td>
                        <td>Short version of the unit name</td>
                        <td>Anthopology</td>
                    </tr>

                    <tr>
                        <td>type</td>
                        <td>String</td>
                        <td>The type of the unit (department, Extra-departmental unit, college)</td>
                        <td>Department</td>
                    </tr>

                    <tr>
                        <td>area</td>
                        <td>String</td>
                        <td>The area of specialization of the unit(Humanities, Social Sciences, Sciences)</td>
                        <td>Social Sciences</td>
                    </tr>

                    <tr>
                        <td>created_at</td>
                        <td>Date-time</td>
                        <td>When unit was created</td>
                        <td>2019-01-03 20:01:04</td>
                    </tr>

                     <tr>
                        <td>updated_at</td>
                        <td>Date-time</td>
                        <td>When unit was last updated</td>
                        <td>2019-04-11 23:13:57</td>
                    </tr>
                </table>


Resources
            <div>
                <code>GET /units</code> Get all units
            </div>
            <div>
                <code>GET /units/{unit_code}</code> Get details about a specific unit
            </div>

Example

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
</div>
@endsection
