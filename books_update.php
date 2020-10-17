<?php
require_once 'classes/Book.php';
require_once 'classes/Publisher.php';
require_once 'classes/Genre.php';
require_once 'classes/Author.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'id' => 'required|integer|min_numeric,1',
        'title' => 'required|min_len,1|max_len,100',
        'author_id' => 'required|integer|min_numeric,1',
        'genre_id' => 'required|integer|min_numeric,1',
        'review' => 'required|min_len,1|max_len,2000',
        'publish_date' => 'required|min_len,1|max_len,10',
        'num_pages' => 'required|numeric|min_numeric,0|max_numeric,4',
        'hours_to_read' => 'required|numeric|min_numeric,0|max_numeric,4',
        'total_words' => 'required|numeric|min_numeric,0|max_numeric,4',
        'star_rating' => 'required|numeric|min_numeric,0|max_numeric,1',
        'isbn' => 'required|numeric|exact_len,13|min_numeric,0',
        'price' => 'required|float|min_numeric,0',
        'publisher_id' => 'required|integer|min_numeric,1',
        'amazon' => 'required|min_len,15|max_len,100'
    );
    $filter_rules = array(
    	  'id' => 'trim|sanitize_numbers',
        'title' => 'trim|sanitize_string',
        'author_id' => 'trim|sanitize_numbers',
        'genre_id' => 'trim|sanitize_numbers',
        'review' => 'trim|sanitize_string',
        'publish_date' => 'trim|sanitize_string',
        'num_pages' => 'trim|sanitize_numbers',
        'hours_to_read' => 'trim|sanitize_numbers',
        'total_words' => 'trim|sanitize_numbers',
        'star_rating' => 'trim|sanitize_numbers',
        'isbn' => 'trim|sanitize_numbers',
        'price' => 'trim|sanitize_floats',
        'publisher_id' => 'trim|sanitize_numbers',
        'amazon' => 'trim|sanitize_string'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();

        $author_id = $validated_data['author_id'];
        $author_id = Author::find($author_id);
        if ($author_id === false) {
            $errors['author_id'] = "Invalid author";
        }

        $genre_id = $validated_data['genre_id'];
        $genre_id = Genre::find($genre_id);
        if ($genre_id === false) {
            $errors['genre_id'] = "Invalid genre";
        }

        $publisher_id = $validated_data['publisher_id'];
        $publisher = Publisher::find($publisher_id);
        if ($publisher === false) {
            $errors['publisher_id'] = "Invalid publisher";
        }
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    $id = $validated_data['id'];
    $book = Book::find($id);
    $book->title = $validated_data['title'];
    $book->author_id = $validated_data['author_id'];
    $book->genre_id = $validated_data['genre_id'];
    $book->review = $validated_data['review'];
    $book->publish_date = $validated_data['publish_date'];
    $book->num_pages = $validated_data['num_pages'];
    $book->hours_to_read = $validated_data['hours_to_read'];
    $book->total_words = $validated_data['total_words'];
    $book->star_rating = $validated_data['star_rating'];
    $book->author = $validated_data['author'];
    $book->isbn = $validated_data['isbn'];
    $book->price = $validated_data['price'];
    $book->publisher_id = $validated_data['publisher_id'];
    $book->amazon = $validated_data['amazon'];
    $book->save();

    header("Location: books_index.php");
}
catch (Exception $ex) {
    require 'books_edit.php';
}
?>
