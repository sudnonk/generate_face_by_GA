<?php
    ini_set("memory_limit", "1G");
    require "init.php";

    /** @var string $save_dir 作成した画像を保存するディレクトリ */
    $save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis");
    mkdir($save_dir);

    $individuals = generate_random_individual(50);
    header("Content-Type: text/plain");
    $min_distance    = PHP_INT_MAX;
    $best_individual = null;
    foreach ($individuals as $individual) {
        $distance = $individual->getDistance();
        if ($distance < $min_distance) {
            $best_individual = $individual;
            $min_distance = $distance;
        }
    }

    header("Content-Type: image/png");
    $img = $best_individual->to_image();
    imagepng($best_individual->to_image(), null, 0, PNG_FILTER_NONE);