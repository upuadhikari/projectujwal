<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h2>Login Here</h2><br>
    <div class="login">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label><b>Email<br>
                </b>
            </label>
            <input id="Uname" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid" role="alert">
                <br>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br><br>
            <label><b>Password
                </b>
            </label>
            <input id="Pass" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid" role="alert">
                <br>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br><br>
            <input class="form-check-input" type="checkbox" name="remember" id="check" {{ old('remember') ? 'checked' : '' }}>
            <span>Remember me</span>
            <br><br>
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button> <br> <br>
            @if (Route::has('password.request'))
            <a class="#" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </form>
    </div>
</body>
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("{{asset('assetts/img/coverlog.jpg')}}");
        background-size: cover;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    body h2 {
        font-size: 30px;
        color: #23463f;
    }

    .login {

        width: 382px;
        overflow: hidden;
        margin: auto;

        padding: 80px;
        background: #23463f;
        border-radius: 15px;

    }

    h2 {
        text-align: center;
        color: #277582;
        padding: 20px;
    }

    label {
        color: aliceblue;
        font-size: 17px;
    }

    input::placeholder {
        opacity: 0.4;
        font-size: 14px;
    }

    input {
        outline: none;
    }

    #Uname {
        width: 300px;
        height: 30px;
        border: 2px solid gray;
        border-radius: 3px;
        padding-left: 8px;
        margin-top: 5px;
    }

    #Pass {
        width: 300px;
        height: 30px;
        border: 2px solid gray;
        border-radius: 3px;
        padding-left: 8px;
        margin-top: 5px;

    }

    #log {
        width: 300px;
        height: 30px;
        border: none;
        border-radius: 17px;
        padding-left: 7px;
        color: blue;


    }

    span {
        color: white;
        font-size: 17px;
    }

    a {
        color: gray;
        text-decoration: none;
    }

    a:hover {
        color: white;
    }

    .invalid {
        font-size: 12px;
    }

    button {
        background-color: transparent;
        border-radius: 4px;
        padding: 10px 30px;
        font-size: 20px;
        color: white;
    }
</style>

</html>