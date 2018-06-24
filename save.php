<?php
if(isset($_POST['start-time']) && isset($_POST['end-time']) && isset($_POST['pin'])) {
    $data = $_POST['start-time'] . "\r\n" . $_POST['end-time'] . "\r\n" . $_POST['pin'];
    $ret = file_put_contents('time.txt', $data);
    if($ret === false) {
        echo 'There was an error writing this file';
    }
    else {
        header('Location: index.php'); 
    }
}

if(isset($_POST['heating-temp']) && isset($_POST['pin'])) {
    $data = $_POST['heating-temp'] . "\r\n" . $_POST['pin'];
    $ret = file_put_contents('heating.txt', $data);
    if($ret === false) {
        echo 'There was an error writing this file';
    }
    else {
        header('Location: index.php'); 
    }
}

if(isset($_POST['cooling-temp']) && isset($_POST['pin'])) {
    $data = $_POST['cooling-temp'] . "\r\n" . $_POST['pin'];
    $ret = file_put_contents('cooling.txt', $data);
    if($ret === false) {
        echo 'There was an error writing this file';
    }
    else {
        header('Location: index.php'); 
    }
}

shell_exec("pkill -f daamon.py");

shell_exec("python daemon.py > /dev/null 2>&1 &");

?>