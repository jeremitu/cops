<?php
require_once ("config.php");

$uploaddir = $config['calibre_directory'] . '_Inbox/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

$tmp_name = $_FILES['userfile']['tmp_name'];
if (move_uploaded_file($tmp_name, $uploadfile)) {
    echo "File is valid, and was successfully uploaded.";
    mylog("Upload ok " . $uploadfile );
} else {
    echo "Error!";
    //echo 'Here is some more debugging info:';
    $s = print_r($_FILES, true);
    mylog("Upload error " . $uploadfile . ' ' . $s);

}



