@foreach ($rooms as $room)
    <label class="checkbox-inline">
        <input name="rooms[]" type="checkbox" value="{{ $room->id }}" @if (in_array($room->id, $selectedRooms)) checked @endif>{{ $room->name }}
    </label>&nbsp;
@endforeach
