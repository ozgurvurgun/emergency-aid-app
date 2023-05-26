<?php

namespace App\Controller;

use System\Core\Controller;

class Ozgur extends Controller
{
    public function index()
    {
        echo "hello ozgur namespace testing running";
        $dataModel = $this->model('Ozgur');
        $data = $dataModel->getAll();
        echo "<br>---" . $data . "--- modelden geldi";
        $this->view('Ozgur', [
            'data' => $data
        ]);
    }
}
