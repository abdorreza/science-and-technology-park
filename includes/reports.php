<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/PersianDatePicker.min.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/PersianDatePicker.min.css" />
        <script type="text/javascript" src="../jquery/alert.js"></script>
        <!-- Stimulsoft report -->
        <link href="stimulsoft/css/stimulsoft.viewer.office2013.whiteteal.css" rel="stylesheet">
        <script src="stimulsoft/scripts/stimulsoft.reports.js" type="text/javascript"></script>
        <script src="stimulsoft/scripts/stimulsoft.viewer.js" type="text/javascript"></script>
	</head>
<body>
    <?php
        header('Content-Type: text/html; charset=utf-8');   
        require_once 'stimulsoft/helper.php';
		$options = StiHelper::createOptions();
		$options->handler = "stimulsoft/handler.php";
		$options->timeout = 30;
		StiHelper::initialize($options);

        require_once "functions.php";
        $conn=connect_to_database();
    ?>
    <div id="rep-filter">
        <div id="filter-right">
            <table id="rep-table">
                <tr>
                    <td width="25%">استان</td>
                    <td width="80%"">
                        <?php
                            $sth = $conn->prepare("SELECT * FROM states");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<select id='state_list' style='width:90%;' onchange='ChangeCenter()'>";
                            echo "<option value=''>کلیه استان ها</option>";
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td width="25%">مرکز</td>
                    <td width="80%"">
                        <?php
                            $sth = $conn->prepare("SELECT * FROM centers");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<select id='center_list' style='width:90%;'>";
                            echo "<option value=''>کلیه مراکز</option>";
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>نوع شرکت</td>
                    <td>
                        <select id='type_list' style='width:30%'>";
                            <option value="">کلیه شرکت ها</option>
                            <option value="1">مسئولیت محدود</option>
                            <option value="2">سهامی خاص</option>
                            <option value="3">سهامی عام</option>
                            <option value="4">تعاونی</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>تاریخ استقرار</td>
                    <td><input type="text" id="date_esteghrar" size="10" maxlength="10" class="en"></td>
                </tr>
                <tr>
                    <td>تاریخ پایان قرارداد</td>
                    <td><input type="text" id="date_end" size="10" maxlength="10" class="en"></td>
                </tr>
                <tr>
                    <td>حوزه فعالیت</td>
                    <td>
                        <?php
                            $sth = $conn->prepare("SELECT * FROM hoze");
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<select id='hoze_list' style='width:90%' onchange='ChangeZamine()'>";
                            echo "<option value=''>کلیه حوزه ها</option>";
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>زمینه فعالیت</td>
                    <td>
                        <select id='zamine_list' style='width:90%'>
                            <option value=''>کلیه زمینه ها</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>کارشناس</td>
                    <td>
                        <?php
                            //$sth = $conn->prepare("SELECT * FROM nazerin");
                            if( $_COOKIE["user_type"]=="admin_all" )
                            {
                                $sth = $conn->prepare("SELECT * FROM users WHERE user_type='nazer'");
                            }
                            else
                            {
                                $sth = $conn->prepare("SELECT * FROM users WHERE user_type='nazer' AND center_code=".$_COOKIE["center_code"]);
                            }                                   
                            $sth->execute();
                            $result = $sth->fetchAll();
                            echo "<select id='nazer_list' style='width:90%'>";
                            echo "<option value=''>کلیه کارشناسان</option>";
                            foreach($result as $row)
                            {
                                echo "<option value=".$row["code"].">".$row["name"]."</option>";
                            }
                            echo "</select>";
                        ?>
                    </td>
                </tr>
                <!--<tr>
                    <td>وضعیت مالی</td>
                    <td>
                        <select id='mali' style='width:40%'>";
                            <option value="">کلیه شرکت ها</option>
                            <option value="yes">شرکت های بدهکار</option>
                            <option value="no">شرکت های غیر بدهکار</option>
                        </select>
                    </td>
                </tr>-->
                <tr>
                    <td>جنسیت مدیر عامل</td>
                    <td>
                        <select id='sex' style='width:20%'>";
                            <option value="">کلیه افراد</option>
                            <option value="male">آقا</option>
                            <option value="female">خانم</option>
                        </select>
                    
                        <!--<p><input type="radio" name="mali" value="all" checked >&nbsp&nbsp&nbspهمه شرکت ها</p> 
                        <p><input type="radio" name="mali" value="yes" >&nbsp&nbsp&nbspشرکت های بدهکار</p>
                        <p><input type="radio" name="mali" value="no">&nbsp&nbsp&nbspشرکت های غیر بدهکار</p>-->
                    </td>
                </tr>
                <tr>
                    <td>تیتر گزارش</td>
                    <td>
                        <input type="text" size="50" maxlength="50" id="title" value="گزارش">
                    </td>
                </tr>
            </table>
            <div id="btn-holder">
                <a href="#" id="btn-rep" onclick ="Make_Report()" >ایجاد گزارش</a>
            </div>
        </div>
    
    
    </div>
    
    <script>
    
        
       if ( getCookie("user_type")!="admin_all" )
       {
            $( "#state_list" ).prop( "disabled", true );
            $( "#state_list" ).val( getCookie("state_code") );
            $( "#center_list" ).prop( "disabled", true );
            $( "#center_list" ).val( getCookie("center_code") );
       }
       else
       {
            $( "#state_list" ).prop( "disabled", false );
            $( "#state_list" ).val( "" );
            $( "#center_list" ).prop( "disabled", false );
            $( "#center_list" ).value( "" );
       }
       if ( getCookie("user_type")=="admin_state" )
       {
            $( "#center_list" ).prop( "disabled", false );
            $( "#center_list" ).val( getCookie("center_code") );
       }

       function ChangeZamine()
       {
             var hoze=document.getElementById("hoze_list").value;
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('hoze', hoze);
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_zamine.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#zamine_list').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('zamine_list');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "کلیه زمینه ها";
                        select.appendChild(opt);
                        var i;
                        for (i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                    else
                    {
                        select = document.getElementById('zamine_list');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "کلیه زمینه ها";
                        select.appendChild(opt);
                    }
                 }
              });
       }


       function ChangeCenter()
       {
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#state_list").val());
             form_data.append('filter', filter);
             $.ajax({
                 url: 'includes/filter_center.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#center_list').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('center_list');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "کلیه مراکز";
                        select.appendChild(opt);
                        for (var i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                    else
                    {
                        select = document.getElementById('center_list');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "کلیه مراکز";
                        select.appendChild(opt);
                    }
                 }
              });
       }

       
       function Make_Report()
       {
            str="";
            if ( $("#state_list").val()!="" )
            {
                str=str+"&ste="+$("#state_list").val();
            }
            if ( $("#center_list").val()!="" )
            {
                str=str+"&cnt="+$("#center_list").val();
            }
            if ( $("#type_list").val()!="" )
            {
                str=str+"&type="+$("#type_list").val();
            }
            if ( $("#date_esteghrar").val()!="" )
            {
                str=str+"&esg="+$("#date_esteghrar").val();
            }
            if ( $("#date_end").val()!="" )
            {
                str=str+"&dend="+$("#date_end").val();
            }
            if ( $("#hoze_list").val()!="" )
            {
                str=str+"&hoze="+$("#hoze_list").val();
            }
            if ( $("#hoze_list").val()!="" && $("#zamine_list").val()!="" )
            {
                str=str+"&zamine="+$("#zamine_list").val();
            }
            if ( $("#nazer_list").val()!="" )
            {
                str=str+"&nazer="+$("#nazer_list").val();
            }
            /*if ( $("#mali").val()!="" )
            {
                str=str+"&mali="+$("#mali").val();
            }*/
            if ( $("#sex").val()!="" )
            {
                str=str+"&sex="+$("#sex").val();
            }
            setCookie("title",$("#title").val(),1);
            var win = window.open("includes/view_report.php?rp=1"+str, '_blank');
            win.focus();
       }
       
    </script>
    
    
</body>
</html>


