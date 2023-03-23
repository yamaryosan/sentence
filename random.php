<?php

require_once("./app/classRandomSentenceGetter.php");

// キャッシュを使わせない(クッキーを利用するため)
header("Cache-Control: no-cache, must-revalidate");

$randomSentenceGetter = new RandomKnowledgeUnitGetter();
$articleDisplayCount = 10;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>おススメの記事</title>
    <link rel="stylesheet" href="./css/style_common.css">
    <link rel="stylesheet" href="./css/style_random.css">
    <link rel="stylesheet" href="./css/style_side_column.css">
</head>

<body>

    <div class="wrapper">
        <header>
            <a href="top">プログラミング備忘録</a>
            <a href="top" class="mini_message">東京砂漠に生きる週末SE。<br>ここに備忘録を記します。</a>
        </header>
        <main>
            <div class="main_column">
                <div class="content_container">
                    <?php for ($i = 0; $i < $articleDisplayCount; $i++) : ?>
                        <h3>二つの参照方式</h3>
                        <p><?php echo nl2br($randomSentenceGetter->get()) ?></p>
                        <?php require("./app/previewPageFiller.php") ?>
                    <?php endfor ?>
                </div>
            </div>
            <div class="side_column">
                <?php require("sideColumn.php") ?>
            </div>
            <div class="back_btn_container">
                <a href="javascript:history.back()" class="back_btn">
                    <img src="./images/backBtnIcon.png">
                </a>
            </div>
        </main>
        <footer>
            <p>© programmingnokemono <?php echo date("Y") ?></p>
        </footer>
    </div>
</body>

</html>