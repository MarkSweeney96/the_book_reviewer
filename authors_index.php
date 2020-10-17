<?php
require_once 'classes/Book.php';
require_once 'classes/Author.php';
require_once 'classes/User.php';

try {
    $authors = Author::all();
}
catch (Exception $ex) {
    die($ex->getMessage());
}
?><!DOCTYPE html>
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
                    <h2>Authors <a href="authors_create.php" class="btn btn-primary pull-right">Add Author</a></h2>
                    <?php if (count($authors) == 0) { ?>
                        <p>There are no authors</p>
                    <?php } else { ?>
                        <table id="table-authors" class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                            </thead>
                            <tbody>
                                <?php foreach ($authors as $author) { ?>
                                    <tr data-id="<?= $author->id ?>">
                                      <td><?= $author->id ?></td>
                                        <td><a href="authors_show.php?id=<?= $author->id ?>" class="btn-link"><?= $author->first_name ?> <?= $author->last_name ?></a></td>
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
