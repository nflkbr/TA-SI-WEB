<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "123") {

        $_SESSION["user"] = $username;

        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 7), "/");
        }

        header("Location: ../index.php");
        exit;

    } else {
        echo "Login gagal. <a href='../login.php'>Kembali</a>";
        exit;
    }

} else {
    header("Location: ../login.php");
    exit;
}