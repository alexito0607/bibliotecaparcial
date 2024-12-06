<?php
require_once 'config/database.php';

class User {
    private $name;
    private $cedula;
    private $birthdate;
    private $sex;
    private $type;
    private $active;

    public function __construct($data) {
        $this->name = $data['name'];
        $this->cedula = $data['cedula'];
        $this->birthdate = $data['birthdate'];
        $this->sex = $data['sex'];
        $this->type = $data['type'];
        $this->active = false;
    }

    public function save() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (name, cedula, birthdate, sex, type, active) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->name, $this->cedula, $this->birthdate, $this->sex, $this->type, $this->active]);
    }

    public static function exists($cedula) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE cedula = ?");
        $stmt->execute([$cedula]);
        return $stmt->fetch();
    }

    public static function getInactiveUsers() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM users WHERE active = false");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findByCedula($cedula) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE cedula = ?");
        $stmt->execute([$cedula]);
        return $stmt->fetchObject(__CLASS__);
    }

    public function activate() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE users SET active = true WHERE cedula = ?");
        $stmt->execute([$this->cedula]);
    }
}
?>
