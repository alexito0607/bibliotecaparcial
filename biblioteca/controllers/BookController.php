<?php
require_once 'models/Book.php';

class BookController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $book = new Book($data);
            $book->save();
            echo "Libro creado.";
        } else {
            require 'views/create_book.php';
        }
    }

    public function listByISBN() {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $books = Book::findByISBN($isbn);
            require 'views/list_books.php';
        } else {
            echo "Por favor, proporcione un ISBN.";
        }
    }

    public function borrowBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $isbn = $_POST['isbn'];
            $user_id = $_POST['user_id'];
            $book = Book::findAvailableCopy($isbn);
            if ($book && Book::canBorrow($user_id)) {
                $book->borrow($user_id);
                echo "Libro prestado.";
            } else {
                echo "No se puede prestar el libro.";
            }
        } else {
            require 'views/borrow_book.php';
        }
    }

    public function returnBook() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $book_id = $_POST['book_id'];
            $user_id = $_POST['user_id'];
            $book = Book::findById($book_id);
            if ($book && $book->isBorrowedBy($user_id)) {
                $book->return();
                echo "Libro devuelto.";
            } else {
                echo "No se pudo devolver el libro.";
            }
        } else {
            require 'views/return_book.php';
        }
    }
}
?>
