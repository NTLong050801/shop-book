@foreach ($weekdays as $weekday)
    <label class="checkbox-inline">
        <input name="weekdays[]" type="checkbox" value="{{$weekday}}"
               @if (in_array($weekday, $selectedWeekdays)) checked @endif >
        {{trans("plugins/hotel::tour.form.$weekday")}}
    </label>&nbsp;
@endforeach

