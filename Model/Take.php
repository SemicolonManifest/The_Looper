<?php
namespace TheLooper\Model;

use DateTime;

class Take
{
    public int $id;
    public DateTime $timeStamp;

    /** @description This function will insert the take in the database and set the id attribute
     * @return bool
     * @throws \Exception
     */
    public function create(): bool
    {
        $this->id = DBConnector::insert("INSERT INTO takes values ();");

        return true;
    }

    /** @description This function return an object of Take
     * @param array $params - The attributes of the class
     * @return Take
     */
    static function make(array $params)
    {
        $take = new Take();

        if (isset($params['id'])) {
            $take->id = $params['id'];
        }

        $take->timeStamp = new DateTime( $params['time_stamp']);

        return $take;
    }

    /** @description This method returns an array of all the Takes
     * @return array
     */
    static function all(): array
    {
        $result = DBConnector::selectmany("SELECT id, time_stamp FROM takes;", []);

        $return = [];
        foreach ($result as $res){
            $return[] = self::make($res);
        }
        return $return;

    }

    /** @description This method is used to get a specific Take with it's ID
     * @param int $id
     * @return Take|null
     */
    static function find(int $id): ?Take
    {
        $res = DbConnector::selectOne("SELECT * FROM takes WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }
        $test = gettype($res['time_stamp']);
        return self::make(["id" => $res["id"], "time_stamp" => $res['time_stamp']]);

    }

    /** @description This method return all Takes where a field as a said value
     * @param $field - The database column
     * @param $value - The value
     * @return array
     */
    static function where($field,$value): array
    {
        $result = DbConnector::selectMany("select * from takes where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make(["time_stamp" => $res['time_stamp'], "id" => $res['id']]);
        }
        return $return;
    }

    /** @description Method to delete the Take
     * @return bool
     */
    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    /** @description Method to destroy a take
     * @param int $id - It's ID
     * @return bool - Success or fail
     */
    static function destroy(int $id): bool
    {
        try {
            DBConnector::execute("DELETE FROM takes WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /** @description Method to get all answers of a Take
     * @return array
     */
    public function answers(): array
    {
        $answers = Answer::where("takes_id",$this->id);
        return $answers;

    }


}