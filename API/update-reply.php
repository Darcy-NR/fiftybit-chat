<?php

require("../config/db_conn.php");
require("../config/auth.php");

// PLACEHOLDER USER ID
// THIS IS GOING TO COME FROM JWT
// FOR NOW THIS IS JUST TO MAKE SURE THE POSTS WORK
// $user_id = 1;

//User Input Variable
$update_reply_data = json_decode(file_get_contents("php://input"));

//Post Subforum ID
$reply_id = $_GET['reply-id'];

$reply_content = $update_reply_data->reply_content;


//Check

    if (!empty($update_reply_data->reply_content)){

            $headers = apache_request_headers();
            $token = str_replace('Bearer ', '', $headers['Authorization']);

            $check_auth = new auth_token;
            $check_auth->token = $token;
            $check_auth->authenticate();

    if(!empty($check_auth->decoded->user_id)){

            $user_id = $check_auth->decoded->user_id;

            $get_reply = new find_reply_Query;
            $get_reply->sql = 'SELECT user_id FROM  fiftybitdotchat.replies WHERE reply_id = :reply_id';
            $get_reply->reply_id = $reply_id;
            $get_reply->query_db();

            $row = $get_reply->result;

            //For loop for thread OP
            foreach ($get_reply->result as $row) {
                $returned_user_id = $row['user_id'];
            }

        if ($returned_user_id == $user_id){

            $updatePost = new update_reply_Query;
            $updatePost->sql = 'UPDATE fiftybitdotchat.replies SET reply_content = :reply_content WHERE reply_id = :reply_id';
            $updatePost->user_id = $user_id;
            $updatePost->reply_id = $reply_id;
            $updatePost->reply_content = $reply_content;

            $updatePost->query_db();

            http_response_code(200);
            echo json_encode(array("message" => "Reply Updated!"));

        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Authorization Failed"));
        };

    }else{
        http_response_code(401);
        echo json_encode(array("message" => "Authorization Failed"));
    };

} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NO PARAMETERS"));
    echo json_encode(array("message02" => "$user_id"));
    echo json_encode(array("message03" => "$subforum_id"));
    echo json_encode(array("message04" => "$post_title"));
    echo json_encode(array("message05" => "$post_content"));
    echo json_encode(array("message06" => "$post_hotlink"));
}


?>