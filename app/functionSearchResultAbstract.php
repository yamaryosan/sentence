<p>検索結果</p>
<?php if (count($searchResultArray) === 0) : ?>
    <?php echo "一件もヒットしませんでした。" ?>
<?php else : ?>
    <?php echo count($searchResultArray) . "件ヒットしました。" ?>
<?php endif ?>