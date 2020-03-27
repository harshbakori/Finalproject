<!-- uplode copy fail safe file -->
<?php
$file = '../uploads/example.txt.bak';
$newfile = '../varified/example.txt';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}
?>

