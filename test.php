<?php
    $im = imagecreatefrompng("goal.png");

    $im2   = imagecreate(256, 256);
    $black = imagecolorallocate($im2, 0, 0, 0);
    $white = imagecolorallocate($im2, 255, 255, 255);

    for ($i = 0; $i < 256; $i++) {
        for ($j = 0; $j < 256; $j++) {
            $rgb = imagecolorat($im, $i, $j);

            if ($rgb > 127) {
                imagesetpixel($im2, $i, $j, $white);
            } else {
                imagesetpixel($im2, $i, $j, $black);
            }
        }
    }

    header("Content-Type: image/png");
    imagepng($im2);