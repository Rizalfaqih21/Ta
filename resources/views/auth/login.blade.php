<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Goser </title>
    <link rel="shortcut icon" href="{{ asset('goser.png') }}" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login </header>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="field input-field">
                        <input type="email" placeholder="Email" name="email" class="input">
                        @if ($errors->has('email'))
                            <div style="color: red; font-size: 13px;" class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="field input-field">
                        <input type="password" placeholder="Password" name="password" class="password">
                        <i class='bx bx-hide eye-icon'></i>

                        @if ($errors->has('password'))
                            <div style="color: red;font-size: 13px;" class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>


                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="{{ route('register') }}" class="link signup-link">Sign
                            Up</a></span>
                </div>
            </div>

            {{-- <div class="line"></div> --}}



            {{-- <div class="media-options">
                    <a href="#" class="field google">
                        <img src="images/google.png" alt="" class="google-img">
                        <span>Login with Google</span>
                    </a>
                </div> --}}

        </div>
    </section>

    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
