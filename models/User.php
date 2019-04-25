<?php

class User
{
     public static function register ($name, $email, $password)
     {
         $db = Db::getConnection();

         $sql = 'INSERT INTO user (name, email, password) '
                . 'VALUES (:name, :email, :password)';
         $result = $db->prepare($sql);
         $result->bindParam(':name', $name, PDO::PARAM_STR);
         $result->bindParam(':email', $email, PDO::PARAM_STR);
         $result->bindParam(':password', $password, PDO::PARAM_STR);

         return $result->execute();
     }

    public static function checkUserData ($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam('email', $email, PDO::PARAM_STR);
        $result->bindParam('password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth ($userId)
    {
        $_SESSION ['user'] = $userId;
    }

    public static function checkLogged ()
    {
        if (isset ($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header ("Location: /user/login");
    }

    public static function isGuest ()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function checkName ($name)
    {
       if (strlen($name) >= 3){
          return true;
       }
       return false;
    }

    public static function checkPhone ($phone)
    {
        if (preg_match("/^[0-9]{10}$/",$phone)){
            return true;
        }
        return false;
    }

    public static function checkPassword ($password)
    {
        if (strlen ($password) >= 6){
            return true;
        }
        return false;
    }

    public static function checkEmail ($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkEmailExists ($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()){
            return true;
        }
        return false;
    }

    public static function getUserById ($userId)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :userId';

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();

        return $result->fetch();
    }

    public static function edit ($userId, $name, $password)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE user SET name = :name AND password = :password WHERE id = :userId';

        $result = $db->prepare($sql);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }
}