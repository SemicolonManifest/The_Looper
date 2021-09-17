<?php
require_once "Model/Exercise.php";
class ExerciseController
{

    public function __construct(){

    }

    public function create($title){

         $exercise = new Exercise($title);
         $exercise->create();

    }

    public function showAll(){

         $exercise = new Exercise();
         $exercise->showAll();

    }

}