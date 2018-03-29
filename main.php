<?php
    ini_set("memory_limit", "1G");
    require "init.php";

    /** @var string $save_dir 作成した画像を保存するディレクトリ */
    $save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis");
    mkdir($save_dir);

    $individuals = generate_random_individual(50);

    $min_distance    = PHP_INT_MAX;
    $best_individual = null;
    foreach ($individuals as $individual) {
        if ($individual->getDistance() < $min_distance) {
            $best_individual = $individual;
        }
    }

    //header("Content-Type: image/png");
    var_dump($best_individual);
    exit();
    $img = $best_individual->to_image();
    imagepng($best_individual->to_image(), null, 0, PNG_FILTER_NONE);