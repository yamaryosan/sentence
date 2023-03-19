<?php

declare(strict_types=1);

/**
 * ランダムな文章を出力するクラス
 */

class RandomKnowledgeUnitGetter
{
    public function countSentenceNumber()
    {
        $config = require("./config/config.php");

        $host = $config["database"]["host"];
        $db = $config["database"]["database"];
        $user = $config["database"]["username"];
        $pass = $config["database"]["password"];
        try {
            $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        } catch (PDOException $ex) {
            // アクセスできなかったときの処理
            echo "アクセスできません : " . $ex->getMessage() . PHP_EOL;
            // 切断
            unset($dbh);
            die();
        }
        $tableName = "sentence_table";
        $query = "SELECT COUNT(*) FROM $tableName";
        $statement = $dbh->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result[0]["COUNT(*)"];
    }
    public function get()
    {
        $count = $this->countSentenceNumber();
        $randomInt = mt_rand(0, $count - 1);

        $config = require("./config/config.php");

        $host = $config["database"]["host"];
        $db = $config["database"]["database"];
        $user = $config["database"]["username"];
        $pass = $config["database"]["password"];
        try {
            $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        } catch (PDOException $ex) {
            // アクセスできなかったときの処理
            echo "アクセスできません : " . $ex->getMessage() . PHP_EOL;
            // 切断
            unset($dbh);
            die();
        }
        $tableName = "sentence_table";
        $query = "SELECT * FROM $tableName WHERE id = $randomInt";
        $statement = $dbh->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $randomSentence = $result[0]["sentences"];
        return $randomSentence;
    }
}
