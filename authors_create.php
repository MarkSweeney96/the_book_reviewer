<?php
require_once 'utils/functions.php';
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
                    <form method="POST" action="authors_store.php" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Add Author</h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author_img" class="col-md-3 control-label">Author Image</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="author_img" name="author_img" value="<?= old('author_img') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('author_img'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="first_name" class="col-md-3 control-label">First Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= old('first_name') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('first_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= old('last_name') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('last_name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="authors_index.php" class="btn btn-default">Cancel</a>
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
