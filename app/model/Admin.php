<?php

namespace App\Model;

use System\Core\Model;

class Admin extends Model
{
    public function userControl($username, $password)
    {
        return $this->db->query("SELECT userName,psw FROM users WHERE userName='$username' AND psw='$password'")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getTableData()
    {
        return $this->db->query('SELECT * FROM yardim_talepleri WHERE yardim_talepleri_durum ="n" ORDER BY yardim_talepleri_id DESC')->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getCity()
    {
        return $this->db->query('SELECT sehir_title, sehir_key FROM sehir')->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function updateData($id, $kullanici, $not, $durum, $time)
    {
        return $this->db->query("UPDATE yardim_talepleri SET yardim_talepleri_durum ='y', yardim_talepleri_sorumlu ='$kullanici', yardim_talepleri_sonuc_zamani ='$time', yardim_talepleri_sonuc_notu ='$not', yardim_talepleri_bilanco ='$durum' WHERE yardim_talepleri_id ='$id'")->rowCount();
    }
    public function getProcessedData()
    {
        return $this->db->query('SELECT * FROM yardim_talepleri WHERE yardim_talepleri_durum ="y" ORDER BY yardim_talepleri_id DESC')->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getSelectTableData($il)
    {
        $il = trim($il);
        return $this->db->query("SELECT * FROM yardim_talepleri WHERE yardim_talepleri_il_key=$il AND yardim_talepleri_durum ='y' ORDER BY yardim_talepleri_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getDoubleSelectTableData($il, $ilce)
    {
        return $this->db->query("SELECT * FROM yardim_talepleri WHERE yardim_talepleri_il_key=$il AND yardim_talepleri_ilce_key=$ilce AND yardim_talepleri_durum ='y' ORDER BY yardim_talepleri_id DESC")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getAgirYaraliCount()
    {
        return $this->db->query("SELECT COUNT(*) AS agirYarali  FROM yardim_talepleri WHERE yardim_talepleri_bilanco ='agirYarali'")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getVefatCount()
    {
        return $this->db->query("SELECT COUNT(*) AS vefat  FROM yardim_talepleri WHERE yardim_talepleri_bilanco ='vefat'")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getHafifYaraliCount()
    {
        return $this->db->query("SELECT COUNT(*) AS hafifYarali  FROM yardim_talepleri WHERE yardim_talepleri_bilanco ='hafifYarali'")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getSagCount()
    {
        return $this->db->query("SELECT COUNT(*) AS sag  FROM yardim_talepleri WHERE yardim_talepleri_bilanco ='sag'")->fetchAll(\PDO::FETCH_ASSOC);
    }
}
