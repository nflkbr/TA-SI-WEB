<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card p-4" style="width: 350px;">
    <h4 class="text-center mb-3">Login</h4>

    <form method="POST" action="controller/proses_login.php">
        
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control"
                value="<?php echo $_COOKIE['username'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Remember Me</label>
        </div>

        <button type="submit" class="btn btn-warning w-100">
            Login
        </button>

    </form>
</div>

</body>
</html>