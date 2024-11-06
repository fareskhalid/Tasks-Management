<?php
    namespace TaskManagementSystem\Core;

    use PDO;
    use PDOException;

    class Database 
    {
        private static $instance = null;
        private $connection;

        private function __construct()
        {
            $config = include BASE_DIR ."/config/database.php";
            try {
                $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['db_name']};charset={$config['charset']}";
                $this->connection = new PDO($dsn, $config['user'], $config['password']);
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die('Database Connection Failed: ' . $e->getMessage());
            }
        }

        public static function getInstance()
        {
            if (! self::$instance) {
                self::$instance = new Database();
            }

            return self::$instance->connection;
        }
    }