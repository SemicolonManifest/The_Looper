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

    /**@description Method to create an Exercise
     * @return bool
     * @throws \Exception Can throw exception in case of issue
     */
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

    /** @description Method to make an Exercise object
     * @param array $params Parameters
     * @return Exercise
     */
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

    /** @description Method to get all Exercises as Object
     * @return array Array of Exercises
     */
    static function all(): array
    {
        $result = DbConnector::selectMany("SELECT * FROM exercises;", []);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make($res);
        }
        return $return;


    }

    /** @description Method to find an Exercise with it's ID
     * @param int $id
     * @return Exercise|null
     */
    static function find(int $id): ?Exercise
    {
        $res = DbConnector::selectOne("SELECT * FROM exercises WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }

        return self::make(["id" => $res["id"], "title" => $res['title'], "state" => $res['state']]);

    }

    /** @description Method to save an Exercise
     * @return bool
     */
    public function save(): bool
    {
        $check = DbConnector::selectOne("SELECT * FROM exercises WHERE id = :id", ['id' => $this->id]);

        if (empty($check)) {
            return false;
        }

        return DbConnector::execute("UPDATE exercises set title = :title, state = :state WHERE id = :id", ['id' => $this->id, 'title' => $this->title, 'state' => $this->state]);
    }

    /** @description Method to  this Exercise
     * @return bool
     */
    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    /** @description Method to destroy an Exercise by it's ID
     * @param int $id
     * @return bool
     */
    static function destroy(int $id): bool
    {
        try {
            DbConnector::execute("DELETE FROM exercises WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /** @description Method to get an array of Fields of the Exercise
     * @return array
     */
    public function fields(): array
    {
        $fields = Field::where("exercises_id", $this->id);
        return $fields;
    }

}
