<?php
    require "init.php";
    header("Content-Type: text/plain");
    var_dump(Goal::getGoal()->getDistance());
    Goal::getGoal()->to_image();