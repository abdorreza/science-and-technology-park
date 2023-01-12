<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
	</head>
<body>
    <div id="snackbar"></div>
    <?php
        require_once "functions.php";
        $conn=connect_to_database();
    ?>
    <div id="CorpFilter">
        <form action="includes/search-result.php" method="get">
        <table id="FilterTable">
            <tr>
                <td width="25%">
                    <?php
                        echo "<select id='StateFilter' style='width:100%;' onchange='ChangeCenter()'>";
                        echo "<option value=''>تمامی استان ها</option>";
                        $sth = $conn->prepare("SELECT * FROM states");
                        $sth->execute();
                        $result = $sth->fetchAll();
                        foreach($result as $row)
                        {
                            echo "<option value=".$row["code"].">".$row["name"]."</option>";
                        }
                        echo "</SELECT>";
                    ?>
                </td>
                <td width="25%">
                        <select id='CenterFilter' style='width:100%'>
                            <option value=''>تمامی مراکز</option>
                        </select>
                </td>
                <td width="15%">
                        <select id='ModirFilter' style='width:100%'>
                            <option value=''>تمامی مدیران</option>
                            <option value='admin_state'>مدیران موسسات</option>
                            <option value='admin'>مدیران مراکز</option>
                            <option value='nazer'>کارشناسان</option>
                        </select>
                </td>
                <td width="25%">
                    <input type="text" id="name" size="50" maxlength="50" placeholder="نام و نام خانوادگی">
                </td>
                <td width="10%">
                    <a href="#" id="DoneFilter" class="btns" onclick ="SetFilter()" >جستجو</a>
                </td>
            </tr>
        </table>
        </form>
    </div>
    <?php 
        $_COOKIE["StateFilter"]="";
        $_COOKIE["CenterFilter"]="";
        $_COOKIE["name"]="";
    ?>
    <div class="area3">
        <?php
          //include 'includes/con-result.php';
        ?>
    </div>
    
    
    <!-- Waiting Page -->    
    <div id="Waiting">
        <div id="popupContact">
             <div class="formWait">
             <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>
    
    
    <script>
       
       function ChangeCenter()
       {
             var filter=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#StateFilter").val());
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
                    $('#CenterFilter').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('CenterFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی مراکز";
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
                        select = document.getElementById('CenterFilter');
                        var opt = document.createElement('option');
                        opt.value = "";
                        opt.innerHTML = "تمامی مراکز";
                        select.appendChild(opt);
                    }
                 }
              });
       }
       
       
       function SetFilter()
       {
            $("#Waiting").css("display","block");
            if ( $("#StateFilter").val()==null )
            {
               setCookie("StateFilter","",1);
            }
            else
            {
                setCookie("StateFilter",$("#StateFilter").val(),1);
            } 
            if ( $("#CenterFilter").val()==null )
            {
                setCookie("CenterFilter","",1);
            }
            else
            {
                setCookie("CenterFilter",$("#CenterFilter").val(),1);
            }
            
            if ( $("#ModirFilter").val()==null )
            {
                setCookie("modir","",1);
            }
            else
            {
                setCookie("modir",$("#ModirFilter").val(),1);
            }
            
            if ( $("#name").val()==null )
            {
                setCookie("name","",1);
            }
            else
            {
                setCookie("name",$("#name").val(),1);
            }
            $(".area3").load("includes/con-result.php");
            setTimeout(function()
            { 
                $("#Waiting").css("display","none");
            }, 400);
       }
    
    </script>
    
</body>
</html>


