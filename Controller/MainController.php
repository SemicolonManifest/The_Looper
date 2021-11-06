<?php

namespace TheLooper\Controller;


use TheLooper\Model\Exercise;
use TheLooper\Model\ExerciseState;
use TheLooper\Model\FieldValueKind;


class MainController
{


    public function __construct()
    {
    }



    public static function showHome()
    {
        ob_start();

        include_once "View/Home.php";

        $headerPath = "View/Components/Header/Home.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }


//TODO change title header style


}