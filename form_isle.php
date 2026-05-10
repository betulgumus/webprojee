<?php
/* ===================================================
   form_isle.php — İletişim Formu Sunucu Tarafı İşleme
   POST verilerini alır ve düzenli biçimde ekrana yazdırır.
   =================================================== */

/* Yalnızca POST isteğini kabul et */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: iletisim.html');
    exit;
}

/* Güvenli veri okuma fonksiyonu */
function temizle($deger) {
    return htmlspecialchars(strip_tags(trim($deger)), ENT_QUOTES, 'UTF-8');
}

/* Form verilerini oku ve temizle */
$ad           = temizle($_POST['ad']           ?? '');
$soyad        = temizle($_POST['soyad']        ?? '');
$email        = temizle($_POST['email']        ?? '');
$telefon      = temizle($_POST['telefon']      ?? '');
$yas          = temizle($_POST['yas']          ?? '');
$dogum_tarihi = temizle($_POST['dogum_tarihi'] ?? '');
$konu         = temizle($_POST['konu']         ?? '');
$mesaj        = temizle($_POST['mesaj']        ?? '');
$iletisim_tercihi = temizle($_POST['iletisimTercihi'] ?? '');
$bulten       = isset($_POST['bulten']) ? 'Evet' : 'Hayır';
$gizlilik     = isset($_POST['gizlilik']) ? 'Kabul Edildi' : 'Kabul Edilmedi';
$tarih        = date('d.m.Y H:i:s');

/* Konu etiketi */
$konuEtiketleri = [
    'is_birligi' => 'İş Birliği',
    'proje'      => 'Proje Teklifi',
    'staj'       => 'Staj / İşe Alım',
    'satranc'    => 'Satranç Eğitimi',
    'diger'      => 'Diğer',
];
$konuGorunum = $konuEtiketleri[$konu] ?? $konu;
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form Sonucu | Betül Gümüş</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <link rel="stylesheet" href="css/style.css" />
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
      <a href="iletisim.html" class="btn-outline-gold text-decoration-none" style="padding:6px 16px; font-size:0.88rem;">
        <i class="bi bi-arrow-left"></i> Forma Dön
      </a>
    </div>
  </div>
</nav>

<div class="page-wrapper">
  <section style="min-height:100vh; display:flex; align-items:center;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-lg-8">

          <!-- Başarı Başlığı -->
          <div class="text-center mb-5">
            <div style="font-size:4rem; margin-bottom:1rem;">✅</div>
            <h1 class="section-title">Form Başarıyla Alındı!</h1>
            <p style="color:var(--text-secondary);">
              Mesajınız sunucu tarafında işlendi. Aşağıda gönderdiğiniz bilgiler listelenmiştir.
            </p>
          </div>

          <!-- Gönderilen Veriler -->
          <div class="output-section">
            <div style="display:flex; align-items:center; gap:12px; margin-bottom:20px; padding-bottom:16px; border-bottom:1px solid var(--border);">
              <div style="width:44px; height:44px; background:rgba(245,158,11,0.15); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:1.2rem;">📋</div>
              <div>
                <div style="font-weight:700; font-size:1rem;">Gönderilen Form Verileri</div>
                <div style="color:var(--text-muted); font-size:0.82rem;"><?php echo $tarih; ?> tarihinde alındı</div>
              </div>
            </div>

            <div class="output-row">
              <span class="output-key">Ad</span>
              <span class="output-val"><?php echo $ad ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Soyad</span>
              <span class="output-val"><?php echo $soyad ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">E-posta</span>
              <span class="output-val"><?php echo $email ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Telefon</span>
              <span class="output-val"><?php echo $telefon ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Yaş</span>
              <span class="output-val"><?php echo $yas ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Doğum Tarihi</span>
              <span class="output-val"><?php echo $dogum_tarihi ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Konu</span>
              <span class="output-val"><?php echo $konuGorunum ?: '<em style="color:var(--text-muted);">Seçilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">İletişim Tercihi</span>
              <span class="output-val"><?php echo $iletisim_tercihi ?: '<em style="color:var(--text-muted);">Seçilmedi</em>'; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Haber Bülteni</span>
              <span class="output-val"><?php echo $bulten; ?></span>
            </div>
            <div class="output-row">
              <span class="output-key">Gizlilik Politikası</span>
              <span class="output-val"><?php echo $gizlilik; ?></span>
            </div>
            <div class="output-row" style="border:none; align-items:flex-start;">
              <span class="output-key">Mesaj</span>
              <span class="output-val" style="white-space:pre-wrap; line-height:1.6;"><?php echo $mesaj ?: '<em style="color:var(--text-muted);">Girilmedi</em>'; ?></span>
            </div>

          </div><!-- /output-section -->

          <div class="text-center mt-5 d-flex gap-3 justify-content-center flex-wrap">
            <a href="index.html" class="btn-gold text-decoration-none">
              <i class="bi bi-house-fill"></i> Ana Sayfaya Dön
            </a>
            <a href="iletisim.html" class="btn-outline-gold text-decoration-none">
              <i class="bi bi-arrow-left"></i> Yeni Mesaj Gönder
            </a>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
