<?php
namespace TheLooper\Model;

use DateTime;

class Take
{
    public int $id;
    public DateTime $timeStamp;

    /*public function __construct($timeStamp)
    {
        $this->timeStamp = $timeStamp;
    }*/


    public function create(): bool
    {
        $this->id = DBConnector::insert("INSERT INTO takes values ();");

        return true;
    }

    static function make(array $params)
    {
        $take = new Take();

        if (isset($params['id'])) {
            $take->id = $params['id'];
        }

        $take->timeStamp = new DateTime( $params['time_stamp']);

        return $take;
    }

    static function all(): array
    {
        return DBConnector::selectmany("SELECT id, time_stamp FROM takes;", []);
    }

    static function find(int $id): ?Take
    {
        $res = DbConnector::selectOne("SELECT * FROM takes WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }
        $test = gettype($res['time_stamp']);
        return self::make(["id" => $res["id"], "time_stamp" => $res['time_stamp']]);

    }

    static function where($field,$value): array
    {
        $result = DbConnector::selectMany("select * from takes where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make(["time_stamp" => $res['time_stamp'], "id" => $res['id']]);
        }
        return $return;
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DBConnector::execute("DELETE FROM takes WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function answers(): array
    {
        $answers = Answer::where("takes_id",$this->id);
        return $answers;

    }


}