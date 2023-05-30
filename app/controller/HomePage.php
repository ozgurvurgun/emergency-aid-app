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
            'county'        => $_POST['ilce'],
            'neighbourhood' => $_POST['mahalle'],
            'street'        => $_POST['caddeSokak'],
            'apartmentName' => $_POST['apartmanAd'],
            'apartmentNo'   => $_POST['apartmanNo'],
            'telephoneNo'   => $_POST['telefon'],
            'nameSurname'   => $_POST['adSoyad'],
            'source'        => $_POST['kaynak'],
            'note'          => $_POST['not'],
        ];
        echo  $this->model('HomePage')->saveForm($postData);
    }
    public function filterTable()
    {
        if (trim($_POST['il']) === "Seçin...") {
            echo "Lütfen Şehir Seçin";
        } elseif (trim($_POST['il']) != 'Seçin...' & trim($_POST['ilce']) == 'Seçin...') {
            echo "illeri siraliyorum";
        }
        elseif(trim($_POST['il']) != 'Seçin...' & trim($_POST['ilce']) != 'Seçin...'){
            echo "il ve ilçelere göre siraliyorum";
        }
    }
}
