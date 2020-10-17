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
                    <form method="POST" action="publishers_store.php" role="form" class="form-horizontal">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Add Publisher</h2>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Publisher Logo</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="pub_logo" name="pub_logo" value="<?= old('pub_logo') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('pub_logo'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('name'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Address</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="address" name="address" value="<?= old('address') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('address'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('phone'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Email</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('email'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Website</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="website" name="website" value="<?= old('website') ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('website'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="publishers_index.php" class="btn btn-default">Cancel</a>
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
