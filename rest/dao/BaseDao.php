<?php

class BaseDao {

    public $conn;

    /**
    * constructor of dao class
    */
    public function __construct(){
        try {

        $username = "root";
        $password = "password";
        $host = "localhost";
        $port = "3307";
        $database = "midtermfinal";
        
        /** TODO
        * List parameters such as servername, username, password, schema. Make sure to use appropriate port
        */


        /** TODO
        * Create new connection
        */
        $this->conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $username, $password);

        // set the PDO error mode to exception
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

}
?>
