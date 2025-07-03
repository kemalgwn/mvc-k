<?php
class AdminController extends Controller {
    public function index() {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
            echo "Access denied. Admins only.";
            exit;
        }

        $userModel = $this->model('User');
        $users = $userModel->findAll();

        $this->view('user/admin', [
            'user' => $_SESSION['user'],
            'users' => $users
        ]);
    }

    public function deleteUser() {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
            echo "Access denied. Admins only.";
            exit;
        }

        $user_id = $_POST['user_id'] ?? null;

        if ($user_id && $user_id != $_SESSION['user']['id']) {
            $userModel = $this->model('User');
            $user = $userModel->findById($user_id);
            if ($user) {
                $user->delete();
            }
        }

        header('Location: /Mvc-k/public/index.php?url=admin/index');
        exit;
    }

    public function warnUser() {
        session_start();

        if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
            echo "Access denied. Admins only.";
            exit;
        }

        $user_id = $_POST['user_id'] ?? null;

        if ($user_id) {
            $userModel = $this->model('User');
            $user = $userModel->findById($user_id);
            if ($user) {
                $user->warnings = ($user->warnings ?? 0) + 1;
                $user->save();
            }
        }

        header('Location: /Mvc-k/public/index.php?url=admin/index');
        exit;
    }
}
