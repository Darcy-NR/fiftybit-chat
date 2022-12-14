<?php

require("../config/db_conn.php");
require("../config/auth.php");


if (isset($_GET['id'])){

    $headers = apache_request_headers();
    $token = str_replace('Bearer ', '', $headers['Authorization']);

    $check_auth = new auth_token;
    $check_auth->token = $token;
    $check_auth->authenticate();

    if(!empty($check_auth->decoded->user_id)){

        if ($check_auth->decoded->user_id == $_GET['id']){

            http_response_code(200);

            $user_id = $_GET['id']; //Get user id from query string

            $user = new Userprofile_Query; //Initiate the Class
            $user->sql = 'SELECT * FROM fiftybitdotchat.users WHERE user_id =:id'; //Pass in SQL query
            $user->id = $user_id; //Pass in the variable to prepare
            $user->query_db(); //Initiate the method

            foreach ($user as $user){};

            $username = $user[0]['username'];
            $email = $user[0]['email'];
            $date_joined = $user[0]['date_joined'];
            $country = $user[0]['country'];
            $bio = $user[0]['bio'];

            echo json_encode(array(
            "username" => "$username",
            "email" => "$email",
            "date_joined" => "$date_joined",
            "country" => "$country",
            "bio" => "$bio",
            ));
        } else {
            http_response_code(400); //Placeholder
            echo json_encode(array("message" => "Authorization Failed"));
        };
    } else {

        http_response_code(401); //Placeholder
        echo json_encode(array("message" => "Authorization Failed"));
    };
    } else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NOT an id in query string."));
};



    




?>