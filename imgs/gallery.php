<html>
<body>
<?php
    $path = dirname(__DIR__) . DIRECTORY_SEPARATOR;
    $dirs = scandir($path);
    foreach ($dirs as $dir) {
        if ($dir === "." || $dir === "..") continue;
var_dump($dir);
        echo "<h2>" . date("Y年m月d日 H時i分s秒", strtotime($dir)) . "</h2>";
        foreach (glob("$dir/*.png") as $file) {
            echo "<img src='" . $path . $dir . DIRECTORY_SEPARATOR . $file . "'>";
        }
    }
?>
</body>
</html>


