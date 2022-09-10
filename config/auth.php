<?php

// require $_SERVER['DOCUMENT_ROOT'].'/API/vendor/autoload.php';
require ("../API/vendor/autoload.php");

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

  ////   ////
 // Login //
////   ////

class create_token {

    private $key = '7HbLN&#K2J';
    public $user_id;


    public function new_auth(){
        $iat = time();
        $exp = $iat + 5184000; //~two months
        $payload = array(
                'iss' => 'http://localhost/Projects/fiftybit-chat/api/', //issuer
                'audience' => 'http://localhost/Projects/fiftybit-chat/', //audience
                'iat' => $iat, //time of issue
                'exp' => $exp, //time of expiry
                'user_id' => $this->user_id
        );
        $jwt = JWT::encode($payload, $this->key, 'HS512');
        return array(
            'token'=>$jwt,
            'expires'=>$exp
        );

    }

}

  ////           ////
 // Authenticator //
////           ////

class auth_token {

    private $key = '7HbLN&#K2J';
    public $token;
    public $decoded;

    public function authenticate(){
        try {
            $this->decoded = JWT::decode($this->token, new Key($this->key, 'HS512'));
            return $this->decoded;
        } catch (\Exception $e) {
            return false;
        }

    }

}

?>