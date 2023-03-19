<?php

/**
 * データベースを削除するクラス
 * @param string $sentenceTableName 文章テーブル名
 */
class DatabaseDeleter
{
    private string $sentenceTableName;

    public function __construct(string $sentenceTableName)
    {
        $this->sentenceTableName = $sentenceTableName;
    }
    public function delete()
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
        $statement = $dbh->prepare("DROP TABLE IF EXISTS $this->sentenceTableName");
        $statement->execute();
    }
    public function message()
    {
        $messageString = "削除が完了しました。";
        echo $messageString;
    }
}
