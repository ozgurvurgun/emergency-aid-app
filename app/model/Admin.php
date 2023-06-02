<?php

namespace App\Model;

use System\Core\Model;

class Admin extends Model
{
    public function userControl($username, $password)
    {
       return $this->db->query("SELECT userName,psw FROM users WHERE userName='$username' AND psw='$password'")->fetchAll(\PDO::FETCH_ASSOC);
    }
}