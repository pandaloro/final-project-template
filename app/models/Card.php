<?php

namespace app\models;
use app\core\Model;

class Card

{
    use Model;

    protected $table = 'cards';

    public function getAllCards() {
        return $this->findAll();
    }
}
