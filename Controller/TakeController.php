<?php
namespace TheLooper\Controller;
use TheLooper\Model\Take;

class TakeController
{
    public function __construct(){
    }

    public function find(int $id){
        return Take::find($id);
    }
}