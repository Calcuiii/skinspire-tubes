<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        /* Basic CSS for layout */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 15px;
        }
        
        .navbar.navbar-dark {
            background-color: rgb(110, 108, 71);
            color: white;
        }

        .product-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
            text-align: center;
            padding: 20px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .product-card h3 {
            font-size: 1.5rem;
            margin: 15px 0;
        }

        .product-card p {
            color: #555;
            font-size: 1rem;
            margin: 10px 0;
        }

        .product-card .price {
            font-size: 1.2rem;
            color: #333;
            font-weight: 500;
            margin: 10px 0;
        }

        .product-card .buy-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-card .buy-button:hover {
            background-color: #218838;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
        <div class="container">
            <a href="{{ route('user') }}" class="navbar-brand mb-0 h1">
                <img src="{{ Vite::asset('resources/images/llogo.png') }}" alt="Logo" width="55" height="70">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav flex-row flex-wrap">
                    <li class="nav-item col-2 col-md-auto">
                        <a href="{{ route('shopping') }}" class="nav-link">Shopping</a>
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

    <!-- Content -->
    <div class="container">
        <div class="product-list">
            @foreach ($products as $product)
                <div class="product-card">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description ?? 'No description available' }}</p>
                    <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                    <form action="{{ route('shopping.buy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="number" name="quantity" min="1" value="1" required
                            class="form-control" style="width: 60px; text-align: center;">
                        <button type="submit" class="buy-button">Buy Now</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>