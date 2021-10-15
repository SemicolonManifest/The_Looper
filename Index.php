<?php
namespace TheLooper;
use TheLooper\Controller\mainController;

session_start();
date_default_timezone_set('Europe/Zurich');
require_once 'vendor/autoload.php';

$mainController = new mainController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showAllExercises':
            $mainController->showAllExercises();
            break;
        case 'showCreateExercise':
            $mainController->showCreateExercise();
            break;
        case 'showCreateField':
            $mainController->showCreateField();
            break;
        case 'showManageExercise':
            $mainController->showManageExercise();
            break;
        case 'showStatExercise':
            $mainController->showStatExercise();
            break;
        default:
            $mainController->showHome();
    }
}else{
    $mainController->showHome();
}