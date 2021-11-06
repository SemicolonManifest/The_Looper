<?php
namespace TheLooper\Controller;
use TheLooper\Model\Field;

class FieldController
{
    public function __construct(){
    }

    public function find(int $id){
        return Field::find($id);
    }

    public function showCreateField()
    {
        ob_start();
        $exerciseController = new ExerciseController();
        $exerciseController->create($_POST['exercise']['title']);
        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }
}