<?php

    class DataBase{
        private static $instance = null;
        private $pdo;

        protected function __CONSTRUCT(){
            $this->pdo = new PDO('mysql:host=localhost;dbname=peluqueria;charset=utf8' , 'root' , '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        }

        public static function getInstance()
        {
            if(!self::$instance){
                self::$instance = new DataBase();
            }
            
            return self::$instance;
        }

        public function getConnection()
        {
            return $this->pdo;
        }
    }


?>