<?php
    $fDtc = face_detect("test_face.png","haarcascade_frontalcatface.xml");
    var_dump($fDtc);

    $fDtc = face_detect("hyoujou_shinda_me_man.png","haarcascade_frontalcatface.xml");
    var_dump($fDtc);