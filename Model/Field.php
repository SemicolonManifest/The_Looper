<?php
namespace TheLooper\Model;

use mysql_xdevapi\Exception;

class Field
{
        private int $id;
        private string $label;
        private int $value_kind;


        public function __construct(string $label,int $value_kind,int $id = null){
            $this->label = $label;
            $this->value_kind = $value_kind;
            if($id != null) $this->id = $id;
        }

        public function create(): bool
        {
            return false;
        }

        static function make(array $fields): Field
        {
            throw new Exception("Not implemented");
        }

        static function all() : array
        {
            throw new Exception("Not implemented");
        }



}