<?php

namespace App\Controller;

use System\Core\Controller;

class Admin extends Controller
{
    public function index()
    {
        if ($_SESSION['user'] != "") {
            $tableData =  $this->model('Admin')->getTableData();
            $cityData =  $this->model('Admin')->getCity();
            $this->view('admin', [
                'user' => $_SESSION['user'],
                'tableData' => $tableData,
                'cityData' => $cityData
            ]);
        } else {
            $this->view('loginPage');
        }
    }
    public function login()
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $result = $this->model('Admin')->userControl($username, $password);
        if ($result) {
            $_SESSION['user'] = $username;
            $tableData =  $this->model('Admin')->getTableData();
            $cityData =  $this->model('Admin')->getCity();
            $this->view('admin', [
                'user' => $_SESSION['user'],
                'tableData' => $tableData,
                'cityData' => $cityData
            ]);
        } else {
            echo '<h1>Kullanıcı Adı veya Parola Yanlış Lütfen Tekrar Deneyin.</h1><button onclick="window.history.back()"><h3>Geri Dön</h3></button>';
        }
    }
    public function sessionDestroy()
    {
        session_destroy();
        header('Location:/emergency-aid-app/admin');
    }
    public function kurtarilanlar()
    {
        if ($_SESSION['user'] != "") {
            $tableData =  $this->model('Admin')->getProcessedData();
            $cityData =  $this->model('Admin')->getCity();
            $this->view('survivors', [
                'user' => $_SESSION['user'],
                'tableData' => $tableData,
                'cityData' => $cityData
            ]);
        } else {
            header('Location:/emergency-aid-app/admin');
        }
    }
    public function bilanco()
    {
        if ($_SESSION['user'] != "") {
            $getAgirYaraliCount =  $this->model('Admin')->getAgirYaraliCount();
            $getVefatCount =  $this->model('Admin')->getVefatCount();
            $getHafifYaraliCount =  $this->model('Admin')->getHafifYaraliCount();
            $getSagCount =  $this->model('Admin')->getSagCount();
            $cityData =  $this->model('Admin')->getCity();
            $this->view('result', [
                'user' => $_SESSION['user'],
                'cityData' => $cityData,
                'getAgirYaraliCount' => $getAgirYaraliCount,
                'getVefatCount' => $getVefatCount,
                'getHafifYaraliCount' => $getHafifYaraliCount,
                'getSagCount' => $getSagCount,
            ]);
        } else {
            header('Location:/emergency-aid-app/admin');
        }
    }
    public function statusUpdate()
    {
        $id = $_POST['id'];
        $kullanici = $_POST['kullanici'];
        $not = $_POST['not'];
        $durum = $_POST['durum'];
        date_default_timezone_set('Europe/Istanbul');
        $time =  date('d.m.Y H:i:s');
        $result = $this->model('Admin')->updateData($id, $kullanici, $not, $durum, $time);
        if ($result) {
            echo "Düzenleme Başarılı";
        } else {
            echo "Bir hata oluştu";
        }
    }
    public function filterTable()
    {
        $il = trim($_POST['il']);
        $ilce = trim($_POST['ilce']);
        if ($il == '0' || ($il == '0' && $ilce == '0')) {
            $tableData = $this->model('Admin')->getProcessedData();
            echo json_encode(json_decode(json_encode($tableData), FALSE));
        } elseif ($il != '0' && $ilce == '0') {
            $getSelectTableData = $this->model('Admin')->getSelectTableData($il);
            echo json_encode(json_decode(json_encode($getSelectTableData), FALSE));
        } elseif ($il != '0' && $ilce != '0') {
            $getDoubleSelectTableData = $this->model('Admin')->getDoubleSelectTableData($il, $ilce);
            echo json_encode(json_decode(json_encode($getDoubleSelectTableData), FALSE));
        }
    }
}
