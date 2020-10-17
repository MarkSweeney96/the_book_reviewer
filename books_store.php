<?php
require_once 'classes/Book.php';
require_once 'classes/Author.php';
require_once 'classes/Genre.php';
require_once 'classes/Publisher.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();


    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(

      // USE GUMP TO SANITIZE FORM DATA
      'cover_img' => 'required|min_len,25|max_len,200',
      'title' => 'required|min_len,1|max_len,100',
      'author_id' => 'required|integer|min_numeric,1',
      'genre_id' => 'required|integer|min_numeric,1',
      'review' => 'required|min_len,1|max_len,2000',
      'publish_date' => 'required|min_len,1|max_len,10',
      'num_pages' => 'required|integer|min_numeric,0|max_numeric,15',
      'hours_to_read' => 'required|numeric|min_numeric,0|max_numeric,15',
      'total_words' => 'required|numeric|min_numeric,0|max_numeric,40000',
      'star_rating' => 'required|numeric|min_numeric,0|max_numeric,5',
      'isbn' => 'required|numeric|exact_len,13|min_numeric,0',
      'price' => 'required|float|min_numeric,0',
      'publisher_id' => 'required|integer|min_numeric,1',
      'amazon' => 'required|min_len,15|max_len,100'
    );
    // ADDS INPUTED DATA TO AN ARRAY
    $filter_rules = array(
      'title' => 'trim|sanitize_string',
      'cover_img' => 'trim|sanitize_string',
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

    //VALIDATES DATA
    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    // IF NOT VALIDATED GET ERRORS ARRAY
    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
      // CREATE ERRORS ARRAY
      $errors = array();

      //FIND AUTHOR BY ID AND VALIDATE
      $author_id = $validated_data['author_id'];
      $author_id = Author::find($author_id);
      if ($author_id === false) {
          $errors['author_id'] = "Invalid author";
      }

        //FIND GENRE BY ID AND VALIDATE
      $genre_id = $validated_data['genre_id'];
      $genre_id = Genre::find($genre_id);
      if ($genre_id === false) {
          $errors['genre_id'] = "Invalid genre";
      }

        //FIND PUBLISHER BY ID AND VALIDATE
      $publisher_id = $validated_data['publisher_id'];
      $publisher = Publisher::find($publisher_id);
      if ($publisher === false) {
          $errors['publisher_id'] = "Invalid publisher";
      }
    }

        if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    // CREATE BOOK OBJECT FROM VALIDATED DATA
    $book = new Book();
    $book->cover_img = $validated_data['cover_img'];
    $book->title = $validated_data['title'];
    $book->author_id = $validated_data['author_id'];
    $book->genre_id = $validated_data['genre_id'];
    $book->review = $validated_data['review'];
    $book->publish_date = $validated_data['publish_date'];
    $book->num_pages = $validated_data['num_pages'];
    $book->hours_to_read = $validated_data['hours_to_read'];
    $book->total_words = $validated_data['total_words'];
    $book->star_rating = $validated_data['star_rating'];
    $book->isbn = $validated_data['isbn'];
    $book->price = $validated_data['price'];
    $book->publisher_id = $validated_data['publisher_id'];
    $book->amazon = $validated_data['amazon'];

    // ECHO POST ARRAY (DEBUGGING ONLY)
    // echo '<pre>';
    // print_r($_POST);
    // print_r($errors);
    // echo '</echo>';
    // exit();

    $book->save();

    header("Location: books_index.php");
}
catch (Exception $ex) {
    require 'books_create.php';
}
?>
