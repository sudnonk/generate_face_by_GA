<?php
    require "init.php";

    var_dump(memory_get_usage());
    $genes = array();
    for ($x = 0; $x < Individual::width; $x++) {
        for ($y = 0; $y < Individual::height; $y++) {
            /** @var int $color */
            $color   = mt_rand(0, 7);
            $genes[] = new Gene($x, $y, $color);
        }
    }
    var_dump(memory_get_usage());
    $individual = new Individual($genes);
    var_dump(memory_get_usage());
    exit();
    header("Content-Type:image/png");
    imagepng($individual->to_image());