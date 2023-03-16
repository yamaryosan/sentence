<?php

/**
 * 結果のプレビューぺージの枚数を計算するクラス
 * 
 * @param array $searchResult 検索結果
 * 
 */
class PageNumberCulculator
{
    private array $searchResult;

    public function __construct(array $searchResult)
    {
        $this->searchResult = $searchResult;
    }

    public function calculate(int $displayCount)
    {
        $resultKnowledgeUnitNumber = count($this->searchResult);
        return (int)(ceil($resultKnowledgeUnitNumber / $displayCount));
    }
}