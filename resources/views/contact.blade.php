<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - FlixPlay</title>
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
        /* ============ MAIN CONTENT ============ */
        .contact-container {
            max-width: 1200px;
            margin: 100px auto 50px;
            padding: 50px;
            min-height: calc(100vh - 100px);
        }
        .contact-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .contact-header h1 {
            font-size: 48px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .contact-header p {
            font-size: 18px;
            color: #b0b0b0;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        /* ============ CONTACT CONTENT ============ */
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-top: 50px;
        }
        /* ============ CONTACT INFO ============ */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .info-item {
            background: linear-gradient(135deg, #1a1a3e, #0f1a2e);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid rgba(233, 75, 60, 0.2);
            transition: all 0.3s;
        }
        .info-item:hover {
            border-color: rgba(233, 75, 60, 0.6);
            box-shadow: 0 10px 30px rgba(233, 75, 60, 0.2);
        }
        .info-item h3 {
            font-size: 20px;
            color: #e94b3c;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-item i {
            font-size: 24px;
        }
        .info-item p {
            color: #b0b0b0;
            line-height: 1.6;
        }
        .info-item a {
            color: #00d4d4;
            text-decoration: none;
            transition: color 0.3s;
        }
        .info-item a:hover {
            color: #e94b3c;
        }
        /* ============ CONTACT FORM ============ */
        .contact-form {
            background: linear-gradient(135deg, rgba(233, 75, 60, 0.05) 0%, rgba(0, 212, 212, 0.05) 100%);
            padding: 40px;
            border-radius: 12px;
            border: 1px solid rgba(233, 75, 60, 0.2);
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            color: #e94b3c;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(233, 75, 60, 0.3);
            border-radius: 8px;
            background-color: rgba(26, 26, 62, 0.5);
            color: #e5e5e5;
            font-size: 14px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #e94b3c;
            background-color: rgba(26, 26, 62, 0.7);
            box-shadow: 0 0 10px rgba(233, 75, 60, 0.3);
        }
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #e94b3c, #00d4d4);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 0 20px rgba(233, 75, 60, 0.3);
        }
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 25px rgba(233, 75, 60, 0.5);
        }
        /* ============ FOOTER ============ */
        footer {
            background: linear-gradient(to right, rgba(10, 14, 39, 0.9), rgba(26, 26, 62, 0.9));
            padding: 50px;
            border-top: 2px solid #e94b3c;
            text-align: center;
            color: #888;
            font-size: 14px;
            margin-top: 50px;
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
            .contact-content {
                grid-template-columns: 1fr;
            }
            .contact-header h1 {
                font-size: 32px;
            }
            .contact-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- ============ NAVBAR ============ -->
    <nav>
        <div class="logo">▶ FlixPlay</div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <div class="nav-profile">
            <input type="text" class="search-box" placeholder="Cari konten...">
            <div class="profile-icon">👤</div>
        </div>
    </nav>

    <!-- ============ CONTACT SECTION ============ -->
    <div class="contact-container">
        <div class="contact-header">
            <h1>Hubungi Kami</h1>
            <p>Kami siap membantu Anda. Jangan ragu untuk menghubungi kami dengan pertanyaan atau saran apapun tentang FlixPlay.</p>
        </div>

        <div class="contact-content">
            <!-- ============ CONTACT INFO ============ -->
            <div class="contact-info">
                <div class="info-item">
                    <h3><i class="bi bi-geo-alt-fill"></i> Lokasi</h3>
                    <p>Jalan Streaming No. 123<br>Jakarta, Indonesia 12345</p>
                </div>
                <div class="info-item">
                    <h3><i class="bi bi-telephone-fill"></i> Telepon</h3>
                    <p><a href="tel:+621234567890">+62 123 456 7890</a></p>
                </div>
                <div class="info-item">
                    <h3><i class="bi bi-envelope-fill"></i> Email</h3>
                    <p><a href="mailto:support@flixplay.com">support@flixplay.com</a></p>
                </div>
                <div class="info-item">
                    <h3><i class="bi bi-clock-fill"></i> Jam Operasional</h3>
                    <p>Senin - Jumat: 09:00 - 17:00<br>Sabtu - Minggu: 10:00 - 16:00</p>
                </div>
            </div>

            <!-- ============ CONTACT FORM ============ -->
            <form class="contact-form">
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">
                </div>
                <div class="form-group">
                    <label for="subject">Subjek</label>
                    <input type="text" id="subject" name="subject" required placeholder="Topik pertanyaan Anda">
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" required placeholder="Tuliskan pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="btn-submit">Kirim Pesan</button>
            </form>
        </div>
    </div>

    <!-- ============ FOOTER ============ -->
    <footer>
        <p>&copy; 2024 FlixPlay. All rights reserved.</p>
        <p>Platform streaming premium untuk hiburan Anda</p>
        <div class="footer-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('contact') }}">Kontak</a>
            <a href="#">Privasi</a>
        </div>
    </footer>
</body>
</html>