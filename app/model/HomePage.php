<?php

namespace App\Model;

use System\Core\Model;

class HomePage extends Model
{
    public function getCity()
    {
        return $this->db->query('SELECT sehir_title, sehir_key FROM sehir')->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getCounty($id)
    {
        return $this->db->query("SELECT ilce_title, ilce_key FROM ilce WHERE ilce_sehirkey=$id")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function getNeighbourhood($id)
    {
        return $this->db->query("SELECT mahalle_title FROM mahalle WHERE mahalle_ilcekey=$id")->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function saveForm($data)
    {
        $city = trim($data['city']);
        $county = trim($data['county']);
        $neighbourhood = trim($data['neighbourhood']);
        $street = trim($data['street']);
        $apartmentName = trim($data['apartmentName']);
        $apartmentNo = trim($data['apartmentNo']);
        $telephoneNo = trim($data['telephoneNo']);
        $nameSurname = trim($data['nameSurname']);
        $source = trim($data['source']);
        $note = trim($data['note']);
        if ($city != "Seçin..."    &&    $county != "Seçin..." && $neighbourhood != "Seçin..." && $source != "") {
            $result = $this->db->query("INSERT INTO yardim_talepleri (yardim_talepleri_il, yardim_talepleri_ilce, yardim_talepleri_mahalle, yardim_talepleri_cadde_sokak, yardim_talepleri_apartman_adi, yardim_talepleri_apartman_no, yardim_talepleri_telefon_no, yardim_talepleri_ad_soyad, yardim_talepleri_kaynak, yardim_talepleri_not) 
            VALUES ('$city', '$county', '$neighbourhood', '$street', '$apartmentName', '$apartmentNo', '$telephoneNo', '$nameSurname', '$source', '$note')");
            if ($result) {
                return "Kayıt Başarılı. Bilgileriniz En Kısa Zamanda Yetkililerle Paylaşılacak.";
            } else {
                return "Üzgünüz Kayıt Başarısız Oldu. Lütfen Tekrar Deneyin.";
            }
        } else {
            return "Lütfen Doldurulması Zorunlu Alanları Doldurun !";
        }
    }
}
