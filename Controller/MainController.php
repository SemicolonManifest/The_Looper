<?php
namespace TheLooper\Controller;


use TheLooper\Model\Exercise;
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
        ob_start();
        $this->exerciseController->create($_POST['exercise']['title']);
        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showCreateExercise(){

        ob_start();
        include_once "View/CreateExercise.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showAllExercises(){
        ob_start();
        $exercises = $this->exerciseController->showAll();
        include_once "View/TakeExercise.php";
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showManageExercise(){
        ob_start();
        $exercises = $this->exerciseController->showAll();
        include_once "View/ManageExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showStatExercise(){
        ob_start();
        $exercise = $this->exerciseController->find($_GET['id']);
        $fields = $exercise->fields();

        include_once "View/StatExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showStatExerciseByField(){
        ob_start();
        $field = $this->fieldController->find($_GET['field']);
        $exercise = $this->exerciseController->find($field->exercises_id);
        include_once "View/StatExerciseByField.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showStatExerciseByTake(){
        ob_start();
        $take = $this->takeController->find($_GET['take']);
        $exercise = $this->exerciseController->find($this->fieldController->find($take->answers()[0]->field)->exercises_id);
        include_once "View/StatExerciseByTake.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }

    public function showHome(){
        ob_start();

        include_once "View/Home.php";

        $headerPath = "View/Components/Header/Home.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }


    public function showExercise()
    {
        ob_start();

        if(isset($_GET["id"])){
            $exercise = Exercise::find($_GET['id']);
            $fields = $exercise->fields();

            include_once "View/FulfillExercise.php";
        }else{
            header("Location:?action=showAllExercises");
        }
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__,1) . "/View/Layout.php";
    }


//TODO change title header style


}