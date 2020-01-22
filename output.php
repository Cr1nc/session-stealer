<?php
    header("Content-Type: text/plain");
    if ($fh = fopen("./output.txt", "r")) {
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
