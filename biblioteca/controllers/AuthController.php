<?php
require_once 'models/Librarian.php';

class AuthController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $librarian = Librarian::authenticate($username, $password);
            if ($librarian) {
                $_SESSION['librarian'] = $librarian;
                header("Location: index.php?controller=DashboardController&action=index");
            } else {
                echo "Credenciales incorrectas.";
            }
        } else {
            require 'views/login.php';
        }
    }

    public function logout() {
        unset($_SESSION['librarian']);
        header("Location: index.php");
    }
}
?>
