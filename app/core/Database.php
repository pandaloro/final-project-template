<?php

namespace app\core;
use PDO;
use PDOException;

Trait Database
{

    private function connect()
    {
        $string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
        $con = new \PDO($string,DBUSER,DBPASS);
        return $con;
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);
        $check = $stm->execute($data);
        if($check)
        {
            $result = $stm->fetchAll(\PDO::FETCH_OBJ);
            if(is_array($result) && count($result))
            {
                return $result;
            }
        }

        return false;
    }
    public function queryWithParams($query, $data, $className = null) {
        $connectedPDO = $this->connect();

        $statementObject = $connectedPDO->prepare($query);
        $statementObject->execute($data);

        if ($className) {
            $statementObject->setFetchMode(PDO::FETCH_CLASS, $className);
        }

        $result = $statementObject->fetchAll();
        if (is_array($result) && count($result)) {
            return $result;
        }

        return false;
    }

}



