<?php
    require "init.php";

    header("Content-Type:image/png");
    imagepng(Goal::getGoal()->to_image(), null, 0, PNG_NO_FILTER);;