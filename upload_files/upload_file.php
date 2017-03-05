<?php
var_dump($_FILES);
die();
if(isset($_FILES['file'])){
    echo 'file infos:' . PHP_EOL;

    print_r($_FILES);
    echo PHP_EOL;

    if(file_exists('upload/' . $_FILES['file']['name'])) 
        echo 'upload/' . $_FILES['file']['name'] . 'is already exist' . PHP_EOL;
    else {
        if(move_upload_file($_FILES['file']['tmp_name'], 'upload/' . $_FILES['file']['name']))
            echo 'upload success' . PHP_EOL;
        else 
            echo 'upload failed' . PHP_EOL;
    }
    die();
}
?>

