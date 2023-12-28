@extends('plugins/member::layouts.skeleton')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-form">
                    <div class="card-body">
                        <h4 class="text-center">{{ trans('plugins/member::dashboard.register-title') }}</h4>
                        <br>
                        <form
                            method="POST"
                            action="{{ route('public.member.register') }}"
                        >
                            @csrf
                            <div class="form-group mb-3">
                                <input
                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    id="first_name"
                                    name="first_name"
                                    type="text"
                                    value="{{ old('first_name') }}"
                                    required
                                    autofocus
                                    placeholder="{{ trans('plugins/member::dashboard.first_name') }}"
                                >
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input
                                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    id="last_name"
                                    name="last_name"
                                    type="text"
                                    value="{{ old('last_name') }}"
                                    required
                                    placeholder="{{ trans('plugins/member::dashboard.last_name') }}"
                                >
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    required
                                    placeholder="{{ trans('plugins/member::dashboard.email') }}"
                                >
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    id="password"
                                    name="password"
                                    type="password"
                                    required
                                    placeholder="{{ trans('plugins/member::dashboard.password') }}"
                                >
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input
                                    class="form-control"
                                    id="password-confirm"
                                    name="password_confirmation"
                                    type="password"
                                    required
                                    placeholder="{{ trans('plugins/member::dashboard.password-confirmation') }}"
                                >
                            </div>

                            @if (is_plugin_active('captcha'))
                                @if (Captcha::isEnabled() && setting('member_enable_recaptcha_in_register_page', 0))
                                    <div class="form-group mb-3">
                                        {!! Captcha::display() !!}
                                    </div>
                                @endif

                                @if (setting('member_enable_math_captcha_in_register_page', 0))
                                    <div class="form-group mb-3">
                                        {!! app('math-captcha')->input([
                                            'class' => 'form-control',
                                            'id' => 'math-group',
                                            'placeholder' => app('math-captcha')->label(),
                                        ]) !!}
                                    </div>
                                @endif
                            @endif

                            <div class="form-group mb-0">
                                <button
                                    class="btn btn-blue btn-full fw6"
                                    type="submit"
                                >
                                    {{ trans('plugins/member::dashboard.register-cta') }}
                                </button>
                            </div>

                            <div class="text-center">
                                {!! apply_filters(BASE_FILTER_AFTER_LOGIN_OR_REGISTER_FORM, null, \Botble\Member\Models\Member::class) !!}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script
        type="text/javascript"
        src="{{ asset('vendor/core/core/js-validation/js/js-validation.js') }}"
    ></script>
    {!! JsValidator::formRequest(\Botble\Member\Http\Requests\RegisterRequest::class) !!}
@endpush
