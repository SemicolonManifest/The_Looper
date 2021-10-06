<?php

namespace TheLooper\Model;

class Exercise
{

    public int $id;
    public string $title;
    public int $state;
    public array $fields;

    public function __construct(string $title = "", int $id = -1, int $state = -1, array $fields = [])
    {
        $this->title = $title;
        $this->fields = $fields;
        if ($id != -1) $this->id = $id;
        if ($state != -1) $this->$state = $state;
    }

    public function create(): bool
    {
        $check = DbConnector::selectOne("SELECT * FROM exercises WHERE title = :title", ['title' => $this->title]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DBConnector::insert("INSERT INTO exercises (title, state)  values (:title, :state);", ['title' => $this->title, 'state' => $this->state]);

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
        return DBConnector::selectMany("SELECT * FROM exercises;", []);
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
        $check = DbConnector::selectOne("SELECT * FROM exercises WHERE title = :title", ['title' => $this->title]);

        if (!empty($check)) {
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
            DBConnector::execute("DELETE FROM exercises WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function allFields(int $id)
    {
        //TODO Use Field Class to connect exercise to field
        $this->fields = DBConnector::select("SELECT * FROM fields WHERE exercises_id = :id", ['id' => $id], true);

    }

}
