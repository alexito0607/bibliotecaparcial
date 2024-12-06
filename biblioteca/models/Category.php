<?php
require_once 'config/database.php';

class Category {
    private $name;

    public function __construct($data) {
        $this->name = $data['name'];
    }

    public function save() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->execute([$this->name]);
    }

    public static function findById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(__CLASS__);
    }

    public function delete() {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM categories WHERE id = ?");
        $stmt->execute([$this->id]);
    }

    public function hasBooks() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM books WHERE category = ?");
        $stmt->execute([$this->name]);
        return $stmt->fetchColumn() > 0;
    }

    public static function all() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM categories");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>
