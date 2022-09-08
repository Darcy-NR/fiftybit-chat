<?php

require("../config/db_conn.php");

$login_json = json_decode(file_get_contents("php://input"));
$user_id = $login_json->user_id;
$username = $login_json->username;
$password = $login_json->password;

if (!empty($user_id) && !empty($username) && !empty($password)){
    
    $verify_login = new login_Query;
    $verify_login->sql = 'SELECT password FROM fiftybitdotchat.users WHERE user_id = :user_id';
    $verify_login->user_id = $user_id;

    $verify_login->query_db();

    $row = $verify_login->result;
    foreach ( $verify_login->result as $row) {
        $returned_pass = $row['password'];
    }

    if (isset($returned_pass)){
        
        if(password_verify($password, $returned_pass)) {
            echo json_encode(array("message" => "This password matches."));
            
            //Generate JWT here, set to expire in 2 months.

        } else {
            http_response_code(401);
            echo json_encode(array("message" => "This password does not match."));
        }

    } else {
        http_response_code(401);
        echo json_encode(array("message" => "There is no user with this ID."));
    };

} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NOT an id in query string."));
}

?>