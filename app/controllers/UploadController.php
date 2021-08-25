<?php

namespace App\controllers;


class UploadController extends BaseController
{


    public function showUpload()
    {
        
        setcookie('style','upload');

        if(isset($_COOKIE['user'])) {
        return $this->render('user-upload');
        }
        return $this->render('guest-upload');

    }


}