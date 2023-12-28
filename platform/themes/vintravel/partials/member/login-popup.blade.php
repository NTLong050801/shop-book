<div class="modal" id="login_modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center">{{ trans('plugins/member::dashboard.login-title') }}</h4>
                <br>
                <form
                    method="POST"
                    action="{{ route('public.member.login') }}"
                >
                    @csrf
                    <div class="form-group mb-3">
                        <input
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            placeholder="{{ trans('plugins/member::dashboard.email') }}"
                            autofocus
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
                            placeholder="{{ trans('plugins/member::dashboard.password') }}"
                        >
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <div class="checkbox">
                            <label>
                                <input
                                    name="remember"
                                    type="checkbox"
                                    {{ old('remember') ? 'checked' : '' }}
                                > {{ trans('plugins/member::dashboard.remember-me') }}
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <button
                            class="btn btn-primary btn-full"
                            type="submit"
                        >
                            {{ trans('plugins/member::dashboard.login-cta') }}
                        </button>
                        <div class="text-center">
                            <a class="btn btn-link" href="#" data-toggle="modal" data-target="#register_modal" data-dismiss="modal">Đăng ký tài khoản</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
