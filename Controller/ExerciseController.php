<?php
namespace TheLooper\Controller;
use TheLooper\Model\Exercise;
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
         return $exercise->All();

    }

}