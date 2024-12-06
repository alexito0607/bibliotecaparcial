<?php
    public function __construct($data) {
        $this->name = $data['name'];
        $this->isbn = $data['isbn'];
        $this->code = $data['code'];
        $this->category = $data['category'];
        $this->borrowed = false;
    }

    public function save() {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO books (name, isbn, code, category, borrowed) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->name, $this->isbn, $this->code, $this->category, $this->borrowed]);
    }

    public static function findByISBN($isbn) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM books WHERE isbn = ?");
        $stmt->execute([$isbn]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findAvailableCopy($isbn) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM books WHERE isbn = ? AND borrowed = false");
        $stmt->execute([$isbn]);
        return $stmt->fetchObject(__CLASS__);
    }

    public static function findById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject(__CLASS__);
    }

    public function borrow($user_id) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO loans (book_id, user_id, borrowed_date) VALUES (?, ?, NOW())");
        $stmt->execute([$this->id, $user_id]);
        $this->setBorrowed(true);
    }

    public function return() {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE loans SET returned_date = NOW() WHERE book_id = ? AND returned_date IS NULL");
        $stmt->execute([$this->id]);
        $this->setBorrowed(false);
    }

    private function setBorrowed($borrowed) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE books SET borrowed = ? WHERE id = ?");
        $stmt->execute([$borrowed, $this->id]);
        $this->borrowed = $borrowed;
    }

    public function isBorrowedBy($user_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM loans WHERE book_id = ? AND user_id = ? AND returned_date IS NULL");
        $stmt->execute([$this->id, $user_id]);
        return $stmt->fetch();
    }

    public static function canBorrow($user_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM loans WHERE user_id = ? AND returned_date IS NULL");
        $stmt->execute([$user_id]);
        $borrowedBooks = $stmt->fetchColumn();
        // Considera la lógica de cantidad máxima de libros según el tipo de usuario
        return $borrowedBooks < 4;
    }
}
?>
