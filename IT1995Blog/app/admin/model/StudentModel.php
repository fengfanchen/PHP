<?php

namespace home\model;
use core\Model;

class StudentModel extends Model{

    protected $tableName = "student";

    public function getAllStudents($page = 1, $pageCount = 5): array{

        $offset = ($page - 1) * $pageCount;
        $sql = "select id, name, age, sex, email, address, updateTime from {$this->tableName} order by id asc"
            . " limit {$offset}, {$pageCount}";
        return $this->query($sql);
    }

    public function getCounts(): int{

        $sql = "select count(*) as c from {$this->tableName}";
        $res = $this->query($sql);
        return $res["c"] ?? 0;
    }
}