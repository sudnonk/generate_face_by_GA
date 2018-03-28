<?php

    $genes = array();
    for ($x = 0; $x < Individual::width; $x++) {
        for ($y = 0; $y < Individual::height; $y++) {
            /** @var Color $color */
            $color   = new Color(mt_rand(0, 7));
            $genes[] = new Gene($x, $y, $color);
        }
    }

    $individual = new Individual($genes);

    header("Content-Type:image/png");
    imagepng($individual->to_image());