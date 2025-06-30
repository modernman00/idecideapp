<?php

namespace App\Controller;

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

      Utility::printArr($input);



      $emailWrapper = ToSendEmail::genEmailArray(
        'emailResult',
        $input,
        'Your Decision Matrix Result'
      );

      ToSendEmail::sendEmailGeneral($emailWrapper, 'member');
    } catch (\Exception $e) {
      // Handle any exceptions that may occur
      Utility::showError($e);
    }
  }
}
