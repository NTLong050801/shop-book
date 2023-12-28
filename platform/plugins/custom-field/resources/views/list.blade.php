@extends('core/table::table')
@section('main-table')
    {!! Form::open(['url' => route('custom-fields.import'), 'class' => 'import-field-group']) !!}
    <input
        class="hidden"
        id="import_json"
        type="file"
        accept="application/json"
    >
    @parent
    {!! Form::close() !!}
@stop
