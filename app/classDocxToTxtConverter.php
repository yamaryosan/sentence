<?php

/**
 * Class DocxToTxtConverter
 * docxファイルをテキストファイルに変換するクラス
 * @param string $docxFilePath : docxファイルのパス
 */

class DocxToTxtConverter
{
    private $docxFilePath;
    private $txtFilePath;

    public function __construct(string $docxFilePath, string $txtFilePath)
    {
        $this->docxFilePath = $docxFilePath;
        $this->txtFilePath = $txtFilePath;
    }

    public function convert(): void
    {
        $zip = new ZipArchive;

        if ($zip->open($this->docxFilePath) === true) {
            $documentXml = $zip->getFromName("word/document.xml");
            if ($documentXml) {
                $domDocument = new DOMDocument();
                $domDocument->loadXML($documentXml);
                $paragraphs = $domDocument->getElementsByTagName("p");
                /** @var DOMNode $paragraph */
                $result = "";
                // プログレスバーの表示
                echo "<progress id='progress_bar' value='0' max='100'></progress>";
                echo "<span id='progress_value'>0%</span>";
                echo "<script>
                const bar = document.querySelector('#progress_bar');
                const progress_value = document.querySelector('#progress_value');
                </script>";
                $count = 0;
                $maxProgressValue = $paragraphs->length;
                $currentProgressValue = 0;
                $result = "";
                $chunkSize = 1024 * 1024; // 1MB
                foreach ($paragraphs as $paragraph) {
                    $result .= $paragraph->textContent . PHP_EOL;
                    $currentProgressValue = (int)($count / $maxProgressValue * 100);
                    // プログレスバーの進捗を変更
                    echo "<script>
                    bar.value = $currentProgressValue;
                    progress_value.textContent = $currentProgressValue + '%';
                    </script>";
                    $count++;
                    if (strlen($result) > $chunkSize) {
                        file_put_contents($this->txtFilePath, $result, FILE_APPEND);
                        $result = "";
                    }
                }
                if (strlen($result) > 0) {
                    file_put_contents($this->txtFilePath, $result, FILE_APPEND);
                }
            }
        }
    }
}
