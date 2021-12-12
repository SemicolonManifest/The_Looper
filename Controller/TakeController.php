<?php

namespace TheLooper\Controller;

use TheLooper\Model\Exercise;
use TheLooper\Model\Take;

class TakeController
{
    public function __construct()
    {
    }

    public function find(int $id)
    {
        return Take::find($id);
    }

    static function show()
    {
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $isEditing = true;
            $take = Take::find($id);
            $answers = $take->answers();
            include_once "View/FulfillExercise.php";
        } else {
            header("Location:?action=showAllExercises");
        }
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";

    }
}