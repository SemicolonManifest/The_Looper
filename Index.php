<?php
session_start();
date_default_timezone_set('Europe/Zurich');

require_once 'Controller/MainController.php';
$mainController = new mainController();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'createExercise':
            $mainController->createExercise();
            break;
        default:
            $mainController->showHome();
    }

}else{
    $mainController->showHome();
}