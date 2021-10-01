<?php
namespace TheLooper\Model;
use PDOException;

class Field
{
        private int $id;
        private string $label;
        private int $value_kind;
        private int $exercises_id;


        public function __construct(string $label,int $value_kind,int $exercises_id,int $id = null){
            $this->label = $label;
            $this->value_kind = $value_kind;
            $this->exercises_id = $exercises_id;
            if($id != null) $this->id = $id;
        }

        public function create(): bool
        {
            if(isset($this->label) && isset($this->value_kind) && isset($this->exercises_id)){
                try {
                    $res = DbConnector::insert("insert into exercise_looper.fields (label, value_kind, exercises_id) values (:label, :value_kind,:exercises_id )", ["label" => $this->label, "value_kind" => $this->value_kind, "exercises_id" => $this->exercises_id]);
                    $this->id = $res;
                    return isset($this->id);
                }catch (PDOException $e){
                    return false;
                }
            }else{
                return false;
            }
        }

        static function all() : array
        {
            return DbConnector::selectMany("select * from fields;");
        }

        static function find($id): ?Field
        {
            $res = DbConnector::selectOne("select * from fields where id=:id;",["id"=>$id]);
            return isset($res['label']) ? new Field($res['label'],$res['value_kind'],$res['exercises_id'],$res['id']) : null ;
        }



}