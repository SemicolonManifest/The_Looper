<?php
namespace TheLooper\Model;
class Answer
{
    public int $id;
    public string $response;
    public Field $field;
    public Take  $take;

    /*public function __construct(string $response,array $take){
        $this->response = $response;
        $this->take = $take;
    }*/

    public function create(): bool
    {
        $this->id = DBConnector::insert("INSERT INTO answers (response, fields_id, takes_id) values (:response, :fields_id, :takes_id);", ['response' => $this->response, 'fields_id' => $this->field->getId(), 'takes_id' => $this->take->id]);

        return true;
    }

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

    static function all(): array
    {
        $result = DBConnector::selectmany("SELECT id, response, fields_id, takes_id FROM answers;", []);
        $return = [];
        foreach ($result as $res) {
            $return[] = self::make($res);
        }
        return $return;
    }

    static function find(int $id): ?Answer
    {
        $res = DbConnector::selectOne("SELECT * FROM answers WHERE id = :id", ['id' => $id]);

        if (!$res) {
            return null;
        }

        return self::make(["id" => $res["id"], "response" => $res['response'], "field" => Field::find($res['fields_id']), "take" => Take::find($res['takes_id'])]);

    }

    static function where($field,$value): array
    {
        $result = DbConnector::selectMany("select * from answers where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = self::make(["id" => $res["id"], "response" => $res['response'], "field" => Field::find($res['fields_id']), "take" => Take::find($res['takes_id'])]);
        }
        return $return;
    }

    public function save(): bool
    {
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
}