<?php

header('Content-Type: text/html; charset=utf-8');


if ( isset($_POST["info"]) )
{

    $UinqFileName="iexceltd".".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    $arr_file_types = ['application/vnd.ms-excel'];
    
    if (!(in_array($_FILES['file']['type'], $arr_file_types))) 
	{
        echo "false";
        return;
    }

    unlink($UinqFileName);  // Delete Previous Excel File
 
    move_uploaded_file($_FILES['file']['tmp_name'], $UinqFileName); // Copy New Excel File
	echo $UinqFileName;
}

?>