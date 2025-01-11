<?php
include "koneksi.php"; 
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>JAEMINverse</title>
        <link rel="icon" href="https://pbs.twimg.com/media/GPsmKKwasAEZJfS?format=jpg&name=medium" />
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        />
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
        />
    </head>
    <body>
        <!-- nav begin -->
        <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">JAEMINverse</a>
            <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#article">Article</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#schedule">Schedule</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#aboutme">About Me</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.php" target="_blank">Login</a>
                </li>
                <button
                type="button"
                class="btn btn-dark theme"
                id="darkmode"
                title="dark"
                >
                <i class="bi bi-moon-stars-fill"></i>
                </button>
                <button
                type="button"
                class="btn btn-danger theme"
                id="lightmode"
                title="light"
                >
                <i class="bi bi-brightness-high"></i>
                </button>
            </ul>
            </div>
        </div>
        </nav>
        <!-- nav end -->
        <!-- hero begin -->
        <section id="hero" class="text-center p-5 bg-danger-subtle text-sm-start">
        <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
            <img src="https://pbs.twimg.com/media/GdPDpd6awAAChtH?format=jpg&name=large" class="img-fluid rounded-circle border shadow" width="300">
            <div>
                <h1 class="fw-bold display-4">
                    Jaemin’s beauty is effortlessly captivating and unforgettable
                </h1>
                <h4 class="lead display-6">
                    His smile, pure and genuine, carries a magic that can brighten even the gloomiest days
                </h4>
                <h6>
                <span id="tanggal"></span>
                <span id="jam"></span>
                </h6>
            </div>
            </div>
        </div>
        </section>
        <!-- hero end -->
        <!-- article begin -->
        <section id="article" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
                <div class="col">
                <div class="card h-100">
                    <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                    <h5 class="card-title"><?= $row["judul"]?></h5>
                    <p class="card-text">
                        <?= $row["isi"]?>
                    </p>
                    </div>
                    <div class="card-footer">
                    <small class="text-body-secondary">
                        <?= $row["tanggal"]?>
                    </small>
                    </div>
                </div>
                </div>
                <?php
            }
            ?> 
            </div>
        </div>
        </section>
        <!-- article end -->
        <!-- Gallery begin-->
<section id="gallery" class="text-center p-5">
    <div class="container">
        <h1 class="fw-bold display-4 pb-3">Galeri</h1>
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                // Query untuk mengambil data dari database
                $sql = "SELECT * FROM galeri ORDER BY tanggal DESC";
                $hasil = $conn->query($sql);

                // Indikator untuk item aktif
                $isActive = true;

                while ($row = $hasil->fetch_assoc()) {
                    // Tambahkan kelas 'active' hanya pada item pertama
                    $activeClass = $isActive ? 'active' : '';
                    $isActive = false; // Set isActive menjadi false setelah iterasi pertama
                ?>
                    <div class="carousel-item <?= $activeClass ?>">
                        <img src="img/<?= $row['gambar'] ?>" class="d-block w-100" alt="Gambar Galeri" />
                        <div class="carousel-caption d-none d-md-block">
                            <p class="bg-dark text-white p-1 rounded">
                                <?= $row['tanggal'] ?>
                            </p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Tombol navigasi carousel -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<!-- Gallery end-->
        <!-- schedule begin -->
        <section id="schedule" class="text-center p-5">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Schedule</h1>
            <div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center">
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">SENIN</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    Etika Profesi<br />16.20-18.00 | H.4.4
                    </li>
                    <li class="list-group-item">
                    Sistem Operasi<br />18.30-21.00 | H.4.8
                    </li>
                </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">SELASA</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    Pendidikan Kewarganegaraan<br />12.30-13.10 | Kulino
                    </li>
                    <li class="list-group-item">
                    Probabilitas dan Statistik<br />15.30-18.00 | H.4.9
                    </li>
                    <li class="list-group-item">
                    Kecerdasan Buatan<br />18.30-21.00 | H.4.11
                    </li>
                </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">RABU</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    Manajemen Proyek Teknologi Informasi<br />15.30-18.00 | H.4.6
                    </li>
                </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">KAMIS</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    Bahasa Indonesia<br />12.30-14.10 | Kulino
                    </li>
                    <li class="list-group-item">
                    Pendidikan Agama Islam<br />16.20-18.00 | Kulino
                    </li>
                    <li class="list-group-item">
                    Penambangan Data<br />18.30-21.00 | H.4.9
                    </li>
                </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">JUMAT</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    Pemrograman Web Lanjut<br />10.20-12.00 | D.2.K
                    </li>
                </ul>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                <div class="card-header bg-danger text-white">SABTU</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">FREE</li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </section>
        <!-- schedule end -->
        <!-- about me begin -->
        <section id="aboutme" class="text-center p-5 bg-danger-subtle">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="p-3">
                    <img id="profile-image" src="data:image/jpeg;base64,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 "class="rounded-circle border shadow">
                </div>
            <div class="p-md-5 text-sm-start">
                <h3 class="lead">A11.2023.15478</h3>
                <h1 class="fw-bold">Fariida Qurrota 'Aini</h1>
                <h5>Program Studi Teknik Informatika</h5>
                <a href="https://dinus.ac.id/" class="text-decoration-none text-dark fw-bold">Universitas Dian Nuswantoro</a>
            </div>
            </div>
        </div>
        </section>
        <!-- about me end -->
        <!-- footer begin -->
        <footer id="footer" class="text-center p-5">
            <div class="bi">
                <a href="http://surl.li/oxsat" target="_blank"><i class="bi bi-instagram h2 p-2 text-dark"></i></a>
                <a href="http://surl.li/pozmdl" target="_blank"><i class="bi bi-twitter-x h2 p-2 text-dark"></i></a>
                <a href="http://surl.li/jnbiwg" target="_blank"><i class="bi bi-youtube h2 p-2 text-dark"></i></a>
                <a href="http://surl.li/uyeykk" target="_blank"><i class="bi bi-tiktok h2 p-2 text-dark"></i></a>
                <a href="http://surl.li/oxskz" target="_blank"><i class="bi bi-whatsapp h2 p-2 text-dark"></i></a>
            </div>
            <br/>
            <div>
            Copyright &copy; 2024 - <span>Fariida Qurrota 'Aini.</span> All Right Reserved.
            </div>
        </footer>
        <!-- footer end -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        window.setTimeout("tampilWaktu()", 1000);

        function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML =
            waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML =
            waktu.getHours() +
            ":" +
            waktu.getMinutes() +
            ":" +
            waktu.getSeconds();
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
            document.getElementById("darkmode").onclick = function () {
        document.body.style.backgroundColor = "black";

        document.getElementById("hero").classList.replace("bg-danger-subtle", "bg-secondary");
        document.getElementById("hero").classList.replace("text-black", "text-white");

        document.getElementById("article").classList.replace("bg-body-tertiary", "bg-dark");
        document.getElementById("article").classList.remove("text-black");
        document.getElementById("article").classList.add("text-white");

        document.getElementById("gallery").classList.replace("bg-danger-subtle", "bg-secondary");
        document.getElementById("gallery").classList.replace("text-black", "text-white");

        document.getElementById("schedule").classList.replace("bg-body-tertiary", "bg-dark");
        document.getElementById("schedule").classList.remove("text-black");
        document.getElementById("schedule").classList.add("text-white");

        document.getElementById("aboutme").classList.replace("bg-danger-subtle", "bg-secondary");
        document.getElementById("aboutme").classList.replace("text-black", "text-white");

        document.getElementById("footer").classList.remove("text-black");
        document.getElementById("footer").classList.add("text-white");



        const cards = document.getElementsByClassName("card");
        for (let card of cards) {
        card.classList.add("bg-secondary", "text-white");
        }

        const listItems = document.getElementsByClassName("list-group-item");
        for (let item of listItems) {
        item.classList.add("bg-secondary", "text-white");
        }

        const icon = document.getElementsByClassName("bi");
        for (let i=0; i < icon.length; i++){
        icon[i].classList.remove("text-dark");
        icon[i].classList.add("text-white");
        }
    };

        document.getElementById("lightmode").onclick = function () {
        document.body.style.backgroundColor = "white";

        document.getElementById("hero").classList.replace("bg-secondary", "bg-danger-subtle");
        document.getElementById("hero").classList.replace("text-white", "text-black");

        document.getElementById("article").classList.replace("bg-black", "bg-body-tertiary");
        document.getElementById("article").classList.remove("text-black");
        document.getElementById("article").classList.add("text-white");

        document.getElementById("gallery").classList.replace("bg-secondary", "bg-danger-subtle");
        document.getElementById("gallery").classList.replace("text-white", "text-black");

        document.getElementById("aboutme").classList.replace("bg-secondary", "bg-danger-subtle");
        document.getElementById("aboutme").classList.replace("text-white", "text-black");

        document.getElementById("schedule").classList.replace("bg-black", "bg-body-tertiary");
        document.getElementById("schedule").classList.remove("text-black");
        document.getElementById("schedule").classList.add("text-white");

        document.getElementById("footer").classList.replace("text-white", "text-black");

        const cards = document.getElementsByClassName("card");
        for (let card of cards) {
        card.classList.remove("bg-secondary", "text-white");
        }

        const listItems = document.getElementsByClassName("list-group-item");
        for (let item of listItems) {
        item.classList.remove("bg-secondary", "text-white");
        }

        const icon = document.getElementsByClassName("bi");
        for (let i=0; i < icon.length; i++){
        icon[i].classList.remove("text-white");
        icon[i].classList.add("text-dark");
        }
    };
    </script>
    </body>
    </html>