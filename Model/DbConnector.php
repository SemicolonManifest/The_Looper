<?php

class DbConnector
{


    private $PDO_DSN;
    private $PDO_USERNAME;
    private $PDO_PASSWORD;

    public function __construct($PDO_DSN, $PDO_USERNAME, $PDO_PASSWORD){
        $this->PDO_DSN = $PDO_DSN;
        $this->PDO_USERNAME = $PDO_USERNAME;
        $this->PDO_PASSWORD = $PDO_PASSWORD;
    }

    private function getPDO(){
        
        $DB = null;
        try{
            $DB = new PDO($this->PDO_DSN,$this->PDO_USERNAME,$this->PDO_PASSWORD);
        }catch(Exception $exception){
            throw new Exception("An exception has occurred when trying to connect to the database!");
        }

        $DB->exec("set names utf8");
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $DB;
    }

    /** This method is used for executing "select" querys
     * @param $query - The SQL query
     * @param $params - The parameters
     * @param $multirecord - Bool - Do we want multiple raws ?
     * @return array|null
     */
    public function select($query, $params, $multirecord) {

        $DB = $this->getPDO();
        try {
            $statement = $DB->prepare($query);     //Préparer la requête
            $statement->execute($params);       //Exécuter la requête
            if ($multirecord)       //Si on veut récuperer plusieurs données
            {
                $queryResult = $statement->fetchAll(PDO::FETCH_ASSOC);  //Alors on fait un fetchAll
            } else {
                $queryResult = $statement->fetch(PDO::FETCH_ASSOC);     //Sinon on fait un fetch simple
            }
            $DB = null;
            return $queryResult;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }


    public function selectMany($query, $params = []) {
        return $this->select($query, $params, true);
    }


    public function selectOne($query, $params = []) {
        return $this->select($query, $params, false);
    }

    /**
     * @param $query - The SQL query
     * @param array $params - The parameters
     * @return string
     * @throws Exception - SQL exceptions
     */
    public function insert($query, $params = []) {
        $DB = $this->getPDO();
        try {
            $statement = $DB->prepare($query);     //Préparer la requête
            $statement->execute($params);       //Exécuter la requête
            return $DB->lastInsertId();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }

    }

    /**
     * @param $query - The SQL query
     * @param array $params - The parameters
     * @return bool|null
     */
     public function execute($query, $params = []) {
        $DB = getPDO();
        try {
            $statement = $this->DB->prepare($query);     //Préparer la requête
            $statement->execute($params);       //Exécuter la requête
            $DB = null;
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }




}