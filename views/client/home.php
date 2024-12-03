<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuyCar</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .hero-section {
            background: url('/public/medias/images/header-backgroud.webp') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 80px 0;
        }
        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            height: auto;
        }
        .btn-primary-custom {
            background-color: #00A3FF;
            border: none;
            padding: 10px 20px;
        }
        .why-choose-us {
            background-color: #3a49d9;
            color: white;
            padding: 60px 0;
        }
        .why-choose-us i {
            font-size: 2rem;
        }
        .latest-cars img {
            width: 100%;
            max-width: 300px;
        }
        .partners img {
            max-width: 100px;
            margin: 0 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 40px 0;
            text-align: center;
        }
        .latest-cars-section {
            padding: 50px 30px;
        }
        .latest-cars-list {
            list-style: none;
            padding: 0;
        }
        .latest-cars-list li {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }
        .latest-cars-list li.active {
            background-color: #0056b3;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
        .latest-cars-list li a {
            text-decoration: none;
            color: inherit;
        }
        .latest-cars-list li.active a {
            color: white;
        }
        .latest-car-image img {
            max-width: 100%;
        }
        .latest-cars-link {
            text-align: right;
        }
        .latest-cars-link a {
            color: #0056b3;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

<!-- Hero Section -->
<section class="hero-section text-center text-white d-flex align-items-center">
    <div class="container">
        <h1>Mobil Impian Anda Menunggu di Sini</h1>
        <p>Pilihan mobil berkualitas-harga terjangkau dan pelayanan terbaik hanya ada di sini</p>
        <a href="#" class="btn btn-primary-custom">Hubungi Kami</a>
        <a href="#" class="btn btn-outline-light ms-3">Lebih Lanjut</a>
    </div>
    <div>
        <img src="https://bigwantsyourcar.com/wp-content/uploads/2023/02/side-quater-left.png" alt="">
    </div>
</section>
<!-- Latest Cars Section -->
<section class="latest-cars-section">
    <div class="container">
        <div class="col-12">
            <h2 class="text-center">Apropos</h2>
        </div>
        <div class="col-12">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 border py-4 px-5">
                    <div class="row">
                        <div class="col-12"><h5>Apropos de Nous</h5></div>
                        <div class="col-12 about_title">
                        </div>
                        <div class="about_text">
                            <p>depuis Depuis 2009, nous proposons de voitures de qualités de divers marques. on vous accompagnement     pour mieux choisir la voitures qui vous convient
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="col-12 about_list">
                                <p>faites un essai en 3 étapes</p>
                                <h6>1- <a href="/super-car/supercar/signup">inscrivez vous</a></h6>
                                <h6>2- <a href="/super-car/supercar/contact">connectez vous</a></h6>
                                <h6>3- <a href="/super-car/supercar/essai">demander l'essai en ligne</a></h6>
                            </div>
                            <div class="col-12 py-3">
                                <a href="/super-car/supercar/signup" class="btn btn-primary" style="color: white;">je m'inscris</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 latest-car-image text-end">
                    <img src="https://blog.vpn-autos.com/wp-content/uploads/2021/10/Vendre-sa-voiture-a-un-professionnel.jpg" alt="Toyota Corolla Cross Hybrid GR Sport">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why choose us section -->
<section class="why-choose-us text-center">
    <div class="container">
        <h2>Mengapa membeli mobil di BuyCar?</h2>
        <div class="row mt-5">
            <div class="col-md-4">
                <i class="bi bi-tags-fill"></i>
                <h4>Harga Terjangkau</h4>
                <p>Berbagai pilihan mobil berkualitas dengan harga terjangkau</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-headset"></i>
                <h4>Layanan Ahli</h4>
                <p>Bantuan ahli dalam memilih mobil yang sesuai dengan kebutuhan dan budget</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-hand-thumbs-up"></i>
                <h4>Pembelian Mudah</h4>
                <p>Membeli mobil mudah, menyenangkan dan memuaskan</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest Cars Section -->
<section class="latest-cars py-5">
    <div class="container">
        <h3>Mobil terbaru</h3>
        <div class="row mt-4">
            <div class="col-md-4">
                <h5>Toyota Corolla Cross Hybrid GR Sport</h5>
                <img src="https://via.placeholder.com/300" alt="Toyota">
            </div>
            <div class="col-md-4">
                <h5>Suzuki Grand Vitara</h5>
                <img src="https://via.placeholder.com/300" alt="Suzuki">
            </div>
            <div class="col-md-4">
                <h5>Chevy Omoda 5</h5>
                <img src="https://via.placeholder.com/300" alt="Chevy">
            </div>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="partners py-5 text-center">
    <div class="container">
        <h4>Mitra Kami</h4>
        <div class="d-flex justify-content-center align-items-center mt-4">
            <img src="https://via.placeholder.com/100" alt="Subaru">
            <img src="https://via.placeholder.com/100" alt="Toyota">
            <img src="https://via.placeholder.com/100" alt="Suzuki">
            <img src="https://via.placeholder.com/100" alt="Hyundai">
            <img src="https://via.placeholder.com/100" alt="Nissan">
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>© 2024 BuyCar. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>
</html>

