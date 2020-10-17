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
    $genre = Genre::find($id);
}
catch (Exception $ex) {
    die($ex->getMessage());
}

try {
    $books = Book::samegenre($id);
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
                    <!-- <h2>Author details</h2> -->
                    <table id="table-book" class="table table-hover">
                        <tbody>
                          <tr>
                              <!-- <td>ID</td> -->
                              <!-- <td>Name</td> -->
                          </tr>
                          <tr>
                              <h2><?= $genre->genre_name ?> Books</h2>
                          </tr>
                        </tbody>
                    </table>
                        <p>

                          <?php foreach ($books as $book) { ?>
                              <tr data-id="<?= $book->id ?>">
                                <a href="books_show.php?id=<?= $book->id ?>" class="btn-link"><img src="<?= $book->cover_img ?>" alt="Book Cover" height="300" width="200"></a>  </tr>
                              </tr>
                              <tr></tr>
                          <?php } ?>
                          <p>
                    <p>
                    <p>
                        <a href="genres_index.php" class="btn btn-default">Cancel</a>
                        <a href="genres_edit.php?id=<?= $genre->id ?>" class="btn btn-warning">Edit</a>
                        <a href="genres_delete.php?id=<?= $genre->id ?>" class="btn btn-danger">Delete</a>
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
