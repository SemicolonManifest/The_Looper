<?php
namespace TheLooper\Controller;
use TheLooper\Model\Field;

class FieldController
{
    public function __construct(){
    }

    public function find(int $id){
        return Field::find($id);
    }
}