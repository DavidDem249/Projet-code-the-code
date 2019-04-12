<?php

class Database{
    private static $dbhost = "localhost";
    private static $dbname = "codethecode";
    private static $dbusername = "root";
    private static $dbpassword = "";
    private static $connection = null;

    public function connect(){
        if(self::$connection = null){
            try{
                self::$connection = new PDO("mysql:host =". self::$dbhost.";dbname = " .self::$dbname, self::$dbusername, self::$dbpassword);

            }
            catch(PDOException $e){
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    public static function disconnect(){
        self::$connection = null;
    }
}
?>