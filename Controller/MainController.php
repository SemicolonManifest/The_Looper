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

    public function showHome(){
        include_once "View/Home.php";
    }



}