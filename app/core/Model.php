<?php

namespace app\core;

Trait Model
{
    use Database;

    public function findAll()
    {
        $query = "select * from $this->table";
        return $this->query($query);
    }
    public function post($inputData)
    {
        $query = "insert into $this->table (name, email, phone, description) values (:name, :email, :phone, :description);";
        return $this->query($query, $inputData);

    }


}
