<?php

declare(strict_types=1);
require_once("./app/classUploader.php");
require_once("./app/classDataSaver.php");

header("Cache-Control: no-cache, must-revalidate");

// アップロードを受け付ける
if (isset($_FILES["uploaded-file"]) === true) {
    $uploader = new Uploader($_FILES["uploaded-file"]);
    $uploader->upload();
    $pythonFileName = "../docx_to_text.py";
    // pyファイルを実行してドキュメントファイルをテキストファイルに変換
    exec("python " . $pythonFileName . " 2>&1", $output, $state);
    if ($state !== 0) {
        echo "エラーがあります。" . PHP_EOL;
        print_r(mb_convert_encoding($output, "UTF-8", "sjis"));
    } else {
        echo "変換成功" . PHP_EOL;
    }
    // テキストファイルを読み取って保存
    $dataSaver = new DataSaver("./uploads/uploadedTextFile.txt");
    $dataSaver->save();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style-upload.css">
</head>

<body>
    <form action="uploadPage.php" method="post" enctype="multipart/form-data">
        <input type="file" class="file-dropzone" name="uploaded-file">
        <input type="submit" class="submit-btn" value="アップロード">
    </form>
    <button onclick="location.href='searchPage.php'">検索ページへ移動</button>
</body>

</html>