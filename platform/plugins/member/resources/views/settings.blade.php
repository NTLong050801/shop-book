<x-core-setting::section
    :title="trans('plugins/member::settings.title')"
    :description="trans('plugins/member::settings.description')"
>
    <div class="form-group mb-3">
        <div class="form-group mb-3">
            <input
                name="verify_account_email"
                type="hidden"
                value="0"
            >
            <label>
                <input
                    name="verify_account_email"
                    type="checkbox"
                    value="1"
                    @checked(setting('verify_account_email', 0))
                >
                {{ trans('plugins/member::settings.verify_account_email') }}
            </label>
            {!! Form::helper(trans('plugins/member::settings.verify_account_email_description')) !!}
        </div>
    </div>

    @if (is_plugin_active('captcha'))
        <div class="form-group mb-3">
            <input
                name="member_enable_recaptcha_in_register_page"
                type="hidden"
                value="0"
            >
            <label>
                <input
                    name="member_enable_recaptcha_in_register_page"
                    type="checkbox"
                    value="1"
                    @checked(setting('member_enable_recaptcha_in_register_page', 0))
                >
                {{ trans('plugins/member::settings.enable_recaptcha_in_register_page') }}
            </label>
            {!! Form::helper(trans('plugins/member::settings.enable_recaptcha_in_register_page_description')) !!}
        </div>

        <div class="form-group">
            <input
                name="member_enable_math_captcha_in_register_page"
                type="hidden"
                value="0"
            >
            <label>
                <input
                    name="member_enable_math_captcha_in_register_page"
                    type="checkbox"
                    value="1"
                    @checked(setting('member_enable_math_captcha_in_register_page', 0))
                >
                {{ trans('plugins/contact::contact.settings.enable_math_captcha') }}
            </label>
        </div>
    @endif
</x-core-setting::section>
