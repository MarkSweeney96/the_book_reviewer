<!-- ADD BOOK FORM -->

<?php
require_once 'utils/functions.php';
require_once 'classes/Book.php';
require_once 'classes/Genre.php';
require_once 'classes/Publisher.php';
require_once 'classes/Author.php';
require_once 'classes/User.php';

// ALLOWS ACCESS TO USE VARIABLES FROM AUTHOR.PHP
try {
    $authors = Author::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}
// ALLOWS ACCESS TO USE VARIABLES FROM PUBLISHER.PHP
try {
    $publishers = Publisher::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

// ALLOWS ACCESS TO USE VARIABLES FROM GENRE.PHP
try {
    $genres = Genre::all();
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
                    <form method="POST" action="books_store.php" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Add Book</h2>
                            </div>
                        </div>
                        <!-- FORM TO ADD BOOK TO DATABASE -->
                        <div class="form-group">
                            <label for="cover_img" class="col-md-3 control-label">Cover Image</label>
                            <div class="col-md-6">
                              <!-- TAKES INPUT AND SAVES OLD VALUE -->
                                <input type="text" class="form-control" id="cover_img" name="cover_img" value="<?= old('cover_img') ?>" />
                            </div>
                            <div class="col-md-3 error">
                              <!-- DISPLAYS ERROR MESSAGE IF NEEDED -->
                                <?php error('cover_img'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('title'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="author_id" class="col-md-3 control-label">Author</label>
                            <div class="col-md-6">
                              <select class="form-control" name="author_id">
                                <!-- DROPDOWN MENU DISPLAYS AUTHORS FROM AUTHORS TABLE -->
                              <?php foreach ($authors as $author) { ?>
                                    <option value="<?= $author->id ?> " 'selected'><?= $author->first_name ?> <?= $author->last_name ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('author_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="genre_id" class="col-md-3 control-label">Genre</label>
                            <div class="col-md-6">
                              <select class="form-control" name="genre_id">
                                <!-- <option value=0>Select Genre</option> -->
                                  <!-- DROPDOWN MENU DISPLAYS GENRES FROM GENRES TABLE -->
                              <?php foreach ($genres as $genre) { ?>
                                    <option value="<?= $genre->id ?>"><?= $genre->genre_name ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('genre_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review" class="col-md-3 control-label">Book Review</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="review" name="review" value="<?= old('review') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('review'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="publish_date" class="col-md-3 control-label">Publish Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="publish_date" name="publish_date" value="<?= old('publish_date') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('publish_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_pages" class="col-md-3 control-label">Number of Pages</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="num_pages" name="num_pages" value="<?= old('num_pages') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('num_pages'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hours_to_read" class="col-md-3 control-label">Hours to Read</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="hours_to_read" name="hours_to_read" value="<?= old('hours_to_read') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('hours_to_read'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_words" class="col-md-3 control-label">Total Words</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="total_words" name="total_words" value="<?= old('total_words') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('total_words'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="star_rating" class="col-md-3 control-label">Star Rating</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="star_rating" name="star_rating" value="<?= old('star_rating') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('star_rating'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isbn" class="col-md-3 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= old('isbn') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('isbn'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-3 control-label">Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="price" name="price" value="<?= old('price') ?>" />
                            </div>

                            <div class="col-md-3 error">
                                <?php error('price'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="publisher_id" class="col-md-3 control-label">Publisher</label>
                            <div class="col-md-6">
                              <select class="form-control" name="publisher_id">
                                <!-- <option value=0>Select Publisher</option> -->
                                  <!-- DROPDOWN MENU DISPLAYS PUBLISHERS FROM PUBLISHERS TABLE -->
                              <?php foreach ($publishers as $publisher) { ?>
                                    <option value="<?= $publisher->id ?>"><?= $publisher->name ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('publisher_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="amazon" class="col-md-3 control-label">Amazon Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="amazon" name="amazon" value="<?= old('amazon') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('amazon'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="books_index.php" class="btn btn-default">Cancel</a>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
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
