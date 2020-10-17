<?php
require_once 'classes/Publisher.php';
require_once 'classes/Gump.php';

try {
    $validator = new GUMP();

    $_POST = $validator->sanitize($_POST);

    $validation_rules = array(
      'pub_logo' => 'required|min_len,3|max_len,225',
      'name' => 'required|min_len,3|max_len,35',
      'address' => 'required|min_len,3|max_len,100',
      'phone' => 'required|min_len,8|max_len,25',
      'email' => 'required|min_len,8|max_len,30',
      'website' => 'required|min_len,8|max_len,50'
    );
    $filter_rules = array(
    	'id' => 'trim|sanitize_numbers',
      'pub_logo' => 'trim|sanitize_string',
      'name' => 'trim|sanitize_string',
      'address' => 'trim|sanitize_string',
      'phone' => 'trim|sanitize_string',
      'email' => 'trim|sanitize_string',
      'website' => 'trim|sanitize_string'
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
    $publisher = Publisher::find($id);
    $publisher->pub_logo = $validated_data['pub_logo'];
    $publisher->name = $validated_data['name'];
    $publisher->address = $validated_data['address'];
    $publisher->phone = $validated_data['phone'];
    $publisher->email = $validated_data['email'];
    $publisher->website = $validated_data['website'];
    $publisher->save();

    header("Location: publishers_index.php");
}
catch (Exception $ex) {
    require 'publishers_edit.php';
}
?>
