<?php
    require "init.php";
    header("Content-Type: image/png");
    $a = generate_random_individual(1)[0];
    imagepng($a->to_image(), null, 0, PNG_FILTER_NONE);