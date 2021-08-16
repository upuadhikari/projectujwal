<!DOCTYPE html>
<html>

<head>
    <title>Register Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <h2>Register Here</h2><br>
    <div class="login">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label><b>{{ __('Name') }}<br>
                </b>
            </label>
            <input id="Uname" placeholder="Enter Your Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br><br>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <label><b>{{ __('E-Mail') }}<br>
                </b>
            </label>
            <input id="Uname" placeholder="Enter Your Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
            <input id="Pass" placeholder="Your Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid" role="alert">
                <br>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br><br>

            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>{{ __('Confirm Password') }}
                </b>
            </label><br>
            <input id="Pass" placeholder="Confirm Your Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"><br><br>


            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
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
        margin: 20 0 0 450px;
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
        float: right;
        background-color: grey;
        padding: 10px 10px;
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