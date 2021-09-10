<?php
class Exercise{

    private int $ID;
    private string $title;
    private int $status;
    private array $fields;

    public function __construct(string $title, int $ID=null , int $status=0, array $fields=[]){
        $this->title = $title;
        $this->status = $status;
        $this->fields = $fields;
        $this->ID = $ID;
    }

    public function create(){
        $DBConnector = new DbConnector(getenv('TL_PDO_DSN', true),getenv('TL_PDO_USERNAME', true),getenv('TL_PDO_PASSWORD', true));
        $DBConnector->insert("INSERT INTO exercises (title)  values (:title);", ['title' => $this->title]);
    }

    

}
