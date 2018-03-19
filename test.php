<?php
    $im = imagecreatefrompng("goal.png");

    $im2   = imagecreate(256, 256);
    $black = imagecolorallocate($im2, 0, 0, 0);
    $white = imagecolorallocate($im2, 255, 255, 255);

    for ($i = 0; $i < 256; $i++) {
        for ($j = 0; $j < 256; $j++) {
            $rgb = imagecolorat($im, $i, $j);
            $r   = ($rgb >> 16) & 0xFF;
            $g   = ($rgb >> 8) & 0xFF;
            $b   = $rgb & 0xFF;
header("Content-Type: text/plain");
            var_dump($r,$g,$b);

            if ($r > 127 && $g > 127 && $b > 127) {
                imagesetpixel($im2, $i, $j, $black);
            } else {
                imagesetpixel($im2, $i, $j, $white);
            }
        }
    }
exit();
    header("Content-Type: image/png");
    imagepng($im2);