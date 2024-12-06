<?php
require_once 'config/database.php';

class Librarian {
    private $username;
    private $password;

    public function __construct($data) {
        $this->username = $data['username'];
        $this->password = $data['password'];
    }

    public static function authenticate($username, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM librarians WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        return $stmt->fetchObject(__CLASS__);
    }
}
?>
