<?php
class Exercise{

    private string $name;
    private int $status;
    private array $fields;

    public function __construct(string $name,int $status,array $fields){
        $this->name = $name;
        $this->status = $status;
        $this->fields = $fields;
    }

}
