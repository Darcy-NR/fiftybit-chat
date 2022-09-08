<?php

require("../config/db_conn.php");

if (isset($_GET['reply-id'])){
    http_response_code(200);

    $reply_id = $_GET['reply-id']; //Get all with this Post_id 

    $reply = new find_reply_Query; //Initiate the Class
    $reply->sql = 'SELECT * FROM fiftybitdotchat.replies WHERE reply_id = :reply_id'; //Pass in SQL query
    $reply->reply_id = $reply_id; //Pass in the variable to prepare
    $reply->query_db(); //Initiate the method

    $row = $reply->result;

    //For reply

    foreach ($reply->result as $row) {
        $response_reply_id = $row['reply_id'];
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
        "reply_id" => "$response_reply_id",
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