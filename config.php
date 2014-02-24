<?php
class config{
    private static $instance = NULL;
    private static $dsn="mysql:host=localhost;dbname=kawin";
    private static $db_user="root";
    private static $db_pass="admin";

    private function __construct(){

    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance=new PDO(self::$dsn, self::$db_user, self::$db_pass);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;
    }
}
?>