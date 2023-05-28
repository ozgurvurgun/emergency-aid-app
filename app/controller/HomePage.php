<?php
namespace App\Controller;
use System\Core\Controller;
class HomePage extends Controller{
    public function index(){
        $this->view('HomePage');
    }
}