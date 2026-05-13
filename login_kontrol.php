<?php
/* ===================================================
   login_kontrol.php — Login Doğrulama Sayfası
   POST ile gelen email ve şifre PHP değişkenleriyle
   karşılaştırılır. Başarı: basari.php, Hata: login.html
   =================================================== */

/* Session'ı her şeyden önce başlat */
session_start();

/* Yalnızca POST isteğini kabul et */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit;
}

/* Tanımlı kullanıcı bilgileri */
$dogru_email = 'b231210091@sakarya.edu.tr';
$dogru_sifre = 'b231210091';
$ogrenci_no  = 'b231210091';

/* Gönderilen verileri al ve temizle */
$gelen_email = trim($_POST['email'] ?? '');
$gelen_sifre = trim($_POST['sifre'] ?? '');

/* Boşluk kontrolü */
if (empty($gelen_email) || empty($gelen_sifre)) {
    header('Location: login.html?hata=bos');
    exit;
}

/* Kimlik doğrulama */
if ($gelen_email === $dogru_email && $gelen_sifre === $dogru_sifre) {
    /* Başarılı giriş — session'a yaz ve yönlendir */
    $_SESSION['ogrenci_no'] = $ogrenci_no;
    $_SESSION['giris_tarihi'] = date('d.m.Y H:i:s');
    header('Location: basari.php');
    exit;
} else {
    /* Hatalı giriş */
    header('Location: login.html?hata=yanlis');
    exit;
}
