<?php
namespace TheLooper;
use TheLooper\Controller\ExerciseController;
use TheLooper\Controller\FieldController;
use TheLooper\Controller\MainController;

session_start();
date_default_timezone_set('Europe/Zurich');
require_once 'vendor/autoload.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'showAllExercises':
            ExerciseController::showAllExercises();
            break;
        case 'showCreateExercise':
            ExerciseController::showCreateExercise();
            break;
        case 'showCreateField':
            FieldController::showCreateField();
            break;
        case 'showManageExercise':
            ExerciseController::showManageExercise();
            break;
        case 'showStatExercise':
            ExerciseController::showStatExercise();
            break;
        case 'showStatExerciseByField':
            ExerciseController::showStatExerciseByField();
            break;
        case 'showStatExerciseByTake':
            ExerciseController::showStatExerciseByTake();
            break;
        case 'showExercise':
            ExerciseController::showExercise();
            break;
        case 'answering':
            ExerciseController::answering();
            break;
        case 'closed':
            ExerciseController::closed();
            break;
        case 'deleteExercise':
            ExerciseController::deleteExercise();
            break;
        default:
            MainController::showHome();
    }
}else{
    MainController::showHome();
}
