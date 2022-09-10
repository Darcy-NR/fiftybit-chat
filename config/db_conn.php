<?php

////                                            ////
// Class Query for Displaying User Profile By ID //
////                                          ////      

class Userprofile_Query
{
    var $sql; //API passes in the query dynamically.
    var $id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement
                $this->id = htmlspecialchars(strip_tags($this->id)); //Sanitize the variable
                $stmt->bindParam(":id", $this->id); //Bind variable to :id param
                $stmt->execute(); //run the query

                $this->result = $stmt->fetchAll();
                $this->sql = null; //Set SQL variable back to null because we don't need the string
                return $this->result; //return the array
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                                         ////
 // Class Query for Creating User Profile By ID //
////                                         ////

class CreateUser_Query
{
    var $sql;
    var $username;
    var $password;
    var $email;
    var $country;
    var $bio;

    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":username", $this->username);
                $stmt->bindParam(":password", $this->password); 
                $stmt->bindParam(":email", $this->email); 
                $stmt->bindParam(":country", $this->country); 
                $stmt->bindParam(":bio", $this->bio); 

                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                            ////
 // Class Query for Creating Posts //
////                            ////

class CreatePost_Query
{
    var $sql;
    var $user_id;
    var $subforum_id;
    var $post_title;
    var $post_content;
    var $post_hotlink;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":user_id", $this->user_id);
                $stmt->bindParam(":subforum_id", $this->subforum_id); 
                $stmt->bindParam(":post_title", $this->post_title); 
                $stmt->bindParam(":post_content", $this->post_content); 
                $stmt->bindParam(":post_hotlink", $this->post_hotlink); 

                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}


  ////                                             ////
 // Class Query for returning all posts by subforum //
////                                             ////

class posts_by_subforum_Query
{
    var $sql; //API passes in the query dynamically.
    var $subforum_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement
                $this->subforum_id = htmlspecialchars(strip_tags($this->subforum_id)); //Sanitize the variable
                $stmt->bindParam(":subforum", $this->subforum_id); //Bind variable to :subforum param
                $stmt->execute(); //run the query

                $this->result = $stmt->fetchAll();
                $this->sql = null; //Set SQL variable back to null because we don't need the string
                return $this->result; //return the array
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}


  ////                                             ////
 // Class Query for a thread OP by it's post_id     //
////                                             ////

class thread_OP_Query
{
    var $sql; //API passes in the query dynamically.
    var $post_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement
                $this->post_id = htmlspecialchars(strip_tags($this->post_id)); //Sanitize the variable
                $stmt->bindParam(":post_id", $this->post_id); //Bind variable to :subforum param
                $stmt->execute(); //run the query

                $this->result = $stmt->fetchAll();
                $this->sql = null; //Set SQL variable back to null because we don't need the string
                return $this->result; //return the array
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                                              ////
 // Class Query for thread replies by their post_id  //
////                                              ////

class thread_replies_Query
{
    var $sql; //API passes in the query dynamically.
    var $post_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement
                $this->post_id = htmlspecialchars(strip_tags($this->post_id)); //Sanitize the variable
                $stmt->bindParam(":post_id", $this->post_id); //Bind variable to :subforum param

                $stmt->execute(); //run the query

                $this->result = $stmt->fetchAll();
                $this->sql = null; //Set SQL variable back to null because we don't need the string
                return $this->result; //return the array
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                             ////
 // Class Query to create new reply //
////                             ////

class CreateReply_Query
{
    var $sql;
    var $user_id;
    var $post_id;
    var $reply_content;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":user_id", $this->user_id);
                $stmt->bindParam(":post_id", $this->post_id); 
                $stmt->bindParam(":reply_content", $this->reply_content); 

                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                        ////
 // Class Query to update post //
////                        ////

class update_post_Query
{
    var $sql;
    var $post_id;
    var $post_title;
    var $post_content;
    var $post_hotlink;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":post_id", $this->post_id); 
                $stmt->bindParam(":post_title", $this->post_title); 
                $stmt->bindParam(":post_content", $this->post_content); 
                $stmt->bindParam(":post_hotlink", $this->post_hotlink); 

                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}


  ////                         ////
 // Class Query to update reply //
////                         ////

class update_reply_Query
{
    var $sql;
    var $reply_id;
    var $reply_content;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":reply_id", $this->reply_id); 
                $stmt->bindParam(":reply_content", $this->reply_content); 
               
                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}



  ////                             ////
 // Class Query to Get Single Reply //
////                             ////

class find_reply_Query
{
    var $sql;
    var $reply_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":reply_id", $this->reply_id); 
               
                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
                $this->result = $stmt->fetchAll();
                return $this->result; 
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                            ////
 // Class Query to Get Single Post //
////                            ////

class find_post_Query
{
    var $sql;
    var $post_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":post_id", $this->post_id); 
               
                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
                $this->result = $stmt->fetchAll();
                return $this->result; 
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

  ////                  ////
 // Class Query to Login //
////                  ////

class login_Query
{
    var $sql;
    var $user_id;
    var $result;

   public function query_db(){
        try {

            $host = 'localhost';
            $db = 'fiftybitdotchat';
            $user = 'fiftybit-client';
            $password = 'H7$ng';
            $port = '5432';

            $conn = "pgsql:host=$host;port=$port;dbname=$db;";

            $pdo = new PDO($conn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
                $stmt = $pdo->prepare($this->sql); //Prepare the statement

                //Sanitize the variables
                
                
                //Bind variables

                $stmt->bindParam(":user_id", $this->user_id); 
               
                $stmt->execute(); //run the query

                $this->sql = null; //Set SQL variable back to null because we don't need the string
                $this->result = $stmt->fetchAll();
                return $this->result; 
            }
            } catch (PDOException $e) { //Exception handling
                die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }

}

?>