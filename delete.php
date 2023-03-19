<?php

require_once("./app/classDatabaseDeleter.php");

$databaseDeleter = new DatabaseDeleter("sentence_table");
$databaseDeleter->delete();

?>

<html>

<head>
    <title>削除完了</title>
</head>

<body>
    <h1><?php $databaseDeleter->message() ?></h1>
    <a href="./upload.php">戻る</a>
    <script src="./js/deleteCompletionMessage.js"></script>
</body>

</html>