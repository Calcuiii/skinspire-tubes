<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Skinspire - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('public/images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            color: rgb(61, 58, 34);
        }

        .navbar-dark {
            background-color: rgb(110, 108, 71);
        }

        .btn-primary {
            background-color: rgb(203, 199, 199);
            border-color: rgb(203, 199, 199);
        }

        .btn-primary:hover {
            background-color: rgb(204, 204, 204);
            border-color: rgb(204, 204, 204);
        }

        footer {
            background-color: rgb(110, 108, 71);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="container">
            <a href="{{ route('user.view') }}" class="navbar-brand mb-0 h1">
                <img src="{{ Vite::asset('resources/images/llogo.png') }}" alt="Gambar" width="55" height="70">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto">
                        <a href="{{ route('shopping.index') }}" class="nav-link">Shopping</a>
                    </li>
                </ul>
                <div class="d-flex ms-auto align-items-center">
                    <a href="{{ route('profile') }}" class="btn btn-outline-light my-2 ms-md-auto">
                        <i class="bi-person-circle me-1"></i>My Profile
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="text-center py-5"
        style="background: url('images/bg.jpg') no-repeat center center; background-size: cover; color: rgb(61, 58, 34);">
        <div class="container">
            <h1>Welcome to Skinspire</h1>
            <p class="lead">Your one-stop solution for premium skincare products</p>
            <a href="{{ route('shopping.index') }}" class="btn btn-primary">Shop Now</a>
        </div>
    </header>

    <!-- Image Slider Section -->
    <section class="container py-5">
        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#imageSlider" data-bs-slide-to="2"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slider1.jpg" class="d-block w-100" alt="Slide 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Discover Your Glow</h5>
                        <p>Experience the best skincare products tailored for you.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/slider2.jpg" class="d-block w-100" alt="Slide 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Natural Ingredients</h5>
                        <p>Our products are made from 100% natural ingredients.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/slider3.jpg" class="d-block w-100" alt="Slide 3">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Healthy Skin Everyday</h5>
                        <p>Achieve radiant skin with our daily skincare routine.</p>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Product 1 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/produk1.jpg" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Krim Skinspire</h5>
                        <p class="card-text">Krim pelembap wajah untuk kulit sehat dan bercahaya.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/produk2.jpg" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Serum Skinspire</h5>
                        <p class="card-text">Serum vitamin C untuk mencerahkan kulit dan mengurangi noda hitam.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/produk3.jpg" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Masker Skinspire</h5>
                        <p class="card-text">Masker wajah alami dengan kandungan mineral dari laut mati.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Product 4 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/produk4.jpg" class="card-img-top" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Lulur Skinspire</h5>
                        <p class="card-text">Paket perawatan kulit harian untuk semua jenis kulit.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <!-- Product 5 -->
            <div class="col">
                <div class="card h-100">
                    <img src="images/produk5.jpg" class="card-img-top" alt="Product 5">
                    <div class="card-body">
                        <h5 class="card-title">Sunscreen Skinspire</h5>
                        <p class="card-text">Tabir surya SPF 50 untuk melindungi kulit dari sinar UV.</p>
                        <a href="#" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="text-center py-5" style="background-color: rgb(235, 232, 220);">
        <h2 class="mb-4">Watch Our Brand Story</h2>
        <div class="container">
            <video width="100%" height="auto" loop autoplay muted>
                <source src="videos/register.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>

    <!-- Quote Section -->
    <section class="text-center py-5">
        <div class="container">
            <blockquote class="blockquote"
                style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                <h2 class="mb-0">"Investing in your skin is a lifelong commitment."</h2>
            </blockquote>

        </div>
    </section>

    <footer class="text-white text-center py-3">
        <div class="container">
            <p>&copy; 2025 Skinspire. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
