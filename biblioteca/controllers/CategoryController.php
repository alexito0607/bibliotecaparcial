<?php
require_once 'models/Category.php';

class CategoryController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $category = new Category($data);
            $category->save();
            echo "Categoría creada.";
        } else {
            require 'views/create_category.php';
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $category = Category::findById($id);
            if ($category && !$category->hasBooks()) {
                $category->delete();
                echo "Categoría eliminada.";
            } else {
                echo "No se puede eliminar la categoría.";
            }
        } else {
            require 'views/delete_category.php';
        }
    }

    public function list() {
        $categories = Category::all();
        require 'views/list_category.php';
    }
}
?>
