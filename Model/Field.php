<?php

class Field
{
        private string $label;
        private int $value_kind;
        private array $answer;

        public function __construct(string $label,int $value_kind,array $answer = []){
            $this->label = $label;
            $this->value_kind = $value_kind;
            $this->answer = $answer;
        }
}