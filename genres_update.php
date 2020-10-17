<?php
require_once 'classes/Genre.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'id' => 'required|integer|min_numeric,1',
        'genre_name' => 'required|min_len,1|max_len,100'
    );
    $filter_rules = array(
    	'id' => 'trim|sanitize_numbers',
        'title' => 'trim|sanitize_string',
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

    $id = $validated_data['id'];
    $genre = Genre::find($id);
    $genre->genre_name = $validated_data['genre_name'];
    $genre->save();

    header("Location: genres_index.php");
}
catch (Exception $ex) {
    require 'genres_edit.php';
}
?>
