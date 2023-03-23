<?php

declare(strict_types=1);
require_once("./app/classUploader.php");
require_once("./app/classDataSaver.php");
require_once("./app/classDocxToTxtConverter.php");
set_time_limit(3600);

header("Cache-Control: no-cache, must-revalidate");

// テキストファイルが存在する場合はそれをDBに保存
if (file_exists("./uploads/uploadedTextFile.txt") === true) {
    $dataSaver = new DataSaver("./uploads/uploadedTextFile.txt");
    $dataSaver->save();
    echo "<script>alert('テキストファイルが既にあったため、DBに保存しました。');</script>";
}

// アップロードを受け付ける
if (isset($_FILES["uploaded_file"]) === true) {
    $uploader = new Uploader($_FILES["uploaded_file"]);
    $uploader->upload();
    // ドキュメントファイルをテキストファイルに変換
    $docxToTxtConverter = new DocxToTxtConverter("./uploads/uploadedDocxFile.docx", "./uploads/uploadedTextFile.txt");
    $docxToTxtConverter->convert();
    // テキストファイルを読み取ってDBに保存
    $dataSaver = new DataSaver("./uploads/uploadedTextFile.txt");
    $dataSaver->save();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style_upload.css">
</head>

<body>
    <form action="upload" method="post" enctype="multipart/form-data">
        <input type="file" class="file_dropzone" name="uploaded_file">
        <input type="submit" class="submit_btn" value="アップロード">
    </form>
    <a href="top.php">戻る</a>
    <a href="delete.php">DB削除</a>
</body>

</html>