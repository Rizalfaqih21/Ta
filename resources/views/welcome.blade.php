<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Goser</title>
    <link rel="stylesheet" href="{{asset('css/style3.css')}}">
    <!-- Fontawesome Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/style2.css')}}">
</head>

<body>
    <header>
        <nav class="navbar">
            <h2 class="logo"><a href="#">GO Service</a></h2>
            <input type="checkbox" id="menu-toggler">
            <label for="menu-toggler" id="hamburger-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" width="24px"
                    height="24px">
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path d="M3 18h18v-2H3v2zm0-5h18V11H3v2zm0-7v2h18V6H3z" />
                </svg>
            </label>
            <ul class="all-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#layanan">Layanan</a></li>
            </ul>
        </nav>
    </header>

    <section class="homepage" id="home">
        <div class="content">
            <div class="text">
                <h1>Welcome To Go Service</h1>
                <p>
                    Solusi Masalah Alat Elektronik Anda. <br> Konsultasi atau Servis Segera!.</p>
            </div>
            <a href="#layanan">Order Now</a>
        </div>
    </section>

    <section class="layanan" id="layanan">
        <h2>Layanan Goser</h2>
        <p>Silahkan Order Layanan.</p>
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="{{asset('images/profile1.jpg')}}" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Service AC</h2>
                            <p class="description">Ceritakan Keluhan Masalah Kerusakan Anda.</p>

                            <a href="{{route('login')}}" style="text-decoration: none" class="button">Order Now</a>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">
                            <span class="overlay"></span>

                            <div class="card-image">
                                <img src="{{asset('images/profile2.jpg')}}" alt="" class="card-img">
                            </div>
                        </div>

                        <div class="card-content">
                            <h2 class="name">Service Elektronik</h2>
                            <p class="description">Ceritakan Keluhan Masalah Kerusakan Anda.</p>

                            <a href="{{route('login')}}" style="text-decoration: none" class="button">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <footer>
        <div>
            <span>©Go Service</span>
            <span class="link">
                <a href="#">Home</a>
            </span>
        </div>
    </footer>

</body>


<!-- Swiper JS -->
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>

<!-- JavaScript -->
<script src="{{asset('js/script2.js')}}"></script>

</html>
