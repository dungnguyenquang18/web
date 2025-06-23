<?php


require_once MODEL_PATH . 'User.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            
            $user = User::findByUsername($username);
            
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role']
                ];
                header('Location: /public/index.php?route=supplier');
                exit;
            }
            
            $error = 'Invalid username or password';
            require VIEW_PATH . 'auth/login.php';
        } else {
            require VIEW_PATH . 'auth/login.php';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /public/index.php?route=login');
        exit;
    }
}