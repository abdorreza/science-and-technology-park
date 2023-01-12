<?php

header('Content-Type: text/html; charset=utf-8');


if ( isset($_POST["delete"]) )
{

    unlink($_POST["path"].str_replace(' ', '', $_POST["file"]));
    
}

?>