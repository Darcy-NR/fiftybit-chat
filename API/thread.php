<?php

require("../config/db_conn.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

echo "[";
if (isset($_GET['post-id'])){
    http_response_code(200);

    $post_id = $_GET['post-id']; //Get all with this Post_id 

    $thread = new thread_OP_Query; //Initiate the Class
    $thread->sql = 'SELECT * FROM fiftybitdotchat.posts WHERE post_id = :post_id'; //Pass in SQL query
    $thread->post_id = $post_id; //Pass in the variable to prepare
    $thread->query_db(); //Initiate the method

    //For loop for thread OP
    foreach ($thread->result as $row) {
        $post_id = $row['post_id'];
        $user_id = $row['user_id'];
        $datetime = $row['datetime'];
        $post_title = $row['post_title'];
        $post_content = $row['post_content'];
        $post_hotlink = $row['post_hotlink'];
        $emote_like = $row['emote_like'];
        $emote_funny = $row['emote_funny'];
        $emote_sad = $row['emote_sad'];
        $emote_interesting = $row['emote_interesting'];
        $emote_bit = $row['emote_bit'];

        echo json_encode(array(
        "post_id" => "$post_id",
        "user_id" => "$user_id",
        "datetime" => "$datetime",
        "post_title" => $post_title,
        "post_content" => $post_content,
        "post_hotlink" => $post_hotlink,
        "emote_like" => $emote_like,
        "emote_funny" => $emote_funny,
        "emote_sad" => $emote_sad,
        "emote_interesting" => $emote_interesting,
        "emote_bit" => $emote_bit
    ));
    }
echo ",";

    $thread_replies = new thread_replies_Query; //Initiate the Class
    $thread_replies->sql = 'SELECT * FROM fiftybitdotchat.replies WHERE post_id =:post_id'; //Pass in SQL query
    $thread_replies->post_id = $post_id; //Pass in the variable to prepare
    $thread_replies->query_db(); //Initiate the method

    $reply_row = $thread_replies->result;

    // For Loop over thread replies

    $reply_row = $thread->result;
    $x = 0;
    $length = count($reply_row);

    foreach ($thread_replies->result as $reply_row) {
        $reply_id = $reply_row['reply_id'];
        $user_id = $reply_row['user_id'];
        $post_id = $reply_row['post_id'];
        $datetime = $reply_row['datetime'];
        $reply_content = $reply_row['reply_content'];
        $emote_like = $reply_row['emote_like'];
        $emote_funny = $reply_row['emote_funny'];
        $emote_sad = $reply_row['emote_sad'];
        $emote_interesting = $reply_row['emote_interesting'];
        $emote_bit = $reply_row['emote_bit'];

        echo json_encode(array(
        "reply_id" => "$reply_id",    
        "user_id" => "$user_id",    
        "post_id" => "$post_id",
        "datetime" => "$datetime",
        "reply_content" => $reply_content,
        "emote_like" => $emote_like,
        "emote_funny" => $emote_funny,
        "emote_sad" => $emote_sad,
        "emote_interesting" => $emote_interesting,
        "emote_bit" => $emote_bit
    ));
    if($x === $length){
        echo "";
    } else {
        echo ",";
    }

    $x++;


    }
    echo "]";



    
} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NOT an id in query string."));
}

?>