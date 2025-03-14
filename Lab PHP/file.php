<?php
$filename = "sample.txt";

if (file_exists($filename)) {
    $content = file_get_contents($filename);
    echo "<pre>$content</pre>";
} else {
    echo "File not found!";
}
?>
