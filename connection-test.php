<?php

require("./config/db_conn.php");


$test = "password";

// $posts = new Query;
// $posts->sql = 'SELECT * FROM fiftybitdotchat.posts';
// $posts->query_db();

// foreach ($posts as $post){
//     $username = $users['username'];
// }


$test1 = password_hash($test, PASSWORD_DEFAULT,);


if (password_verify($test, $test1)) {
    echo "hello world";
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1> Test of Users </h1>
<?php 

 echo $test1;
?>

<h1> Test of Posts </h1>
<?php //print_r($posts); ?>

<h1> Test of Replies </h1>
<?php //print_r($replies); ?>

</body>
</html>