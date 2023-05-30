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
                $fileName = $fileName[2];
                break;
            }
        }
        require_once 'app/view/' . $fileName;
    }
    public function model($name)
    {
        $model_files = glob("app/model/*.php");
        foreach ($model_files as $file) {
            $fileName =  explode("/", $file);
            if (strtolower($fileName[2]) == strtolower($name . ".php")) {
                $fileName = $fileName[2];
                break;
            }
        }
        require_once 'app/model/' . $fileName;
        $className = 'App\Model\\' . $name;
        return new $className();
    }
}
