<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - ZSOFT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../asset/css/login.css">
</head>
<body>
    <div class="login-container">
        <div class="login-card p-4">
            <div class="login-header">
                <!-- <img src="../../asset/images/logo.png" alt="ZSOFT Logo"> -->
                <h4>Đăng nhập vào ZSOFT</h4>
            </div>
            <form method="POST" action="/public/index.php?route=login">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên đăng nhập</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="forgot-password">
                    <a href="forgot-password.html">Quên mật khẩu?</a>
                </div>
                <button type="submit" class="btn btn-login">Đăng nhập</button>
            </form>
            <?php if (!empty($_SESSION['login_error'])): ?>
                <p style="color:red"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>