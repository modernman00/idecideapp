<?php

namespace App\controller;

class BaseController
{
    public static function viewWithCsp($view, $data = [])
    {


        view2($view, $data, ['enable' => true]);
    }
}
