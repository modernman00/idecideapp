<?php

namespace App\controller;

use Src\{ToSendEmail, Utility, Exceptions\NotFoundException};


class EmailResultController
{


  public function emailResult()
  {
    try {

      // Validate input
      $input = json_decode(file_get_contents('php://input'), true);

      if (!$input) {
        throw new NotFoundException('Input data not found');

        exit;
      }


      $emailWrapper = ToSendEmail::genEmailArray(
        'msg/sendResult',
        $input,
        'Your Decision Matrix Result'
      );


     ToSendEmail::sendEmailGeneral($emailWrapper, 'USERS');

     Utility::msgSuccess(200, 'Email sent successfully');

    } catch (\Exception $e) {
      // Handle any exceptions that may occur
      Utility::showError($e);
    }
  }
}
