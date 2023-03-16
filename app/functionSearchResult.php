<div class="container">
    <?php for ($i = 0; $i <= count($searchResultArray) - 1; $i++) : ?>
        <div class="content">
            <?php $contentString = $searchResultArray[$i]["sentences"] ?>
            <p><?php echo nl2br($contentString) ?></p>
        </div>
        <br>
    <?php endfor ?> <br>
</div>