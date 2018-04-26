<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 11:44
 */

namespace users;

class users {
    public $id;
    public $email;//product_id
    public $password;//user_id

    public function __construct($id,$email,$password) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    public static function insert_user($email,$password,$hash)
    {
        $db = \Db::getInstance();
        $req = $db->prepare("INSERT INTO users (email, password, hash, active) VALUES (:email, :password, :hash, '0')");
        $oResult = $req->execute(array('email' => $email,'password' => $password,'hash' => $hash));

        return $oResult;
    }
    public static function active_user($email,$hash)
    {
        $db = \Db::getInstance();
        $req = $db->prepare("update users set hash = '' , active = '1' where email = :email and hash = :hash");
        $oResult = $req->execute(array('email' => $email,'hash' => $hash));
        if ($req->rowCount())   return $oResult;
        else   return 0;
    }

    public static function select_users($email) {
        $db = \Db::getInstance();
        $stmt = $db->prepare("SELECT * FROM users where email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
