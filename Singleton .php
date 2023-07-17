<?php
/*
Suppose you are building a small web application that connects to a database to retrieve and display some data.
 You want to ensure that only one database connection is created and used throughout the application.
 To achieve this, you can use the Singleton pattern to create a single instance of the database connection object that can be shared across the application.
*/

class DatabaseConnection {

    private $connection;
    public static $instance;

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
    }

    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = self::getConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }


}









/*
 * In this example, the DatabaseConnection class is implemented as a Singleton. The getInstance() method is used to create a single instance of the class, and the getConnection() method is used to retrieve the database connection object.

To use the DatabaseConnection class in your application, you can call the getInstance() method to retrieve the instance of the class:
 */



//usage
$database = DatabaseConnection::getInstance();
$connection = $database->getConnection();