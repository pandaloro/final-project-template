<?php

namespace app\models;
use app\core\Model;

class Contact

{
    use Model;

    protected $table = 'contact';

    public function saveContact($inputData){
        $query = "insert into contact (name, email, phone, description) values (:name, :email, :phone, :description);";
        return $this->query($query, $inputData);
    }
}
