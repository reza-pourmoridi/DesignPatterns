<!--Imagine you are building a web application and need to implement a logging system to record various -->
<!--events and messages throughout your application's execution. You want to ensure that there is only-->
<!--one instance of the logging system to avoid duplication of logs and to maintain a centralized logging mechanism.-->

<?php

class Logger {

    private static $instance;
    private $logs = [];

    private function __construct() {
        // Private constructor to prevent direct instantiation
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function log($logText) {
        $this->logs[] = $logText;
    }

    public function displayLogs() {
        foreach ($this->logs as $item) {
            echo $item . "<br>";
        }
    }
}

$logger = Logger::getInstance();
$logger->log("User logged in");
$logger->log("Error: Database connection failed");


// Display logs
$logger->displayLogs();


$loggerNew = Logger::getInstance();
$loggerNew->displayLogs();
