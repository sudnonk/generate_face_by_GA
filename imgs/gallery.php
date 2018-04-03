<html>
<body>
<?php
$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . "imgs" . DIRECTORY_SEPARATOR;
$dirs = scandir($path);
foreach ($dirs as $dir) {
    if ($dir === "." || $dir === "..") continue;
    if (!is_dir($dir)) continue;

    echo "<h2>" . date("Y年m月d日 H時i分s秒", strtotime($dir)) . "</h2>";
    foreach (glob("$dir/*.png") as $file) {
        $base64 = base64_encode(file_get_contents($path . $file));
        echo "<img src='data:image/png;base64," . $base64 . "'>";
    }
}
?>
</body>
</html>


