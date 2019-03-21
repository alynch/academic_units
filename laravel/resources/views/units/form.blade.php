<div class="card">

    <div class="card-body">

	<div class="form-group">
	    <label for="name">Name:</label>
	    <input type="text" id="name" name="name" class="form-control"
		value="{{ $unit->name ?: old('name') }}" />
	</div>

	<div class="form-group">
	    <label for="short_name">Short name:</label>
	    <input type="text" id="short_name" name="short_name" class="form-control"
		value="{{ $unit->short_name ?: old('short_name') }}" />
	</div>

	<div class="form-group">
	    <label for="code">Code:</label>
	    <input type="text" id="code" name="code" class="form-control"
		value="{{ $unit->code ?: old('code') }}" />
	</div>

	<div class="form-group">
	    <label for="code">Unit type:</label>

            <select name="type_id">
            <option value="">Select one</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}"
                    @if ($type->id == $unit->type_id) selected @endif
                >
                    {{ $type->name }}
                </option>
            @endforeach
            </select>
	</div>

	<div class="form-group">
	    <label for="code">Area:</label>

            <select name="area_id">
            <option value="">Select one</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}"
                    @if ($area->id == $unit->area_id) selected @endif
                >
                    {{ $area->name }}
                </option>
            @endforeach
            </select>
	</div>

	<div>
	    <input type="submit" class="btn btn-primary" value="Save">
	</div>

    </div>
</div>
</div>
