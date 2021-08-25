<?php

namespace App\controllers;


class HomeController extends BaseController
{


    public function index()
    {

        return $this->render('home');
    }


}