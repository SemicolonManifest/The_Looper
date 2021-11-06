<?php

namespace TheLooper\Controller;


use TheLooper\Model\Exercise;
use TheLooper\Model\ExerciseState;
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



    public function showHome()
    {
        ob_start();

        include_once "View/Home.php";

        $headerPath = "View/Components/Header/Home.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }


//TODO change title header style


}