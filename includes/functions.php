<?php


function connect_to_database()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	try {
			$conn = new PDO("mysql:host=$servername;dbname=aop;charset=utf8;", $username, $password);
			
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
			//echo "Connected to [aop] database successfully<br><br>";
		}
			catch(PDOException $e)
		{
			//echo "Connection failed: " . $e->getMessage()."<br><br>";
		}
	
	try {
		}
		catch(PDOException $e) 
		{
			//echo "Error: " . $e->getMessage();
		}
		return $conn;
}		



function redirect($url){
     if (!headers_sent()){
         header('Location: '.$url); exit;
     }else{
         echo '<script type="text/javascript">';
         echo 'window.location.href="'.$url.'";';
         echo '</script>';
         echo '<noscript>';
         echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
         echo '</noscript>'; exit;
     }
 }

?>


