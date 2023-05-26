<?php
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
        require __DIR__ . '../../../app/model/' . strtolower($name) . '.php';
        return new $name();
    }
}
