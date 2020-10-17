<?php
require_once 'classes/Connection.php';

// book class with all the vairable these will link up to fields in the database
class Book {
    public $id;
    public $cover_img;
    public $title;
    public $author_id;
    public $genre_id;
    public $review;
    public $publish_date;
    public $num_pages;
    public $star_rating;
    public $isbn;
    public $price;
    public $publisher_id;
    public $amazon;

    public function __construct() {
    }

// save function. this is used when adding books to the database through the add form
  public function save() {
    // this takes the form input values and saves them as variables
        $params = array(
            'cover_img' => $this->cover_img,
            'title' => $this->title,
            'author_id' => $this->author_id,
            'genre_id' => $this->genre_id,
            'review' => $this->review,
            'publish_date' => $this->publish_date,
            'num_pages' => $this->num_pages,
            'star_rating' => $this->star_rating,
            'isbn' => $this->isbn,
            'price' => $this->price,
            'publisher_id' => $this->publisher_id,
            'amazon' => $this->amazon
        );

        // sql for insering books into the database
        if ($this->id === NULL) {
            $sql = "INSERT INTO books(
                        cover_img, title, author_id, genre_id, review, publish_date, num_pages, star_rating, isbn, price, publisher_id, amazon
                    ) VALUES (
                        :title, :author, :isbn, :price, :publisher_id, :amazon
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            // sql for updating books that are already in the database
            $sql = "UPDATE books SET
                        cover_img = :cover_img,
                        author_id = :author_id,
                        genre_id = :genre_id,
                        review = :review,
                        publish_date = :publish_date,
                        num_pages = :num_pages,
                        star_rating = :star_rating,
                        isbn = :isbn,
                        price = :price,
                        publisher_id = :publisher_id,
                        amazon = amazon
                    WHERE id = :id";
        }

        // establish database connection
        $conn = Connection::getInstance();
        // prepare sql statement
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        // if not successful throw Exceptions
        if (!$success) {
            throw new Exception("Failed to save book");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving book");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('books');
            }
        }
    }

    // function for deleting books from the database
    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved book cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        //sql for delteing book by id
        $sql = 'DELETE FROM books WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete book");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting book");
            }
        }
    }

    // this function selects all books form the books table using an sql statement
    public static function all() {
      // sql statement
        $sql = 'SELECT * FROM books';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve books");
        }
        else {
            $books = $stmt->fetchAll(PDO::FETCH_CLASS, 'Book');
            return $books;
        }
    }

    // this finds all books where the author id = $a (parameter that the id is passed into)
    public static function byauthor($a) {
      //sql statement
        $sql = 'SELECT * FROM books WHERE author_id='.   $a;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve books");
        }
        else {
            $books = $stmt->fetchAll(PDO::FETCH_CLASS, 'Book');
            return $books;
        }
    }

// this finds all books where the publisher id = $p (parameter that the id is passed into)
    public static function bypub($p) {
      // sql statement
        $sql = 'SELECT * FROM books WHERE publisher_id='.   $p;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve books");
        }
        else {
            $books = $stmt->fetchAll(PDO::FETCH_CLASS, 'Book');
            return $books;
        }
    }

    // this finds all books where the genre id = $g (parameter that the id is passed into)
    public static function samegenre($g) {
        $sql = 'SELECT * FROM books WHERE genre_id='.   $g;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve books");
        }
        else {
            $books = $stmt->fetchAll(PDO::FETCH_CLASS, 'Book');
            return $books;
        }
    }

    // this finds any book by id
    public static function find($id) {
        $params = array(
            'id' => $id
        );
        // sql: find book where id = x
        $sql = 'SELECT * FROM books WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve book");
        }
        else {
            $book = $stmt->fetchObject('Book');
            return $book;
        }
    }
}
?>
