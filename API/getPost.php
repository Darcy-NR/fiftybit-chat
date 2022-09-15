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
echo "]";

} else {
    http_response_code(400); //Placeholder
    echo json_encode(array("message" => "There IS NOT an id in query string."));
}

?>