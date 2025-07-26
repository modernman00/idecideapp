<?php 

namespace App\controller;


class ErrorController extends BaseController
{
  /**
   * Handles 404 Not Found errors.
   * Displays a user-friendly error message.
   */
  public function notFound()
  {
    parent::viewWithCsp('404');
    // Optionally, you can log the error or perform other actions here
  }

  /**
   * Handles 500 Internal Server Error.
   * Displays a user-friendly error message.
   */
  public function internalServerError()
  {
    parent::viewWithCsp('500');
  }
}
 