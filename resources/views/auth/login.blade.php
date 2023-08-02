<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>
    <!-- importing fontawesome kit -->
    <script src="https://kit.fontawesome.com/667417c7ec.js" crossorigin="anonymous"></script>

    <!--    -->

    <!-- Lets add some styling -->
    <style>
        body {
            background: #dae2ec;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 0;
            margin: 0;
            height: 100vh;
            width: 100vw;
            min-height: 600px;
            font-family: Arial, Helvetica, Verdana;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: white;
            width: 380px;
            margin: auto;
            height: 500px;
            border-radius: 25px;
            box-shadow: 0 0 5px rgb(117, 113, 113);
        }

        #account {
            position: relative;
            font-size: 90px;
            color: white;
            padding: 19px;
            background: #005b8f;
            border-radius: 10px;
            border-bottom-left-radius: 100px;
            border-bottom-right-radius: 100px;
            top: -60px;
            left: calc(50% - 74px);
        }

        .tabs {
            display: flex;
            position: relative;
            top: -25px;
            justify-content: center;
            color: rgb(73, 71, 71);
            height: 25px;
        }

        .reg-tab,
        .login-tab {
            width: 50%;
            text-align: center;
            padding-bottom: 10px;
            margin: auto 25px;
            cursor: pointer;
        }

        .reg-tab:hover,
        .login-tab:hover {
            color: rgb(10, 51, 98);
            border-bottom: 4px solid #005b8f;
        }

        .active {
            color: rgb(10, 51, 98);
            border-bottom: 4px solid #005b8f;
        }

        #login-form {
            display: block;
            padding-top: 25px;
        }

        form {
            width: 90%;
            display: flex;
            flex-direction: column;
            margin: 15px auto;
        }

        input {
            height: 27px;
            margin: 5px;
            border-radius: 15px;
            border: none;
            outline: none;
            background-color: rgb(209, 209, 209);
            padding: 5px;
            font-size: 17px;
            color: rgb(73, 73, 73);
            text-align: center;
        }

        p {
            margin: 0;
            padding: 0;
        }

        .options {
            display: flex;
            align-items: center;
            margin-top: 25px;
            font-style: italic;
        }

        .remember {
            display: flex;
            align-items: center;
            width: 50%;
            text-align: center;
        }

        button {
            margin: 20px auto;
            font-size: 20px;
            background-color: #0072b3;
            color: white;
            padding: 10px 45px;
            border-radius: 18px;
            box-shadow: 0 0 2px rgb(117, 113, 113);
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: rgba(0, 81, 255, 0.781);
        }

        #registration-form {
            display: none;
        }

        .tnc {
            display: flex;
            align-items: center;
            margin: auto;
            color: rgb(54, 52, 52);
            font-style: italic;
        }

        /* making design responsive */

        @media screen and (max-width:600px) {
            .container {
                width: 90%;
            }
        }

        @media screen and (max-width:350px) {
            .container {
                width: 320px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <i id="account" class="fas fa-users"></i>
        <div class="tabs">
            <h2 class="reg-tab">{{ __('Register') }}</h2>
            <h2 class="login-tab">{{ __('Login') }}</h2>
        </div>
        <!-- login part -->
        <div id="login-form">
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="E-mail" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" placeholder="Password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="options">
                    <div class="remember">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                            ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                <button type="submit">{{ __('Login') }}</button>
            </form>
        </div>

        <!-- Lets add registration form -->
        <div id="registration-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Passsword"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Passsword" required autocomplete="new-password">
                
                <button type="submit">{{ __('Register') }}</button>
            </form>
        </div>

    </div>
    <!-- lets use some javascript to make these tabs to work -->
    <script>
        const reg_form = document.querySelector("#registration-form");
        const login_form = document.querySelector("#login-form");

        const reg_tab = document.querySelector('.reg-tab');
        const login_tab = document.querySelector('.login-tab');

        reg_tab.addEventListener('click', e => {
            login_form.style.display = 'none';
            reg_form.style.display = 'block';
            reg_tab.classList.add('active');
            login_tab.classList.remove('active')
        })
        login_tab.addEventListener('click', e => {
            reg_form.style.display = 'none';
            login_form.style.display = 'block';
            reg_tab.classList.remove('active');
            login_tab.classList.add('active')
        })

    </script>
</body>

</html>