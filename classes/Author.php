<?php
require_once 'classes/Connection.php';

class Author {
    public $id;
    public $author_img;
    public $first_name;
    public $last_name;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'author_img' => $this->author_img,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO authors(
                        author_img, first_name, last_name
                    ) VALUES (
                        :author_img, :first_name, :last_name
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE authors SET
                        author_img = :author_img,
                        first_name = :first_name,
                        last_name = :last_name
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save author");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving author");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('authors');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved author cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM authors WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete author");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting author");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM authors';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve authors");
        }
        else {
            $publishers = $stmt->fetchAll(PDO::FETCH_CLASS, 'Author');
            return $publishers;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM authors WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve author");
        }
        else {
            $author = $stmt->fetchObject('Author');
            return $author;
        }
    }

}
?>
