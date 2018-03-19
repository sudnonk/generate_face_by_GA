<?php
    $fDtc = face_detect("test_face.png","/usr/local/src/opencv/data/haarcascades/haarcascade_frontalcatface.xml");
    var_dump($fDtc);