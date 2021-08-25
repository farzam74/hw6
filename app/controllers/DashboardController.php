<?php

namespace App\controllers;


class DashboardController extends BaseController
{


    public function index()
    {
        setcookie('style','profile');
        
        return $this->render('dashboard');
    }

}