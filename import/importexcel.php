<?php
	
	function GetSheetData($sheet,$row,$col) 
	{
		return (  isset($sheet[$row][$col])?$sheet[$row][$col]:''  );
	}
	

	if ( isset($_POST["import"]) )
	{
		set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');
		include 'Classes/PHPExcel/IOFactory.php';
		$inputFileType = 'Excel5';
		$inputFileName = $_POST["ExeclFile"];
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($inputFileName);
		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

		require_once "../includes/functions.php";
		$conn=connect_to_database();
		
		// Check for Repeatation Data
		for ( $i=1;$i<=count($sheetData);$i++)
		{
			$sql = "SELECT * FROM users WHERE name=:name AND state_code=:state_code AND center_code=:center_code";
            $stmt = $conn->prepare($sql);
			$stmt->bindValue(':name',GetSheetData($sheetData,$i,'A'));
			$stmt->bindValue(':state_code', $_POST["state_code"]);
			$stmt->bindValue(':center_code', $_POST["center_code"]);
			$stmt->execute();
            $count = $stmt->rowCount();
			if ( $count>0 )
			{
				$conn = null;
				echo "Exist";
				return;
			}
		}

		for ( $i=1;$i<=count($sheetData);$i++)
		{
			//Insert in Users Table
			$u_name=uniqid();
			$sql = "INSERT INTO `users` (`state_code`,`center_code`,`username`,`password`,`user_type`,`name`,`tel`,`email`,`logo`) VALUES (:state_code,:center_code,:username,:password,:user_type,:name,:tel,:email,:logo)";
			$statement = $conn->prepare($sql);
			$statement->bindValue(':state_code', $_POST["state_code"]);
			$statement->bindValue(':center_code', $_POST["center_code"]);
			$statement->bindValue(':username',$u_name);
			$statement->bindValue(':password',MD5("123456"));
			$statement->bindValue(':user_type',"corp");
			$statement->bindValue(':name',GetSheetData($sheetData,$i,'A'));
			$statement->bindValue(':tel',GetSheetData($sheetData,$i,'B'));
			$statement->bindValue(':email',GetSheetData($sheetData,$i,'C'));
			$statement->bindValue(':logo',"");
			$inserted = $statement->execute();
			// Get UserCode in Users Table
			$stmt = $conn->prepare("SELECT * FROM users WHERE name=:name AND tel=:tel AND email=:email");
			$stmt->bindValue(':name',GetSheetData($sheetData,$i,'A'));
			$stmt->bindValue(':tel',GetSheetData($sheetData,$i,'B'));
			$stmt->bindValue(':email',GetSheetData($sheetData,$i,'C'));
			$stmt->execute();
			$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// Get Hoze Code from Hoze Table
			$stmt = $conn->prepare("SELECT * FROM hoze WHERE REPLACE(name,' ','')=:name");
			$stmt->bindValue(':name',str_replace(' ','',GetSheetData($sheetData,$i,'K')));
			$stmt->execute();
			$hoze = $stmt->fetchAll(PDO::FETCH_ASSOC);
			// Get Zamine Code from Zamine Table
			if ( isset($hoze[0]['code']) )
			{
				$stmt = $conn->prepare("SELECT * FROM zamine WHERE REPLACE(name,' ','')=:name AND code_hoze=:code_hoze");
				$stmt->bindValue(':name',str_replace(' ','',GetSheetData($sheetData,$i,'L')));
				$stmt->bindValue(':code_hoze',$hoze[0]['code']);
				$stmt->execute();
				$zamine = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			
			

			$sql = "SET SQL_MODE = '';INSERT INTO `corps` (`code_state`,`code_center`,`code_user`,`name`,";
			$sql.="`tel`,`fax`,`email`,`website`,`mobile`,`address`,`semat1`,`name1`,`code_melli1`,`idea`,`hoze`,`zamine`,`date_esteghrar`,`date_end`)";
			
			$sql.=" VALUES (:code_state,:code_center,:code_user,:name,:tel,:fax,:email,:website,:mobile,:address,";
			$sql.=":semat1,:name1,:code_melli1,:idea,:hoze,:zamine,:date_esteghrar,:date_end)";
	
			$statement = $conn->prepare($sql);
			
			$statement->bindValue(':code_state', $_POST["state_code"]);
			$statement->bindValue(':code_center', $_POST["center_code"]);
			$statement->bindValue(':code_user', $user[0]['code']);
			$statement->bindValue(':name',GetSheetData($sheetData,$i,'A'));
			$statement->bindValue(':tel',GetSheetData($sheetData,$i,'D'));
			$statement->bindValue(':fax',GetSheetData($sheetData,$i,'E'));
			$statement->bindValue(':email',GetSheetData($sheetData,$i,'C'));
			$statement->bindValue(':website',GetSheetData($sheetData,$i,'F'));
			$statement->bindValue(':mobile',GetSheetData($sheetData,$i,'B'));
			$statement->bindValue(':address',GetSheetData($sheetData,$i,'G'));
			$statement->bindValue(':semat1',"مدیر عامل");
			$statement->bindValue(':name1',GetSheetData($sheetData,$i,'H'));
			$statement->bindValue(':code_melli1',GetSheetData($sheetData,$i,'I'));
			$statement->bindValue(':idea',GetSheetData($sheetData,$i,'J'));
			if ( isset($hoze[0]['code']) )
				$statement->bindValue(':hoze',$hoze[0]['code']);
			else
				$statement->bindValue(':hoze',0);
			if ( isset($zamine[0]['code']) )
				$statement->bindValue(':zamine',$zamine[0]['code']);
			else
				$statement->bindValue(':zamine',0);
			$statement->bindValue(':date_esteghrar',GetSheetData($sheetData,$i,'M'));
			$statement->bindValue(':date_end',GetSheetData($sheetData,$i,'N'));

			$inserted = $statement->execute();
			
			
		}
		$conn = null;


		//var_dump($sheetData);
	}
?>

