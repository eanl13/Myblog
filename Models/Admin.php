<?php
error_reporting(E_ALL);
ini_set('display_errors',true);

class Admin {

    public $con;

    public function __construct(){
        $this->con = mysqli_connect("localhost","root","","myblogger");
    }

    public function insert($email, $password){


        mysqli_query($this->con, 'SET NAMES utf8');
        mysqli_query($this->con, 'SET CHARACTER SET utf8');
        mysqli_query($this->con, "SET COLLATION_CONNECTION = 'utf8_general_ci'");



        $sql = 'INSERT INTO user(firstname,lastname,email,password)'
            ."VALUES('$email', '$password')";



        //veritabanına kayıt ekle,
        return mysqli_query($this->con, $sql);
    }

    public function girisYap($email,$password) {

        $sql = 'SELECT * '
            . "FROM user "
            . "WHERE email='$email'";

        //veritabanında $sql değişkeni içindeki sorgu çalıştırıldı
        $emailResult = mysqli_query($this->con, $sql);
        $queryResult = mysqli_fetch_row($emailResult);
        if ( is_null($queryResult) ){
            return array(false, 'Email is wrong!');
        }

        $sql = ' SELECT * FROM user'
            . " WHERE email='$email' AND password='$password'";
        $passwordResult = mysqli_query($this->con, $sql);
        $queryResult = mysqli_fetch_row($passwordResult);
        if ( is_null($queryResult) ){
            return array(false, 'Password is wrong!');
        }

        $loginResult = true;
        $_SESSION['girisYap'] = 1;
        return array(true);
    }

    public function isLogined(){
        if ( isset($_SESSION['girisYap']) && $_SESSION['girisYap'] == 1 ){
            return true;
        }else{
            return false;
        }
    }

} 