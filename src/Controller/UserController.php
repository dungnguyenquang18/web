<?php
require_once __DIR__ . '/../Core/Database.php';

class UserController
{
    public function login()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password == $user['password']) {
            $_SESSION['user'] = $user;
            header('Location: /web2/src/View/supplier/index.html');
            exit;
        } else {
            $_SESSION['login_error'] = 'Tên đăng nhập hoặc mật khẩu không đúng';
            header('Location: /web2/src/View/auth/login.html');
            exit;
        }
    }
}
