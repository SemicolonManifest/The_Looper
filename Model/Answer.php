<?php
namespace TheLooper\Model;
class Answer
{
    private string $answer;
    private array  $takes;

    public function __construct(string $answer,array $takes=[]){
        $this->answer = $answer;
        $this->takes = $takes;
    }


}