<?php
    $filename = $_GET["file"];
    if ( pathinfo($filename, PATHINFO_EXTENSION)=="pdf" )
    {
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($filename));
        readfile($filename);
    }
    else
    {
        header('Content-Type: image/'.pathinfo($filename, PATHINFO_EXTENSION));
        $image= file_get_contents($filename);
        echo $image;    
    }
?>



