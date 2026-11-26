<?php
session_start();

include 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $error = 'Username dan password wajib diisi.';
    } else {
        $stmt = mysqli_prepare($koneksi, 'SELECT id, username, password FROM users WHERE username = ?');
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

        if ($user && password_verify($password, $user['password'])) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = (int) $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit();
        }

        $error = 'Username atau password tidak sesuai.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Koperasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Login Koperasi</h2>
    <?php if ($error !== '') { ?>
        <p class="login-error"><b><?php echo htmlspecialchars($error); ?></b></p>
    <?php } ?>
    <form method="POST" action="login.php">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" autocomplete="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" autocomplete="current-password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
