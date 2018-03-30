<?php
    ini_set("memory_limit", "1G");
    require "init.php";

    /** @var string $save_dir 作成した画像を保存するディレクトリ */
    $save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis");
    mkdir($save_dir);

    $individuals = generate_random_individual(50);

    $scores = array();
    foreach ($individuals as $individual) {
        $distance = $individual->getDistance();
        $scores[] = array($distance, $individual);
    }
    unset($individuals);

    uasort($scores, function ($a, $b) {
        if ($a[0] === $b[0]) return 0;
        if ($a[0] < $b[0]) return -1;
        return 1;
    });

    foreach ($scores as $score) {
        var_dump($score[0]);
    }
    exit();

    header("Content-Type: image/png");
    $img = $best_individual->to_image();
    imagepng($best_individual->to_image(), null, 0, PNG_FILTER_NONE);