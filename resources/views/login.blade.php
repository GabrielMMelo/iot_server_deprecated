<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('partials.login-link')
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16 form-group{{ $errors->has('email') ? ' has-error' : '' }}" data-validate="Please enter email">
						<input class="input100" type="text" name="email" placeholder="Seu email" value="{{ old('email') }}" >
						<span class="focus-input100"></span>
						@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="wrap-input100 validate-input form-group{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						@if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					</div>

					<div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="{{ route('password.request') }}" class="txt2">
							Username / Password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Don’t have an account?
						</span>

						<a href="{{ route('register') }}" class="txt3">
							Sign up now
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	@include('partials.login-script')

</body>
</html>