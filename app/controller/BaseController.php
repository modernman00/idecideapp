<?php

namespace App\controller;

class BaseController
{

  public static function viewWithCsp($view, $data = [])
  {
  
     view($view, $data, ['enable' => true]);
   
  }
}
