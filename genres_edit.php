<?php
require_once 'utils/functions.php';
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
            throw new Exception("Invalid genre id: " . $errors['id']);
        }

        $id = $validated_data['id'];
        $genre = Genre::find($id);
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
                    <form method="POST" action="genres_update.php" role="form" class="form-horizontal">
                        <input type="hidden" name="id" value="<?= $genre->id ?>" />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <h2>Edit Genre - <?= $genre->genre_name ?></h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="genre_name" class="col-md-3 control-label">Genre Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="genre_name" name="genre_name" value="<?= old('genre_name', $genre->genre_name) ?>" />
                            </div>
                            <div class="col-md-3 error">
                                <?php error('genre_name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="genres_index.php" class="btn btn-default">Cancel</a>
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
