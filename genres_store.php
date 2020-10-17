<?php
require_once 'classes/Genre.php';
require_once 'classes/Publisher.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'genre_name' => 'required|min_len,3|max_len,35'
    );
    $filter_rules = array(
        'genre_name' => 'trim|sanitize_string'
    );

    $validator->validation_rules($validation_rules);
    $validator->filter_rules($filter_rules);

    $validated_data = $validator->run($_POST);

    if($validated_data === false) {
        $errors = $validator->get_errors_array();
    }
    else {
        $errors = array();
    }

    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    $genre = new Genre();
    $genre->genre_name = $validated_data['genre_name'];
    $genre->save();

    header("Location: genres_index.php");
}
catch (Exception $ex) {
    require 'genres_create.php';
}
?>
