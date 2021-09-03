<?php
class Exercise{

    private string $name;
    private int $status;
    private array $questions;

    public function __construct($name, $status, $questions=[]){
        $this->name = $name;
        $this->status = $status;
        $this->questions = $questions;
    }

}
