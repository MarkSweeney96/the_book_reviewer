<?php
require_once 'classes/Book.php';
require_once 'classes/Publisher.php';
require_once 'classes/Author.php';
require_once 'classes/Genre.php';
require_once 'classes/Gump.php';
require_once 'classes/User.php';

try {
    $books = Book::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $validator = new GUMP();

     $_GET = $validator->sanitize($_GET);

     $validation_rules = array(
         'id' => 'required|integer|min_numeric,1'
     );
     $filter_rules = array(
     	'id' => 'trim|sanitize_numbers'
     );
      $validator->validation_rules($validation_rules);
       $validator->filter_rules($filter_rules);

     $validated_data = $validator->run($_GET);

     if($validated_data === false) {
         $errors = $validator->get_errors_array();
         throw new Exception("Invalid book id: " . $errors['id']);
     }

     $id = $validated_data['id'];
     $book = Book::find($id);
 }
 catch (Exception $ex) {
     die($ex->getMessage());
 }


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>
            <div class="row">
              <div class ="review_otw col-md-12">
    <hr class="black-line">
    <h1>Review</h1>
    <h2>'<?= $book->title ?>' by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h2>
    <hr>
    <div class="row">
      <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></div>
      <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
    <hr>

    <div class="row">
      <div class="left col-md-2">
        <img src="<?= $book->cover_img ?>" alt="Still Me by Jojo Moyes">
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6">
        <h3><?= $book->title ?><h3>
        <h3>by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h3>
        <!-- ECHO THE STAR RATING AS SYMBOLS -->
        <h3><?php
          if($book->star_rating == 5){
            echo("★★★★★");
          } else if($book->star_rating == 4){
            echo("★★★★");
          } else if($book->star_rating == 3){
            echo("★★★");
          } else if($book->star_rating == 2){
            echo("★★");
          } else if($book->star_rating == 1){
            echo("★");
          } else {
            echo("Star Rating N/A");
          }
          ?></h3>
        <br>
          About this book...
        <div class="row">
          <div class="col-sm">
            <br>
            <!-- DISPLAY NUM PAGES -->
            <?= $book->num_pages ?><br>
            total pages
          </div>
          <div class="col-sm">
            <br>
            <!-- DISPLAY HOURS TO READ -->
              <?= $book->hours_to_read ?> <br>
            hours to read
          </div>
          <div class="col-sm">
            <br>
            <!-- DISPLAY TOTAL WORDS -->
            <?= $book->total_words ?><br>
          total words
        </div>
        </div>
      </div>

    </div>




    <div class="row">
      <div class="left col-md-3">
      </div>
      <div class="col-md-6">
    <?php  echo nl2br($book->review) ?>
      </div>
      <div class="col-md-3"></div>
    </div>
</div>

</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  
                </div>
            </div>
        </div>
    </body>
</html>
