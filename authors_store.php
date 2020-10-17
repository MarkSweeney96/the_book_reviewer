<?php
require_once 'classes/Author.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
        'author_img' => 'required|min_len,3|max_len,500',
        'first_name' => 'required|min_len,3|max_len,35',
        'last_name' => 'required|min_len,3|max_len,35'
    );
    $filter_rules = array(
        'author_img' => 'trim|sanitize_string',
        'first_name' => 'trim|sanitize_string',
        'last_name' => 'trim|sanitize_string'
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

    $author = new Author();
    $author->author_img = $validated_data['author_img'];
    $author->first_name = $validated_data['first_name'];
    $author->last_name = $validated_data['last_name'];
    $author->save();

    header("Location: authors_index.php");
}
catch (Exception $ex) {
    require 'authors_create.php';
}
?>
