<?php
namespace TheLooper\Controller;


use TheLooper\Model\FieldValueKind;


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


    public function showCreateField(){
        $this->exerciseController->create($_POST['exercise']['title']);
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

    public function showStatExercise(){
        $exercise = $this->exerciseController->find($_GET['id']);
        $fields = $exercise->fields();

        include_once "View/StatExercise.php";
    }

    public function showStatExerciseByField(){
        $field = $this->fieldController->find($_GET['field']);
        $exercise = $this->exerciseController->find($field->exercises_id);
        include_once "View/StatExerciseByField.php";
    }

    public function showStatExerciseByTake(){
        $take = $this->takeController->find($_GET['take']);
        $exercise = $this->exerciseController->find($this->fieldController->find($take->answers()[0]->field)->exercises_id);
        include_once "View/StatExerciseByTake.php";
    }

    public function showHome(){
        include_once "View/Home.php";
    }


    public function showExercise()
    {
        

    include_once "View/FulfillExercise.php";
    }


//TODO change title header style


}