<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Contact;

class ContactController extends Controller
{
    public function validateContact($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $phone = $inputData['phone'];
        $email = $inputData['email'];
        $description = $inputData['description'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'name is too short';
            }
        } else {
            $errors['nameRequired'] = 'name is required';
        }
        if ($phone) {
            $phone = htmlspecialchars($phone, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            
        } else {
            $errors['phoneRequired'] = 'phone is required';
        }

        if ($email) {
            $email = htmlspecialchars($email, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($email) < 2) {
                $errors['emailShort'] = 'email is too short';
            }
        } else {
            $errors['emailRequired'] = 'email is required';
        }

        if ($description) {
            $description = htmlspecialchars($description, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($description) < 2) {
                $errors['descriptionShort'] = 'description is too short';
            }
        } else {
            $errors['descriptionRequired'] = 'description is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'description' => $description,
        ];
    }
    //public function getUsers()
    //{
    //    $userModel = new Contact();
    //    header("Content-Type: application/json");
    //    $users = $userModel->saveContact();
    //    echo json_encode($users);
    //    exit();
    //}

    public function postContact() {
            $inputData = [
                'name' => $_POST['name'] ? $_POST['name'] : false,
                'email' => $_POST['email'] ? $_POST['email'] : false,
                'phone' => $_POST['phone'] ? $_POST['phone'] : false,
                'description' => $_POST['description'] ? $_POST['description'] : false,
            ];
            $contactData = $this->validateContact($inputData);
    
            //TODO 5-b: save a post
            $contactModel = new Contact();
            $contactModel->saveContact(
                [
                    'name' => $contactData['name'],
                    'email' => $contactData['email'],
                    'phone' => $contactData['phone'],
                    'description' => $contactData['description'],
                ]
                );
    
    
            http_response_code(200);
            echo json_encode([
                'success' => true
            ]);
           
            exit();
        
    }

    public function viewUsers() {
        
    }
    public function viewContact() 
    {
        include '../public/assets/views/main/contact-view.html';
    }
}
