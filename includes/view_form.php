<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>گزارش</title>
		<script src="../jquery/javascript.js" type="text/javascript"></script>
	</head>
</html>

<?php
header('Content-Type: text/html; charset=utf-8');
require_once '../stimulsoft/helper.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Stimulsoft Reports.PHP - JS Report Viewer</title>

	<!-- Report Office2013 style -->
	<link href="../stimulsoft/css/stimulsoft.viewer.office2013.whiteteal.css" rel="stylesheet">

	<!-- Stimusloft Reports.JS -->
	<script src="../stimulsoft/scripts/stimulsoft.reports.js" type="text/javascript"></script>
	<script src="../stimulsoft/scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	
	<?php 
		$options = StiHelper::createOptions();
		$options->handler = "../stimulsoft/handler.php";
		$options->timeout = 30;
		StiHelper::initialize($options);
	?>
	<script type="text/javascript">
	
	    function $_GET(param) 
	    {
        	var vars = {};
        	window.location.href.replace( location.hash, '' ).replace( 
        		/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        		function( m, key, value ) { // callback
        			vars[key] = value !== undefined ? value : '';
        		}
        	);
        
        	if ( param ) {
        		return vars[param] ? vars[param] : null;	
        	}
        	return vars;
        }
	
		var options = new Stimulsoft.Viewer.StiViewerOptions();
		options.appearance.fullScreenMode = true;
		options.toolbar.showSendEmailButton = true;
		
		var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);

		// Process SQL data source
		viewer.onBeginProcessData = function (event, callback) {
			<?php StiHelper::createHandler(); ?>
		}
		
		// Manage export settings on the server side
		viewer.onBeginExportReport = function (args) {
			<?php //StiHelper::createHandler(); ?>
			//args.fileName = "MyReportName";
		}
		
		// Send exported report to Email
		viewer.onEmailReport = function (event) {
			<?php StiHelper::createHandler(); ?>
		}
		
		// Load and show report
		var report = new Stimulsoft.Report.StiReport();
		switch ($_GET("rp"))
		{
		    case "1":
        		report.loadFile("../reports/report_form.mrt");
		        break;
		}
		

        // Change Connection String at Runtime
		report.dictionary.databases.getByName("MySQL").connectionString = "Server=localhost;Database=aop;Uid=root;Pwd=";

        /*** Filter ***/
        // code
        if ( $_GET("code")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "code_user";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1 = $_GET("code");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }
        if ( $_GET("year")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "year";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1 = $_GET("year");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }
        /**************/

		//Send Parameter to Report (Define in Stimulsoft Dictionary)
		
		viewer.report = report;
		
		function onLoad() {
			viewer.renderHtml("viewerContent");
		}
		
	</script>
	</head>
    <body onload="onLoad();">
	    <div id="viewerContent"></div>
    </body>
</html>
<!--report.Databases.Clear();
report.Databases.Add(new Stimulsoft.Report.Dictionary.StiOleDbDatabase("NameInReport", ConnectionString);
server=devcomp3; user id=sa; password=; database=dbLMS-->
