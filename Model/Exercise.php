<?php

namespace TheLooper\Model;
use TheLooper\Model\DbConnector;

class Exercise
{

    public int $id;
    public string $title;
    public int $state = 0;

    public function __construct(string $title = "", int $id = -1, int $state = -1)
    {
        $this->title = $title;
        if ($id != -1) $this->id = $id;
        if ($state != -1) $this->$state = $state;
    }

    public function create(): bool
    {
        try {
            $result = DbConnector::insert("INSERT INTO exercises (title, state)  values (:title, :state);", ['title' => $this->title, 'state' => $this->state]);
        }catch (\PDOException $e){
            return false;
        }

        $this->id = $result;
        return true;
    }

    static function make(array $params)
    {
        $exercise = new Exercise();

        if (isset($params['id'])) {
            $exercise->id = $params['id'];
        }

        $exercise->title = $params['title'];
        $exercise->state = $params['state'];

        return $exercise;
    }

    static function all(): array
    {
        $result = DbConnector::selectMany("SELECT * FROM exercises;", []);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make($res);
        }
        return $return;


    }

    static function find(int $id): ?Exercise
    {
        $res = DbConnector::selectOne("SELECT * FROM exercises WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }

        return self::make(["id" => $res["id"], "title" => $res['title'], "state" => $res['state']]);

    }

    public function save(): bool
    {
        $check = DbConnector::selectOne("SELECT * FROM exercises WHERE id = :id", ['id' => $this->id]);

        if (empty($check)) {
            return false;
        }

        return DbConnector::execute("UPDATE exercises set title = :title, state = :state WHERE id = :id", ['id' => $this->id, 'title' => $this->title, 'state' => $this->state]);
    }


    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DbConnector::execute("DELETE FROM exercises WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function fields(): array
    {
        $fields = Field::where("exercises_id", $this->id);
        return $fields;
    }

}
