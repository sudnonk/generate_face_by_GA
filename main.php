<?php
    require "init.php";

    /** @var string $save_dir 作成した画像を保存するディレクトリ */
    $save_dir = "imgs" . DIRECTORY_SEPARATOR . date("YmdHis");
    mkdir($save_dir);

    $individuals = generate_random_individual(50);

    header("Content-Type:image/png");
    imagepng($individual->to_image(), $save_dir, 0, PNG_NO_FILTER);