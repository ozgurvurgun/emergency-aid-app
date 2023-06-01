<?php

namespace App\Controller;

use System\Core\Controller;

class Admin extends Controller
{
    public function index()
    {
        $this->view('loginPage');
    }
}
