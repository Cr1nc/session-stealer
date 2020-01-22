<?php
    if( isset($_POST['data']) )
    {
        $location = "./output.txt";
        $data = time() . " - " . $_SERVER['REMOTE_ADDR'] . " - " . $_POST['data'] . PHP_EOL;
        file_put_contents($location, $data, FILE_APPEND | LOCK_EX);
    }
?>
