<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Teknolojileri Projesi | Hakkında</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">WebProje</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Hakkında</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/cv.php">Özgeçmiş</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/sehrim.php">Şehrim</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/mirasimiz.php">Mirasımız</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/ilgi-alanlarim.php">İlgi Alanlarım</a></li>
                    <li class="nav-item"><a class="nav-link" href="pages/iletisim.php">İletişim</a></li>
                    <li class="nav-item"><a class="btn btn-outline-primary ms-lg-2" href="pages/login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-light py-5">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center">
                <div class="col-lg-8 col-xl-7 col-xxl-6">
                    <div class="my-5 text-center text-xl-start">
                        <h1 class="display-5 fw-bolder text-dark mb-2">Merhaba, Ben Web Teknolojileri Öğrencisi</h1>
                        <p class="lead fw-normal text-muted mb-4">Bu web sitesi, 2025-2026 Bahar Dönemi Web Teknolojileri dersi kapsamında geliştirilmiştir. Hem teknik becerilerimi hem de ilgi alanlarımı burada bulabilirsiniz.</p>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                            <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#hakkimda">Daha Fazla</a>
                            <a class="btn btn-outline-dark btn-lg px-4" href="pages/cv.php">Özgeçmişim</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                    <img class="img-fluid rounded-3 my-5" src="img/profil.jpg" alt="Profil Resmi" />
                </div>
            </div>
        </div>
    </header>

    <section class="py-5" id="hakkimda">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Hobilerim ve Etkinlikler</h2></div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <h2 class="h5">Sistem Programlama</h2>
                            <p class="mb-0">Düşük seviyeli diller ve donanım mimarileri üzerine çalışmaktan keyif alıyorum.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <h2 class="h5">Yapay Zeka</h2>
                            <p class="mb-0">Görüntü işleme ve derin öğrenme modelleri geliştirmek hobilerim arasında.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container px-5 my-5">
            <div class="text-center">
                <h2 class="fw-bolder">Tanıtım Videosu</h2>
                <div class="ratio ratio-16x9 mt-4 mx-auto" style="max-width: 800px;">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Tanıtım Videosu" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; 2026 - Tüm Hakları Saklıdır.</div></div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>