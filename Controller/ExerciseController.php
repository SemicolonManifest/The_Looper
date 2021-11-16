<?php
namespace TheLooper\Controller;
use TheLooper\Model\Answer;
use TheLooper\Model\Exercise;
use TheLooper\Model\ExerciseState;
use TheLooper\Model\Field;
use TheLooper\Model\Take;

class ExerciseController
{

    public function __construct(){

    }

    public static function showCreateExercise()
    {

        ob_start();
        include_once "View/CreateExercise.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showAllExercises()
    {
        ob_start();
        $exercises = Exercise::all();
        include_once "View/TakeExercise.php";
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showManageExercise()
    {
        ob_start();
        $exercises = Exercise::all();
        include_once "View/ManageExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showStatExercise()
    {
        ob_start();
        $exercise = Exercise::find($_GET['id']);
        $fields = $exercise->fields();

        include_once "View/StatExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showStatExerciseByField()
    {
        ob_start();
        $field = Field::find($_GET['field']);
        $exercise = Exercise::find($field->exercises_id);
        include_once "View/StatExerciseByField.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showStatExerciseByTake()
    {
        ob_start();
        $take = Take::find($_GET['take']);
        $exercise = Exercise::find(Field::find($take->answers()[0]->field->getId())->exercises_id);
        include_once "View/StatExerciseByTake.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showExercise()
    {
        ob_start();

        if (isset($_GET["id"])) {
            $exercise = Exercise::find($_GET['id']);
            $fields = $exercise->fields();

            include_once "View/FulfillExercise.php";
        } else {
            header("Location:?action=showAllExercises");
        }
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function answering()
    {
        // TODO - Rename answering() function
        // can not understand what it's doing without going to it's code and the code that use it
        $exercise = Exercise::find($_GET['id']);
        $exercise->state = ExerciseState::ANSWERING;
        $exercise->save();
        ExerciseController::showManageExercise();
    }

    public static function closed()
    {
        // TODO - rename closed() function
        $exercise = Exercise::find($_GET['id']);
        $exercise->state = ExerciseState::CLOSED;
        $exercise->save();
        ExerciseController::showManageExercise();
    }

    public static function deleteExercise()
    {
        $exercise = Exercise::find($_GET['id']);
        foreach ($exercise->fields() as $field) {
            foreach ($field->takes() as $take) {
                foreach ($take->answers() as $answer) {
                    $answer->delete();
                }
                $take->delete();
            }
            $field->delete();
        }

        $exercise->delete();
        header('Location: ?action=showManageExercise');
    }

    public static  function fulfill(){
        $take = new Take();
        $take->create();
        $fulfillments = $_POST["fulfillments"];

        foreach ($fulfillments as $id => $fulfillment){
            $answer = new Answer();
            $answer->field = Field::find($id);
            $answer->take = Take::find($take->id);
            $answer->response = $fulfillment;
            $answer->create();



        }

        header('Location: ?action=?action=editFulfillment&id='.$take->id);
    }
}