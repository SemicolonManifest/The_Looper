<?php
namespace TheLooper\Model;
class Answer
{
    public int $id;
    public string $response;
    public Field $field;
    public Take  $take;

    /**
     * @description This function insert the answer in the database and set the id attribute
     * @return bool - Success or fail
     *
     */
    public function create(): bool
    {
        $this->id = DBConnector::insert("INSERT INTO answers (response, fields_id, takes_id) values (:response, :fields_id, :takes_id);", ['response' => $this->response, 'fields_id' => $this->field->getId(), 'takes_id' => $this->take->id]);

        return true;
    }

    /** @description This function return an object of Answer
     * @param array $params - The attributes of the class
     * @return Answer
     */
    static function make(array $params)
    {
        $answer = new Answer();

        if (isset($params['id'])) {
            $answer->id = $params['id'];
        }

        $answer->response = $params['response'];
        if (isset($params['field'])) {
            $answer->field = $params['field'];
        }else{
            $answer->field = Field::find($params['fields_id']);
        }
        if (isset($params['take'])) {
            $answer->take = $params['take'];
        }else{
            $answer->take = Take::find($params['takes_id']);
        }

        return $answer;
    }

    /** @description This method returns an array of all the Answer
     * @return array - The array of Answer
     */
    static function all(): array
    {
        $result = DBConnector::selectmany("SELECT id, response, fields_id, takes_id FROM answers;", []);
        $return = [];
        foreach ($result as $res) {
            $return[] = self::make($res);
        }
        return $return;
    }

    /** @description This method is used to get a specific Answer with it's ID
     * @param int $id
     * @return Answer|null - Will return null of none found
     */
    static function find(int $id): ?Answer
    {
        $res = DbConnector::selectOne("SELECT * FROM answers WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }

        return self::make(["id" => $res["id"], "response" => $res['response'], "field" => Field::find($res['fields_id']), "take" => Take::find($res['takes_id'])]);

    }

    /** @description This method return all Answer where a field as a said value
     * @param $field - The database column
     * @param $value - The value
     * @return array - Array of Answer
     */
    static function where($field,$value): array
    {
        $result = DbConnector::selectMany("select * from answers where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make(["id" => $res["id"], "response" => $res['response'], "field" => Field::find($res['fields_id']), "take" => Take::find($res['takes_id'])]);
        }
        return $return;
    }

    /** @description Mathod to save the Answer
     * @return bool - Success or fail
     */
    public function save(): bool
    {
        return DbConnector::execute("UPDATE answers set response = :response WHERE id = :id", ['id' => $this->id, 'response' => $this->response]);
    }

    /** @description Method to delete the Answer
     * @return bool - Success or fail
     */
    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    /** @description Method to destroy an answer
     * @param int $id - The answer's ID
     * @return bool - Success or fail
     */
    static function destroy(int $id): bool
    {
        try {
            DBConnector::execute("DELETE FROM answers WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}