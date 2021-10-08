<?php
namespace TheLooper\Controller;

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

    public function showCreateField(){
        include_once "View/CreateFields.php";
    }

    public function showCreateExercise(){
        include_once "View/CreateExercise.php";
    }

    public function showAllExercises(){
        $exercises = $this->exerciseController->showAll();
        include_once "View/TakeExercise.php";
    }

    public function showManageExercise(){
        $exercises = $this->exerciseController->showAll();
        include_once "View/ManageExercise.php";
    }

    public function showHome(){
        include_once "View/Home.php";
    }

    public function showFulfillExercise()
    {
    include_once "View/FulfillExercise.php";
    }



}