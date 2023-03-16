<?php

declare(strict_types=1);
require_once("classStringAdder.php");

/**
 * 文字をハイライトするクラス
 * @param string $originalString ハイライト検索対象になる文字列
 * @param array $targetStringArray ハイライトされる文字列の配列
 * @param string $color ハイライト背景色
 */
class StringHighLighter
{
    private $originalString, $targetStringArray, $color;

    public function __construct(string $originalString, array $targetStringArray, string $color)
    {
        $this->originalString = $originalString;
        $this->targetStringArray = $targetStringArray;
        $this->color = $color;
    }

    public function highlight()
    {
        $highlightedString = $this->originalString;
        foreach ($this->targetStringArray as $targetString) {
            $forthString = "<span style='background-color:$this->color'>";
            $backString = "</span>";
            $stringAdder = new StringAdder($forthString, $backString, $highlightedString, $targetString);
            $highlightedString = $stringAdder->add();
        }
        return $highlightedString;
    }
}
