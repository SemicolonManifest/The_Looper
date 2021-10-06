<?php

namespace TheLooper\Model;

use PDOException;

class Field
{
    private int $id;
    public string $label;
    public int $value_kind;
    public int $exercises_id;


    public function __construct(string $label, int $value_kind, int $exercises_id, int $id = null)
    {
        $this->label = $label;
        $this->value_kind = $value_kind;
        $this->exercises_id = $exercises_id;
        if ($id != null) $this->id = $id;
    }

    public function create(): bool
    {
        if (isset($this->label) && isset($this->value_kind) && isset($this->exercises_id)) {
            try {
                $res = DbConnector::insert("insert into exercise_looper.fields (label, value_kind, exercises_id) values (:label, :value_kind,:exercises_id )", ["label" => $this->label, "value_kind" => $this->value_kind, "exercises_id" => $this->exercises_id]);
                $this->id = $res;
                return isset($this->id);
            } catch (PDOException $e) {
                return false;
            }
        } else {
            return false;
        }
    }

    static function all(): array
    {
        return DbConnector::selectMany("select * from fields;");
    }

    static function find($id): ?Field
    {
        $res = DbConnector::selectOne("select * from fields where id=:id;", ["id" => $id]);
        return isset($res['label']) ? new Field($res['label'], $res['value_kind'], $res['exercises_id'], $res['id']) : null;
    }

    static function where($field,$value): array
    {
        $result = DbConnector::selectMany("select * from fields where $field = :value;",["value"=>$value]);
        $return = [];
        foreach ($result as $res){
            $return[] = new Field($res['label'], $res['value_kind'], $res['exercises_id'], $res['id']);
        }
        return $return;
    }

    public function save(): bool
    {
        if(isset($this->id) && isset($this->label) && isset($this->value_kind)){
            try {
                DbConnector::execute("Update fields set label = :label, value_kind = :value_kind where id = :id", ["id"=>$this->id, "label" => $this->label, "value_kind" => $this->value_kind]);
                return true;
            }catch (Exception $e){
                return false;
            }
        }else{
            return false;
        }

    }

    public function delete(): bool
    {
        return self::destroy($this->id);
    }

    static function destroy($id): bool
    {
        try {
            DbConnector::execute("DELETE FROM fields WHERE id=:id", ["id" => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}