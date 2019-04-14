<div class="container">
<div class="card">

    @if (isset($title))
    <div class="card-header">
        <h2>{{ $title }}</h2>
    </div>
    @endif

    <div class="card-body">

	<div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" id="name" name="name" class="form-control"
		value="{{ $subscription->name ?: old('name') }}" />
	</div>
	<div class="form-group">
	    <label for="url">Webhook URL:</label>
	    <input type="text" id="url" name="url" class="form-control"
		value="{{ $subscription->url ?: old('url') }}" />
	</div>

	<div class="form-group">
	    <label for="key">Key:</label>
	    <span id="token" style="font-family: monospace">{{ $subscription->key }}</span>
	    <input type="hidden" name="key" value="{{ $subscription->key }}" />
            <button class="btn btn-sm btn-secondary" onclick="randomString(); return false">Re-generate</button>
	</div>

	<div class="form-group">
	    <label for="events">Events:</label>
	    <input type="checkbox" name="events[]" @if ($subscription->events & 1) checked @endif value="1" /> Create
	    <input type="checkbox" name="events[]" @if ($subscription->events & 2) checked @endif value="2" /> Update
	    <input type="checkbox" name="events[]" @if ($subscription->events & 4) checked @endif value="4" /> Delete
	</div>

	<div>
	    <input type="submit" class="btn btn-primary" value="Save">
	</div>

    </div>
</div>

    <div class="card mt-4">
        <div class="card-header">
            Logs
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                   <th>Status</th> 
                   <th>Event</th> 
                   <th>Unit</th> 
                   <th>Timestamp</th> 
                </tr>
                @foreach ($subscription->logs->sortByDesc('created_at') as $log)
                <tr>
                    <td>
                        <span
                            @if ($log->status == 200) class="badge badge-success" @endif
                            @if ($log->status != 200) class="badge badge-danger" @endif
                        >
                        {{ $log->status }}
                        </span>
                    </td>
                    <td>
                        {{ $log->event }}
                    </td>
                    <td>
                        {{ $log->unit }}
                    </td>
                    <td>
                        {{ $log->created_at }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        </div>

</div>


<script>

function randomString() {

     const len = 64;
     const charSet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
     let randomString = '';
     for (var i = 0; i < len; i++) {
         var randomPoz = Math.floor(Math.random() * charSet.length);
         randomString += charSet.substring(randomPoz,randomPoz+1);
     }

     var btn = document.getElementById("token");
     btn.innerText = randomString;

console.log(randomString);

    return false;
}
</script>
