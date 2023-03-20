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

    public function getTextFromDocx(string $filePath): string
    {
        $zip = new ZipArchive;
        $result = "";

        if ($zip->open($filePath) === true) {
            $documentXml = $zip->getFromName("word/document.xml");
            if ($documentXml) {
                $domDocument = new DOMDocument();
                $domDocument->loadXML($documentXml);
                $paragraphs = $domDocument->getElementsByTagName("p");
                /** @var DOMNode $paragraph */
                foreach ($paragraphs as $paragraph) {
                    $result .= $paragraph->textContent;
                }
            }
        }
        return $result . "\n";
    }

    public function convert(): void
    {
        $txt = ($this->docxFilePath);
        file_put_contents($this->txtFilePath, $txt);
    }
}
