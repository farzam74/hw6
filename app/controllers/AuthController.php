<?php

namespace App\controllers;

use App\core\Request;
use App\core\Response;

class AuthController extends BaseController
{


    public function showLogin()
    {
        setcookie('style','login');

        return $this->render('login');
    }



    public function showRegister()
    {
        setcookie('style','register');
      
        return $this->render('register');
    }


}