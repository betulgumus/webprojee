<?php
/* ===================================================
   basari.php — Başarılı Giriş Sayfası
   =================================================== */
session_start();

/* Direkt erişimi engelle - session yoksa login'e yönlendir */
if (!isset($_SESSION['ogrenci_no'])) {
    header('Location: login.html?hata=yetkisiz');
    exit;
}

$ogrenci_no   = htmlspecialchars($_SESSION['ogrenci_no'], ENT_QUOTES, 'UTF-8');
$giris_tarihi = htmlspecialchars($_SESSION['giris_tarihi'] ?? date('d.m.Y H:i:s'), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hoşgeldiniz | Betül Gümüş</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <style>
    .success-icon {
      width: 80px; height: 80px;
      background: #16a34a;
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 2.2rem; margin: 0 auto 2rem;
      color: #fff;
    }
    .welcome-card {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius-lg);
      padding: 48px 44px;
      max-width: 500px; margin: auto;
      text-align: center;
      box-shadow: var(--shadow);
    }
    .info-pill {
      display: inline-flex; align-items: center; gap: 8px;
      background: #f0fdf4;
      border: 1px solid #86efac;
      border-radius: 50px;
      color: #16a34a; padding: 6px 18px;
      font-size: 0.85rem; font-weight: 600;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
      <div class="brand-logo">BG</div>
      <span class="brand-text">Betül Gümüş</span>
    </a>
    <div class="ms-auto">
      <a href="cikis.php" class="btn-outline-gold text-decoration-none" style="padding:6px 16px; font-size:0.88rem;">
        <i class="bi bi-box-arrow-right"></i> Çıkış Yap
      </a>
    </div>
  </div>
</nav>

<main style="min-height:100vh; display:flex; align-items:center; background: var(--bg-secondary);">
  <div class="container py-5">
    <div class="welcome-card">

      <div class="success-icon">✓</div>

      <div class="info-pill mb-4">
        <i class="bi bi-shield-check-fill"></i> Giriş Başarılı
      </div>

      <h1 style="font-family:'Playfair Display',serif; font-size:2rem; font-weight:800; margin-bottom:0.5rem;">
        Hoşgeldiniz 👋
      </h1>

      <h2 style="color:var(--accent); font-size:1.3rem; font-weight:700; margin-bottom:1.5rem;">
        <?php echo $ogrenci_no; ?>
      </h2>

      <p style="color:var(--text-secondary); margin-bottom:2rem; line-height:1.8;">
        Sakarya Üniversitesi öğrenci portalına başarıyla giriş yaptınız.<br />
        Giriş tarihi: <strong style="color:var(--text-primary);"><?php echo $giris_tarihi; ?></strong>
      </p>

      <div class="card-dark mb-4" style="text-align:left;">
        <div style="font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; color:var(--text-muted); margin-bottom:12px;">Oturum Bilgileri</div>
        <div style="display:flex; gap:10px; margin-bottom:8px;">
          <i class="bi bi-person-fill" style="color:var(--accent);"></i>
          <span style="font-size:0.9rem; color:var(--text-secondary);"><?php echo $ogrenci_no; ?></span>
        </div>
        <div style="display:flex; gap:10px; margin-bottom:8px;">
          <i class="bi bi-envelope-fill" style="color:var(--accent);"></i>
          <span style="font-size:0.9rem; color:var(--text-secondary);"><?php echo $ogrenci_no; ?>@sakarya.edu.tr</span>
        </div>
        <div style="display:flex; gap:10px;">
          <i class="bi bi-clock-fill" style="color:var(--accent);"></i>
          <span style="font-size:0.9rem; color:var(--text-secondary);"><?php echo $giris_tarihi; ?></span>
        </div>
      </div>

      <div class="d-flex gap-3 justify-content-center flex-wrap">
        <a href="index.html" class="btn-gold text-decoration-none">
          <i class="bi bi-house-fill"></i> Ana Sayfa
        </a>
        <a href="cikis.php" class="btn-outline-gold text-decoration-none">
          <i class="bi bi-box-arrow-right"></i> Çıkış Yap
        </a>
      </div>

    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
