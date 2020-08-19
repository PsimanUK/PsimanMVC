<?php
    // PDO Database Class
    // - Connects to Database
    // - Creates to Prepared Statements
    // - Binds Values
    // - Returns Rows and Results

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASS;
        private $dbname = DB_NAME;

        private $dbhandler;
        private $statement;
        private $error;

        public function __construct(){
            // Set DSN
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            echo 'Database name is ' . DB_NAME . '<br>';

            // Create New PDO Instance
            try{
                $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
            } catch(PDOException $exception){
                echo 'Caught an exception...<br>';
                $this->error = $exception->getMessage();
                echo $this->error;
            }

        }
    }