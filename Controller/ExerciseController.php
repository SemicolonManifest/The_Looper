<?php
namespace TheLooper\Controller;
use TheLooper\Model\Exercise;
use TheLooper\Model\ExerciseState;

class ExerciseController
{

    public function __construct(){

    }

    public function create($title){

         $exercise = new Exercise();
         $exercise->title = $title;
         $exercise->create();

    }

    public function showAll(){

         $exercise = new Exercise();
         return $exercise->all();

    }

    public function find(int $id){

         $exercise = new Exercise();
         return $exercise->find($id);

    }

}