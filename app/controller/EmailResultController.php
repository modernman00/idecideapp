<?php

namespace App\Controller;

use Src\ToSendEmail;


class EmailResultController
{


  public function emailResult()
  {
    // Validate input
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input || !isset($input['email'], $input['score'], $input['decision'], $input['comment'], $input['itemToBuy'])) {
      echo json_encode(['success' => false, 'error' => 'Invalid input data']);
      exit;
    }

    printArr($input);



    $emailWrapper = ToSendEmail::genEmailArray(
      'emailResult',
      [
        'email' => $input['email'] ?? '',
        'decision' => $input['decision'] ?? '',
        'score' => $input['score'] ?? '',
        'comment' => $input['comment'] ?? '',
        'itemToBuy' => $input['itemToBuy'] ?? '',
      ],
      'Your Decision Result'
    );

    ToSendEmail::sendEmailGeneral($emailWrapper, 'member');
  }
}
