<?php

header('Content-Type: text/html; charset=utf-8');


if ( isset($_POST["info"]) )
{

    $UinqFileName=uniqid().".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg', 'application/pdf'];
    
    if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
        //echo "false";
		echo $_FILES['file']['type'];
        return;
    }
    move_uploaded_file($_FILES['file']['tmp_name'], $_POST["path"].$UinqFileName);

	$arr=array("name"=>$UinqFileName,"type"=>$_FILES['file']['type']);
	echo json_encode($arr);
}

?>