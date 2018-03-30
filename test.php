<?php
    require "init.php";
    header("Content-Type: image/png");
    $a = generate_random_individual(1)[0];
    var_dump(json_encode($a));