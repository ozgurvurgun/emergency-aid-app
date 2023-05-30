<?php

namespace App\Controller;

use System\Core\Controller;

class HomePage extends Controller
{
    public function index()
    {
        $cityData =  $this->model('HomePage')->getCity();
        $tableData =  $this->model('HomePage')->getTableData();
        $this->view('HomePage', [
            'cityData' => $cityData,
            'tableData' => $tableData
        ]);
    }
    public function getCounty($id)
    {
        $countyData =  $this->model('HomePage')->getCounty($id);
        echo json_encode($countyData, JSON_UNESCAPED_UNICODE);
    }
    public function getNeighbourhood($id)
    {
        $neighbourhoodData = $this->model('HomePage')->getNeighbourhood($id);
        echo json_encode($neighbourhoodData, JSON_UNESCAPED_UNICODE);
    }
    public function saveForm()
    {
        $postData = [
            'city'          => $_POST['il'],
            'cityKey'       => $_POST['ilKey'],
            'county'        => $_POST['ilce'],
            'countyKey'     => $_POST['ilceKey'],
            'neighbourhood' => $_POST['mahalle'],
            'street'        => $_POST['caddeSokak'],
            'apartmentName' => $_POST['apartmanAd'],
            'apartmentNo'   => $_POST['apartmanNo'],
            'telephoneNo'   => $_POST['telefon'],
            'nameSurname'   => $_POST['adSoyad'],
            'source'        => $_POST['kaynak'],
            'note'          => $_POST['not'],
        ];
        echo $this->model('HomePage')->saveForm($postData);
    }
    public function filterTable()
    {
        $il = trim($_POST['il']);
        $ilce = trim($_POST['ilce']);
        if ($il == '0' || ($il == '0' && $ilce == '0')) {
            $tableData = $this->model('HomePage')->getTableData();
            echo json_encode(json_decode(json_encode($tableData), FALSE));
        }
        elseif ($il != '0' && $ilce == '0') {
            $getSelectTableData = $this->model('HomePage')->getSelectTableData($il);
            echo json_encode(json_decode(json_encode($getSelectTableData), FALSE));
        } elseif ($il != '0' && $ilce != '0') {
            $getDoubleSelectTableData = $this->model('HomePage')->getDoubleSelectTableData($il,$ilce);
            echo json_encode(json_decode(json_encode($getDoubleSelectTableData), FALSE));
        }
    }
}
