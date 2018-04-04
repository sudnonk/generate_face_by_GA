<?php
    require "../init.php";

    $expnums = Database::getPastExpNums();
    ?>
<html>
<body>
<form method="get" action="show.php">
    <select name="expnum">
        <?foreach ($expnums as $expnum):?>
        <option value="<?=$expnum?>"><?=$expnum?></option>
        <?php endforeach;?>
    </select>
    <input type="submit">
</form>
</body>
</html>
