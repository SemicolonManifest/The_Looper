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

    /**
     * @description Display view to answer the fields of an exercise
     */
    static function show()
    {
        ob_start();
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
            $isEditing = true;
            $take = Take::find($id);
            $answers = $take->answers();

            if(isset($_SESSION['saveSuccess']))
            {
                $saveSuccess = $_SESSION['saveSuccess'];
                unset($_SESSION['saveSuccess']);
            }

            if(isset($_SESSION['submitSuccess']))
            {
                $submitSuccess = $_SESSION['submitSuccess'];
                unset($_SESSION['submitSuccess']);
            }

            include_once "View/FulfillExercise.php";
        } else {
            header("Location:?action=showAllExercises");
        }
        $headerPath = "Components/Header/Answering.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

    /**
     * @description Edit answer
     */
    static function edit()
    {
        if (isset($_POST["take"]) && isset($_POST['answers']))
        {
            $takeId = $_POST["take"];
            $_SESSION['saveSuccess'] = true;

            foreach ($_POST['answers'] as $id => $answerValue){
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