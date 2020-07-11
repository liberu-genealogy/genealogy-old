<?php

namespace App\Traits;

use Illuminate\Support\Facades\Validator;

trait ConnectionTrait
{
    public function setConnection($conn='mysql', $db='enso')
    {
        \Session::put('conn', $conn);
        \Session::put('db', $db);
    }

    public function getConnection()
    {
        $conn = \Session::get('conn');
        $db = \Session::get('db');
        if($conn == 'tenant') {
            $key = 'database.connections.tenant.database';
            $value = $db;
            config([$key => $value]);
        }
        return $conn;
    }

    public function getDB()
    {
        $db = \Session::get('db');
        return $db;
    }
}
