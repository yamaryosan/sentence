<?php

declare(strict_types=1);
require_once("../app/class/classSearchWords.php");
require_once("../app/class/classSearcher.php");
require_once("../app/class/classPageNumberCulculator.php");
require_once("../app/class/classStringHighlighter.php");

$searchWords = new SearchWords($_GET["search_words"]);
$searchWordString = $searchWords->getStringByComma();

// 検索
$searcher = new Searcher($searchWords);
$searchResultArray = $searcher->search();

// ページネーション用計算

// 一度に表示する検索結果の数
if (isset($_GET["display_count"]) === true) {
    $displayCount = (int)$_GET["display_count"];
} else {
    $displayCount = 25;
}

// ページ数を計算
$pageNumberCulculator = new PageNumberCulculator($searchResultArray);
$totalPages = $pageNumberCulculator->calculate($displayCount);
$maxDisplayNumber = 0;

// ページネーション
if (isset($_GET["page"])) {
    $currentPage = (int)($_GET["page"]);
} else {
    $currentPage = 1;
}

$offset = ($currentPage - 1) * $displayCount;

$searchResultCurrentCount = count($searchResultArray) - $offset;
if ($searchResultCurrentCount < $displayCount) {
    $maxDisplayNumber = $searchResultCurrentCount;
} else {
    $maxDisplayNumber = $displayCount;
}
?>

<html>

<head>
    <title>結果</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style-result.css">
</head>

<body>
    <div class="container">
        <?php require("../app/function/functionSearchResultAbstract.php") ?>
        <?php require("../app/function/functionDisplayCountForm.php") ?>
        <?php require("../app/function/functionPagination.php") ?>
        <?php require("../app/function/functionSearchResult.php") ?>
        <?php require("../app/function/functionPagination.php") ?>
        <a href="searchPage.php">検索画面に戻る</a>
    </div>
    <button id="top-btn">↑</button>
    <script src="./js/toTopButton.js"></script>
    <script src="./js/displayCountControl.js"></script>
</body>

</html>