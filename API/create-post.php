<?php

require("../config/db_conn.php");
require("../config/auth.php");


//User Input Variable
$new_post_data = json_decode(file_get_contents("php://input"));

//Post Subforum ID
$subforum_id = $new_post_data->subforum_id;


$post_title = $new_post_data->post_title;
$post_content = $new_post_data->post_content;
$post_hotlink = $new_post_data->post_hotlink;


//Check
if (!empty($new_post_data->subforum_id) && !empty($new_post_data->post_title) 
&& !empty($new_post_data->post_content)){

    $headers = apache_request_headers();
    $token = str_replace('Bearer ', '', $headers['Authorization']);

        $check_auth = new auth_token;
        $check_auth->token = $token;
        $check_auth->authenticate();

        if (!empty($check_auth->decoded->user_id)){

            $user_id = $check_auth->decoded->user_id;

            $createPost = new createPost_Query;
            $createPost->sql = 'INSERT INTO fiftybitdotchat.posts(user_id, subforum_id, post_title, post_content, post_hotlink )
            VALUES (:user_id, :subforum_id, :post_title, :post_content, :post_hotlink)';
            $createPost->user_id = $user_id;
            $createPost->subforum_id = $subforum_id;
            $createPost->post_title = $post_title;
            $createPost->post_content = $post_content;
            $createPost->post_hotlink = $post_hotlink;
        
            $createPost->query_db();
        
            http_response_code(200);
            echo json_encode(array("message" => "Post Created!"));

        }else{

            http_response_code(401);
            echo json_encode(array("message" => "Authentication Failed"));

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