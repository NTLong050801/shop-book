<select name="testimonials[]" multiple class="form-control">
    @foreach ($testimonials as $testimonial)
        <option value="{{ $testimonial->id }}" @if (in_array($testimonial->id, $selectedTestimonials)) selected @endif>{{ $testimonial->name }}: {!! nl2br(strip_tags($testimonial->content)) !!} </option>
    @endforeach
</select>
