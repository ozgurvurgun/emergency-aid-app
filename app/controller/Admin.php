<?php

namespace App\Controller;

use System\Core\Controller;

class Admin extends Controller
{
    public function index()
    {
        if ($_SESSION['user'] != "") {
            $this->view('admin', [
                'user' => $_SESSION['user']
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
            $this->view('admin', [
                'user' => $_SESSION['user']
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
}
