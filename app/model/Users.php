<?php

class Users extends Model
{
    public function getAll()
    {
        return $this->db->query('SELECT * FROM basic_mvc')->fetchAll(PDO::FETCH_ASSOC);
    }
}
