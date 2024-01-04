<?php
    class ConnexBase {
        private static $host = "localhost";
        private static $nombd = "bdemplacement";
        private static $user = "root";
        private static $pass = "";
        private static $connex = null;

    public static function connect(){
            try{
                self::$connex = new PDO ("mysql: host=".self::$host.";dbname=".self::$nombd,self::$user,self::$pass);
            }
            catch (PDOException $e) {
                die ($e->getMessage());
            }
            return self::$connex;
    }
    public static function disconnect(){
    }
}
ConnexBase::connect();
?>