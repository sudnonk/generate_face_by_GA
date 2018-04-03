<?php
ini_set("memory_limit", "1G");
require "init.php";

/** @var string $save_dir 作成した画像を保存するディレクトリ */
$save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis");
mkdir($save_dir);

$individuals = generate_random_individual(50);

uasort($individuals, array("Individual", "sort"));

foreach ($individuals as $individual) {
    var_dump($individual->getDistance());
    $individual->save($save_dir);
}
exit();

