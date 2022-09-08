<?php

require("../config/db_conn.php");

if (isset($_GET['post-id'])){
    http_response_code(200);

    $post_id = $_GET['post-id']; //Get all with this Post_id 

    $thread = new thread_OP_Query; //Initiate the Class
    $thread->sql = 'SELECT * FROM fiftybitdotchat.posts WHERE post_id = :post_id'; //Pass in SQL query
    $thread->post_id = $post_id; //Pass in the variable to prepare
    $thread->query_db(); //Initiate the method

    $row = $thread->result;

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



    $thread_replies = new thread_replies_Query; //Initiate the Class
    $thread_replies->sql = 'SELECT * FROM fiftybitdotchat.replies WHERE post_id =:post_id'; //Pass in SQL query
    $thread_replies->post_id = $post_id; //Pass in the variable to prepare
    $thread_replies->query_db(); //Initiate the method

    $row = $thread_replies->result;

    // For Loop over thread replies
    foreach ($thread_replies->result as $row) {
        $reply_id = $row['reply_id'];
        $user_id = $row['user_id'];
        $post_id = $row['post_id'];
        $datetime = $row['datetime'];
        $reply_content = $row['reply_content'];
        $emote_like = $row['emote_like'];
        $emote_funny = $row['emote_funny'];
        $emote_sad = $row['emote_sad'];
        $emote_interesting = $row['emote_interesting'];
        $emote_bit = $row['emote_bit'];

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
    }




    
} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NOT an id in query string."));
}

?>