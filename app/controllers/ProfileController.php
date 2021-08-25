<?php

namespace App\controllers;


class ProfileController extends BaseController
{


    public function index()
    {
        setcookie('style','profile');
        
        return $this->render('profile');
    }

}