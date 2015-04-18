<?php

abstract class Persistence {
    
    public abstract function save($table, $fields, $object);
    public abstract function delete($table, $criterion);
    public abstract function update($table, $fields, $object, $criterion);
    public abstract function executeQuery($query);
    protected abstract function convertResult($result);
}
