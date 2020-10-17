<?php
// REQUIRE CLASSES
require_once 'classes/Book.php';
require_once 'classes/Publisher.php';
require_once 'classes/Author.php';
require_once 'classes/Genre.php';
require_once 'classes/User.php';

//DECLARE VAIRABLE LINKED TO BOOKS TABLE
try {
    $books = Book::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

// PRE-SET BOOK ID TO 11
$id = 11;
$book = Book::find($id);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <!-- REQUIRE CSS STYLES AND JS SCRIPTS -->
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <!-- REQUIRE HEADER -->
                    <?php require 'utils/header.php'; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                  <!-- REQUIRE FOOTER -->
                    <?php require 'utils/toolbar.php'; ?>
                </div>
            </div>

            <!-- START OF BODY -->



<div class="row">
  <div class="right col-md-9">Page Turner</div>
  <div class="right col-md-3 no-pm">New York Times Bestsellers</div>
</div>
<div class="top row">
  <div class ="review_otw col-md-9">
      <hr class="black-line">
      <h1>Review of the Week:</h1>
      <!-- DISPLAYS AUTHOR FIRST AND LAST NAME FROM DB TABLE -->
      <h2>'<?= $book->title ?>' by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h2>
      <hr>
      <div class="row">
        <!-- DISPLAYS DATE IN IRISH DATE FORMAT -->
        <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                    "/" . substr("$book->publish_date",5,2) .
                                    "/" . substr("$book->publish_date",2,2); ?></div>
        <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
      <hr>

      <div class="row">
        <div class="col-md-4 pgs">
          <!-- DISPLAYS ROW 1 OF THE BOOK review-->
          <?php echo nl2br(substr("$book->review",0,535))  ?>

        </div>
        <div class="col-md-4 pgs">
          <!-- DISPLAYS ROW 2 OF THE BOOK review-->
          <?php echo nl2br(substr("$book->review",516,478)) . "..."  ?>
        </div>
        <div class="col-md-4">
          <!-- DISPLAYS BOOK COVER IMAGE -->
          <img src="<?= $book->cover_img ?>" alt="Still Me by Jojo Moyes">
        </div>
      </div>

      <hr>
      <div class="row">
        <!-- READ MORE LINK - PASSES CURRENT BOOK ID VALUE TO review.php -->
        <div class="right col-md-12"><a href="review.php?id=<?= $book->id ?>" class="btn-link">read more...</a></div></div>

  </div>
  <div class="nyt col-md-3 pt">
    <hr class="black-line bl-m">
     <div class="row col-md-12">
       <div class="col-2">
         <?php $b_id = 1; $book = Book::find($b_id); ?>
        <section class="num">#1</section>
      </div>
      <div class="col-sm">
        <section class="lato-bold"><?= $book->title ?></section>
        <section class="lato">by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></section>
      </div>
      <div class="col-2">
        <a href="review.php?id=<?= $book->id ?>" class="btn-link">
      <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
      </div>
    </div>
    <hr class="bl-m">
    <div class="row col-md-12">

      <div class="col-2">
       <section class="num">#2</section>
       <?php $b_id = 2; $book = Book::find($b_id); ?>
     </div>
     <div class="col-sm">
       <section class="lato-bold"><?= $book->title ?></section>
       <section class="lato">by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></section>
     </div>
     <div class="col-2">
       <a href="review.php?id=<?= $book->id ?>" class="btn-link">
     <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
     </div>
   </div>
   <hr class="bl-m">
   <div class="row col-md-12">

     <div class="col-2">
      <section class="num">#3</section>
      <?php $b_id = 3; $book = Book::find($b_id); ?>
    </div>
    <div class="col-sm">
      <section class="lato-bold"><?= $book->title ?></section>
      <section class="lato">by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></section>
    </div>
    <div class="col-2">
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    </div>
  </div>
  <hr class="bl-m">
  <div class="row col-md-12">

    <div class="col-2">
     <section class="num">#4</section>
     <?php $b_id = 4; $book = Book::find($b_id); ?>
   </div>
   <div class="col-sm">
     <section class="lato-bold"><?= $book->title ?></section>
     <section class="lato">by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></section>
   </div>
   <div class="col-2">
     <a href="review.php?id=<?= $book->id ?>" class="btn-link">
   <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
   </div>
 </div>
 <hr class="bl-m">
 <div class="row col-md-12">

   <div class="col-2">
    <section class="num">#5</section>
    <?php $b_id = 5; $book = Book::find($b_id); ?>
  </div>
  <div class="col-sm">
    <section class="lato-bold"><?= $book->title ?></section>
    <section class="lato">by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></section>
  </div>
  <div class="col-2">
    <a href="review.php?id=<?= $book->id ?>" class="btn-link">
  <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
  </div>
</div>

<hr class="bl-m">
  </div>


</div>

<div class="latest row">
  <div class ="col-md-12 section-header"><h2>Latest</h2></div>
  <div class ="latest1 col-md-3">
    <div class="row">
      <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></div>
      <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
      <hr class="black-line">
      <div class=row>
        <div class="left col-md-7 latest-head">
          <?php $b_id = 6; $book = Book::find($b_id); ?>
          <h4 class="pdf-bold">Review:</h4>
          <h4><?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h4>
    </div>
    <div class="col-md-5 latest-cover">
        <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>">
    </div>
  </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
            <?php echo substr("$book->review",0,590) . "..."  ?>
        </div></div>
        <hr>
      <div class="row">
        <div class="right col-md-12"><a href="review.php?id=<?= $book->id ?>" class="btn-link">read more...</a></div></div>
  </div>

  <div class ="latest2 col-md-3">
    <div class="row">
      <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></div>
      <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
      <hr class="black-line">
      <div class=row>
        <div class="left col-md-7 latest-head">
          <?php $b_id = 7; $book = Book::find($b_id); ?>
          <h4 class="pdf-bold">Review:</h4>
          <h4><?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h4>
    </div>
    <div class="col-md-5 latest-cover">
        <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>">
    </div>
  </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
            <?php echo substr("$book->review",0,590) . "..."  ?>
        </div></div>
        <hr>
      <div class="row">
        <div class="right col-md-12"><a href="review.php?id=<?= $book->id ?>" class="btn-link">read more...</a></div></div>
  </div>

  <div class ="latest3 col-md-3">
    <div class="row">
      <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></div>
      <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
      <hr class="black-line">
      <div class=row>
        <div class="left col-md-7 latest-head">
          <?php $b_id = 4; $book = Book::find($b_id); ?>
          <h4 class="pdf-bold">Review:</h4>
          <h4><?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h4>
    </div>
    <div class="col-md-5 latest-cover">
        <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>">
    </div>
  </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
            <?php echo substr("$book->review",0,590) . "..."  ?>
        </div></div>
        <hr>
      <div class="row">
        <div class="right col-md-12"><a href="review.php?id=<?= $book->id ?>" class="btn-link">read more...</a></div></div>
  </div>

  <div class ="latest4 col-md-3">
    <div class="row">
      <div class="left col-md-6"><?php echo substr("$book->publish_date",8,10) .
                                  "/" . substr("$book->publish_date",5,2) .
                                  "/" . substr("$book->publish_date",2,2); ?></div>
      <div class="right col-md-6"><?= Genre::find($book->genre_id)->genre_name ?></div></div>
      <hr class="black-line">
      <div class=row>
        <div class="left col-md-7 latest-head">
          <h4 class="pdf-bold">Review:</h4>
          <?php $b_id = 5; $book = Book::find($b_id); ?>
            <h4><?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></h4>
    </div>
    <div class="col-md-5 latest-cover">
          <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>">
    </div>
  </div>
      <hr>
      <div class="row">
        <div class="col-md-12">
          <?php echo substr("$book->review",0,590) . "..."  ?>
        </div></div>
        <hr>
      <div class="row">
        <div class="right col-md-12"><a href="review.php?id=<?= $book->id ?>" class="btn-link">read more...</a></div></div>
  </div>
</div>

<br>
<div class="editors_picks row">
  <div class ="col-md-12 section-header"><h2>Editors Picks</h2>
  <br>
  <hr>
  <br>
</div>
  <hr>
  <div class ="ep1 col-md-2">
      <?php $b_id = 11; $book = Book::find($b_id); ?>
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
  <div class ="ep2 col-md-2">
      <?php $b_id = 12; $book = Book::find($b_id); ?>
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
  <div class ="ep3 col-md-2">
      <?php $b_id = 1; $book = Book::find($b_id); ?>
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
  <div class ="ep4 col-md-2">
      <?php $b_id = 2; $book = Book::find($b_id); ?>
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
  <div class ="ep5 col-md-2">
       <?php $b_id = 3; $book = Book::find($b_id); ?>
       <a href="review.php?id=<?= $book->id ?>" class="btn-link">
     <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
  <div class ="ep6 col-md-2">
      <?php $b_id = 4; $book = Book::find($b_id); ?>
      <a href="review.php?id=<?= $book->id ?>" class="btn-link">
    <img src="<?= $book->cover_img ?>" alt="<?= $book->title ?> by <?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?>"></a>
    <p class="no-pm lato-bold"><?= $book->title ?></p>
    <p class="no-pm"><?= Author::find($book->author_id)->first_name ?> <?= Author::find($book->author_id)->last_name ?></p>
    <p class="no-pm price"><mark>$<?= $book->price ?><mark></p>
  </div>
</div>

<br>
<hr>
<br>

              <!-- END OF BODY -->
            </body>


            <div class="row">
                <div class="col-md-12">
                  <!-- REQUIRE FOOTER -->
                    <?php require 'utils/footer.php'; ?>
                </div>
            </div>
        </div>
    </body>
</html>
