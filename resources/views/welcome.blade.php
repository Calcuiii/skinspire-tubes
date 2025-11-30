<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlixPlay - Platform Streaming</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1a3e 50%, #0a0e27 100%);
            color: #e5e5e5;
            min-height: 100vh;
        }
        /* ============ NAVBAR ============ */
        nav {
            background: linear-gradient(to right, rgba(10, 14, 39, 0.95), rgba(26, 26, 62, 0.95));
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid #e94b3c;
            backdrop-filter: blur(10px);
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 2px;
        }
        .nav-links {
            display: flex;
            gap: 30px;
            list-style: none;
        }
        .nav-links a {
            color: #e5e5e5;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s;
            position: relative;
        }
        .nav-links a:hover {
            color: #e94b3c;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #e94b3c, #00d4d4);
            transition: width 0.3s;
        }
        .nav-links a:hover::after {
            width: 100%;
        }
        .nav-profile {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .search-box {
            padding: 8px 15px;
            border-radius: 20px;
            border: 1px solid #e94b3c;
            background-color: rgba(233, 75, 60, 0.1);
            color: #e5e5e5;
            width: 150px;
            transition: all 0.3s;
        }
        .search-box:focus {
            outline: none;
            background-color: rgba(233, 75, 60, 0.2);
            box-shadow: 0 0 10px rgba(233, 75, 60, 0.3);
        }
        .profile-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .profile-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 0 15px rgba(233, 75, 60, 0.5);
        }
        /* ============ HERO SECTION ============ */
        .hero {
            height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 50px;
            color: white;
            margin-top: 70px;
            position: relative;
            border-bottom: 3px solid #e94b3c;
        }
        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(rgba(10, 14, 39, 0.6), rgba(26, 26, 62, 0.8));
            z-index: 2;
            pointer-events: none;
        }
        .hero-content {
            position: relative;
            z-index: 3;
        }
        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(233, 75, 60, 0.3);
        }
        .hero-content p {
            font-size: 18px;
            margin-bottom: 20px;
            max-width: 600px;
            line-height: 1.6;
            color: #b0b0b0;
        }
        .hero-buttons {
            display: flex;
            gap: 15px;
        }
        .btn-watch, .btn-info {
            padding: 12px 30px;
            font-size: 16px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .btn-watch {
            background: linear-gradient(135deg, #e94b3c, #d63a2a);
            color: #fff;
            box-shadow: 0 0 20px rgba(233, 75, 60, 0.4);
        }
        .btn-watch:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 25px rgba(233, 75, 60, 0.6);
        }
        .btn-info {
            background-color: rgba(0, 212, 212, 0.2);
            color: #00d4d4;
            border: 2px solid #00d4d4;
        }
        .btn-info:hover {
            background-color: rgba(0, 212, 212, 0.3);
            box-shadow: 0 0 15px rgba(0, 212, 212, 0.4);
        }
        /* ============ CATEGORY SECTION ============ */
        .category-section {
            padding: 50px;
        }
        .category-title {
            font-size: 24px;
            background: linear-gradient(90deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .movie-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }
        .movie-card {
            background: linear-gradient(135deg, #1a1a3e, #0f1a2e);
            border-radius: 12px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            height: 300px;
            border: 1px solid rgba(233, 75, 60, 0.2);
        }
        .movie-card:hover {
            transform: scale(1.05) translateY(-10px);
            box-shadow: 0 15px 40px rgba(233, 75, 60, 0.3), 0 0 20px rgba(0, 212, 212, 0.2);
            border-color: rgba(233, 75, 60, 0.6);
        }
        .movie-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: opacity 0.3s;
        }
        .movie-card:hover img {
            opacity: 0.7;
        }
        .movie-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(10, 14, 39, 0.95), transparent);
            padding: 15px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }
        .movie-card:hover .movie-overlay {
            transform: translateY(0);
        }
        .movie-title {
            background: linear-gradient(90deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .movie-rating {
            color: #e5e5e5;
            font-size: 12px;
            margin-bottom: 10px;
        }
        .movie-actions {
            display: flex;
            gap: 10px;
        }
        .icon-btn {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            border: none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s;
            box-shadow: 0 0 10px rgba(233, 75, 60, 0.3);
        }
        .icon-btn:hover {
            transform: scale(1.15);
            box-shadow: 0 0 15px rgba(233, 75, 60, 0.6);
        }
        /* ============ FEATURED SECTION ============ */
        .featured-section {
            padding: 50px;
            background: linear-gradient(135deg, rgba(233, 75, 60, 0.05) 0%, rgba(0, 212, 212, 0.05) 100%);
            border-left: 5px solid #e94b3c;
            margin: 50px;
            border-radius: 15px;
            border: 1px solid rgba(233, 75, 60, 0.2);
        }
        .featured-title {
            font-size: 32px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .featured-desc {
            font-size: 16px;
            margin-bottom: 20px;
            line-height: 1.6;
            max-width: 700px;
            color: #b0b0b0;
        }
        .featured-img {
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            margin-top: 20px;
            border: 2px solid #e94b3c;
            box-shadow: 0 0 20px rgba(233, 75, 60, 0.3);
            transition: all 0.3s;
        }
        .featured-img:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(233, 75, 60, 0.5);
        }
        /* ============ FOOTER ============ */
        footer {
            background: linear-gradient(to right, rgba(10, 14, 39, 0.9), rgba(26, 26, 62, 0.9));
            padding: 50px;
            border-top: 2px solid #e94b3c;
            text-align: center;
            color: #888;
            font-size: 14px;
        }
        footer p {
            margin: 10px 0;
        }
        .footer-links {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 30px;
        }
        .footer-links a {
            background: linear-gradient(90deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            transition: all 0.3s;
        }
        .footer-links a:hover {
            filter: brightness(1.2);
        }
        @media (max-width: 768px) {
            nav {
                padding: 15px 20px;
            }
            .nav-links {
                gap: 15px;
                font-size: 12px;
            }
            .hero {
                height: 400px;
                padding: 30px;
            }
            .hero-content h1 {
                font-size: 32px;
            }
            .category-section, .featured-section {
                padding: 30px 20px;
            }
            .movie-container {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- ============ NAVBAR ============ -->
    <nav>
        <div class="logo">▶ FlixPlay</div>
        <ul class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('contact') }}">Contact</a>
        </ul>
        <div class="nav-profile">
            <input type="text" class="search-box" placeholder="Cari konten...">
            <div class="profile-icon">👤</div>
        </div>
    </nav>

    <!-- ============ HERO SECTION ============ -->
    <section class="hero" id="home">
        <video autoplay muted loop>
            <source src="{{ asset('videos/trailer.mp4') }}" type="video/mp4">
            Browser Anda tidak mendukung video HTML5
        </video>
        
        <div class="hero-content">
            <h1>Sore : Istri dari Masa Depan</h1>
            <p>Film Sore: Istri dari Masa Depan menceritakan kisah cinta lintas waktu tentang Sore, seorang wanita dari masa depan, yang datang ke masa lalu untuk mengubah kebiasaan suaminya, Jonathan, agar terhindar dari takdir buruk</p>
            <div class="hero-buttons">
                <button class="btn-watch"><i class="bi bi-play-fill"></i> Tonton Sekarang</button>
                <button class="btn-info"><i class="bi bi-info-circle"></i> Informasi Lebih Lanjut</button>
            </div>
        </div>
    </section>

    <!-- ============ TRENDING SECTION ============ -->
    <section class="category-section" id="trending">
        <h2 class="category-title">🔥 TRENDING SEKARANG</h2>
        <div class="movie-container">
            <div class="movie-card">
                <img src="{{ asset('images/film1.jpeg') }}" alt="Film 1">
                <div class="movie-overlay">
                    <div class="movie-title">Mungkin Kita Perlu Waktu</div>
                    <div class="movie-rating">⭐ 8.5/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film2.jpeg') }}" alt="Film 2">
                <div class="movie-overlay">
                    <div class="movie-title">The Witch</div>
                    <div class="movie-rating">⭐ 8.2/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film3.jpeg') }}" alt="Film 3">
                <div class="movie-overlay">
                    <div class="movie-title">Raya And The Last Oragon</div>
                    <div class="movie-rating">⭐ 9.0/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film4.jpeg') }}" alt="Film 4">
                <div class="movie-overlay">
                    <div class="movie-title">Ada Apa Dengan Cinta?</div>
                    <div class="movie-rating">⭐ 7.8/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film5.jpeg') }}" alt="Film 5">
                <div class="movie-overlay">
                    <div class="movie-title">Cinta Dalam Ikhlas</div>
                    <div class="movie-rating">⭐ 8.7/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film6.jpeg') }}" alt="Film 6">
                <div class="movie-overlay">
                    <div class="movie-title">Arriety</div>
                    <div class="movie-rating">⭐ 8.4/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FEATURED SECTION ============ -->
    <section class="featured-section" id="featured">
        <h2 class="featured-title">✨ PILIHAN EDITOR</h2>
        <p class="featured-desc"> The Wind Rises adalah film biografi animasi karya Hayao Miyazaki yang mengikuti kehidupan insinyur pesawat legendaris Jepang, Jiro Horikoshi, dan pengembangan pesawat tempur Mitsubishi A6M "Zero" selama Perang Dunia II. Film ini berfokus pada impian masa kecil Jiro, kesulitan yang dihadapinya karena rabun jauh, dan perannya yang kompleks sebagai pencipta di tengah-tengah perang. </p>
        <img src="{{ asset('images/film7.jpeg') }}" alt="Featured" class="featured-img">
    </section>

    <!-- ============ POPULAR SECTION ============ -->
    <section class="category-section" id="movies">
        <h2 class="category-title">⭐ POPULER DI FLIXPLAY</h2>
        <div class="movie-container">
            <div class="movie-card">
                <img src="{{ asset('images/film8.jpeg') }}" alt="Populer 1">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 1</div>
                    <div class="movie-rating">⭐ 9.1/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film9.jpeg') }}" alt="Populer 2">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 2</div>
                    <div class="movie-rating">⭐ 8.9/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film10.jpeg') }}" alt="Populer 3">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 3</div>
                    <div class="movie-rating">⭐ 8.6/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film11.jpeg') }}" alt="Populer 4">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 4</div>
                    <div class="movie-rating">⭐ 8.8/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film12.jpeg') }}" alt="Populer 5">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 5</div>
                    <div class="movie-rating">⭐ 9.2/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
            <div class="movie-card">
                <img src="{{ asset('images/film13.jpeg') }}" alt="Populer 6">
                <div class="movie-overlay">
                    <div class="movie-title">Judul Populer 6</div>
                    <div class="movie-rating">⭐ 8.5/10</div>
                    <div class="movie-actions">
                        <button class="icon-btn"><i class="bi bi-play-fill"></i></button>
                        <button class="icon-btn"><i class="bi bi-plus"></i></button>
                        <button class="icon-btn"><i class="bi bi-hand-thumbs-up"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ FOOTER ============ -->
    <footer id="contact">
        <p>&copy; 2024 FlixPlay. All rights reserved.</p>
        <p>Platform streaming premium untuk hiburan Anda</p>
        <div class="footer-links">
            <a href="#home">Beranda</a>
            <a href="#trending">Trending</a>
            <a href="#movies">Film</a>
            <a href="#contact">Kontak</a>
            <a href="#privacy">Privasi</a>
        </div>
    </footer>
</body>
</html>