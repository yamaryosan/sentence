<form>
    <?php if (count($searchResultArray) > 25) : ?>
        <label for="display_count">表示検索結果数</label>
        <select id="display_count">
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="200">200</option>
        </select>
    <?php endif ?>
</form>