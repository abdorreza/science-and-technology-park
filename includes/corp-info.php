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
	</head>
<body>
    <div id="snackbar"></div>
    <?php
        if ( $_COOKIE["user_type"]!="corp" && $_COOKIE["user_type"]!="sarmaye" && $_COOKIE["user_type"]!="moshaver")
        {
        require_once "functions.php";
        $conn=connect_to_database();
    ?>
    
    <div id="area-back">
    
    <div id="SearchGroup">
            <table id="FilterTable">
                <tr>
                    <td width="25%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                $sth = $conn->prepare("SELECT * FROM states");
                                $sth->execute();
                                $result = $sth->fetchAll();
                                echo "<select id='all_states' style='width:100%' onchange='ChangeStateFilter()'>";
                                    echo "<option value=''>شرکت های کلیه استان ها</option>";
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> شرکت های ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                    <td width="25%">
                        <?php
                            if ( $_COOKIE["user_type"]=="admin_all" )
                            {
                                echo "<select id='all_centers' style='width:100%' onchange='ChangeCenterFilter()'>";
                                    echo "<option value=''>شرکت های کلیه مراکز</option>";
                                echo "</select>";
                            }
                            else
                            if ( $_COOKIE["user_type"]=="admin_state" )
                            {
                                $sth = $conn->prepare("SELECT * FROM centers WHERE state_code=:state_code");
                                $sth->bindValue(':state_code', $_COOKIE["state_code"]);
                                $sth->execute();
                                $result = $sth->fetchAll();
                                echo "<select id='all_centers' style='width:100%' onchange='ChangeCenterFilter()'>";
                                    echo "<option value=''>شرکت های کلیه مراکز</option>";
                                    foreach($result as $row)
                                    {
                                        echo "<option value=".$row["code"]."> شرکت های ".$row["name"]."</option>";
                                    }
                                echo "</select>";
                            }
                        ?>
                    </td>
                    <td width="25%">
                        <select id='all_corps' style='width:100%' onchange='ChangeCorpFilter()'>
                            <option value='corp'>شرکت های ایده پرداز</option>
                            <option value='sarmaye'>شرکت های سرمایه گذار</option>
                            <option value='moshaver'>شرکت های مشاور</option>
                        </select>
                    </td>
                    <td width="25%">
                        <input type="text" id="SearchTable" size="30" onkeyup="SearchTableItem()" placeholder="جستجو...">
                    </td>
                </tr>
            </table>
    </div>

    <?php 
        $_COOKIE["filter1"]="";
        $_COOKIE["filter2"]="";
        $_COOKIE["filter3"]="corp"; 
    ?>
    <div class="area3">
       <?php include 'includes/corp-info-list.php'; ?> 
    </div>
    
    </div>
    
    <?php
        }
    ?>
    
    <!-- *************************** -->
    <!-- Popup Window for New Center -->
    <!-- *************************** -->
    <div id="PopupWindow4">
        <div id="Popupwin4">
             <div class="form44">
             
                 <input type="hidden" id="NewEdit">
                 <input type="hidden" id="UserCode">
                 <input type="hidden" id="StateCode">
                 <input type="hidden" id="CenterCode">
                 <input type="hidden" id="CorpCode">
                 
                <div class="tab">
                   <button class="tablinks" onclick="openPage(event, 'page1')" id="defaultOpen">اطلاعات ثبتی شرکت</button>
                   <button class="tablinks" onclick="openPage(event, 'page2')">زمینه فعالیت ، ایده محوری و محصولات</button>
                   <button class="tablinks" onclick="openPage(event, 'page3')">سوابق علمی و فنی و انتشارات</button>
                   <button class="tablinks" onclick="openPage(event, 'page4')">استقرار شرکت</button>
                   <!--
                   <?php if ( $_COOKIE["state_code"]==1 ) { ?>
                       <button class="tablinks" onclick="openPage(event, 'page5')">کارشناس / اعتبارات</button>
                       <button class="tablinks" onclick="openPage(event, 'page6')">وضعیت مالی</button>
                   <?php } ?>
                   -->
                 </div>
                 
                 <div id="page1" class="tabcontent"> <!-- Page 1 -->
                     <table id="input-corp-table">
                         <tr>
                             <td width="45%">
                                 <label class="lazem">نام شرکت
                                     <input type="text" size="50" maxlength="50" id="name-sherkat" disabled>
                                 </label>
                             </td> 
                             <td width="15%">
                                 <label>شماره ثبت
                                     <input type="text" class="en" size="10" maxlength="10" id="shomare-sabt" >
                                 </label> 
                             </td>
                             <td width="16%">
                                 <label>تاریخ ثبت
                                     <input type="text" class="en" size="10" maxlength="10" id="date-sabt" onclick="PersianDatePicker.Show(this, '1397/01/01');" >
                                 </label>
                             </td>
                             <td>
                                 <label>نوع شرکت
                                     <select id="sherkat-type" style="width:150px;">
                                         <option value="">انتخاب نوع شرکت...</option>
                                         <option value="مسئولیت محدود">مسئولیت محدود</option>
                                         <option value="سهامی خاص">سهامی خاص</option>
                                         <option value="سهامی عام">سهامی عام</option>
                                         <option value="تعاونی">تعاونی</option>
                                     </select>
                                 </label> 
                             </td>
                         </tr> 
                     </table>
                     <table id="input-corp-table">
                         <tr>
                             <td width="15%">
                                 <label>شناسه ملی
                                     <input type="text" class="en" size="20" maxlength="20" id="shenase-melli" >
                                 </label> 
                             </td>
                             <td width="15%">
                                 <label>کد اقتصادی
                                     <input type="text" class="en" size="20" maxlength="20" id="code-eghtesadi" >
                                 </label> 
                             </td>
                             <td width="12%">
                                 <label>تلفن
                                     <input type="text" class="en" size="15" maxlength="15" id="tel" >
                                 </label> 
                             </td>
                             <td width="12%">
                                 <label>فکس
                                     <input type="text" class="en" size="15" maxlength="15" id="fax" >
                                 </label> 
                             </td>
                         </tr>
                     </table>
                     <table id="input-corp-table">
                         <tr>
                             <td width="42%">
                                 <label>ایمیل
                                     <input type="text" class="en" size="50" maxlength="50" id="email" >
                                 </label> 
                             </td>
                             <td width="45%">
                                 <label>وب سایت
                                     <input type="text" class="en" size="50" maxlength="50" id="website" >
                                 </label> 
                             </td>
                             <td width="15%">
                             </td>
                         </tr>
                     </table>
                     <table id="input-corp-table">
                         <tr>
                             <td width="22%">
                                 <label class="lazem">همراه مدیر عامل
                                     <input type="text" class="en" size="15" maxlength="15" id="mobile" >
                                 </label> 
                             </td>
                             <td width="12%">
                                 <label class="upload-btn" onclick="ShowFileManage('Modir-Pic');">
                                     تصویر مدیر عامل
                                 </label>
                             </td>
                             <td>
                                 <img id="modir-pic" src="../images/corps/modir/no-image.jpg"> 
                             </td>
                     </table>
                     <table id="input-corp-table">
                         <tr>
                             <td width="80%">
                                 <label class="lazem">آدرس
                                     <input type="text" size="150" maxlength="150" id="address" >
                                 </label> 
                             </td>
                         </tr>
                     </table>
                     <p class="lbl-member"><a href="#" id="add" class="btns" onclick ="AddCorpRow('member','GetCorpMembers')" >+</a>ثبت اعضای شرکت<lable class="lazem1"> [ثبت اطلاعات مدیرعامل ضروری است]</lable></p>
                     <div class="member-holder member1"> <!-- Member1 -->
                         <input type="hidden" id="sex1">
                         <input type="hidden" id="father1">
                         <input type="hidden" id="bdate1">
                         <input type="hidden" id="code-melli1">
                         <input type="hidden" id="madrak1">
                         <input type="hidden" id="gerayesh1">
                         <input type="hidden" id="takhasos1">
                         <input type="hidden" id="nezam1">
                         <input type="hidden" id="hamkari1">
                         <input type="hidden" id="note1">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">1</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name1" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat1" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <!--<a href="#" id="cancle" class="btns" onclick ="ShowCorpRow('member','member','GetCorpMembers',1)" ><img src='../images/edit.png'></a>-->
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',1)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',1)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member2"> <!-- Member2 -->
                         <input type="hidden" id="sex2">
                         <input type="hidden" id="father2">
                         <input type="hidden" id="bdate2">
                         <input type="hidden" id="code-melli2">
                         <input type="hidden" id="madrak2">
                         <input type="hidden" id="gerayesh2">
                         <input type="hidden" id="takhasos2">
                         <input type="hidden" id="nezam2">
                         <input type="hidden" id="hamkari2">
                         <input type="hidden" id="note2">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">2</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name2" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat2" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',2)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',2)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder member3"> <!-- Member3 -->
                         <input type="hidden" id="sex3">
                         <input type="hidden" id="father3">
                         <input type="hidden" id="bdate3">
                         <input type="hidden" id="code-melli3">
                         <input type="hidden" id="madrak3">
                         <input type="hidden" id="gerayesh3">
                         <input type="hidden" id="takhasos3">
                         <input type="hidden" id="nezam3">
                         <input type="hidden" id="hamkari3">
                         <input type="hidden" id="note3">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">3</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name3" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat3" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',3)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',3)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member4"> <!-- Member4 -->
                         <input type="hidden" id="sex4">
                         <input type="hidden" id="father4">
                         <input type="hidden" id="bdate4">
                         <input type="hidden" id="code-melli4">
                         <input type="hidden" id="madrak4">
                         <input type="hidden" id="gerayesh4">
                         <input type="hidden" id="takhasos4">
                         <input type="hidden" id="nezam4">
                         <input type="hidden" id="hamkari4">
                         <input type="hidden" id="note4">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">4</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name4" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat4" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',4)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',4)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder member5"> <!-- Member5 -->
                         <input type="hidden" id="sex5">
                         <input type="hidden" id="father5">
                         <input type="hidden" id="bdate5">
                         <input type="hidden" id="code-melli5">
                         <input type="hidden" id="madrak5">
                         <input type="hidden" id="gerayesh5">
                         <input type="hidden" id="takhasos5">
                         <input type="hidden" id="nezam5">
                         <input type="hidden" id="hamkari5">
                         <input type="hidden" id="note5">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">5</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name5" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat5" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',5)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',5)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member6"> <!-- Member6 -->
                         <input type="hidden" id="sex6">
                         <input type="hidden" id="father6">
                         <input type="hidden" id="bdate6">
                         <input type="hidden" id="code-melli6">
                         <input type="hidden" id="madrak6">
                         <input type="hidden" id="gerayesh6">
                         <input type="hidden" id="takhasos6">
                         <input type="hidden" id="nezam6">
                         <input type="hidden" id="hamkari6">
                         <input type="hidden" id="note6">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">6</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name6" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat6" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',6)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',6)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder member7"> <!-- Member7 -->
                         <input type="hidden" id="sex7">
                         <input type="hidden" id="father7">
                         <input type="hidden" id="bdate7">
                         <input type="hidden" id="code-melli7">
                         <input type="hidden" id="madrak7">
                         <input type="hidden" id="gerayesh7">
                         <input type="hidden" id="takhasos7">
                         <input type="hidden" id="nezam7">
                         <input type="hidden" id="hamkari7">
                         <input type="hidden" id="note7">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">7</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name7" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat7" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',7)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',7)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member8"> <!-- Member8 -->
                         <input type="hidden" id="sex8">
                         <input type="hidden" id="father8">
                         <input type="hidden" id="bdate8">
                         <input type="hidden" id="code-melli8">
                         <input type="hidden" id="madrak8">
                         <input type="hidden" id="gerayesh8">
                         <input type="hidden" id="takhasos8">
                         <input type="hidden" id="nezam8">
                         <input type="hidden" id="hamkari8">
                         <input type="hidden" id="note8">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">8</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name8" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat8" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',8)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',8)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder member9"> <!-- Member9 -->
                         <input type="hidden" id="sex9">
                         <input type="hidden" id="father9">
                         <input type="hidden" id="bdate9">
                         <input type="hidden" id="code-melli9">
                         <input type="hidden" id="madrak9">
                         <input type="hidden" id="gerayesh9">
                         <input type="hidden" id="takhasos9">
                         <input type="hidden" id="nezam9">
                         <input type="hidden" id="hamkari9">
                         <input type="hidden" id="note9">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">9</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name9" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat9" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',9)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',9)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member10"> <!-- Member10 -->
                         <input type="hidden" id="sex10">
                         <input type="hidden" id="father10">
                         <input type="hidden" id="bdate10">
                         <input type="hidden" id="code-melli10">
                         <input type="hidden" id="madrak10">
                         <input type="hidden" id="gerayesh10">
                         <input type="hidden" id="takhasos10">
                         <input type="hidden" id="nezam10">
                         <input type="hidden" id="hamkari10">
                         <input type="hidden" id="note10">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">10</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name10" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat10" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',10)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',10)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder member11"> <!-- Member11 -->
                         <input type="hidden" id="sex11">
                         <input type="hidden" id="father11">
                         <input type="hidden" id="bdate11">
                         <input type="hidden" id="code-melli11">
                         <input type="hidden" id="madrak11">
                         <input type="hidden" id="gerayesh11">
                         <input type="hidden" id="takhasos11">
                         <input type="hidden" id="nezam11">
                         <input type="hidden" id="hamkari11">
                         <input type="hidden" id="note11">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">11</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name11" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat11" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',11)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',11)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 member12"> <!-- Member12 -->
                         <input type="hidden" id="sex12">
                         <input type="hidden" id="father12">
                         <input type="hidden" id="bdate12">
                         <input type="hidden" id="code-melli12">
                         <input type="hidden" id="madrak12">
                         <input type="hidden" id="gerayesh12">
                         <input type="hidden" id="takhasos12">
                         <input type="hidden" id="nezam12">
                         <input type="hidden" id="hamkari12">
                         <input type="hidden" id="note12">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="2%">
                                     <p class="member-no">12</p>
                                 </td>
                                 <td width="23%">
                                     <label>نام و نام خانوادگی
                                         <input type="text" size="50" maxlength="50" id="name12" disabled>
                                     </label>
                                 </td>                            
                                 <td width="15%">
                                     <label>سمت
                                         <input type="text" size="20" maxlength="20" id="semat12" disabled>
                                     </label>
                                 </td>                            
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('member','member','GetCorpMembers',12)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('member','member',12)" ><img src='../images/delete.png'></a>
                                 </td>                            
                             </tr>
                         </table>
                     </div>
                     <br/>
                 </div> <!--Page1-->
                 
 
                 
                 <div id="page2" class="tabcontent"> <!-- Page 3 -->
                     <table id="input-corp-table">
                         <tr>
                             <td>
                                 <label class="lazem">حوزه فعالیت
                                     <select id="hoze" style="width:240px;" onchange="ChangeZamine()">
                                         <?php                                
                                             require_once "functions.php";
                                             $conn=connect_to_database();
                                             $sth = $conn->prepare("SELECT * FROM hoze");
                                             $sth->execute();
                                             $result = $sth->fetchAll();
                                             echo "<option value=''>انتخاب حوزه فعالیت...</option>";
                                             foreach($result as $row)
                                             {
                                                 echo "<option value=".$row['code'].">".$row['name']."</option>";
                                             }
                                         ?>
                                     </select>
                                 </label> 
                             </td>
                             <td>
                                 <label>زمینه فعالیت
                                     <select id="zamine" style="width:240px;">
                                         <option value="">انتخاب زمینه فعالیت ...</option>
                                     </select>
                                 </label> 
                             </td>
                         </tr>
                     </table>
                     <table id="input-corp-table">
                         <tr>
                             <td width="7%"  class="lazem">
                                 ایده محوری
                             </td>
                             <td>
                                 <textarea id="idea" style="padding:5px;border:1px solid gray;border-radius:5px;" rows="4" cols="50"></textarea>
                             </td>
                         </tr>
                         <tr>
                             <td width="7%">
                                    زمینه مشاوره
                             </td>
                             <td>
                                 <select id="moshavere" style="width:240px;">
                                    <option value=''>انتخاب زمینه مشاوره...</option>
                                    <option value='تجاری سازی'>تجاری سازی</option>
                                    <option value='انتقال فناوری'>انتقال فناوری</option>
                                    <option value='حقوقی'>حقوقی</option>
                                    <option value='بازاریابی'>بازاریابی</option>
                                    <option value='حسابداری-مالی'>حسابداری-مالی</option>
                                 </select>
                             </td>
                         </tr>
                     </table>
                     <p class="lbl-member"><a href="#" id="add" class="btns" onclick ="AddCorpRow('cproduct','GetCorpProducts')" >+</a>ثبت محصول</p>
                     <table id="input-corp-table">
                         <tr class="cproduct1">
                             <td width="6%">
                                 محصول 1
                             </td>
                             <td width="35%">
                                <input type="text" size="115" maxlength="115" id="product1"disabled>
                             </td>
                             <td width="9%">
                                 <!--<a href="#" id="cancle" class="btns" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',1)" >...</a>-->
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',1)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',1)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                         <tr class="cproduct2">
                             <td width="6%">
                                 محصول 2
                             </td>
                             <td width="35%">
                                <input type="text" size="115" maxlength="115" id="product2" disabled>
                             </td>
                             <td width="9%">
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',2)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',2)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                         <tr class="cproduct3">
                             <td width="6%">
                                 محصول 3
                             </td>
                             <td width="35%">
                                <input type="text" size="115" maxlength="115" id="product3" disabled>
                             </td>
                             <td width="9%">
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',3)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',3)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                         <tr class="cproduct4">
                             <td width="6%">
                                 محصول 4
                             </td>
                             <td width="35%">
                                <input type="text" size="115" maxlength="115" id="product4" disabled>
                             </td>
                             <td width="9%">
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',4)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',4)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                         <tr class="cproduct5">
                             <td width="6%">
                                 محصول 5
                             </td>
                             <td width="35%">
                                <input type="text" size="115" maxlength="115" id="product5" disabled>
                             </td>
                             <td width="9%">
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',5)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',5)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                         <tr class="cproduct6">
                             <td width="6%">
                                 محصول 6
                             </td>
                             <td width="35%">
                                 <input type="text" size="115" maxlength="115" id="product6" disabled>
                             </td>
                             <td width="9%">
                                 <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('product','cproduct','GetCorpProducts',6)" ><img src='../images/edit.png'></a>
                                 <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('product','cproduct',6)" ><img src='../images/delete.png'></a>
                             </td>
                         </tr>
                     </table>
                 </div> <!--Page3-->
                 
                 <div id="page3" class="tabcontent">   <!-- Page 4 -->
                     <p class="lbl-member"><a href="#" id="add" class="btns" onclick ="AddCorpRow('sabeghe','GetCorpSabeghe')" >+</a>ثبت سوابق علمی و فنی شرکت یا موسسین</p>
                     <div class="member-holder sabeghe1">
                         <input type="hidden" id="zaman1">
                         <input type="hidden" id="etb1">
                         <input type="hidden" id="karfarma1">
                         <input type="hidden" id="dastavard1">
                         <input type="hidden" id="mojri1">
                         <input type="hidden" id="note-faaliat1">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان طرح فعالیت فناورانه
                                         <input type="text" size="50" maxlength="50" id="faaliat1" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>وضعیت
                                         <input type="text" size="30" maxlength="30" id="vaziat1" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <!--<a href="#" id="cancle" class="btns" onclick ="ShowCorpRow('sabeghe','sabeghe','GetCorpSabeghe',1)" >...</a>-->
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('sabeghe','sabeghe','GetCorpSabeghe',1)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('sabeghe','sabeghe',1)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 sabeghe2">
                         <input type="hidden" id="zaman2">
                         <input type="hidden" id="etb2">
                         <input type="hidden" id="karfarma2">
                         <input type="hidden" id="dastavard2">
                         <input type="hidden" id="mojri2">
                         <input type="hidden" id="note-faaliat2">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان طرح فعالیت فناورانه
                                         <input type="text" size="50" maxlength="50" id="faaliat2" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>وضعیت
                                         <input type="text" size="30" maxlength="30" id="vaziat2" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('sabeghe','sabeghe','GetCorpSabeghe',2)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('sabeghe','sabeghe',2)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder sabeghe3">
                         <input type="hidden" id="zaman3">
                         <input type="hidden" id="etb3">
                         <input type="hidden" id="karfarma3">
                         <input type="hidden" id="dastavard3">
                         <input type="hidden" id="mojri3">
                         <input type="hidden" id="note-faaliat3">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان طرح فعالیت فناورانه
                                         <input type="text" size="50" maxlength="50" id="faaliat3" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>وضعیت
                                         <input type="text" size="30" maxlength="30" id="vaziat3" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('sabeghe','sabeghe','GetCorpSabeghe',3)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('sabeghe','sabeghe',3)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 sabeghe4">
                         <input type="hidden" id="zaman4">
                         <input type="hidden" id="etb4">
                         <input type="hidden" id="karfarma4">
                         <input type="hidden" id="dastavard4">
                         <input type="hidden" id="mojri4">
                         <input type="hidden" id="note-faaliat4">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان طرح فعالیت فناورانه
                                         <input type="text" size="50" maxlength="50" id="faaliat4" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>وضعیت
                                         <input type="text" size="30" maxlength="30" id="vaziat4" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('sabeghe','sabeghe','GetCorpSabeghe',4)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('sabeghe','sabeghe',4)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <p class="lbl-member"><a href="#" id="add" class="btns" onclick ="AddCorpRow('montasher','GetCorpEnteshar')" >+</a>ثبت سوابق انتشارات علمی و فنی</p>
                     <div class="member-holder montasher1">
                         <input type="hidden" id="nasher1">
                         <input type="hidden" id="date-e1">
                         <input type="hidden" id="note-enteshar1">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان
                                         <input type="text" size="50" maxlength="50" id="onvan1" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>نویسنده یا مترجم
                                         <input type="text" size="30" maxlength="30" id="writer1" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <!--<a href="#" id="cancle" class="btns" onclick ="ShowCorpRow('enteshar','montasher','GetCorpEnteshar',1)" >...</a>-->
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('enteshar','montasher','GetCorpEnteshar',1)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('enteshar','montasher',1)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 montasher2">
                         <input type="hidden" id="nasher2">
                         <input type="hidden" id="date-e2">
                         <input type="hidden" id="note-enteshar2">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان
                                         <input type="text" size="50" maxlength="50" id="onvan2" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>نویسنده یا مترجم
                                         <input type="text" size="30" maxlength="30" id="writer2" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('enteshar','montasher','GetCorpEnteshar',2)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('enteshar','montasher',2)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder montasher3">
                         <input type="hidden" id="nasher3">
                         <input type="hidden" id="date-e3">
                         <input type="hidden" id="note-enteshar3">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان
                                         <input type="text" size="50" maxlength="50" id="onvan3" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>نویسنده یا مترجم
                                         <input type="text" size="30" maxlength="30" id="writer3" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('enteshar','montasher','GetCorpEnteshar',3)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('enteshar','montasher',3)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 montasher4">
                         <input type="hidden" id="nasher4">
                         <input type="hidden" id="date-e4">
                         <input type="hidden" id="note-enteshar4">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="30%">
                                     <label>عنوان
                                         <input type="text" size="50" maxlength="50" id="onvan4" disabled>
                                     </lable>
                                 </td>
                                 <td width="20%">
                                     <label>نویسنده یا مترجم
                                         <input type="text" size="30" maxlength="30" id="writer4"disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('enteshar','montasher','GetCorpEnteshar',4)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('enteshar','montasher',4)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                 </div> <!--Page4-->
                 
                 <div id="page4" class="tabcontent">  <!-- Page 5 -->
                     <table id="input-corp-table">
                         <tr>
                             <td width="20%">
                                 <label>تاریخ استقرار
                                     <input type="text" class="en" size="10" maxlength="10" id="date-esteghrar" onclick="PersianDatePicker.Show(this, '1397/01/01');" >
                                 </label>
                             </td>
                             <td width="20%">
                                 <label>تاریخ پایان قرارداد
                                     <input type="text" class="en" size="10" maxlength="10" id="date-end" onclick="PersianDatePicker.Show(this, '1397/01/01');" >
                                 </label>
                             </td>
                             <td width="64%"">
                             </td>
                     </table>
                     <p class="lbl-member"><a href="#" id="add" class="btns" onclick ="AddCorpRow('mostaghar','GetCorpEsteghrar')" >+</a>ثبت محل استقرار</p>
                     <div class="member-holder mostaghar1">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="50%">
                                     <label>محل استقرار 1
                                         <input type="text" size="90" maxlength="90" id="esteghrar1" disabled>
                                     </lable>
                                 </td>
                                 <td width="12%">
                                     <label>شماره اتاق
                                         <input type="text" size="6" maxlength="6" id="room1" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <!--<a href="#" id="cancle" class="btns" onclick ="ShowCorpRow('esteghrar','mostaghar','GetCorpEsteghrar',1)" >...</a>-->
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('esteghrar','mostaghar','GetCorpEsteghrar',1)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('esteghrar','mostaghar',1)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 mostaghar2">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="50%">
                                     <label>محل استقرار 2
                                         <input type="text" size="90" maxlength="90" id="esteghrar2" disabled>
                                     </lable>
                                 </td>
                                 <td width="12%">
                                     <label>شماره اتاق
                                         <input type="text" size="6" maxlength="6" id="room2" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('esteghrar','mostaghar','GetCorpEsteghrar',2)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('esteghrar','mostaghar',2)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder mostaghar3">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="50%">
                                     <label>محل استقرار 3
                                         <input type="text" size="90" maxlength="90" id="esteghrar3" disabled>
                                     </lable>
                                 </td>
                                 <td width="12%">
                                     <label>شماره اتاق
                                         <input type="text" size="6" maxlength="6" id="room3" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('esteghrar','mostaghar','GetCorpEsteghrar',3)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('esteghrar','mostaghar',3)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                     <div class="member-holder1 mostaghar4">
                         <table id="input-corp-table">
                             <tr>
                                 <td width="50%">
                                     <label">محل استقرار 4
                                         <input type="text" size="90" maxlength="90" id="esteghrar4" disabled>
                                     </lable>
                                 </td>
                                 <td width="12%">
                                     <label">شماره اتاق
                                         <input type="text" size="6" maxlength="6" id="room4" disabled>
                                     </lable>
                                 </td>
                                 <td width="5%">
                                     <a href="#" class="rowsEditDelete" onclick ="ShowCorpRow('esteghrar','mostaghar','GetCorpEsteghrar',4)" ><img src='../images/edit.png'></a>
                                     <a href="#" class="rowsEditDelete" onclick ="DeleteCorpRow('esteghrar','mostaghar',4)" ><img src='../images/delete.png'></a>
                                 </td>
                             </tr>
                         </table>
                     </div>
                 </div> <!--Page5-->
                 
                 <div id="page5" class="tabcontent">  <!-- Page 6 -->
                     <table id="input-corp-table">
                         <tr>
                             <td width="35%">
                                 <label>کارشناس
                                         <?php                                
                                             require_once "functions.php";
                                             $conn=connect_to_database();
                                             //$sth = $conn->prepare("SELECT * FROM nazerin");
                                             if( $_COOKIE["user_type"]=="admin_all" )
                                             {
                                                $sth= $conn->prepare("SELECT * FROM users WHERE user_type='nazer'");
                                             }
                                             else
                                             {
                                                $sth= $conn->prepare("SELECT * FROM users WHERE user_type='nazer' AND center_code=".$_COOKIE["center_code"]);
                                             }
                                             $sth->execute();
                                             $result = $sth->fetchAll();
                                             echo "<select id='nazer' style='width:280px;'>";
                                                 echo "<option value=''>انتخاب کارشناس...</option>";
                                                 foreach($result as $row)
                                                 {
                                                     echo "<option value=".$row['code'].">".$row['name']."</option>";
                                                 }
                                             echo "</select>";
                                         ?>
                                 </label> 
                             </td>
                             <td width="65%">
                             </td>
                         </tr> 
                     </table>
                     <p class="lbl-member">تخصیص اعتبارات</p>
                     <table id="input-corp-table" style="width:100%;">
                         <tr style="background:#9eb1fd;">
                             <td width="6%">
                                 اعتبار کل
                             </td>
                             <td width="14%">
                                 <input type="text" class="en" size="15" maxlength="15" id="etebar" onkeyup="javascript:this.value=Comma(this.value);">
                             </td>
                             <td width="3%">
                                 تاریخ
                             </td>
                             <td width="10%">
                                 <input type="text" class="en" size="10" maxlength="10" id="date-etebar" onclick="PersianDatePicker.Show(this, '1397/01/01');">
                             </td>
                             <td width="5%">
                                 توضیحات
                             </td>
                             <td width="62%">
                                 <input type="text" size="80" maxlength="80" id="note-etebar" >
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 اعتبار اول
                             </td>
                             <td>
                                 <input type="text" class="en" size="15" maxlength="15" id="etebar1" onkeyup="javascript:this.value=Comma(this.value);">
                             </td>
                             <td>
                                 تاریخ
                             </td>
                             <td>
                                 <input type="text" class="en" size="10" maxlength="10" id="date-etebar1" onclick="PersianDatePicker.Show(this, '1397/01/01');">
                             </td>
                             <td>
                                 توضیحات
                             </td>
                             <td>
                                 <input type="text" size="80" maxlength="80" id="note-etebar1" >
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 اعتبار دوم
                             </td>
                             <td>
                                 <input type="text" class="en" size="15" maxlength="15" id="etebar2" onkeyup="javascript:this.value=Comma(this.value);">
                             </td>
                             <td>
                                 تاریخ
                             </td>
                             <td>
                                 <input type="text" class="en" size="10" maxlength="10" id="date-etebar2" onclick="PersianDatePicker.Show(this, '1397/01/01');">
                             </td>
                             <td>
                                 توضیحات
                             </td>
                             <td>
                                 <input type="text" size="80" maxlength="80" id="note-etebar2" >
                             </td>
                         </tr>
                         <tr>
                             <td>
                                 اعتبار سوم
                             </td>
                             <td>
                                 <input type="text" class="en" size="15" maxlength="15" id="etebar3" onkeyup="javascript:this.value=Comma(this.value);">
                             </td>
                             <td>
                                 تاریخ
                             </td>
                             <td>
                                 <input type="text" class="en" size="10" maxlength="10" id="date-etebar3" onclick="PersianDatePicker.Show(this, '1397/01/01');">
                             </td>
                             <td>
                                 توضیحات
                             </td>
                             <td>
                                 <input type="text" size="80" maxlength="80" id="note-etebar3" >
                             </td>
                         </tr>
                     </table>
                 </div> <!--Page6-->
                 
                 <div id="page6" class="tabcontent">  <!-- Page 7 -->
                     <table id="input-corp-table" style="width:100%;">
                        <tr>
                            <td width="10%">
                                میزان بدهی
                            </td>
                            <td width="90%">
                                <input type="text" class="en" size="20" maxlength="20" id="bedehi" onkeyup="javascript:this.value=Comma(this.value);">
                            </td>
                        </tr>
                        <tr>
                            <td width="10%">
                                توضیحات
                            </td>
                            <td width="90%">
                                <textarea id="note-bedehi" class="MyText"></textarea>
                            </td>
                        </tr>
                     </table>

                 </div> <!--Page7-->

                
                <div class="btn-holder">
                    <a href="javascript:%20Save_Corp()" id="SaveCorpBtn" class="btns">ذخیره</a>
                    <a href="#" id="nosave" class="btns" onclick ="exit_new_info()" >انصراف</a>
                </div>
            </div>
        </div>
    </div>


    <!-- GetCorpMembers corp Members -->
    <div id="GetCorpMembers">
        <div id="popupContact">
             <div class="formMember">
             
             <div id="popup-header7"><h3>مشخصات عضو شرکت</h3></div>

                <br class="my-break"/>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            <lable class="lazem">سمت</lable>
                        </td>
                        <td>
                            <select id="semat" style="width:240px;">
                                <option value="">انتخاب سمت...</option>
                                <option value="مدیر عامل">مدیر عامل</option>
                                <option value="رئیس هیت مدیره">رئیس هیت مدیره</option>
                                <option value="عضو هیئت مدیره">عضو هیئت مدیره</option>
                                <option value="پرسنل">پرسنل</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="20%">
                            <lable class="lazem">نام و نام خانوادگی</lable>
                        </td>
                        <td width="8%">
                            <select id="sex" style="width:90px;">
                                <option value="">جنسیت...</option>
                                <option value="آقا">آقا</option>
                                <option value="خانم">خانم</option>
                            </select>
                        </td>
                        <td width="50%">
                            <input type="text" size="50" maxlength="50" id="name" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="10%">
                            نام پدر
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="father" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            تاریخ تولد
                        </td>
                        <td width="12%">
                            <input type="text" class="en" size="10" maxlength="10" id="bdate" onclick="PersianDatePicker.Show(this, '1397/01/01');" >
                        </td>
                        <td width="10%">
                            کد ملی
                        </td>
                        <td>
                            <input type="text" class="en" size="12" maxlength="12" id="code-melli" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            مدرک تحصیلی
                        </td>
                        <td width="24%">
                            <select id="madrak" style="width:240px;">
                                <option value="">انتخاب مدرک تحصیلی...</option>
                                <option value="دیپلم و زیر دیپلم">دیپلم و زیر دیپلم</option>
                                <option value="فوق دیپلم">فوق دیپلم</option>
                                <option value="کارشناسی">کارشناسی</option>
                                <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                            </select>
                        </td>
                        <td width="9%">
                            گرایش تحصیلی
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="gerayesh" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            تخصص
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="takhasos" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            وضعیت نظام وظیفه
                        </td>
                        <td width="24%">
                            <select id="nezam" style="width:200px;">
                                <option value="">انتخاب وضعیت نظام وظیفه...</option>
                                <option value="مشمول">مشمول</option>
                                <option value="معافیت پزشکی">معافیت پزشکی</option>
                                <option value="معافیت موقت">معافیت موقت</option>
                                <option value="موارد خاص">موارد خاص</option>
                                <option value="سایر">سایر</option>
                            </select>
                        </td>
                        <td width="10%">
                            نوع همکاری
                        </td>
                        <td>
                            <input type="text" size="30" maxlength="30" id="hamkari" >
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            توضیحات
                        </td>
                        <td>
                            <input type="text" size="120" maxlength="120" id="note-member" >
                        </td>
                    </tr>
                </table>
                <div class="btn-holder">
                    <a href="javascript:%20ShowRowInfo('member')" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpMembers')" >انصراف</a>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!-- AddCorpProduct corp Products -->    
    <div id="GetCorpProducts">
        <div id="popupContact">
             <div class="formProducts">
             
             <div id="popup-header7"><h3>محصول شرکت</h3></div>

                <br class="my-break"/>


                <table id="input-corp-table">
                    <tr>
                        <td width="12%">
                            <lable class="lazem">محصول</lable>
                        </td>
                        <td>
                            <!--<input type="text" size="125" maxlength="125" id="_product" >-->
                            <textarea id="_product" rows="10"></textarea>
                        </td>
                    </tr>
                </table>
                <table id="input-corp-table" style="margin-top:10%;">
                    <tr>
                        <td width="20%">
                             <label class="upload-btn" id="u-p1" onclick="ShowFileManage('Product1');">
                                 مدیریت فایل ها
                             </label>
                             <label class="upload-btn" id="u-p2" onclick="ShowFileManage('Product2');">
                                 مدیریت فایل ها
                             </label>
                             <label class="upload-btn" id="u-p3" onclick="ShowFileManage('Product3');">
                                 مدیریت فایل ها
                             </label>
                             <label class="upload-btn" id="u-p4" onclick="ShowFileManage('Product4');">
                                 مدیریت فایل ها
                             </label>
                             <label class="upload-btn" id="u-p5" onclick="ShowFileManage('Product5');">
                                 مدیریت فایل ها
                             </label>
                             <label class="upload-btn" id="u-p6" onclick="ShowFileManage('Product6');">
                                 مدیریت فایل ها
                             </label>

                        </td>
                        <td>
                            <!--<img id="product-image" src="#" alt="" />-->
                            <!--<div id="image-holder"></div>-->
                            <lable id="about-upload"></lable>
                        </td>
                    </tr>
                </table>

                <br class="my-break"/>
                <br class="my-break"/>
                <div class="btn-holder">
                    <a href="javascript:%20ShowRowInfo('product')" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="close_upload_manager()" >انصراف</a>
                    <!--<a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpProducts')" >بازگشت</a>-->
                    
                </div>
            </div>
        </div>
    </div>
    



    <!-- GetCorpSabeghe corp Sabeghe -->    
    <div id="GetCorpSabeghe">
        <div id="popupContact">
             <div class="formSabeghe">
             
             <div id="popup-header7"><h3>سابقه شرکت</h3></div>

                <br class="my-break"/>
                <table id="input-corp-table">
                    <tr>
                        <td width="15%">
                            <lable class="lazem">عنوان طرح فعالیت فناورانه</lable>
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="faaliat" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            وضعیت
                        </td>
                        <td>
                            <input type="text" size="30" maxlength="30" id="vaziat" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            زمان اجرا به ماه
                        </td>
                        <td>
                            <input type="text" class="en" size="4" maxlength="4" id="zaman" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            اعتبار به ریال
                        </td>
                        <td>
                            <input type="text" class="en" size="15" maxlength="15" id="etb" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            کارفرما
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="karfarma" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            دستاورد
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="dastavard" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            مجری/مجریان
                        </td>
                        <td>
                        <input type="text" size="50" maxlength="50" id="mojri" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            توضیحات
                        </td>
                        <td>
                        <input type="text" size="80" maxlength="80" id="note-faaliat" >
                        </td>
                    </tr>
                </table>
                <div class="btn-holder">
                    <a href="javascript:%20ShowRowInfo('sabeghe')" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpSabeghe')" >انصراف</a>
                </div>
            </div>
        </div>
    </div>


    <!-- GetCorpEnteshar corp Enteshar -->    
    <div id="GetCorpEnteshar">
        <div id="popupContact">
             <div class="formEnteshar">
             
             <div id="popup-header7"><h3>انتشار شرکت</h3></div>

                <br class="my-break"/>
                <table id="input-corp-table">
                    <tr>
                        <td width="8%">
                            <lable class="lazem">عنوان</lable>
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="onvan" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            نام نشریه
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="nasher" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            نویسنده/مترجم
                        </td>
                        <td>
                            <input type="text" size="50" maxlength="50" id="writer" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            سال انتشار
                        </td>
                        <td>
                            <input type="text" class="en" size="10" maxlength="10" id="date-e" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            توضیحات
                        </td>
                        <td>
                        <input type="text" size="80" maxlength="80" id="note-enteshar" >
                        </td>
                    </tr>
                </table>
                <br class="my-break"/>
                <div class="btn-holder">
                    <a href="javascript:%20ShowRowInfo('enteshar')" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpEnteshar')" >انصراف</a>
                </div>
            </div>
        </div>
    </div>


    <!-- GetCorpEsteghrar corp Esteghrar -->    
    <div id="GetCorpEsteghrar">
        <div id="popupContact">
             <div class="formEsteghrar">
             
             <div id="popup-header7"><h3>استقرار شرکت</h3></div>

                <br class="my-break"/>
                
                <table id="input-corp-table">
                    <tr>
                        <td width="10%">
                            <lable class="lazem">آدرس</lable>
                        </td>
                        <td>
                           <input type="text" size="90" maxlength="90" id="esteghrar" >
                        </td>
                    </tr>
                    </tr>
                        <td width="10%">
                            شماره اتاق
                        </td>
                        <td>
                           <input type="text" size="10" maxlength="10" id="room" class="en" >
                        </td>
                    </tr>
                </table>
                <br class="my-break"/>
                <br class="my-break"/>
                <div class="btn-holder">
                    <a href="javascript:%20ShowRowInfo('esteghrar')" id="submit" class="btns">ذخیره</a>
                    <a href="#" id="cancle" class="btns" onclick ="hide_window('GetCorpEsteghrar')" >انصراف</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- Upload Files -->    
    <div id="FileManager">
        <div id="popupContact">
             <div class="formUpload">
                <h3 class="ManageHeader">مدیریت فایل ها ضمیمه</h1>
                <div class="UploadedFiles">
                    <table id="ManageTable">
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="btn-holder">
                <div id="progress-div"><div id="progress-bar"></div></div>
                    <label class="btns">
                        <?php echo "<input id='upload_files' type='file'' accept='.jpg,.jpeg,.png,.bmp,.pdf' onchange='UploadFiles()'/>"?>
                        <a>اضافه کردن فایل</a>
                    </label>
                    <a href="#" id="cancle" class="btns" onclick ="hide_window('FileManager')" >بازگشت</a>
                 </div>
            </div>
        </div>
    </div>


    <!-- Waiting Page -->    
    <div id="Waiting">
        <div id="popupContact">
             <div class="formWait">
             <div id="loadinf-content"><img id="loading" src="../images/loading4.gif"><div id="loading-caption">لطفا صبر کنید</div></div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        
        var index;
        //var PI1,PI2,PI3,PI4,PI5,PI6;
        var files0=[]; //Modir Pic
        var files1=[]; //Product1
        var files2=[]; //Product2
        var files3=[]; //Product3
        var files4=[]; //Product4
        var files5=[]; //Product5
        var files6=[]; //Product6
        
        if ( getCookie("user_type")=="corp" || getCookie("user_type")=="sarmaye" || getCookie("user_type")=="moshaver")
        {
            SetCorpInfo(getCookie("user_code"),getCookie("state_code"),getCookie("center_code"),getCookie("user_name"));
            //$("#nosave").css("display","none");
        }

        function SetCorpInfo(code, CodeState, CodeCenter, name)
        {
            $('#SaveCorpBtn').css('pointer-events','none');
            files0=[];
            files1=[];
            files2=[];
            files3=[];
            files4=[];
            files5=[];
            files6=[];
            show_window("Waiting");
            $(".member1,.member2,.member3,.member4,.member5,.member6,.member7,.member8,.member9,.member10,.member11,.member12").css("display","none");
            $(".cproduct1,.cproduct2,.cproduct3,.cproduct4,.cproduct5,.cproduct6").css("display","none");
            $(".sabeghe1,.sabeghe2,.sabeghe3,.sabeghe4").css("display","none");
            $(".montasher1,.montasher2,.montasher3,.montasher4").css("display","none");
            $(".mostaghar1,.mostaghar2,.mostaghar3,.mostaghar4").css("display","none");
            document.getElementById("UserCode").value=code;
            document.getElementById("StateCode").value=CodeState;
            document.getElementById("CenterCode").value=CodeCenter;
            document.getElementById("name-sherkat").value=name;
            Set_Disable();
            var i, tmp;
            
            var search=true;
            var form_data = new FormData();
            form_data.append('code', code);
            form_data.append('search', search);
            form_data.append('what', "corp-info");
            $.ajax({
                url: 'includes/search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    if ( response==0 )
                    {
                        document.getElementById("NewEdit").value="NEW";
                        
                        document.getElementById("shomare-sabt").value="";
                        document.getElementById("date-sabt").value="";
                        document.getElementById("sherkat-type").value="";
                        document.getElementById("shenase-melli").value="";
                        document.getElementById("code-eghtesadi").value="";
                        document.getElementById("tel").value="";
                        document.getElementById("fax").value="";
                        document.getElementById("email").value="";
                        document.getElementById("website").value="";
                        document.getElementById("mobile").value="";
                        $('#modir-pic').attr('src', "../images/corps/modir/no-image.jpg")
                        document.getElementById("address").value="";
                        for (i=1;i<=12;i++)
                        {
                            //tmp=eval("obj[0].name"+i);
                            //if( tmp )
                            //{
                                $("#semat"+i).val("");
                                $("#sex"+i).val("");
                                $("#name"+i).val("");
                                $("#father"+i).val("");
                                $("#bdate"+i).val("");
                                $("#code-melli"+i).val("");
                                $("#madrak"+i).val("");
                                $("#gerayesh"+i).val("");
                                $("#takhasos"+i).val("");
                                $("#nezam"+i).val("");
                                $("#hamkari"+i).val("");
                                $("#note"+i).val("");
                            //}
                        }
                        document.getElementById("hoze").value="";
                        document.getElementById("zamine").value="";
                        document.getElementById("idea").value="";
                        document.getElementById("moshavere").value="";
                        
                        for (i=1;i<=6;i++)
                        {
                            //tmp=eval("obj[0].product"+i);
                            //if( tmp )
                            //{
                                $("#product"+i).val("");
                                $("#PI"+i).val("");
                                $("#PG"+i).val("");
                                FilesList="";
                            //}
                        }

                        for (i=1;i<=4;i++)
                        {
                            //tmp=eval("obj[0].faaliat"+i);
                            //if( tmp )
                            //{
                                $("#faaliat"+i).val("");
                                $("#vaziat"+i).val("");
                                $("#zaman"+i).val("");
                                $("#etb"+i).val("");
                                $("#karfarma"+i).val("");
                                $("#dastavard"+i).val("");
                                $("#mojri"+i).val("");
                                $("#note-faaliat"+i).val("");
                            //}
                            //tmp=eval("obj[0].onvan"+i);
                            //if( tmp )
                            //{
                                $("#onvan"+i).val("");
                                $("#nasher"+i).val("");
                                $("#writer"+i).val("");
                                $("#date-e"+i).val("");
                                $("#note-enteshar"+i).val("");
                            //}
                            //tmp=eval("obj[0].esteghrar"+i);
                            //if( tmp )
                            //{
                                $("#esteghrar"+i).val("");
                                $("#room"+i).val("");
                            //}
                        }
                        document.getElementById("date-esteghrar").value="";
                        document.getElementById("date-end").value="";
                        document.getElementById("nazer").value="";
                        document.getElementById("etebar").value="";
                        document.getElementById("date-etebar").value="";
                        document.getElementById("note-etebar").value="";
                        document.getElementById("etebar1").value="";
                        document.getElementById("date-etebar1").value="";
                        document.getElementById("note-etebar1").value="";
                        document.getElementById("etebar2").value="";
                        document.getElementById("date-etebar2").value="";
                        document.getElementById("note-etebar2").value="";
                        document.getElementById("etebar3").value="";
                        document.getElementById("date-etebar3").value="";
                        document.getElementById("note-etebar3").value="";
                        document.getElementById("bedehi").value="";
                        document.getElementById("note-bedehi").value="";
                    }
                    else
                    {
                        //alert(obj[0].u_type);
                        document.getElementById("NewEdit").value="EDIT";
                        var obj = JSON.parse(response);
                        document.getElementById("CorpCode").value=obj[0].code;
                        document.getElementById("shomare-sabt").value=obj[0].shomare_sabt;
                        document.getElementById("date-sabt").value=obj[0].date_sabt;
                        document.getElementById("sherkat-type").value=obj[0].type;
                        document.getElementById("shenase-melli").value=obj[0].shenase_melli;
                        document.getElementById("code-eghtesadi").value=obj[0].code_eghtesadi;
                        document.getElementById("tel").value=obj[0].tel;
                        document.getElementById("fax").value=obj[0].fax;
                        document.getElementById("email").value=obj[0].email;
                        document.getElementById("website").value=obj[0].website;
                        document.getElementById("mobile").value=obj[0].mobile;
                        //$('#modir-pic').attr('src', "../images/corps/modir/"+obj[0].pic);
                        if ( obj[0].pic.length>0 )
                        {
                            FilesList=obj[0].pic.split(","); // Convert String to Array
                        }
                        else
                        {
                            FilesList="";
                        }
                        for (var j=0;j<FilesList.length;j++)
                        {
                            files0[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                        }
                        if (files0.length>0)
                        {
                           $('#modir-pic').attr('src', "../images/corps/modir/"+files0[0].name)
                        }
                        else
                        {
                            $('#modir-pic').attr('src', "../images/corps/modir/no-image.jpg")
                        }
                        document.getElementById("address").value=obj[0].address;
                        for (i=1;i<=12;i++)
                        {
                            tmp=eval("obj[0].name"+i);
                            //if( tmp )
                            //{
                                $("#semat"+i).val(eval("obj[0].semat"+i));
                                $("#sex"+i).val(eval("obj[0].sex"+i));
                                $("#name"+i).val(tmp);
                                $("#father"+i).val(eval("obj[0].father"+i));
                                $("#bdate"+i).val(eval("obj[0].bdate"+i));
                                $("#code-melli"+i).val(eval("obj[0].code_melli"+i));
                                $("#madrak"+i).val(eval("obj[0].madrak"+i));
                                $("#gerayesh"+i).val(eval("obj[0].gerayesh"+i));
                                $("#takhasos"+i).val(eval("obj[0].takhasos"+i));
                                $("#nezam"+i).val(eval("obj[0].nezam"+i));
                                $("#hamkari"+i).val(eval("obj[0].hamkari"+i));
                                $("#note"+i).val(eval("obj[0].note"+i));
                                if ( tmp )
                                {
                                    $(".member"+i).css("display",'block');
                                }
                            //}
                        }
                        document.getElementById("hoze").value=obj[0].hoze;
                        ChangeZamine();
                        setTimeout(function(){ $("#zamine").val(obj[0].zamine); }, 400);
                        document.getElementById("idea").value=obj[0].idea;
                        document.getElementById("moshavere").value=obj[0].moshavere;
                        
                        for (i=1;i<=6;i++)
                        {
                            tmp=eval("obj[0].product"+i);
                            //if( tmp )
                            //{
                                $("#product"+i).val(tmp);
                                $("#PI"+i).val(eval("obj[0].product_img"+i));
                                $("#PG"+i).val(eval("obj[0].product_gvh"+i));
                                if ( tmp )
                                {
                                    $(".cproduct"+i).css("display",'block');
                                }
                                /***********************************************/
                                if ( eval("obj[0].product_img"+i).length>0 )
                                {
                                    FilesList=eval("obj[0].product_img"+i).split(","); // Convert String to Array
                                }
                                else
                                {
                                    FilesList="";
                                }
                                files=eval("files"+i);
                                for (var j=0;j<FilesList.length;j++)
                                {
                                    files[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                                }
                                /***********************************************/
                            //}
                        }

                        //PI1=obj[0].product_img1.split(",");
                        //PI2=obj[0].product_img2.split(",");
                        //PI3=obj[0].product_img3.split(",");
                        //PI4=obj[0].product_img4.split(",");
                        //PI5=obj[0].product_img5.split(",");
                        //PI6=obj[0].product_img6.split(",");
                        
                        for (i=1;i<=4;i++)
                        {
                            tmp=eval("obj[0].faaliat"+i);
                            //if( tmp )
                            //{
                                $("#faaliat"+i).val(tmp);
                                $("#vaziat"+i).val(eval("obj[0].vaziat"+i));
                                $("#zaman"+i).val(eval("obj[0].zaman"+i));
                                $("#etb"+i).val(eval("obj[0].et"+i));
                                $("#karfarma"+i).val(eval("obj[0].karfarma"+i));
                                $("#dastavard"+i).val(eval("obj[0].dastavard"+i));
                                $("#mojri"+i).val(eval("obj[0].mojri"+i));
                                $("#note-faaliat"+i).val(eval("obj[0].note_faaliat"+i));
                                if ( tmp )
                                {
                                    $(".sabeghe"+i).css("display",'block');
                                }
                            //}
                            tmp=eval("obj[0].onvan"+i);
                            //if( tmp )
                            //{
                                $("#onvan"+i).val(tmp);
                                $("#nasher"+i).val(eval("obj[0].nasher"+i));
                                $("#writer"+i).val(eval("obj[0].writer"+i));
                                $("#date-e"+i).val(eval("obj[0].date"+i));
                                $("#note-enteshar"+i).val(eval("obj[0].note_enteshar"+i));
                                if ( tmp )
                                {
                                    $(".montasher"+i).css("display",'block');
                                }
                            //}
                            tmp=eval("obj[0].esteghrar"+i);
                            //if( tmp )
                            //{
                                $("#esteghrar"+i).val(tmp);
                                $("#room"+i).val(eval("obj[0].room"+i));
                                if ( tmp )
                                {
                                    $(".mostaghar"+i).css("display",'block');
                                }
                            //}
                        }
                        document.getElementById("date-esteghrar").value=obj[0].date_esteghrar;
                        document.getElementById("date-end").value=obj[0].date_end;
                        document.getElementById("nazer").value=obj[0].nazer;
                        document.getElementById("etebar").value=obj[0].etebar;
                        document.getElementById("date-etebar").value=obj[0].date_etebar;
                        document.getElementById("note-etebar").value=obj[0].note_etebar;
                        document.getElementById("etebar1").value=obj[0].etebar1;
                        document.getElementById("date-etebar1").value=obj[0].date_etebar1;
                        document.getElementById("note-etebar1").value=obj[0].note_etebar1;
                        document.getElementById("etebar2").value=obj[0].etebar2;
                        document.getElementById("date-etebar2").value=obj[0].date_etebar2;
                        document.getElementById("note-etebar2").value=obj[0].note_etebar2;
                        document.getElementById("etebar3").value=obj[0].etebar3;
                        document.getElementById("date-etebar3").value=obj[0].date_etebar3;
                        document.getElementById("note-etebar3").value=obj[0].note_etebar3;
                        document.getElementById("bedehi").value=obj[0].bedehi;
                        document.getElementById("note-bedehi").value=obj[0].note_bedehi;
                    }
                    setTimeout(function()
                    {
                        hide_window("Waiting");
                        $(".tabcontent").css("width","100%");
                        $(".tabcontent").css("height","85%");
                        $(".tabcontent").css("overflow-y","auto");
                        show_window("PopupWindow4");
                        $('#SaveCorpBtn').css('pointer-events','');
                    }, 1500);
                }
             });
             
            /*setTimeout(function()
            {
                hide_window("Waiting");
                $(".tabcontent").css("width","100%");
                $(".tabcontent").css("height","85%");
                $(".tabcontent").css("overflow-y","auto");
                show_window("PopupWindow4");
                $('#SaveCorpBtn').css('pointer-events','');
            }, 1500);*/
             
        }
        
        
        /*waitForElement("PopupWindow4",function(){
            console.log("done");
        });*/

        function show_window(win)
        {
          document.getElementById(win).style.display = "block";
        }
        
        function hide_window(win)
        {
            if ( win=="FileManager" )
            {
                if (files0.length>0)
                {
                   $('#modir-pic').attr('src', "../images/corps/modir/"+files0[0].name)
                }
                else
                {
                   $('#modir-pic').attr('src', "../images/corps/modir/no-image.jpg")
                }
            }
            document.getElementById(win).style.display = "none";
        }
        
       function openPage(evt, cityName) 
       {
         var i, tabcontent, tablinks;
         
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
           tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablinks");
         for (i = 0; i < tablinks.length; i++) {
           tablinks[i].className = tablinks[i].className.replace(" active", "");
         }
         document.getElementById(cityName).style.display = "block";
         evt.currentTarget.className += " active";
       }
       
       document.getElementById("defaultOpen").click();
       
       function SetModirPic(input) 
       {
               if (input.files && input.files[0]) 
               {
                   var reader = new FileReader();
                   reader.onload = function (e) 
                   {
                       $('#modir-pic').attr('src', e.target.result)
                   };
                   reader.readAsDataURL(input.files[0]);
               }
       }
       
       function SetCorpLogo(input,imageID) 
       {
            if ( input.files.length>10 )
            {
                swal("ماکزیمم تعداد فایل ها برای آپلود ده فایل می باشد", {icon: "warning",});
                return;
            }
       }
        
       function AddCorpRow(cl, win)
       {
            var i;
            for (i=1;i<=12;i++)
            {
                MemClass="."+cl+i;
                if ( $(MemClass).css('display')=="none" )
                {
                    index=i;
                    break;
                }
            }
           setCookie("UploadPart","Product"+index,1)
           switch (cl)
           {
            case "member":
                if ( index==1 )
                {
                    $("#semat").prop("disabled",true);
                    $("#semat").val("مدیر عامل");
                }
                else
                {
                    $("#semat").prop("disabled",false);
                    $("#semat").val("");
                }
                if ( $("."+cl+index).css('display')=="block" ) { return; }
                $("#name").val("");
                $("#sex").val("");
                $("#father").val("");
                $("#bdate").val("");
                $("#code-melli").val("");
                $("#madrak").val("");
                $("#gerayesh").val("");
                $("#takhasos").val("");
                $("#nezam").val("");
                $("#hamkari").val("");
                $("#note-member").val("");
                break;
            case "cproduct":
                if ( $("."+cl+index).css('display')=="block" ) { return; }
                //$("#image-holder").html("");
                $("#_product").val("");
                $('#product-image').attr('src', '');
                $('#product-govahi').attr('src', '');
                $('#u-p1,#u-p2,#u-p3,#u-p4,#u-p5,#u-p6').css('display', 'none');
                $('#u-g1,#u-g2,#u-g3,#u-g4,#u-g5,#u-g6').css('display', 'none');
                $('#u-p'+index).css('display', 'block');
                $('#u-g'+index).css('display', 'block');
                $("#about-upload").html("فایلی ضمیمه نشده است");
                break;
            case "sabeghe":
                if ( $("."+cl+index).css('display')=="block" ) { return; }
                $("#faaliat").val("");
                $("#vaziat").val("");
                $("#zaman").val("");
                $("#etb").val("");
                $("#karfarma").val("");
                $("#dastavard").val("");
                $("#mojri").val("");
                $("#note-faaliat").val("");
                break;
            case "montasher":
                if ( $("."+cl+index).css('display')=="block" ) { return; }
                $("#onvan").val("");
                $("#nasher").val("");
                $("#writer").val("");
                $("#date-e").val("");
                $("#note-enteshar").val("");
                break;
            case "mostaghar":
                if ( $("."+cl+index).css('display')=="block" ) { return; }
                $("#esteghrar").val("");
                $("#room").val("");
                break;
            
           }
            document.getElementById(win).style.display = "block";
       }
       
      function ShowCorpRow(part, cl, win, row)
      {
           index=row;
           MemClass="."+cl+index;
           switch (part)
           {
            case "member":
                $("#semat").val($("#semat"+index).val());
                $("#name").val($("#name"+index).val());
                $("#sex").val($("#sex"+index).val());
                $("#father").val($("#father"+index).val());
                $("#bdate").val($("#bdate"+index).val());
                $("#code-melli").val($("#code-melli"+index).val());
                $("#madrak").val($("#madrak"+index).val());
                $("#gerayesh").val($("#gerayesh"+index).val());
                $("#takhasos").val($("#takhasos"+index).val());
                $("#nezam").val($("#nezam"+index).val());
                $("#hamkari").val($("#hamkari"+index).val());
                $("#note-member").val($("#note"+index).val());
                break;
            case "product":
                $("#_product").val($("#product"+index).val());
                $('#product-image').attr('src', '../images/corps/product/'+$("#PI"+index).val());
                $('#product-govahi').attr('src', '../images/corps/govahi/'+$("#PG"+index).val());
                $('#u-p1,#u-p2,#u-p3,#u-p4,#u-p5,#u-p6').css('display', 'none');
                $('#u-g1,#u-g2,#u-g3,#u-g4,#u-g5,#u-g6').css('display', 'none');
                $('#u-p'+index).css('display', 'block');
                $('#u-g'+index).css('display', 'block');
                setCookie("UploadPart","Product"+index,1)
                files=eval("files"+index);
                if ( files.length<=0 )
                {
                      $("#about-upload").html("فایلی ضمیمه نشده است");
                }
                else
                {
                      $("#about-upload").html(files.length+" فایل ضمیمه شده است");
                }
                
                
                break;
            case "sabeghe":
                $("#faaliat").val($("#faaliat"+index).val());
                $("#vaziat").val($("#vaziat"+index).val());
                $("#zaman").val($("#zaman"+index).val());
                $("#etb").val($("#etb"+index).val());
                $("#karfarma").val($("#karfarma"+index).val());
                $("#dastavard").val($("#dastavard"+index).val());
                $("#mojri").val($("#mojri"+index).val());
                $("#note-faaliat").val($("#note-faaliat"+index).val());
                break;
            case "enteshar":
                $("#onvan").val($("#onvan"+index).val());
                $("#nasher").val($("#nasher"+index).val());
                $("#writer").val($("#writer"+index).val());
                $("#date-e").val($("#date-e"+index).val());
                $("#note-enteshar").val($("#note-enteshar"+index).val());
                break;
            case "esteghrar":
                $("#esteghrar").val($("#esteghrar"+index).val());
                $("#room").val($("#room"+index).val());
                break;
            
           }
           document.getElementById(win).style.display = "block";
      }
      
      
        function DeleteCorpRow(part, cl, row)
        {
             index=row;
             mems=0;
             switch (part)
             {
              case "member":
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید اطلاعات عضو شرکت حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) 
                   {
                        for (index=1;index<=12;index++)
                        {
                           MemClass="."+cl+index;
                           if ( $(MemClass).css("display")!="none" )
                           {
                               mems+=1;
                           }
                           else
                           {
                               break;
                           }
                        }
                        MemClass="."+cl+mems;
                        for (index=row;index<=mems;index++)
                        {
                          idx=index+1;  
                          $("#semat"+index).val($("#semat"+idx).val());
                          $("#name"+index).val($("#name"+idx).val());
                          $("#sex"+index).val($("#sex"+idx).val());
                          $("#father"+index).val($("#father"+idx).val());
                          $("#bdate"+index).val($("#bdate"+idx).val());
                          $("#code-melli"+index).val($("#code-melli"+idx).val());
                          $("#madrak"+index).val($("#madrak"+idx).val());
                          $("#gerayesh"+index).val($("#gerayesh"+idx).val());
                          $("#takhasos"+index).val($("#takhasos"+idx).val());
                          $("#nezam"+index).val($("#nezam"+idx).val());
                          $("#hamkari"+index).val($("#hamkari"+idx).val());
                          $("#note-member"+index).val($("#note"+idx).val());
                        }
                        $(MemClass).css("display","none" );
                        swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                   } 
                   else 
                   {
                         swal("شما از حذف اطلاعات انصراف دادید");
                   }
                 });
                 break;
              case "product":
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "در صورت تایید فایل های ضمیمه محصول مورد نظر کلا حذف می شوند",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        for (index=1;index<=6;index++)
                        {
                           MemClass="."+cl+index;
                           if ( $(MemClass).css("display")!="none" )
                           {
                               mems+=1;
                           }
                           else
                           {
                               break;
                           }
                        }
                        MemClass="."+cl+mems;
                        
                        files=eval("files"+row);
                        for (var i=0;i<files.length;i++)
                        {
                             var del=true;
                             var form_data = new FormData();                  
                             form_data.append('file', files[i].name);
                             form_data.append('path', "../images/corps/product/");
                             form_data.append('delete', del);
                             $.ajax({
                                 url: 'includes/delete_file.php', 
                                 cache: false,
                                 contentType: false,
                                 processData: false,
                                 data: form_data,                         
                                 type: 'post',
                                 success: function(response)
                                 {
                                 }
                             });
                         }
                        
                        for (index=row;index<=mems;index++)
                        {
                          idx=index+1;  
                          $("#product"+index).val($("#product"+idx).val());
                          if ( index<6 )
                          {
                              f1=eval("files"+index);
                              f2=eval("files"+idx);
                              f1.splice(0);
                              for (i=0;i<f2.length;i++)
                              {
                                f1[i]=f2[i];
                              }
                          }
                          else
                          {
                              f1=eval("files"+index);
                              f1.splice(0);
                          }
                        }
                        $(MemClass).css("display","none" );
                        swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                   } 
                   else 
                   {
                         swal("شما از حذف اطلاعات انصراف دادید");
                   }
                 });
                 break;
              case "sabeghe":
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید اطلاعات سابقه علمی و فنی حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        for (index=1;index<=4;index++)
                        {
                           MemClass="."+cl+index;
                           if ( $(MemClass).css("display")!="none" )
                           {
                               mems+=1;
                           }
                           else
                           {
                               break;
                           }
                        }
                        MemClass="."+cl+mems;
                        for (index=row;index<=mems;index++)
                        {
                          idx=index+1;  
                          $("#faaliat"+index).val($("#faaliat"+idx).val());
                          $("#vaziat"+index).val($("#vaziat"+idx).val());
                          $("#zaman"+index).val($("#zaman"+idx).val());
                          $("#etb"+index).val($("#etb"+idx).val());
                          $("#karfarma"+index).val($("#karfarma"+idx).val());
                          $("#dastavard"+index).val($("#dastavard"+idx).val());
                          $("#mojri"+index).val($("#mojri"+idx).val());
                          $("#note-faaliat"+index).val($("#note-faaliat"+idx).val());
                        }
                        $(MemClass).css("display","none" );
                     
                     swal("اطلاعات با موفقیت حذف شد", {
                       icon: "success",
                     });
                   } else {
                     swal("شما از حذف اطلاعات انصراف دادید");
                   }
                 });
                 break;
              case "enteshar":
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید اطلاعات انتسارات علمی حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        for (index=1;index<=4;index++)
                        {
                           MemClass="."+cl+index;
                           if ( $(MemClass).css("display")!="none" )
                           {
                               mems+=1;
                           }
                           else
                           {
                               break;
                           }
                        }
                        MemClass="."+cl+mems;
                        for (index=row;index<=mems;index++)
                        {
                          idx=index+1;  
                          $("#onvan"+index).val($("#onvan"+idx).val());
                          $("#nasher"+index).val($("#nasher"+idx).val());
                          $("#writer"+index).val($("#writer"+idx).val());
                          $("#date-e"+index).val($("#date-e"+idx).val());
                          $("#note-enteshar"+index).val($("#note-enteshar"+idx).val());
                        }
                        $(MemClass).css("display","none" );
                     
                     swal("اطلاعات با موفقیت حذف شد", {
                       icon: "success",
                     });
                   } else {
                     swal("شما از حذف اطلاعات انصراف دادید");
                   }
                 });
                 break;
              case "esteghrar":
                 swal({
                   title: "برای حذف مطمئن هستید؟",
                   text: "با تایید اطلاعات استقرار حذف می شود",
                   icon: "warning",
                   buttons: ["انصراف", "تایید"],
                   dangerMode: true,
                 })
                 .then((willDelete) => {
                   if (willDelete) {
                        for (index=1;index<=4;index++)
                        {
                           MemClass="."+cl+index;
                           if ( $(MemClass).css("display")!="none" )
                           {
                               mems+=1;
                           }
                           else
                           {
                               break;
                           }
                        }
                        MemClass="."+cl+mems;
                        for (index=row;index<=mems;index++)
                        {
                          idx=index+1;  
                          $("#esteghrar"+index).val($("#esteghrar"+idx).val());
                          $("#room"+index).val($("#room"+idx).val());
                        }
                        $(MemClass).css("display","none" );
                     
                     swal("اطلاعات با موفقیت حذف شد", {
                       icon: "success",
                     });
                   } else {
                     swal("شما از حذف اطلاعات انصراف دادید");
                   }
                 });
                 break;
              
             }
             //document.getElementById(cl).style.display = "none";
        }



        function ShowRowInfo(part)
        {   
            switch(part) {
              case "member":
                if ( $("#semat").val()=="" || $("#name").val()=="" )
                {
                    $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                    ShowFloatingMessage();
                    return;
                }
                $(MemClass).css('display','block');
                document.getElementById('GetCorpMembers').style.display = "none";
                $("#semat"+index).val($("#semat").val());
                $("#name"+index).val($("#name").val());
                $("#sex"+index).val($("#sex").val());
                $("#father"+index).val($("#father").val());
                $("#bdate"+index).val($("#bdate").val());
                $("#code-melli"+index).val($("#code-melli").val());
                $("#madrak"+index).val($("#madrak").val());
                $("#gerayesh"+index).val($("#gerayesh").val());
                $("#takhasos"+index).val($("#takhasos").val());
                $("#nezam"+index).val($("#nezam").val());
                $("#hamkari"+index).val($("#hamkari").val());
                $("#note"+index).val($("#note-member").val());
                break;
              case "product":
                if ( $("#_product").val()=="")
                {
                    $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                    ShowFloatingMessage();
                    return;
                }
                $(MemClass).css('display','block');
                document.getElementById('GetCorpProducts').style.display = "none";
                $("#product"+index).val($("#_product").val());

                switch (getCookie("UploadPart"))
                {
                    case "Product1":
                        var files=eval("files"+1);
                        break;
                    case "Product2":
                        var files=eval("files"+2);
                        break;
                    case "Product3":
                        var files=eval("files"+3);
                        break;
                    case "Product4":
                        var files=eval("files"+4);
                        break;
                    case "Product5":
                        var files=eval("files"+5);
                        break;
                    case "Product6":
                        var files=eval("files"+6);
                        break;
                }
                for (var i=0;i<files.length;i++)
                {
                    files[i].location="HOST";
                }
                
                
                break;
              case "sabeghe":
                if ( $("#faaliat").val()=="")
                {
                    $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                    ShowFloatingMessage();
                    return;
                }
                $(MemClass).css('display','block');
                document.getElementById('GetCorpSabeghe').style.display = "none";
                $("#faaliat"+index).val($("#faaliat").val());
                $("#vaziat"+index).val($("#vaziat").val());
                $("#zaman"+index).val($("#zaman").val());
                $("#etb"+index).val($("#etb").val());
                $("#karfarma"+index).val($("#karfarma").val());
                $("#dastavard"+index).val($("#dastavard").val());
                $("#mojri"+index).val($("#mojri").val());
                $("#note-faaliat"+index).val($("#note-faaliat").val());
                break;
              case "enteshar":
                if ( $("#onvan").val()=="")
                {
                    $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                    ShowFloatingMessage();
                    return;
                }
                $(MemClass).css('display','block');
                document.getElementById('GetCorpEnteshar').style.display = "none";
                $("#onvan"+index).val($("#onvan").val());
                $("#nasher"+index).val($("#nasher").val());
                $("#writer"+index).val($("#writer").val());
                $("#date-e"+index).val($("#date-e").val());
                $("#note-enteshar"+index).val($("#note-enteshar").val());
                break;
              case "esteghrar":
                if ( $("#esteghrar").val()=="")
                {
                    $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                    ShowFloatingMessage();
                    return;
                }
                $(MemClass).css('display','block');
                document.getElementById('GetCorpEsteghrar').style.display = "none";
                $("#esteghrar"+index).val($("#esteghrar").val());
                $("#room"+index).val($("#room").val());
                break;
            }
        }
        
        
        function Save_Corp()
        {
            if ( $("#name-sherkat").val()=="" || $("#mobile").val()=="" || $("#address").val()=="" || $("#idea").val()=="" || $("#hoze").val()=="" || $("#name1").val()=="" )
            {
                $("#snackbar").html("ورود فیلدهای با برچسب قرمز ضروری می باشد");
                ShowFloatingMessage();
                return;
            }
			

            var save=true;
              
            var form_data = new FormData();
                              
            form_data.append('user-code',document.getElementById("UserCode").value);
            form_data.append('state-code',document.getElementById("StateCode").value);
            form_data.append('center-code',document.getElementById("CenterCode").value);
            form_data.append('name-sherkat',document.getElementById("name-sherkat").value);
            form_data.append('shomare-sabt',document.getElementById("shomare-sabt").value);
            form_data.append('date-sabt',document.getElementById("date-sabt").value);
            form_data.append('sherkat-type',document.getElementById("sherkat-type").value);
            form_data.append('shenase-melli',document.getElementById("shenase-melli").value);
            form_data.append('code-eghtesadi',document.getElementById("code-eghtesadi").value);
            form_data.append('tel',document.getElementById("tel").value);
            form_data.append('fax',document.getElementById("fax").value);
            form_data.append('email',document.getElementById("email").value);
            form_data.append('website',document.getElementById("website").value);
            form_data.append('mobile',document.getElementById("mobile").value);
            for (var i = 0; i < files0.length; i++) 
            {
                form_data.append('fileModirPIC[]', files0[i].name);
            }
            form_data.append('address',document.getElementById("address").value);
            form_data.append('semat1',document.getElementById("semat1").value);
            form_data.append('semat2',document.getElementById("semat2").value);
            form_data.append('semat3',document.getElementById("semat3").value);
            form_data.append('semat4',document.getElementById("semat4").value);
            form_data.append('semat5',document.getElementById("semat5").value);
            form_data.append('semat6',document.getElementById("semat6").value);
            form_data.append('semat7',document.getElementById("semat7").value);
            form_data.append('semat8',document.getElementById("semat8").value);
            form_data.append('semat9',document.getElementById("semat9").value);
            form_data.append('semat10',document.getElementById("semat10").value);
            form_data.append('semat11',document.getElementById("semat11").value);
            form_data.append('semat12',document.getElementById("semat12").value);
            form_data.append('sex1',document.getElementById("sex1").value);
            form_data.append('sex2',document.getElementById("sex2").value);
            form_data.append('sex3',document.getElementById("sex3").value);
            form_data.append('sex4',document.getElementById("sex4").value);
            form_data.append('sex5',document.getElementById("sex5").value);
            form_data.append('sex6',document.getElementById("sex6").value);
            form_data.append('sex7',document.getElementById("sex7").value);
            form_data.append('sex8',document.getElementById("sex8").value);
            form_data.append('sex9',document.getElementById("sex9").value);
            form_data.append('sex10',document.getElementById("sex10").value);
            form_data.append('sex11',document.getElementById("sex11").value);
            form_data.append('sex12',document.getElementById("sex12").value);
            form_data.append('name1',document.getElementById("name1").value);
            form_data.append('name2',document.getElementById("name2").value);
            form_data.append('name3',document.getElementById("name3").value);
            form_data.append('name4',document.getElementById("name4").value);
            form_data.append('name5',document.getElementById("name5").value);
            form_data.append('name6',document.getElementById("name6").value);
            form_data.append('name7',document.getElementById("name7").value);
            form_data.append('name8',document.getElementById("name8").value);
            form_data.append('name9',document.getElementById("name9").value);
            form_data.append('name10',document.getElementById("name10").value);
            form_data.append('name11',document.getElementById("name11").value);
            form_data.append('name12',document.getElementById("name12").value);
            form_data.append('father1',document.getElementById("father1").value);
            form_data.append('father2',document.getElementById("father2").value);
            form_data.append('father3',document.getElementById("father3").value);
            form_data.append('father4',document.getElementById("father4").value);
            form_data.append('father5',document.getElementById("father5").value);
            form_data.append('father6',document.getElementById("father6").value);
            form_data.append('father7',document.getElementById("father7").value);
            form_data.append('father8',document.getElementById("father8").value);
            form_data.append('father9',document.getElementById("father9").value);
            form_data.append('father10',document.getElementById("father10").value);
            form_data.append('father11',document.getElementById("father11").value);
            form_data.append('father12',document.getElementById("father12").value);
            form_data.append('bdate1',document.getElementById("bdate1").value);
            form_data.append('bdate2',document.getElementById("bdate2").value);
            form_data.append('bdate3',document.getElementById("bdate3").value);
            form_data.append('bdate4',document.getElementById("bdate4").value);
            form_data.append('bdate5',document.getElementById("bdate5").value);
            form_data.append('bdate6',document.getElementById("bdate6").value);
            form_data.append('bdate7',document.getElementById("bdate7").value);
            form_data.append('bdate8',document.getElementById("bdate8").value);
            form_data.append('bdate9',document.getElementById("bdate9").value);
            form_data.append('bdate10',document.getElementById("bdate10").value);
            form_data.append('bdate11',document.getElementById("bdate11").value);
            form_data.append('bdate12',document.getElementById("bdate12").value);
            form_data.append('code-melli1',document.getElementById("code-melli1").value);
            form_data.append('code-melli2',document.getElementById("code-melli2").value);
            form_data.append('code-melli3',document.getElementById("code-melli3").value);
            form_data.append('code-melli4',document.getElementById("code-melli4").value);
            form_data.append('code-melli5',document.getElementById("code-melli5").value);
            form_data.append('code-melli6',document.getElementById("code-melli6").value);
            form_data.append('code-melli7',document.getElementById("code-melli7").value);
            form_data.append('code-melli8',document.getElementById("code-melli8").value);
            form_data.append('code-melli9',document.getElementById("code-melli9").value);
            form_data.append('code-melli10',document.getElementById("code-melli10").value);
            form_data.append('code-melli11',document.getElementById("code-melli11").value);
            form_data.append('code-melli12',document.getElementById("code-melli12").value);
            form_data.append('madrak1',document.getElementById("madrak1").value);
            form_data.append('madrak2',document.getElementById("madrak2").value);
            form_data.append('madrak3',document.getElementById("madrak3").value);
            form_data.append('madrak4',document.getElementById("madrak4").value);
            form_data.append('madrak5',document.getElementById("madrak5").value);
            form_data.append('madrak6',document.getElementById("madrak6").value);
            form_data.append('madrak7',document.getElementById("madrak7").value);
            form_data.append('madrak8',document.getElementById("madrak8").value);
            form_data.append('madrak9',document.getElementById("madrak9").value);
            form_data.append('madrak10',document.getElementById("madrak10").value);
            form_data.append('madrak11',document.getElementById("madrak11").value);
            form_data.append('madrak12',document.getElementById("madrak12").value);
            form_data.append('gerayesh1',document.getElementById("gerayesh1").value);
            form_data.append('gerayesh2',document.getElementById("gerayesh2").value);
            form_data.append('gerayesh3',document.getElementById("gerayesh3").value);
            form_data.append('gerayesh4',document.getElementById("gerayesh4").value);
            form_data.append('gerayesh5',document.getElementById("gerayesh5").value);
            form_data.append('gerayesh6',document.getElementById("gerayesh6").value);
            form_data.append('gerayesh7',document.getElementById("gerayesh7").value);
            form_data.append('gerayesh8',document.getElementById("gerayesh8").value);
            form_data.append('gerayesh9',document.getElementById("gerayesh9").value);
            form_data.append('gerayesh10',document.getElementById("gerayesh10").value);
            form_data.append('gerayesh11',document.getElementById("gerayesh11").value);
            form_data.append('gerayesh12',document.getElementById("gerayesh12").value);
            form_data.append('takhasos1',document.getElementById("takhasos1").value);
            form_data.append('takhasos2',document.getElementById("takhasos2").value);
            form_data.append('takhasos3',document.getElementById("takhasos3").value);
            form_data.append('takhasos4',document.getElementById("takhasos4").value);
            form_data.append('takhasos5',document.getElementById("takhasos5").value);
            form_data.append('takhasos6',document.getElementById("takhasos6").value);
            form_data.append('takhasos7',document.getElementById("takhasos7").value);
            form_data.append('takhasos8',document.getElementById("takhasos8").value);
            form_data.append('takhasos9',document.getElementById("takhasos9").value);
            form_data.append('takhasos10',document.getElementById("takhasos10").value);
            form_data.append('takhasos11',document.getElementById("takhasos11").value);
            form_data.append('takhasos12',document.getElementById("takhasos12").value);
            form_data.append('nezam1',document.getElementById("nezam1").value);
            form_data.append('nezam2',document.getElementById("nezam2").value);
            form_data.append('nezam3',document.getElementById("nezam3").value);
            form_data.append('nezam4',document.getElementById("nezam4").value);
            form_data.append('nezam5',document.getElementById("nezam5").value);
            form_data.append('nezam6',document.getElementById("nezam6").value);
            form_data.append('nezam7',document.getElementById("nezam7").value);
            form_data.append('nezam8',document.getElementById("nezam8").value);
            form_data.append('nezam9',document.getElementById("nezam9").value);
            form_data.append('nezam10',document.getElementById("nezam10").value);
            form_data.append('nezam11',document.getElementById("nezam11").value);
            form_data.append('nezam12',document.getElementById("nezam12").value);
            form_data.append('hamkari1',document.getElementById("hamkari1").value);
            form_data.append('hamkari2',document.getElementById("hamkari2").value);
            form_data.append('hamkari3',document.getElementById("hamkari3").value);
            form_data.append('hamkari4',document.getElementById("hamkari4").value);
            form_data.append('hamkari5',document.getElementById("hamkari5").value);
            form_data.append('hamkari6',document.getElementById("hamkari6").value);
            form_data.append('hamkari7',document.getElementById("hamkari7").value);
            form_data.append('hamkari8',document.getElementById("hamkari8").value);
            form_data.append('hamkari9',document.getElementById("hamkari9").value);
            form_data.append('hamkari10',document.getElementById("hamkari10").value);
            form_data.append('hamkari11',document.getElementById("hamkari11").value);
            form_data.append('hamkari12',document.getElementById("hamkari12").value);
            
            form_data.append('note1',document.getElementById("note1").value);
            form_data.append('note2',document.getElementById("note2").value);
            form_data.append('note3',document.getElementById("note3").value);
            form_data.append('note4',document.getElementById("note4").value);
            form_data.append('note5',document.getElementById("note5").value);
            form_data.append('note6',document.getElementById("note6").value);
            form_data.append('note7',document.getElementById("note7").value);
            form_data.append('note8',document.getElementById("note8").value);
            form_data.append('note9',document.getElementById("note9").value);
            form_data.append('note10',document.getElementById("note10").value);
            form_data.append('note11',document.getElementById("note11").value);
            form_data.append('note12',document.getElementById("note12").value);
            
            form_data.append('hoze',document.getElementById("hoze").value);
            form_data.append('zamine',document.getElementById("zamine").value);
            form_data.append('idea',document.getElementById("idea").value);
            form_data.append('moshavere',document.getElementById("moshavere").value);
            
            form_data.append('product1',document.getElementById("product1").value);
            form_data.append('product2',document.getElementById("product2").value);
            form_data.append('product3',document.getElementById("product3").value);
            form_data.append('product4',document.getElementById("product4").value);
            form_data.append('product5',document.getElementById("product5").value);
            form_data.append('product6',document.getElementById("product6").value);
            
            
            for (var i = 0; i < files1.length; i++) 
            {
                form_data.append('filePI1[]', files1[i].name);
            }
            for (var i = 0; i < files2.length; i++) 
            {
                form_data.append('filePI2[]', files2[i].name);
            }
            for (var i = 0; i < files3.length; i++) 
            {
                form_data.append('filePI3[]', files3[i].name);
            }
            for (var i = 0; i < files4.length; i++) 
            {
                form_data.append('filePI4[]', files4[i].name);
            }
            for (var i = 0; i < files5.length; i++) 
            {
                form_data.append('filePI5[]', files5[i].name);
            }
            for (var i = 0; i < files6.length; i++) 
            {
                form_data.append('filePI6[]', files6[i].name);
            }


            form_data.append('faaliat1',document.getElementById("faaliat1").value);
            form_data.append('faaliat2',document.getElementById("faaliat2").value);
            form_data.append('faaliat3',document.getElementById("faaliat3").value);
            form_data.append('faaliat4',document.getElementById("faaliat4").value);
            form_data.append('vaziat1',document.getElementById("vaziat1").value);
            form_data.append('vaziat2',document.getElementById("vaziat2").value);
            form_data.append('vaziat3',document.getElementById("vaziat3").value);
            form_data.append('vaziat4',document.getElementById("vaziat4").value);
            form_data.append('zaman1',document.getElementById("zaman1").value);
            form_data.append('zaman2',document.getElementById("zaman2").value);
            form_data.append('zaman3',document.getElementById("zaman3").value);
            form_data.append('zaman4',document.getElementById("zaman4").value);
            form_data.append('etb1',document.getElementById("etb1").value);
            form_data.append('etb2',document.getElementById("etb2").value);
            form_data.append('etb3',document.getElementById("etb3").value);
            form_data.append('etb4',document.getElementById("etb4").value);
            form_data.append('karfarma1',document.getElementById("karfarma1").value);
            form_data.append('karfarma2',document.getElementById("karfarma2").value);
            form_data.append('karfarma3',document.getElementById("karfarma3").value);
            form_data.append('karfarma4',document.getElementById("karfarma4").value);
            form_data.append('dastavard1',document.getElementById("dastavard1").value);
            form_data.append('dastavard2',document.getElementById("dastavard2").value);
            form_data.append('dastavard3',document.getElementById("dastavard3").value);
            form_data.append('dastavard4',document.getElementById("dastavard4").value);
            form_data.append('mojri1',document.getElementById("mojri1").value);
            form_data.append('mojri2',document.getElementById("mojri2").value);
            form_data.append('mojri3',document.getElementById("mojri3").value);
            form_data.append('mojri4',document.getElementById("mojri4").value);
            form_data.append('note-faaliat1',document.getElementById("note-faaliat1").value);
            form_data.append('note-faaliat2',document.getElementById("note-faaliat2").value);
            form_data.append('note-faaliat3',document.getElementById("note-faaliat3").value);
            form_data.append('note-faaliat4',document.getElementById("note-faaliat4").value);
            form_data.append('onvan1',document.getElementById("onvan1").value);
            form_data.append('onvan2',document.getElementById("onvan2").value);
            form_data.append('onvan3',document.getElementById("onvan3").value);
            form_data.append('onvan4',document.getElementById("onvan4").value);
            form_data.append('nasher1',document.getElementById("nasher1").value);
            form_data.append('nasher2',document.getElementById("nasher2").value);
            form_data.append('nasher3',document.getElementById("nasher3").value);
            form_data.append('nasher4',document.getElementById("nasher4").value);
            form_data.append('writer1',document.getElementById("writer1").value);
            form_data.append('writer2',document.getElementById("writer2").value);
            form_data.append('writer3',document.getElementById("writer3").value);
            form_data.append('writer4',document.getElementById("writer4").value);
            form_data.append('date-e1',document.getElementById("date-e1").value);
            form_data.append('date-e2',document.getElementById("date-e2").value);
            form_data.append('date-e3',document.getElementById("date-e3").value);
            form_data.append('date-e4',document.getElementById("date-e4").value);
            form_data.append('note-enteshar1',document.getElementById("note-enteshar1").value);
            form_data.append('note-enteshar2',document.getElementById("note-enteshar2").value);
            form_data.append('note-enteshar3',document.getElementById("note-enteshar3").value);
            form_data.append('note-enteshar4',document.getElementById("note-enteshar4").value);
            form_data.append('date-esteghrar',document.getElementById("date-esteghrar").value);
            form_data.append('date-end',document.getElementById("date-end").value);
            form_data.append('esteghrar1',document.getElementById("esteghrar1").value);
            form_data.append('esteghrar2',document.getElementById("esteghrar2").value);
            form_data.append('esteghrar3',document.getElementById("esteghrar3").value);
            form_data.append('esteghrar4',document.getElementById("esteghrar4").value);
            form_data.append('room1',document.getElementById("room1").value);
            form_data.append('room2',document.getElementById("room2").value);
            form_data.append('room3',document.getElementById("room3").value);
            form_data.append('room4',document.getElementById("room4").value);
            form_data.append('nazer',document.getElementById("nazer").value);
            form_data.append('etebar',document.getElementById("etebar").value);
            form_data.append('date-etebar',document.getElementById("date-etebar").value);
            form_data.append('note-etebar',document.getElementById("note-etebar").value);
            form_data.append('etebar1',document.getElementById("etebar1").value);
            form_data.append('etebar2',document.getElementById("etebar2").value);
            form_data.append('etebar3',document.getElementById("etebar3").value);
            form_data.append('date-etebar1',document.getElementById("date-etebar1").value);
            form_data.append('date-etebar2',document.getElementById("date-etebar2").value);
            form_data.append('date-etebar3',document.getElementById("date-etebar3").value);
            form_data.append('note-etebar1',document.getElementById("note-etebar1").value);
            form_data.append('note-etebar2',document.getElementById("note-etebar2").value);
            form_data.append('note-etebar3',document.getElementById("note-etebar3").value);
            form_data.append('bedehi',document.getElementById("bedehi").value);
            form_data.append('note-bedehi',document.getElementById("note-bedehi").value);

            form_data.append('NewEdit', document.getElementById("NewEdit").value);
            form_data.append('CorpCode', document.getElementById("CorpCode").value);
            form_data.append('save', save);

            form_data.append('what', "corp-info");
            show_window("Waiting");
            $.ajax({
                url: 'includes/save.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
						//alert(response);
                        setTimeout(function()
                        { 
                            hide_window("Waiting");
                            if ( getCookie("user_type")!="corp" && getCookie("user_type")!="sarmaye" && getCookie("user_type")!="moshaver")
                            {
                                hide_window('PopupWindow4');
                            } 
                            $("#snackbar").css("background-color","darkgreen");
                            $("#snackbar").css("border","4px solid green");
                            $("#snackbar").html("ذخیره سازی با موفقیت انجام شد");
                            ShowFloatingMessage();
                        }, 400);
                }
             });
        }
        
        
       function ChangeZamine()
       {
             var hoze=document.getElementById("hoze").value;
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
                    $('#zamine').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('zamine');
                        var i;
                        for (i=0;i<obj.length;i++)
                        {
                            var opt = document.createElement('option');
                            opt.value = obj[i].code;
                            opt.innerHTML = obj[i].name;
                            select.appendChild(opt);
                        }
                    }
                 }
              });
       }
       
       /* Upload Manage Strt */
        function ShowFileManage(part)
        {
            setCookie("UploadPart",part,1);
            switch (part)
            {
                case "Modir-Pic":
                    var files=eval("files"+0);
                    path="../images/corps/modir/";
                    break;
                case "Product1":
                    var files=eval("files"+1);
                    path="../images/corps/product/";
                    break;
                case "Product2":
                    var files=eval("files"+2);
                    path="../images/corps/product/";
                    break;
                case "Product3":
                    var files=eval("files"+3);
                    path="../images/corps/product/";
                    break;
                case "Product4":
                    var files=eval("files"+4);
                    path="../images/corps/product/";
                    break;
                case "Product5":
                    var files=eval("files"+5);
                    path="../images/corps/product/";
                    break;
                case "Product6":
                    var files=eval("files"+6);
                    path="../images/corps/product/";
                    break;
            }
            var tableHeaderRowCount = 0;
            var table = document.getElementById('ManageTable');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) 
            {
                table.deleteRow(tableHeaderRowCount);
            }
            for (var i=0;i<files.length;i++)
            {
                var markup = "<tr>";
                markup = markup + "<td width='5%'>"+(i+1)+"</td>";
                param=path+files[i].name;
                markup = markup + "<td width='10%'><a href='#' onclick='ShowFile(\""+param+"\");'>"+"فایل" +(i+1)+"<a/>" + "</td>";
                markup = markup + "<td width='10%'><a href="+path+files[i].name+" target='blank' download>دانلود<a/>" + "</td>";
                markup = markup + "<td width='15%'>" + files[i].type + "</td>";
                markup = markup + "<td width='5%'>" + "<img id='del-pic' src='../images/delete.png' onclick='DeleteFile("+(i)+")'>" + "</td>";
                markup = markup + "</tr>";
                $("#ManageTable > tbody").append(markup);
            }
            show_window('FileManager');
        }
        
        function UploadFiles()
        {
             if ( $('#upload_files').prop('files')[0].size>4000000 )
             {
                swal("اندازه فایل انتخاب شده بیشتر از حد مجاز است. نهایت اندازه هر فایل 4 مگابایت است", {icon: "warning",});
                return;
             }
             var info=true;
             var form_data = new FormData();                  
             form_data.append('file', $('#upload_files').prop('files')[0]);
             if ( getCookie("UploadPart")=="Modir-Pic" )
             {
                 form_data.append('path', "../images/corps/modir/");
             }
             else
             {
                 form_data.append('path', "../images/corps/product/");
             }
             form_data.append('info', info);
             $.ajax({
                 url: 'includes/get_file_info.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    switch (getCookie("UploadPart"))
                    {
                        case "Modir-Pic":
                            var files=eval("files"+0);
                            path="../images/corps/modir/";
                            break;
                        case "Product1":
                            var files=eval("files"+1);
                            path="../images/corps/product/";
                            break;
                        case "Product2":
                            var files=eval("files"+2);
                            path="../images/corps/product/";
                            break;
                        case "Product3":
                            var files=eval("files"+3);
                            path="../images/corps/product/";
                            break;
                        case "Product4":
                            var files=eval("files"+4);
                            path="../images/corps/product/";
                            break;
                        case "Product5":
                            var files=eval("files"+5);
                            path="../images/corps/product/";
                            break;
                        case "Product6":
                            var files=eval("files"+6);
                            path="../images/corps/product/";
                            break;
                    }
                    var obj = JSON.parse(response);
                    files[files.length]={"name":obj["name"],"type":obj["type"],"location":"HARD"};
                    var markup = "<tr>";
                    markup = markup + "<td width='5%'>"+files.length+"</td>";
                    param=path+obj['name'];
                    markup = markup + "<td width='10%'><a href='#' onclick='ShowFile(\""+param+"\");'>"+"فایل" +(files.length)+"<a/>" + "</td>";
                    markup = markup + "<td width='10%'><a href="+path+obj['name']+" target='blank' download>دانلود<a/>" + "</td>";
                    markup = markup + "<td width='15%'>" + files[files.length-1].type + "</td>";
                    markup = markup + "<td width='5%'>" + "<img id='del-pic' src='../images/delete.png' onclick='DeleteFile("+(files.length-1)+")'>" + "</td>";
                    markup = markup + "</tr>";
                    $("#ManageTable > tbody").append(markup);
                    if ( files.length<=0 )
                    {
                          $("#about-upload").html("فایلی ضمیمه نشده است");
                    }
                    else
                    {
                          $("#about-upload").html(files.length+" فایل ضمیمه شده است");
                    }
                 }
              });
        }
        
        function DeleteFile(index)
        {
             swal({
               title: "برای حذف مطمئن هستید؟",
               text: "با تایید فایل مورد نظر حذف می شود",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) 
               {
                    switch (getCookie("UploadPart"))
                    {
                        case "Modir-Pic":
                            var files=eval("files"+0);
                            path="../images/corps/modir/";
                            break;
                        case "Product1":
                            var files=eval("files"+1);
                            path="../images/corps/product/";
                            break;
                        case "Product2":
                            var files=eval("files"+2);
                            path="../images/corps/product/";
                            break;
                        case "Product3":
                            var files=eval("files"+3);
                            path="../images/corps/product/";
                            break;
                        case "Product4":
                            var files=eval("files"+4);
                            path="../images/corps/product/";
                            break;
                        case "Product5":
                            var files=eval("files"+5);
                            path="../images/corps/product/";
                            break;
                        case "Product6":
                            var files=eval("files"+6);
                            path="../images/corps/product/";
                            break;
                    }
                    
                 var del=true;
                 var form_data = new FormData();                  
                 form_data.append('file', files[index].name);
                 if ( getCookie("UploadPart")=="Modir-Pic" )
                 {
                     form_data.append('path', "../images/corps/modir/");
                 }
                 else
                 {
                     form_data.append('path', "../images/corps/product/");
                 }
                 form_data.append('delete', del);
                 $.ajax({
                     url: 'includes/delete_file.php', 
                     cache: false,
                     contentType: false,
                     processData: false,
                     data: form_data,                         
                     type: 'post',
                     success: function(response)
                     {
                     }
                  });
                    
                    files.splice(index, 1);
                    var tableHeaderRowCount = 0;
                    var table = document.getElementById('ManageTable');
                    var rowCount = table.rows.length;
                    for (var i = tableHeaderRowCount; i < rowCount; i++) 
                    {
                        table.deleteRow(tableHeaderRowCount);
                    }
                    if ( files.length<=0 )
                    {
                          $("#about-upload").html("فایلی ضمیمه نشده است");
                    }
                    else
                    {
                          $("#about-upload").html(files.length+" فایل ضمیمه شده است");
                    }
                    for (var i=0;i<files.length;i++)
                    {
                        var markup = "<tr>";
                        markup = markup + "<td width='5%'>"+(i+1)+"</td>";
                        param=path+files[i].name;
                        markup = markup + "<td width='10%'><a href='#' onclick='ShowFile(\""+param+"\");'>"+"فایل" +(i+1)+"<a/>" + "</td>";
                        markup = markup + "<td width='10%'><a href="+path+files[i].name+" target='blank' download>دانلود<a/>" + "</td>";
                        markup = markup + "<td width='15%'>" + files[i].type + "</td>";
                        markup = markup + "<td width='5%'>" + "<img id='del-pic' src='../images/delete.png' onclick='DeleteFile("+(files.length-1)+")'>" + "</td>";
                        markup = markup + "</tr>";
                        $("#ManageTable > tbody").append(markup);					
                    }
               } 
             });
        }
        
        function close_upload_manager()
        {
            switch (getCookie("UploadPart"))
            {
                case "Modir-Pic":
                    var files=eval("files"+0);
                    break;
                case "Product1":
                    var files=eval("files"+1);
                    break;
                case "Product2":
                    var files=eval("files"+2);
                    break;
                case "Product3":
                    var files=eval("files"+3);
                    break;
                case "Product4":
                    var files=eval("files"+4);
                    break;
                case "Product5":
                    var files=eval("files"+5);
                    break;
                case "Product6":
                    var files=eval("files"+6);
                    break;
            }
            for (var i=0;i<files.length;i++)
            {
                if ( files[i].location=="HARD" )
                {
                     var del=true;
                     var form_data = new FormData();                  
                     form_data.append('file', files[i].name);
                     if ( getCookie("UploadPart")=="Modir-Pic" )
                     {
                         form_data.append('path', "../images/corps/modir/");
                     }
                     else
                     {
                         form_data.append('path', "../images/corps/product/");
                     }
                     form_data.append('delete', del);
                     $.ajax({
                         url: 'includes/delete_file.php', 
                         cache: false,
                         contentType: false,
                         processData: false,
                         data: form_data,                         
                         type: 'post',
                         success: function(response)
                         {
                         }
                     });
                     //files.splice(i, 1);
                }
             }
             i=0;
             while (i<files.length)
             {
                if ( files[i].location=="HARD" )
                {
                    files.splice(i, 1);
                }
                else
                {
                    i=i+1;
                }
             }   
             var tableHeaderRowCount = 0;
             var table = document.getElementById('ManageTable');
             var rowCount = table.rows.length;
             for (var i = tableHeaderRowCount; i < rowCount; i++) 
             {
                 table.deleteRow(tableHeaderRowCount);
             }
             hide_window('GetCorpProducts');
        }

        function exit_new_info()
        {
            for (var k=0;k<=6;k++)
            {
                var files=eval("files"+k);
            
                for (var i=0;i<files.length;i++)
                {
                    if ( files[i].location=="HARD" )
                    {
                         var del=true;
                         var form_data = new FormData();                  
                         form_data.append('file', files[i].name);
                         if ( getCookie("UploadPart")=="Modir-Pic" )
                         {
                             form_data.append('path', "../images/corps/modir/");
                         }
                         else
                         {
                             form_data.append('path', "../images/corps/product/");
                         }
                         form_data.append('delete', del);
                         $.ajax({
                             url: 'includes/delete_file.php', 
                             cache: false,
                             contentType: false,
                             processData: false,
                             data: form_data,                         
                             type: 'post',
                             success: function(response)
                             {
                             }
                         });
                    }
                 }
                 files0=[];
                 files1=[];
                 files2=[];
                 files3=[];
                 files4=[];
                 files5=[];
                 files6=[];
             }
             var tableHeaderRowCount = 0;
             var table = document.getElementById('ManageTable');
             var rowCount = table.rows.length;
             for (var i = tableHeaderRowCount; i < rowCount; i++) 
             {
                 table.deleteRow(tableHeaderRowCount);
             }
             hide_window('PopupWindow4');
        }

        function ShowFile(file_name)
        {
             var win = window.open("includes/show_file.php?file="+file_name, '_blank');
             win.focus();
        }

       /* Upload Manage End */
       
       /*** Disabled ***/
        function Set_Disable()
        {
            if (getCookie("user_type")=="mali" )
            {
                $("#page1 *").attr("disabled", true);
                $("#page2 *").attr("disabled", true);
                $("#page3 *").attr("disabled", true);
                $("#page4 *").attr("disabled", true);
                $("#page5 *").attr("disabled", true);
                $("#page1 a").css("pointer-events","none")
                $("#page2 a").css("pointer-events","none")
                $("#page3 a").css("pointer-events","none")
                $("#page4 a").css("pointer-events","none")
                $("#page5 a").css("pointer-events","none")
            }
            if (getCookie("user_type")=="corp" )
            {
                $("#page5 *").attr("disabled", true);
                $("#page6 *").attr("disabled", true);
            }
        }       
       
        function SearchTableItem() 
        {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("SearchTable");
          filter = input.value.toUpperCase();
          table=document.getElementById("search-tbl");
          tr = table.getElementsByTagName("tr");
          
          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              } else 
              {
                tr[i].style.display = "none";
              }
            }
          }
        }
        
        function setFocusToSeachBox()
        {
            document.getElementById("SearchTable").focus();
        }
        function DeleteSearchtext()
        {
            document.getElementById('SearchTable').value = ''
            SearchTableItem();
        }


        /* Go To Next Element By Press ENTER */
        jQuery.extend(jQuery.expr[':'], {
            focusable: function (el, index, selector) {
                return $(el).is('a, button, :input, [tabindex]');
            }
        });
        
        $(document).on('keypress', 'input,select', function (e) {
            if (e.which == 13) {
                e.preventDefault();
                // Get all focusable elements on the page
                var $canfocus = $(':focusable');
                var index = $canfocus.index(this) + 1;
                if (index >= $canfocus.length) index = 0;
                $canfocus.eq(index).focus();
            }
        });
        /*****************************************/

        function GoToProfile(code)
        {
            setCookie("user_page", code, 1); // a user page that we visit it
            //top.location = "control-panel.php?mnu=1";
            top.location = "includes/profile.php";
        }      

        function ChangeStateFilter()
        {
             setCookie("filter1",$("#all_states").val(),1);
             var search=true;
             var form_data = new FormData();                  
             form_data.append('state', $("#all_states").val());
             form_data.append('search', search);
             form_data.append('what', 'filter-center');
             $.ajax({
                 url: 'includes/search.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#all_centers').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('all_centers');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'شرکت های کلیه مراکز';
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
                        select = document.getElementById('all_centers');
                        var opt = document.createElement('option');
                        opt.value = '';
                        opt.innerHTML = 'شرکت های کلیه مراکز';
                        select.appendChild(opt);
                    }
                 }
              });
            setCookie("filter2","",1);
            setCookie("filter3",$("#all_corps").val(),1);
            $(".area3").load("includes/corp-info-list.php");
        }

        function ChangeCenterFilter()
        {
            setCookie("filter1",$("#all_states").val(),1);
            setCookie("filter2",$("#all_centers").val(),1);
            setCookie("filter3",$("#all_corps").val(),1);
            $(".area3").load("includes/corp-info-list.php");
        }

        function ChangeCorpFilter()
        {
            setCookie("filter1",$("#all_states").val(),1);
            setCookie("filter2",$("#all_centers").val(),1);
            setCookie("filter3",$("#all_corps").val(),1);
            $(".area3").load("includes/corp-info-list.php");
        }

        window.onerror = function(msg, url, linenumber) {
            alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
            return true;
        }
     
    </script>
</body>
</html>


