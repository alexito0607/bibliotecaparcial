<?php
require_once 'models/User.php';

class UserController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            if (User::exists($data['cedula'])) {
                echo "El usuario ya está registrado.";
            } else {
                $user = new User($data);
                $user->save();
                echo "Registro exitoso.";
            }
        } else {
            require 'views/register.php';
        }
    }

    public function listInactiveUsers() {
        $users = User::getInactiveUsers();
        require 'views/list_inactive_users.php';
    }

    public function activateUser($cedula) {
        $user = User::findByCedula($cedula);
        if ($user) {
            $user->activate();
            echo "Usuario activado.";
        } else {
            echo "Usuario no encontrado.";
        }
    }

    public function modifyUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $user = User::findByCedula($data['cedula']);
            if ($user) {
                $user->update($data);
                echo "Usuario actualizado.";
            } else {
                echo "Usuario no encontrado.";
            }
        } else {
            require 'views/modify_user.php';
        }
    }
}
?>
