<?php
session_start();
date_default_timezone_set('Europe/Zurich');

require_once 'Controller/MainController.php';
$mainController = new mainController();

switch ($_GET['action']){
    case 'createExercise':
        $mainController->createExercise();
        break;
    case 'showAllExercise':
        $mainController->showAllExercise();
        break;
    default:
        $mainController->showHome();
}