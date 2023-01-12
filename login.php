<?php
session_start();
/*if ( $_SESSION["captcha"]!=$_POST["captcha"] )
{
    echo "captcha error";
    return;
}*/
if ( isset($_POST["login"]) )
{

    /*if ( $_POST["captcha"]!=$_SESSION["captcha"] )
    {
        echo "-1";
        return;
    }*/


    require_once "includes/functions.php";

    $conn=connect_to_database();
	$stmt = $conn->prepare("SELECT * FROM users WHERE username=:username and password=:password");
	$stmt->execute(['username' => $_POST['username'],'password'=>MD5($_POST['password'])]);
	$count = $stmt->rowCount();
	if ($count>0) 
	{
		$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($user);
	} 
	else 
	{
	    echo 0;
	}

    $conn = null;


}  //isset login	
?>

