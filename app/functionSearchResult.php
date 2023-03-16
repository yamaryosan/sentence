<div class="container">
    <?php for ($i = 0; $i <= count($searchResultArray) - 1; $i++) : ?>
        <div class="unit-container">
            <div class="count">
                <p><?php echo ($i + 1) . "件目" ?></p>
            </div>
            <div class="content">
                <?php $contentString = $searchResultArray[$i]["sentences"] ?>
                <p><?php echo nl2br($contentString) ?></p>
            </div>
            <br>
        </div>
    <?php endfor ?> <br>
</div>