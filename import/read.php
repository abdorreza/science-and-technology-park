
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #05</title>

</head>
<body>

<h1>PHPExcel Reader Example #05</h1>
<h2>Simple File Reader using the "Read Data Only" Option</h2>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileType = 'Excel5';
//	$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';
$inputFileName = 'test.xls';

echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
echo 'Turning Formatting off for Load<br />';
$objReader->setReadDataOnly(true);
$objPHPExcel = $objReader->load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
echo $sheetData[1]['A']."<br/>";
echo "rows = ".count($sheetData)."<br/>";
echo "cols = ".count($sheetData[1]['A'])."<br/>";

var_dump($sheetData);


?>
<body>
</html>