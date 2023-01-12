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
		
		// Process exported report file on the server side
		/*viewer.onEndExportReport = function (event) {
			event.preventDefault = true; // Prevent client default event handler (save the exported report as a file)
			<?php StiHelper::createHandler(); ?>
		}*/
		
		// Send exported report to Email
		viewer.onEmailReport = function (event) {
			<?php StiHelper::createHandler(); ?>
		}
		
		// Load and show report
		var report = new Stimulsoft.Report.StiReport();
		switch ($_GET("rp"))
		{
		    case "1":
        		report.loadFile("../reports/report.mrt");
		        break;
		}
		

        // Change Connection String at Runtime
		report.dictionary.databases.getByName("MySQL").connectionString = "Server=localhost;Database=aop;Uid=root;Pwd=";

        /*************** ADD Filter to Report **************/
        /*var band = report.getComponentByName("DataBand1");
        var filter = new Stimulsoft.Report.Components.StiFilter();
        filter.column = "code";
        filter.condition = Stimulsoft.Report.Components.StiFilterCondition.GreaterThan; // >
        filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo; // = 
        filter.value1 = "229";
        filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.Numeric;
        band.filters.add(filter);*/		
        /*************** ADD Filter to Report **************/
        
        /*** Filter ***/
        // Date1 & Date2
        /*if ( $_GET("date1")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "date_sabt";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1 = 1397/01/01;
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }*/
        // State
        if ( $_GET("ste")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "code_state";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("ste");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.Numeric;
            band.filters.add(filter);
        }		
        // Type		
        if ( $_GET("type")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "type";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            switch ( $_GET("type") )
            {
                case "1":
                    filter.value1="مسئولیت محدود";
                    break;
                case "2":
                    filter.value1="سهامی خاص";
                    break;
                case "3":
                    filter.value1="سهامی عام";
                    break;
                case "4":
                    filter.value1="تعاونی";
                    break;
            }
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        // Date Esteghrar		
        if ( $_GET("esg")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "date_esteghrar";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("esg");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        // Date End		
        if ( $_GET("dend")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "date_end";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.Containing;
            filter.value1=$_GET("dend");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        if ( $_GET("hoze")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "hoze";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("hoze");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        if ( $_GET("zamine")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "zamine";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("zamine");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        if ( $_GET("nazer")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "nazer";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("nazer");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.Numeric;
            band.filters.add(filter);
        }
        if ( $_GET("cnt")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "code_center";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            filter.value1=$_GET("cnt");
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.Numeric;
            band.filters.add(filter);
        }		
        /*if ( $_GET("mali")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "bedehi";
            if ( $_GET("mali")=="no" )
            {
                filter.condition = Stimulsoft.Report.Components.StiFilterCondition.EqualTo;
            }
            else
            {
                filter.condition = Stimulsoft.Report.Components.StiFilterCondition.NotEqualTo;
            }
            filter.value1=0;
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.Numeric;
            band.filters.add(filter);
        }*/		
        if ( $_GET("sex")!=null )
        {
            var band = report.getComponentByName("DataBand1");
            var filter = new Stimulsoft.Report.Components.StiFilter();
            filter.column = "sex1";
            filter.condition = Stimulsoft.Report.Components.StiFilterCondition.Containing;
            if ( $_GET("sex")=="male" )
            {
                filter.value1="آقا";
            }
            else
            {
                filter.value1="خانم";
            }
            filter.dataType = Stimulsoft.Report.Components.StiFilterDataType.String;
            band.filters.add(filter);
        }		
        /**************/
		//Send Parameter to Report (Define in Stimulsoft Dictionary)
		report.setVariable("title", getCookie("title"));
		
		
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
