<?php
require_once "Model/DbConnector.php";

class Exercise
{

    private int $ID;
    private string $title;
    private int $status;
    private array $fields;

    public function __construct(string $title, int $ID = -1, int $status = -1, array $fields = [])
    {
        $this->title = $title;
        $this->fields = $fields;
        if ($ID != -1) $this->ID = $ID;
        if ($status != -1) $this->status = $status;
    }

    public function create()
    {
        $DBConnector = new DbConnector(getenv('TL_PDO_DSN', true), getenv('TL_PDO_USERNAME', true), getenv('TL_PDO_PASSWORD', true));
        $DBConnector->insert("INSERT INTO exercises (title)  values (:title);", ['title' => $this->title]);
    }


}
