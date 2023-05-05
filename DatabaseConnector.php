<?php

include_once 'FieldsRepository.php';

class DatabaseConnector {

    private mysqli $connection;
    public FieldsRepository $fields;

    private static ?DatabaseConnector $instance = null;
    static function get_instance(): DatabaseConnector {
        if (!DatabaseConnector::$instance) {
            DatabaseConnector::$instance = new DatabaseConnector();
        }

        return DatabaseConnector::$instance;
    }

    private function __construct() {
        $settings = json_decode(file_get_contents('db_settings.json'));
        $this->connection = new mysqli($settings->host, $settings->user, $settings->password, $settings->database);
        if ($this->connection->connect_error) {
            die("Connection failed: {$this->connection->connect_error}");
        }

        $this->fields = new FieldsRepository($this->connection);
    }
}