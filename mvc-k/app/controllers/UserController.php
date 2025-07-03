<?php
class UserController extends Controller {
    public function index() {
        session_start();

        if (isset($_SESSION['user'])) {
            $this->view('user/dashboard', ['user' => $_SESSION['user']]);
        } else {
            header('Location: /Mvc-k/public/index.php?url=user/login');
            exit;
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = $this->model('User');

            if ($userModel->findByUsername($username)) {
                $this->view('user/register', ['error' => 'Username already taken']);
                return;
            }

            $user = $this->model('User'); // create new user instance
            $user->username = $username;
            $user->email = $email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->is_admin = 0;
            $user->warnings = 0;

            if ($user->save()) {
                header('Location: /Mvc-k/public/index.php?url=user/login');
                exit;
            } else {
                $this->view('user/register', ['error' => 'Failed to register user']);
            }
        } else {
            $this->view('user/register');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = $this->model('User');
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user->password)) {
                $_SESSION['user'] = [
                    'id' => $user->getId(),
                    'username' => $user->username,
                    'email' => $user->email,
                    'is_admin' => (int)($user->is_admin ?? 0),
                ];

                header('Location: /Mvc-k/public/index.php');
                exit;
            } else {
                $this->view('user/login', ['error' => 'Invalid username or password']);
            }
        } else {
            $this->view('user/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /Mvc-k/public/index.php');
    }
}