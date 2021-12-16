<?php

namespace core;

class Model{

    protected $dao;
    protected $tableName;
    protected $fields;

    public function __construct(){

        global $config;
        $this->dao = new Dao($config["database"]);
        $this->getFields();
    }

    protected function getFields(){

        $sql = "DESC {$this->tableName}";
        $rows = $this->query($sql);
        foreach($rows as $row){

            $this->fields[] = $row["Field"];
            if($row["Key"] == "PRI"){

                $this->fields["Key"] = $row["Field"];
            }
        }
    }

    protected function query($sql): array{

        return $this->dao->daoQuery($sql);
    }

    protected function exec($sql){

        return $this->dao->daoExec($sql);
    }

    public function autoInsert($data){

        $keys = $values = "";
        foreach($this->fields as $k => $v) {

            if($k == "Key")
                continue;

            if(array_key_exists($v, $data)){

                $keys .= $v . ",";
                $values .= "'" . $data[$v] . "'.";
            }
        }

        $keys = rtrim($keys, ",");
        $values = rtrim($values, ",");
        $sql = "insert into{$this->tableName}({$keys}) values({$values})";
        return $this->exec($sql);
    }

    public function deleteById($id){

        if(!isset($this->fields["Key"])){

            return false;
        }

        $sql = "delete from {$this->tableName} where {$this->fields["Key"]} = '{$id}'";
        return $this->exec($sql);
    }

    public function autoUpdate($id, $data){

        $where = " where {$this->fields['Key']} = '{$id}'";
        $sql = "update {$this->tableName} set";
        foreach ($data as $Key => $value){

            $sql .= $Key . "='" . $value . "',";
        }

        $sql = rtrim($sql, ",") . $where;
        return $this->exec($sql);
    }

    public function getById($id){

        if(!isset($this->fields["Key"])){

            return false;
        }

        $sql = "select * from {$this->tableName} where {$this->fields['Key']} = '{$id}'";
        return $this->query($sql);
    }
}