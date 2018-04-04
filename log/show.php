<?php
    require "../init.php";

    $exp_num = (int)filter_input(INPUT_GET, "expnum", FILTER_VALIDATE_INT);

    $individuals = Database::getIndividualsByExpNum($exp_num);
?>
<html>
<body>
<table>
    <tr>
        <th>世代</th>
        <th>距離</th>
        <th>画像</th>
    </tr>
    <?php foreach ($individuals as $individual): ?>
        <tr>
            <td><?= $individual["generation"] ?></td>
            <td><?= $individual["distance"] ?></td>
            <td><img src="data:image/png;base64,<?= $individual["individual"] ?>"></td>
        </tr>
    <?php endforeach; ?>
</body>
</html>
