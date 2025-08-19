<?php

declare(strict_types=1);

namespace App\controller;

use Src\ErrorReporting;

class ErrorReportingController extends BaseController
{

    // error 401
    public function unauthorized401()
    {

        try {
            ErrorReporting::unauthorized401();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    // error 403
    public function forbidden403()
    {
        try {
            ErrorReporting::forbidden403();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function notFound404()
    {
        try {
            ErrorReporting::notFound404();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    // error 429
    public function tooManyRequests429()
    {
        try {
            ErrorReporting::tooManyRequests429();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    // error 500
    public function serverError500()
    {
        try {
            ErrorReporting::serverError500();
        } catch (\Throwable $th) {
            showError($th);
        }
    }
}
