<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@vite(['resources/css/login/css/util.css', 'resources/css/login/css/main.css', 'resources/js/login/js/main.js'])
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title p-b-26">
        Welcome
    </span>
    <span class="login100-form-title p-b-48">
        <i class="zmdi zmdi-font"></i>
    </span>

    <!-- Email Field -->
    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
        <input class="input100" type="email" name="email" value="{{ old('email') }}" required>
        <span class="focus-input100" data-placeholder="Email"></span>
        @if($errors->has('email'))
            <div class="alert alert-danger mt-5" style="background-color: #f8d7da; margin-top:10px; color: #721c24; padding: 10px; border-radius: 10px;">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>

    <!-- Password Field -->
    <div class="wrap-input100 validate-input" data-validate="Enter password">
        <span class="btn-show-pass">
            <i class="zmdi zmdi-eye"></i>
        </span>
        <input class="input100" type="password" name="password" required>
        <span class="focus-input100" data-placeholder="Password"></span>
        @if($errors->has('password'))
            <div class="alert alert-danger mt-5" style="background-color: #f8d7da; margin-top:10px; color: #721c24; padding: 10px; border-radius: 10px;">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>

    <!-- Login Button -->
    <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <button class="login100-form-btn">
                Login
            </button>
        </div>
    </div>

    <!-- General Login Error Message -->
    <div class="mt-5">
        @if ($errors->has('login_error'))
            <div class="alert alert-danger mt-5" style="background-color: #f8d7da; margin-top:10px; color: #721c24; padding: 10px; border-radius: 10px;">
                {{ $errors->first('login_error') }}
            </div>
        @endif
    </div>

    <!-- Sign-Up Link -->
    <div class="text-center p-t-115">
        <span class="txt1">
            Don’t have an account?
        </span>

        <a class="txt2" href="{{ route('register.form') }}">
            Sign Up
        </a>
    </div>
</form>

			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
</body>

</html>