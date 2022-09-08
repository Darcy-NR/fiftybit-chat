<?php

require("../config/db_conn.php");

$new_user_data = json_decode(file_get_contents("php://input"));

$username = $new_user_data->username;
$plainpass = $new_user_data->password;
$email = $new_user_data->email;
$country = $new_user_data->country;
$bio = $new_user_data->bio;

$password = password_hash($plainpass, PASSWORD_DEFAULT,);

if (!empty($new_user_data->username) && !empty($new_user_data->password) && !empty($new_user_data->email)){

    $createUser = new createUser_Query;
    $createUser->sql = 'INSERT INTO fiftybitdotchat.users(username, password, email, country, bio)
    VALUES (:username, :password, :email, :country, :bio)';
    $createUser->username = $username;
    $createUser->password = $password;
    $createUser->email = $email;
    $createUser->country = $country;
    $createUser->bio = $bio;
    $createUser->query_db();

    http_response_code(200);
    echo json_encode(array("message" => "User Created!"));


} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NO PARAMETERS"));
}

?>