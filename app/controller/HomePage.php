<?php
namespace App\Controller;
use System\Core\Controller;
class HomePage extends Controller{
    public function index(){
        $dataModel = $this->model('HomePage');
        $data = $dataModel->getAll();
        $this->view('HomePage',[
            'data' => $data
        ]);
    }
}