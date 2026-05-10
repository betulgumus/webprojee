<?php
/* cikis.php — Oturum Sonlandırma */
session_start();
session_destroy();
header('Location: login.html');
exit;
