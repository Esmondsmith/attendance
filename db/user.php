<?php

class User {
    private $db;

    function __construct($conn){
        $this->db = $conn;
    }

    public function insertUser($username, $password){
        try {
            //checking to make sure the user name doesn't exit in the DB before. If it doesn't, then we go ahead.
            $result = $this->getUserByUsername($username);
            if($result['num'] > 0){
                return false;
            } else {
                //md5 is an inbuilt PHP function for encripting password.
                $new_password = md5($password.$username);
                //Insert query
                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$username);
                $stmt->bindparam(':password',$new_password);
                $stmt->execute();
                return true;
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    } 


    public function getUser($username, $password){
        try {
            $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password',$password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($username){
        try {
            $sql = "SELECT count(*) as num FROM users WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


}









?>