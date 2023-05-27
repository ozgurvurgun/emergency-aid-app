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
        $view_files = glob("app/view/*.php");
        foreach ($view_files as $file) {
            $fileName =  explode("/", $file);
            if (strtolower($fileName[2]) == strtolower($name . ".php")) {
                $name = $fileName[2];
                break;
            }
        }
        require 'app/view/' . $name;
    }
    public function model($name)
    {
        $model_files = glob("app/model/*.php");
        foreach ($model_files as $file) {
            $fileName =  explode("/", $file);
            if (strtolower($fileName[2]) == strtolower($name . ".php")) {
                $name = $fileName[2];
                break;
            }
        }
        require 'app/model/' . $name;
        $name = 'App\Model\\' . $name;
        return new $name();
    }
}
