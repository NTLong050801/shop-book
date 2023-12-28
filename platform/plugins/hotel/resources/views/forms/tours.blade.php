@foreach ($tours as $tour)
    <label class="checkbox-inline">
        <input name="tours[]" type="checkbox" value="{{ $tour->id }}" @if (in_array($tour->id, $selectedTours)) checked @endif>{{ $tour->name }}
    </label>&nbsp;
@endforeach
