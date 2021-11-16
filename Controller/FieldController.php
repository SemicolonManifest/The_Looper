<?php

namespace TheLooper\Controller;

use TheLooper\Model\Field;
use TheLooper\Model\Exercise;

class FieldController
{
    public function __construct()
    {
    }

    public static function showCreateField()
    {
        ob_start();
        $exercise = new Exercise();

        if (isset($_POST['exercise']['title'])) {
            $exercise->title = $_POST['exercise']['title'];
            $exercise->create();
        } else {
            $exercise = Exercise::find($_GET['id']);
        }


        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function showEditField()
    {
        ob_start();

        $field = Field::find($_GET['id']);
        $exercise = Exercise::find($_GET['exercise_id']);

        include_once "View/EditFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    public static function createField()
    {
        ob_start();
        $exercise = Exercise::find($_GET['exercise_id']);
        $field = new Field($_GET["field"]["label"], $_GET["field"]["value"], $exercise->id);
        $field->create();


        header('Location: ?action=showCreateField&id=' . $_GET['exercise_id']);
        include_once "View/CreateFields.php";
        $headerPath = "Components/Header/Managing.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";

    }

    public static function deleteField()
    {
        $field = Field::find($_GET['id']);
        $field->delete();
        header('Location: ?action=showCreateField&id=' . $_GET['exercise_id']);
    }

    public static function editField()
    {
        $field = Field::find($_GET['field_id']);
        $field->label = $_GET['field']['label'];
        $field->value_kind = $_GET['field']['value'];
        $field->save();
        header('Location: ?action=showCreateField&id=' . $_GET['exercise_id']);
    }
}