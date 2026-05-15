<?php

declare(strict_types=1);

namespace App\controller;
use Src\{Utility, SelectFn};

class BaseController
{
    public static function viewWithCsp($view, $data = [])
    {
        Utility::view($view, $data);
    }

    /**
     * Summary of setId
     * @param string|int $name - the input name 
     * @param string $table = the db table to save the id 
     * @throws Exception
     * @return string
     */
    public function setId(string $name, string $table): string
    {

        $sanitiseName = checkInput($name);
        $id = null;

        $idName = preg_replace('/[^A-Za-z ]/', '', $sanitiseName);
        $id = random_int(1000, 900000);
        $id .= strtoupper($idName);

        //check if the reference number exist
        $isIdAvailable = SelectFn::selectColumnByIdentifier(column: 'id', table:$table, identifier: 'id', identifierAnswer: $id);
        if ($isIdAvailable >= 1) {
            $id = (random_int(900001, 999999));
            $id .= strtoupper($idName);
        }
        
        return $id;
    }
}
