<?php
namespace TheLooper\Controller;
use TheLooper\Model\Exercise;
use TheLooper\Model\ExerciseState;
use TheLooper\Model\Field;
use TheLooper\Model\Take;

class ExerciseController
{

    public function __construct(){

    }

    public function create($title){

         $exercise = new Exercise();
         $exercise->title = $title;
         $exercise->create();

    }

    public function showAll(){
         return Exercise::all();

    }

    public function find(int $id){
         return Exercise::find($id);

    }

    public function showCreateExercise()
    {

        ob_start();
        include_once "View/CreateExercise.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showAllExercises()
    {
        ob_start();
        $exercises = Exercise::all();
        include_once "View/TakeExercise.php";
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showManageExercise()
    {
        ob_start();
        $exercises = Exercise::all();
        include_once "View/ManageExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showStatExercise()
    {
        ob_start();
        $exercise = Exercise::find($_GET['id']);
        $fields = $exercise->fields();

        include_once "View/StatExercise.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showStatExerciseByField()
    {
        ob_start();
        $field = Field::find($_GET['field']);
        $exercise = Exercise::find($field->exercises_id);
        include_once "View/StatExerciseByField.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showStatExerciseByTake()
    {
        ob_start();
        $take = Take::find($_GET['take']);
        $exercise = Exercise::find(Field::find($take->answers()[0]->field)->exercises_id);
        include_once "View/StatExerciseByTake.php";
        $headerPath = "Components/Header/Results.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public function showExercise()
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

    public function answering()
    {
        // TODO - Rename answering() function
        // can not understand what it's doing without going to it's code and the code that use it
        $exercise = Exercise::find($_GET['id']);
        $exercise->state = ExerciseState::ANSWERING;
        $exercise->save();
        $this->showManageExercise();
    }

    public function closed()
    {
        // TODO - rename closed() function
        $exercise = Exercise::find($_GET['id']);
        $exercise->state = ExerciseState::CLOSED;
        $exercise->save();
        $this->showManageExercise();
    }

    public function deleteExercise()
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
        $this->showManageExercise();
    }
}