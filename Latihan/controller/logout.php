<?php
session_start();

session_unset();

session_destroy();

// Hapus cookie session (biar benar-benar bersih)
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta charset="UTF-8">
</head>
<body style="text-align:center; margin-top:100px; font-family:Arial;">

    <h2>Terima kasih sudah menggunakan website kami 🙏</h2>
    <p>Anda telah berhasil logout.</p>

    <br>
    <a href="../login.php">
        <button style="padding:10px 20px; cursor:pointer;">
            Kembali ke Halaman Login
        </button>
    </a>

</body>
</html>