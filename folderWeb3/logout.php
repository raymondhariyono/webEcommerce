<?php
session_start();

// Hanya menghapus sesi login tanpa menghapus daftar pengguna
unset($_SESSION['is_logged_in']);
unset($_SESSION['user_email']);
unset($_SESSION['user_name']);

// Redirect ke halaman login
header("Location: loginPage.php?form=signIn");
exit();
?>