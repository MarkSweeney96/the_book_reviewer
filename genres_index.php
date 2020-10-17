<?php
require_once 'classes/Book.php';
require_once 'classes/Genre.php';
require_once 'classes/User.php';


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
                    <h2>Genres <a href="genres_create.php" class="btn btn-primary pull-right">Add Genre</a></h2>
                    <?php if (count($genres) == 0) { ?>
                        <p>There are no genres</p>
                    <?php } else { ?>
                        <table id="table-books" class="table table-hover">
                            <thead>
                              <th>ID</th>
                                <th>Genre Name</th>
                            </thead>
                            <tbody>
                                <?php foreach ($genres as $genre) { ?>
                                    <tr data-id="<?= $genre->id ?>">
                                      <td><?= $genre->id ?></td>
                                        <td><a href="genres_show.php?id=<?= $genre->id ?>" class="btn-link"><?= $genre->genre_name ?></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>
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
