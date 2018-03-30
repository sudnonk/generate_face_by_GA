<?php
    require "init.php";
    header("Content-Type: text/plain");
    $a = generate_random_individual(1)[0];
    var_dump(serialize($a));