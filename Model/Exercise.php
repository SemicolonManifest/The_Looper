<?php
require_once "Model/DbConnector.php";

class Exercise
{

    private int $ID;
    private string $title;
    private int $status;
    private array $fields;
    private DbConnector $DBConnector;

    public function __construct(string $title = "", int $ID = -1, int $status = -1, array $fields = [])
    {
        $this->title = $title;
        $this->fields = $fields;
        if ($ID != -1) $this->ID = $ID;
        if ($status != -1) $this->status = $status;
        require ".env.php";
        $this->DBConnector = new DbConnector($DSN, $USERNAME, $PASSWORD);
    }

    public function create()
    {
        $this->DBConnector->insert("INSERT INTO exercises (title)  values (:title);", ['title' => $this->title]);
    }

    public function showAll()
    {
        return $this->DBConnector->selectMany("SELECT id, title FROM exercises;", []);
    }


}
