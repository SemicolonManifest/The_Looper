<?php
namespace TheLooper\Controller;
use TheLooper\Model\Field;

class FieldController
{
    public function __construct(){
    }

    public static function showCreateField()
    {
        ob_start();
        ExerciseController::create($_POST['exercise']['title']);
        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }
}