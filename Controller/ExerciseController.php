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
         return Exercise::all();

    }

    public function find(int $id){
         return Exercise::find($id);

    }

}