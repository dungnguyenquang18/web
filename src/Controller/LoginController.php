<?php
require_once MODEL_PATH . 'User.php';

class LoginController {
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && $password == $user['password']) {
                $_SESSION['user'] = $user;
                header('Location: /public/index.php?route=dashboard');
                exit();
            }
        }
        require_once VIEW_PATH . '/auth/login.php';
    }
}