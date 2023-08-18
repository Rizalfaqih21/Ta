<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Goser </title>
    <link rel="shortcut icon" href="{{ asset('goser.png') }}" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="container forms">

        <!-- Signup Form -->

        <div class="form login">
            <div class="form-content">
                <header>Signup</header>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input">
                        @if ($errors->has('email'))
                            <div style="color: red; font-size: 13px;" class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Create password" class="password">
                        @if ($errors->has('password'))
                            <div style="color: red; font-size: 13px;" class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password_confirmation" placeholder="Confirm password"
                            class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field input-field">
                        <select name="roles" id="roles" class="input">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Sign Up</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Already have an account? <a href="{{ route('login') }}"
                            class="link login-link">Login</a></span>
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
