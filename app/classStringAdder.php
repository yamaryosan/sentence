<?php

/**
 * 文字列の前後に文字列を追加するクラス
 * @param string $forthString 前の文字列 
 * @param string $backString 後の文字列
 * @param string $originalString 元の文字列
 * @param string $targetString 追加のターゲットとなる文字列
 */

class StringAdder
{
    private string $forthString, $backString, $originalString, $targetString;

    public function __construct(string $forthString, string $backString, string $originalString, string $targetString)
    {
        $this->forthString = $forthString;
        $this->backString = $backString;
        $this->originalString = $originalString;
        $this->targetString = $targetString;
    }
    public function add()
    {
        echo $this->forthString;
        echo $this->backString;
        $replacement = $this->forthString . $this->targetString . $this->backString;
        $newString = str_replace($this->targetString, $replacement, $this->originalString);

        return $newString;
    }
}
