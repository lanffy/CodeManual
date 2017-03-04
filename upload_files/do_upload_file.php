<?php

var_dump($_FILES);
if(isset($_FILES['upload_file_name'])){
    echo 'file infos:' . PHP_EOL;

    print_r($_FILES);
    echo PHP_EOL;

    if(file_exists('upload/' . $_FILES['upload_file_name']['name'])) 
        echo 'upload/' . $_FILES['upload_file_name']['name'] . 'is already exist' . PHP_EOL;
    else {
        if(move_upload_file($_FILES['upload_file_name']['tmp_name'], 'upload/' . $_FILES['upload_file_name']['name']))
            echo 'upload success' . PHP_EOL;
        else 
            echo 'upload failed' . PHP_EOL;
    }
} else  {
    echo 'upload error' . PHP_EOL;
    print_r($_FILES['upload_file_name']['error']);
}


