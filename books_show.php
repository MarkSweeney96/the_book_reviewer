<?php
require_once 'classes/Book.php';
require_once 'classes/Publisher.php';
require_once 'classes/Author.php';
require_once 'classes/Genre.php';
require_once 'classes/Gump.php';
require_once 'classes/User.php';

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
                <div class="col-md-12">
                    <h2>Book details</h2>
                    <table id="table-book" class="table table-hover">
                        <tbody>
                          <tr>
                              <td>Cover</td>
                              <td><img src="<?= $book->cover_img ?>" alt="Book Cover" height="300" width="200"></td>
                          </tr>
                            <tr>
                                <td>Title</td>
                                <td><?= $book->title ?></td>
                            </tr>
                            <tr>
                                <td>Author</td>
                                <td><a href="authors_show.php?id=<?= Author::find($book->author_id)->id ?>" class="btn-link"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></a></td>
                            </tr>
                            <tr>
                                <td>Genre</td>
                                <td><a href="genres_show.php?id=<?= Genre::find($book->genre_id)->id ?>" class="btn-link"><?= Genre::find($book->genre_id)->genre_name ?></a></td>
                            </tr>
                            <tr>
                                <td>Publish Date</td>
                                <!-- <td><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></td>
                                  <td> -->
                                  <td>
                                  <?php
                                  $day = substr("$book->publish_date",8,10);
                                  $day = $day+0;
                                  $year = substr("$book->publish_date",0,4);

                                  $month = substr("$book->publish_date",5,2);
                                  $month = $month+0;
                                  $month_name;
                                  // echo("month is: ".$month);
                                  if ($month == 1){$month_name="January";}
                                  else if ($month == 2){$month_name="February";}
                                  else if ($month == 3){$month_name="March";}
                                  else if ($month == 4){$month_name="April";}
                                  else if ($month == 5){$month_name="May";}
                                  else if ($month == 6){$month_name="June";}
                                  else if ($month == 7){$month_name="July";}
                                  else if ($month == 8){$month_name="August";}
                                  else if ($month == 9){$month_name="September";}
                                  else if ($month == 10){$month_name="October";}
                                  else if ($month == 11){$month_name="November";}
                                  else if ($month == 12){$month_name="December";}
                                  else echo("N/A");
                                  $day1;
                                  if ($day == 1 || $day == 21 || $day == 31){$day1="st";}
                                  else if ($day == 2 || $day == 22){$day1="nd";}
                                  else if ($day == 3 || $day == 23){$day1="rd";}
                                  else{$day1="th";}
                                  echo ($day . $day1 . " " . $month_name . " " . $year);
                                   ?>
                                   </td>

                            </tr>
                            <tr>
                                <td>Number of Pages</td>
                                <td><?= $book->num_pages ?></td>
                            </tr>
                            <tr>
                                <td>Hours to Read</td>
                                <td><?= $book->hours_to_read ?></td>
                            </tr>
                            <tr>
                                <td>Total Words</td>
                                <td><?= $book->total_words ?></td>
                            </tr>
                            <tr>
                                <td>Star Rating</td>
                                <!-- <td><?= $book->star_rating ?></td> -->
                                <td>
                                <?php
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
                                  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>ISBN</td>
                                <td><?= $book->isbn ?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>€<?= $book->price ?></td>
                            </tr>
                            <tr>
                                <td>Publisher</td>
                                <td><a href="publishers_show.php?id=<?= Publisher::find($book->publisher_id)->id ?>" class="btn-link"><?= Publisher::find($book->publisher_id)->name ?></a></td>
                            </tr>
                            <tr>
                                <td>Book Review</td>
                                <td><?= $book->review ?></td>
                            </tr>
                            <tr>
                                <td>Buy on Amazon</td>
                                <td><a href="<?= $book->amazon ?>" target="_blank" class="btn btn-primary pull-left">Buy Book</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <a href="books_index.php" class="btn btn-default">Cancel</a>
                        <a href="books_edit.php?id=<?= $book->id ?>" class="btn btn-warning">Edit</a>
                        <a href="books_delete.php?id=<?= $book->id ?>" class="btn btn-danger">Delete</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
