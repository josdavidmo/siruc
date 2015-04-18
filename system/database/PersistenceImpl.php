<?php

class PersistenceImpl extends Persistence {
    
    private $implementor;
    private static $singleton;
    
    private function __construct($implementor) {
        $this->implementor = $implementor;
    }

    public function delete($table, $criterion) {
        return $this->implementor->delete($table, $criterion);
    }

    public function executeQuery($query) {
        $result = $this->implementor->executeQuery($query);
        if($result){
            return $this->convertResult($result);
        } else {
            return $result;
        }
    }

    public function save($table, $fields, $object) {
        return $this->implementor->save($table, $fields, $object);
    }

    public function update($table, $fields, $object, $criterion) {
        return $this->implementor->update($table, $fields, $object, $criterion);
    }
    
    protected function convertResult($result) {
        return $this->implementor->convertResult($result);
    }
    
    public static function getInstance($implementor){
        self::$singleton = new PersistenceImpl($implementor);
        return self::$singleton;
    }

}
