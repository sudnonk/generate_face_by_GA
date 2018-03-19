<?php
    $fDtc = face_detect("test_face.png","/usr/local/src/opencv/data/haarcascades/haarcascade_frontalcatface.xml");
    var_dump($fDtc);

    $fDtc = face_detect("hyoujou_shinda_me_man.png","/usr/local/src/opencv/data/haarcascades/haarcascade_frontalcatface.xml");
    var_dump($fDtc);