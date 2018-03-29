<?php
    require "init.php";
    header("Content-Type: text/plain");
    Goal::getGoal()->getDistance();
    Goal::getGoal()->to_image();