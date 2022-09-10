<?php

require("../config/db_conn.php");
require("../config/auth.php");

//User Input Variable
$update_post_data = json_decode(file_get_contents("php://input"));

//Post Subforum ID
$post_id = $_GET['post-id'];

$post_title = $update_post_data->post_title;
$post_content = $update_post_data->post_content;
$post_hotlink = $update_post_data->post_hotlink;

//Check

if (!empty($update_post_data->post_title) && !empty($update_post_data->post_content)){

    $headers = apache_request_headers();
    $token = str_replace('Bearer ', '', $headers['Authorization']);

    $check_auth = new auth_token;
    $check_auth->token = $token;
    $check_auth->authenticate();

    if(!empty($check_auth->decoded->user_id)){

        $user_id = $check_auth->decoded->user_id;

            $get_post = new find_post_Query;
            $get_post->sql = 'SELECT user_id FROM  fiftybitdotchat.posts WHERE post_id = :post_id';
            $get_post->post_id = $post_id;
            $get_post->query_db();

            $row = $get_post->result;

            foreach ($get_post->result as $row) {
                $returned_user_id = $row['user_id'];
            }

        if($user_id == $returned_user_id) {

            $updatePost = new update_post_Query;
            $updatePost->sql = 'UPDATE fiftybitdotchat.posts SET post_title = :post_title, 
            post_content = :post_content, post_hotlink = :post_hotlink WHERE post_id = :post_id';
            $updatePost->user_id = $user_id;
            $updatePost->post_id = $post_id;
            $updatePost->post_title = $post_title;
            $updatePost->post_content = $post_content;
            $updatePost->post_hotlink = $post_hotlink;
            $updatePost->query_db();

            http_response_code(200);
            echo json_encode(array("message" => "Post Updated"));

        } else {
            http_response_code(401);
            echo json_encode(array("message" => "Authorization Failed"));
        }

    } else {
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