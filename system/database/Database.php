<?php
namespace System\Database;
require_once __DIR__ . '../../../app/config/database.php';
class Database
{
    protected $db;
    private $hostname;
    private $username;
    private $password;
    private $databaseName;
    public function __construct()
    {
        $this->hostname = $_ENV["DATABASE"]['hostname'];
        $this->username = $_ENV["DATABASE"]['username'];
        $this->password = $_ENV["DATABASE"]['password'];
        $this->databaseName = $_ENV["DATABASE"]['database'];
        try {
            $this->db = new \PDO("mysql:host=$this->hostname;dbname=$this->databaseName;", "$this->username", "$this->password");
        } catch (\PDOException $e) {
            echo '<pre><span style="color:red">CONNECTION ERROR: </span>' . $e->getMessage().'</pre>';
        }
    }
}
