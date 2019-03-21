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
		{{ $subscription->key }}
	    <input type="hidden" name="key" value="{{ $subscription->key }}" />
	</div>

	<div class="form-group">
	    <label for="events">Events:</label>
	    <input type="checkbox" name="events[]" value="1" /> Create
	    <input type="checkbox" name="events[]" value="2" /> Update
	    <input type="checkbox" name="events[]" value="4" /> Delete
	</div>

	<div>
	    <input type="submit" class="btn btn-primary" value="Save">
	</div>

    </div>
</div>
</div>
