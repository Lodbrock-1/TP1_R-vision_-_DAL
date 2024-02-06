<?php

abstract class FactoryBase
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=sql.decinfo-cchic.ca;port=33306;dbname=h24_web_transac_2133036;charset=utf8', 'dev-2133036', 'Jeep050716');
        return $db;
    }
}
