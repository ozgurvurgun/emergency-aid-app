<?php

namespace App\Model;
use System\Core\Model;

class HomePage extends Model
{
    public function getAll()
    {
        return $this->db->query('SELECT * FROM basic_mvc')->fetchAll(\PDO::FETCH_ASSOC);
    }
}
