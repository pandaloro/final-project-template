<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Card;

class CardController extends Controller
{
    public function getCards()
    {
        $cardModel = new Card();
        header("Content-Type: application/json");
        $cards = $cardModel->getAllCards();
        echo json_encode($cards);
        exit();
    }

    public function saveUser() {

    }

    public function viewUsers() {
        
    }

}
