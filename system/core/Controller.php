<?php

namespace System\Core;

class Controller
{
    public function view($name, $data = [])
    {
        /*   $data = [
             'name'    => 'ozgur',
             'surname' => 'vurgun'
             ];
         */
        extract($data);
        /*  echo $name;
            echo $surname;
        */
        require __DIR__ . '../../../app/view/' . strtolower($name) . '.php';
    }
    public function model($name)
    {
        require_once __DIR__ . '../../../app/model/' . strtolower($name) . '.php';
        $name = 'App\Model\\' . $name;
        return new $name();
    }
}
