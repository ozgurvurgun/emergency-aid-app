<?php

namespace System\Database;

require_once 'app/config/database.php';
class Database
{
    protected $db;
    private $hostname;
    private $username;
    private $password;
    private $databaseName;
    public function __construct()
    {
        if ($_ENV["DATABASE"]['connection'] == 'on') {
            $this->hostname = $_ENV["DATABASE"]['hostname'];
            $this->username = $_ENV["DATABASE"]['username'];
            $this->password = $_ENV["DATABASE"]['password'];
            $this->databaseName = $_ENV["DATABASE"]['database'];
            try {
                $this->db = new \PDO("mysql:host=$this->hostname;dbname=$this->databaseName;", "$this->username", "$this->password");
                $this->db->query('SET CHARACTER SET utf8');
            } catch (\PDOException $e) {
                echo '<pre><span style="color:red">CONNECTION ERROR: </span>' . $e->getMessage() . '</pre>';
            }
        }
    }
}
