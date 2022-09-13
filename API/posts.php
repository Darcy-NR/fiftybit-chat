<?php

require("../config/db_conn.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

echo "[";
if (isset($_GET['subforum'])){
    http_response_code(200);

    $subforum_id = $_GET['subforum']; //Get all replies by subforum query string

    $posts = new posts_by_subforum_Query; //Initiate the Class
    $posts->sql = 'SELECT * FROM fiftybitdotchat.posts WHERE subforum_id =:subforum'; //Pass in SQL query
    $posts->subforum_id = $subforum_id; //Pass in the variable to prepare
    $posts->query_db(); //Initiate the method

    $row = $posts->result;
    $x = 1;
    $length = count($row);

    foreach ($posts->result as $row) {

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