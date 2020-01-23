<?php
    header("Content-Type: text/plain");
    $file = "./output.txt";
    if( isset($_GET['delete']) ) {
        if (unlink($file)) {
            echo "Deleted $file";
        } else {
            echo "Error deleting $file";
        }
    } elseif ($fh = fopen($file, "r")) {
        while (!feof($fh)) {
            $line = fgets($fh);
                $array = explode(" - ", $line);
                if (count($array) != 3) {
                        continue;
                }
                echo gmdate('r', $array[0]) . " - " . $array[1] . " - " . base64_decode($array[2]) . PHP_EOL;
        }
        fclose($fh);
    }
?>
