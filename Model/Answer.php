<?php
namespace TheLooper\Model;
class Answer
{
    public int $id;
    public string $response;
    public int $field;
    public int  $take;

    /*public function __construct(string $response,array $take){
        $this->response = $response;
        $this->take = $take;
    }*/

    public function create(): bool
    {
        $check = DbConnector::selectOne("SELECT * FROM answers WHERE fields_id = :fields_id AND takes_id = :takes_id", ['fields_id' => $this->field, 'takes_id' => $this->take]);

        if (!empty($check)) {
            return false;
        }

        $this->id = DBConnector::insert("INSERT INTO answers (response, fields_id, takes_id) values (:response, :fields_id, :takes_id);", ['response' => $this->response, 'fields_id' => $this->field, 'takes_id' => $this->take]);

        return true;
    }

    static function make(array $params)
    {
        $answer = new Answer();

        if (isset($params['id'])) {
            $answer->id = $params['id'];
        }

        $answer->response = $params['response'];
        $answer->field = $params['field'];
        $answer->take = $params['take'];

        return $answer;
    }

    static function all(): array
    {
        return DBConnector::selectmany("SELECT id, response, fields_id, takes_id FROM answers;", []);
    }

    static function find(int $id): ?Answer
    {
        $res = DbConnector::selectOne("SELECT * FROM answers WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }

        return self::make(["id" => $res["id"], "response" => $res['response'], "field" => $res['fields_id'], "take" => $res['takes_id']]);

    }

    public function save(): bool
    {
        $check = DbConnector::selectOne("SELECT * FROM answers WHERE response = :response", ['response' => $this->response]);

        if (!empty($check)) {
            return false;
        }

        return DbConnector::execute("UPDATE answers set response = :response WHERE id = :id", ['id' => $this->id, 'response' => $this->response]);
    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy(int $id): bool
    {
        try {
            DBConnector::execute("DELETE FROM answers WHERE id = :id", ['id' => $id]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    //TODO Add link to field

    public function allTakes(int $id)
    {

        //TODO Use Take Class to connect field to take
        $this->fields = DBConnector::select("SELECT * FROM fields WHERE answers_id = :id", ['id' => $id], true);

    }

}