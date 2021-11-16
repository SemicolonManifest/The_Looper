<?php
namespace TheLooper\Controller;
use TheLooper\Model\Field;
use TheLooper\Model\Exercise;

class FieldController
{
    public function __construct(){
    }

    public static function showCreateField()
    {
        ob_start();
        $exercise = new Exercise();

        if(isset($_POST['exercise']['title'])){
            $exercise->title = $_POST['exercise']['title'];
            $exercise->create();
        }
        else{
            $exercise = Exercise::find($_GET['id']);
        }


        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function createField(){
        ob_start();
        $exercise = Exercise::find($_GET['exercise_id']);
        $field = new Field($_GET["field"]["label"], $_GET["field"]["value"], $exercise->id);
        $field->create();


        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";

    }
}