<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\core\Application;

use App\controllers\HomeController;
use App\controllers\AuthController;
use App\controllers\ProfileController;
use App\controllers\UploadController;
use App\controllers\DashboardController;


$app = new Application(dirname(__DIR__));

$app->router->get("/auth/login", [AuthController::class, "showLogin"]);
$app->router->get("/auth/register", [AuthController::class, "showRegister"]);
$app->router->get("/upload/index", [UploadController::class, "showUpload"]);
$app->router->get("/home/index", [HomeController::class, "index"]);
$app->router->get("/", [HomeController::class, "index"]);
$app->router->get("/profile/index", [ProfileController::class, "index"]);
$app->router->get("/dashboard/index", [DashboardController::class, "index"]);

$app->run();



