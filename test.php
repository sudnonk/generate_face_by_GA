<?php
    $im = imagecreatefrompng("goal.png");

    $im2 = imagecreate(256, 256);

    for ($i = 0; $i < 256; $i++) {
        for ($j = 0; $j < 256; $j++) {
            $rgb = imagecolorat($im,$i,$j);
            var_dump($rgb);
        }
    }