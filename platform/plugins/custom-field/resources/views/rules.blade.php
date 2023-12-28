<div class="custom-fields-rules">
    {!! $object && $object->id ? $object->rules_template : $rules_template !!}
    @include('plugins/custom-field::_script-templates.edit-field-group-items')
    <textarea
        class="form-control hidden"
        id="custom_fields_rules"
        name="rules"
        style="display: none !important;"
    >{!! old('field_group.rules', $object && $object->id ? $object->rules : '[]') !!}</textarea>
    <textarea
        class="form-control hidden"
        id="custom_fields"
        name="group_items"
        style="display: none !important;"
    >{!! old('field_group.group_items', $customFieldItems ?? '[]') !!}</textarea>
    <textarea
        class="form-control hidden"
        id="deleted_items"
        name="deleted_items"
        style="display: none !important;"
    >{!! old('field_group.deleted_items', '[]') !!}</textarea>
    <label class="control-label mb15">
        <b>{{ trans('plugins/custom-field::base.form.rules.rules_helper') }}</b>
    </label>
    <div class="line-group-container"></div>
    <div class="line">
        <p class="mt20"><b>{{ trans('plugins/custom-field::base.form.rules.or') }}</b></p>
        <a
            class="location-add-rule-or location-add-rule btn btn-info"
            href="#"
        >
            {{ trans('plugins/custom-field::base.form.rules.add_rule_group') }}
        </a>
    </div>
</div>
