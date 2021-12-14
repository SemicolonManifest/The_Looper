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


    /** @description This function is used to display the home page
     *  @return void
     */
    public static function showHome()
    {
        ob_start();

        include_once "View/Home.php";

        $headerPath = "View/Components/Header/Home.php";
        $contenu = ob_get_clean();

        require dirname(__DIR__, 1) . "/View/Layout.php";
    }

}