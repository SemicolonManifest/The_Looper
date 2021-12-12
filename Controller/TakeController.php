<?php

namespace TheLooper\Controller;

use TheLooper\Model\Answer;
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

    static function edit()
    {
        if (isset($_GET["take"]) && isset($_GET['answers']))
        {
            $takeId = $_GET["take"];
            $_SESSION['saveSuccess'] = true;

            foreach ($_GET['answers'] as $id => $answerValue){
                $answer = Answer::find($id);
                $answer->response = $answerValue;
                if(!$answer->save()) $_SESSION['saveSuccess'] = false;
            }

        }else{
            $_SESSION['saveSuccess'] = false;
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}