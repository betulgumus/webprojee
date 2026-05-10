/* ===================================================
   BETÜL GÜMÜŞ - KİŞİSEL TANITIM SİTESİ
   Ana JavaScript Dosyası (main.js)
   =================================================== */

document.addEventListener('DOMContentLoaded', function () {

  /* ---- Aktif Nav Link ---- */
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });

  /* ---- Navbar Scroll Efekti ---- */
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.style.boxShadow = '0 4px 30px rgba(0,0,0,0.5)';
      } else {
        navbar.style.boxShadow = 'none';
      }
    });
  }

  /* ---- Scroll Animasyonu (Intersection Observer) ---- */
  const observerOptions = {
    threshold: 0.12,
    rootMargin: '0px 0px -40px 0px'
  };
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.card-dark, .hobby-card, .timeline-item, .city-info-card, .place-card, .api-card, .miras-fact').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(25px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
  });

  /* ---- Skill Bar Animasyonu ---- */
  const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const fill = entry.target.querySelector('.skill-fill');
        if (fill) {
          const targetWidth = fill.getAttribute('data-width');
          fill.style.width = targetWidth + '%';
        }
        skillObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  document.querySelectorAll('.skill-bar').forEach(bar => {
    const fill = bar.querySelector('.skill-fill');
    if (fill) {
      fill.style.width = '0%';
      skillObserver.observe(bar);
    }
  });

  /* ---- Native JS Form Doğrulama (İletişim) ---- */
  window.validateNativeJS = function () {
    let isValid = true;
    clearErrors();

    const ad = document.getElementById('ad');
    const soyad = document.getElementById('soyad');
    const email = document.getElementById('email');
    const telefon = document.getElementById('telefon');
    const yas = document.getElementById('yas');
    const konu = document.getElementById('konu');
    const mesaj = document.getElementById('mesaj');
    const gizlilik = document.getElementById('gizlilik');

    if (!ad || !ad.value.trim()) { showError('adError', 'Ad alanı boş bırakılamaz.'); isValid = false; ad && ad.classList.add('field-error'); }
    else ad.classList.add('field-success');

    if (!soyad || !soyad.value.trim()) { showError('soyadError', 'Soyad alanı boş bırakılamaz.'); isValid = false; soyad && soyad.classList.add('field-error'); }
    else soyad.classList.add('field-success');

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !email.value.trim()) { showError('emailError', 'E-posta alanı boş bırakılamaz.'); isValid = false; email && email.classList.add('field-error'); }
    else if (!emailRegex.test(email.value)) { showError('emailError', 'Geçerli bir e-posta adresi giriniz.'); isValid = false; email.classList.add('field-error'); }
    else email.classList.add('field-success');

    const telRegex = /^[0-9\s\-\+]{10,15}$/;
    if (!telefon || !telefon.value.trim()) { showError('telefonError', 'Telefon alanı boş bırakılamaz.'); isValid = false; telefon && telefon.classList.add('field-error'); }
    else if (!telRegex.test(telefon.value.replace(/\s/g, ''))) { showError('telefonError', 'Telefon numarası yalnızca rakamlardan oluşmalıdır (10-15 hane).'); isValid = false; telefon.classList.add('field-error'); }
    else telefon.classList.add('field-success');

    if (!yas || !yas.value || yas.value < 1 || yas.value > 120) { showError('yasError', 'Geçerli bir yaş giriniz (1-120).'); isValid = false; yas && yas.classList.add('field-error'); }
    else yas.classList.add('field-success');

    if (!konu || konu.value === '') { showError('konuError', 'Lütfen bir konu seçiniz.'); isValid = false; konu && konu.classList.add('field-error'); }
    else konu.classList.add('field-success');

    if (!mesaj || !mesaj.value.trim() || mesaj.value.trim().length < 10) { showError('mesajError', 'Mesaj en az 10 karakter olmalıdır.'); isValid = false; mesaj && mesaj.classList.add('field-error'); }
    else mesaj.classList.add('field-success');

    if (!gizlilik || !gizlilik.checked) { showError('gizlilikError', 'Gizlilik politikasını kabul etmelisiniz.'); isValid = false; }

    const iletisimRadio = document.querySelector('input[name="iletisimTercihi"]:checked');
    if (!iletisimRadio) { showError('iletisimError', 'Lütfen bir iletişim tercihi seçiniz.'); isValid = false; }

    const jsAlert = document.getElementById('jsAlert');
    if (isValid) {
      jsAlert.className = 'alert-dark alert-success-dark';
      jsAlert.textContent = '✅ Native JavaScript doğrulaması başarılı! Form gönderiliyor...';
      jsAlert.style.display = 'block';
      setTimeout(() => { document.getElementById('contactForm').submit(); }, 1500);
    } else {
      jsAlert.className = 'alert-dark alert-error-dark';
      jsAlert.textContent = '❌ Lütfen kırmızı ile işaretlenmiş alanları düzeltin.';
      jsAlert.style.display = 'block';
    }
    return isValid;
  };

  function showError(id, msg) {
    const el = document.getElementById(id);
    if (el) { el.textContent = msg; el.classList.add('show'); }
  }

  function clearErrors() {
    document.querySelectorAll('.error-msg').forEach(e => { e.classList.remove('show'); e.textContent = ''; });
    document.querySelectorAll('.form-control-dark').forEach(e => { e.classList.remove('field-error', 'field-success'); });
    const jsAlert = document.getElementById('jsAlert');
    if (jsAlert) jsAlert.style.display = 'none';
  }

  /* ---- Login JS Doğrulama ---- */
  window.validateLogin = function () {
    const emailInput = document.getElementById('loginEmail');
    const passInput = document.getElementById('loginPass');
    const errDiv = document.getElementById('loginError');
    let msg = '';

    if (!emailInput.value.trim() || !passInput.value.trim()) {
      msg = '⚠️ Kullanıcı adı ve şifre boş bırakılamaz.';
    } else {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(emailInput.value.trim())) {
        msg = '⚠️ Geçerli bir e-posta formatı giriniz.';
      }
    }

    if (msg) {
      errDiv.textContent = msg;
      errDiv.style.display = 'flex';
      emailInput.classList.add('field-error');
      passInput.classList.add('field-error');
      return false;
    }
    return true;
  };

  /* ---- Karakter Sayacı (Mesaj Alanı) ---- */
  const mesajArea = document.getElementById('mesaj');
  const charCount = document.getElementById('charCount');
  if (mesajArea && charCount) {
    mesajArea.addEventListener('input', () => {
      charCount.textContent = mesajArea.value.length;
    });
  }

});
