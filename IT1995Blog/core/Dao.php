<?php
namespace core;

use PDO;
use PDOException;

class Dao{

    protected $pdo;

    public function __construct($databaseInfo = array()){

        $type = $databaseInfo["type"] ?? "mysql";
        $host = $databaseInfo["host"] ?? "localhost";
        $port = $databaseInfo["port"] ?? "3306";
        $user = $databaseInfo["user"] ?? "root";
        $password = $databaseInfo["password"] ?? "";
        $dbName = $databaseInfo["dbName"] ?? "";
        $charset = $databaseInfo["charset"] ?? "utf8";

        try{

            $dsn = $type . ":host=" . $host . ";port=" . $port . ";dbname=" . $dbName . ";charset=" . $charset;
            $this->pdo = new PDO($dsn, $user, $password);
        }
        catch (PDOException $e){

            echo "数据库连接失败!<br/>";
            echo "错误文件为：" . $e->getFile() . "<br/>";
            echo "错误行号为：" . $e->getLine() . "<br/>";
            echo "错误描述为：" . $e->getMessage();
            exit;
        }
    }

    public function daoQuery($sql): array{

        try{

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){

            $this->daoException(e);
        }
    }

    public function daoExec($sql){

        try{

            return $this->pdo->exec($sql);
        }
        catch (PDOException $e){

            $this->daoException($e);
        }
    }

    private function daoException($e){

        echo "SQL执行错误!<br/>";
        echo "错误文件为：" . $e->getFile() . "<br/>";
        echo "错误行号为：" . $e->getLine() . "<br/>";
        echo "错误描述为：" . $e->getMessage();
        exit;
    }

}