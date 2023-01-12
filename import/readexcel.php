<?php
			if ( isset($_POST["read"]) )
			{

				/** Include path **/
				set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

				/** PHPExcel_IOFactory */
				include 'Classes/PHPExcel/IOFactory.php';


				$inputFileType = 'Excel5';
				//	$inputFileType = 'Excel2007';
				//	$inputFileType = 'Excel2003XML';
				//	$inputFileType = 'OOCalc';
				//	$inputFileType = 'Gnumeric';
				$inputFileName = $_POST["ExeclFile"];

				//echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				//echo 'Turning Formatting off for Load<br />';
				$objReader->setReadDataOnly(true);
				$objPHPExcel = $objReader->load($inputFileName);


				//echo '<hr />';

				$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
				echo json_encode($sheetData);
				//var_dump($sheetData);
			}


?>
