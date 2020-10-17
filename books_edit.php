<!-- EDIT FORM FOR BOOKS TABLE -->
<!-- WORKS SIMILAR TO ADD FORM  -->

<?php
require_once 'utils/functions.php';
require_once 'classes/Book.php';
require_once 'classes/Author.php';
require_once 'classes/Publisher.php';
require_once 'classes/Genre.php';
require_once 'classes/Gump.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
}
catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $authors = Author::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $publishers = Publisher::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $genres = Genre::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}




try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
                    <form method="POST" action="books_update.php" role="form" class="form-horizontal">
                        <input type="hidden" name="id" value="<?= $book->id ?>" />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Edit Book - <?= $book->title ?></h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Cover Image</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cover_img" name="cover_img" value="<?= old('cover_img', $book->cover_img) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('cover_img'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $book->title) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('title'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author_id" class="col-md-3 control-label">Author</label>
                            <div class="col-md-6">
                              <select class="form-control" name="author_id">
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
                              <select class="form-control" name="author_id">
                              <?php foreach ($genres as $genre) { ?>
                                    <option value="<?= $genre->id ?> " 'selected'><?= $genre->genre_name ?> </option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="col-md-3 error">
                                <?php error('genre_id'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="review" class="col-md-3 control-label">Review</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="review" name="review" value="<?= old('review', $book->review) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('review'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="publish_date" class="col-md-3 control-label">Publish Date</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="publish_date" name="publish_date" value="<?= old('publish_date', $book->publish_date) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('publish_date'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="num_pages" class="col-md-3 control-label">Number of Pages</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="num_pages" name="num_pages" value="<?= old('num_pages', $book->num_pages) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('num_pages'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hours_to_read" class="col-md-3 control-label">Hours to Read</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="hours_to_read" name="hours_to_read" value="<?= old('hours_to_read', $book->hours_to_read) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('hours_to_read'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="total_words" class="col-md-3 control-label">Total Words</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="total_words" name="total_words" value="<?= old('total_words', $book->total_words) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('total_words'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="star_rating" class="col-md-3 control-label">Star Rating</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="star_rating" name="star_rating" value="<?= old('star_rating', $book->star_rating) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('star_rating'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="isbn" class="col-md-3 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="isbn" name="isbn" value="<?= old('isbn', $book->isbn) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('isbn'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-md-3 control-label">Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="price" name="price" value="<?= old('price', $book->price) ?>" />
                            </div>

                            <div class="col-md-3 error">
                                <?php error('price'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="publisher_id" class="col-md-3 control-label">Publisher</label>
                            <div class="col-md-6">
                              <select class="form-control" name="publisher_id">
                              <?php foreach ($publishers as $publisher) { ?>
                                    <option value="<?= $publisher->id ?> " 'selected'><?= $publisher->name ?> </option>
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
                                <input type="text" class="form-control" id="amazon" name="amazon" value="<?= old('amazon', $book->amazon) ?>" />
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
