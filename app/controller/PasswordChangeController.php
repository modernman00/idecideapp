<?php 

namespace App\controller;

use Illuminate\Container\Util;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorisedException;
use Src\Sanitise\CheckSanitise;
use Src\CheckToken;
use Src\SubmitForm;
use Src\Utility;
use Src\Select;
use Src\Update;
use Src\Delete;
use Src\Token;
use Src\LoginUtility;


class PasswordChangeController extends BaseController
{
     public function show(): void
    {

      try {

       if(isset($_SESSION['FORGOT']))  {

        BaseController::viewWithCsp('passwordChange');
       } else {
        throw new UnauthorisedException("NOT SURE WE KNOW YOU", 1);
       }
      } catch (\Throwable $th) {
        Utility::showError($th);
      }
    }

    public function post(): void
    {
        try {
            $cleanData = CheckSanitise::getSanitisedInputData(inputData: $_POST);
            $email = Utility::checkInputEmail($_SESSION['email']);

            CheckToken::tokenCheck('token');

            $update = New Update('account');
         

         if(isset($_SESSION['FORGOT'])) {

            $result = $update->updateTable('password', $cleanData['password'], 'email', $email);
            if (!$result) {

                throw new NotFoundException("Password cannot be updated");
            }


            session_regenerate_id();
            unset($_SESSION);

            Header("Location: /managed");
            exit;
     
            // msgSuccess(200, "Password was successfully changed");
         }
                } catch (\Throwable $e) {
            Utility::showError($e);
        }
    }
}
