<?php

require_once "Controller/AnswerController.php";
require_once "Controller/ExerciseController.php";
require_once "Controller/FieldController.php";
require_once "Controller/TakeController.php";

class mainController
{
    private ExerciseController $exerciseController;
    private FieldController $fieldController;
    private AnswerController $answerController;
    private TakeController $takeController;

    public function __construct()
    {
        $this->exerciseController = new ExerciseController();
        $this->fieldController = new FieldController();
        $this->answerController = new AnswerController();
        $this->takeController = new TakeController();
    }


    public function createExercise(){
        $this->exerciseController->create($_POST['title']);
    }

    public function showAllExercises(){
        $exercises = $this->exerciseController->showAll();
        include_once "View/TakeExercise.php";
    }

    public function showHome(){
        include_once "View/Home.php";
    }



}