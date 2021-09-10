<?php

class ExerciseController
{

    public function __construct(){

    }

    public function create(){
         $title = $_POST['title'];
         $res = new Exercise($title).create();
    }

}