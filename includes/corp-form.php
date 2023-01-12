<html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>اتوماسیون شرکت های مرکز رشد و فناور</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<link href="../css/responsive.css" rel="stylesheet" type="text/css" />
		<script src="../jquery/javascript.js" type="text/javascript"></script>
        <script src="../jquery/jquery.js" type="text/javascript"></script>
        <script type="text/javascript" src="../jquery/PersianDatePicker.min.js"></script>
        <script type="text/javascript" src="../jquery/alert.js"></script>
        <link type="text/css" rel="stylesheet" href="../css/PersianDatePicker.min.css" />
        <script src="../PersianDate/dist/persian-date.js" type="text/javascript"></script>
	</head>
<body>
    <div id="snackbar"></div>
    <?php
        if ( $_COOKIE["user_type"]!="corp" )
        {
        require_once "functions.php";
        $conn=connect_to_database();
    ?>
    <div id="area-back">
    
    <div id="SearchGroup">
            <table width="70%">
                <tr>
                    <td width="5%">
                        <input type="text" id="SearchTable" size="30" maxlength="30" onkeyup="SearchTableItem()" placeholder="جستجو...">
                    </td>
                    <td width="10%">
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
                    <td width="10%">
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
                </tr>
            </table>
    </div>
    <?php $_COOKIE["filter1"]=""; ?>
    <?php $_COOKIE["filter2"]=""; ?>
    <div class="area3">
           <?php include 'includes/corp-form-list.php'; ?> 
    </div>
    </div>
    <?php
        }
    ?>
    
    <div id="FormEmtiaz">
        <div id="popupContact">
             <div class="formMember">
                <table width="100%">
                    <tr>
                        <td width="30%"><select id="years" onchange="SetInfo()"></select></td>
                        <td widh="40%"><div id="report-status"><div></td>
                        <?php if ( $_COOKIE["user_type"]=="admin_all" || $_COOKIE["user_type"]=="admin" ) { ?>
                            <td width="30%"><div id="report-open"><a href="#" id="btns" onclick ="Open_report()" >باز کردن گزارش</a></div></td>
                        <?php } ?>
                    </tr>
                 
                 
                 </table>
				<br class="my-break"/>
                 <input type="hidden" id="UserCode">
                 <input type="hidden" id="StateCode">
                 <input type="hidden" id="CenterCode">
                 <input type="hidden" id="NewEdit">
				
				<div class="tab">
                  <button class="tablinks" onclick="openPage(event, 'page1')" id="defaultOpen">دستاوردهای مالی</button>
                  <button class="tablinks" onclick="openPage(event, 'page2')">دستاوردهای علمی و پژوهشی</button>
                  <button class="tablinks" onclick="openPage(event, 'page3')">نیروی انسانی</button>
                  <button class="tablinks" onclick="openPage(event, 'page4')">بازاریابی</button>
                  <button class="tablinks" onclick="openPage(event, 'page5')">فعالیت آموزشی</button>
                  <button class="tablinks" onclick="openPage(event, 'page6')">تعامل با پارک</button>
                  <button class="tablinks" onclick="openPage(event, 'page7')">تعامل با سایر واحدها</button>
                  <button class="tablinks" onclick="openPage(event, 'page8')">نظرسنجی</button>
                  <button class="tablinks" onclick="openPage(event, 'page9')">گزارش اقدامات</button>
                </div>
                
                <div id="page1" class="tabcontent"> <!-- Page 1 -->
                    <p class="lbl-member">دستاوردهای مالی شرکت بر اساس زمينه فعاليت <lable id="emz">(حداکثر 40امتياز)</lable></p>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('mali1-')" >+</a>قراردادهای اجرا شده یا فروش فاکتوری</p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="1%">ردیف</th>
                              <th width="4%">عنوان پروژه/محصول/خدمت<br/>محل اجرا<br/>کارفرما</th>
                              <th width="2%">مبلغ قرارداد/فاکتور(ریال)</th>
                              <th width="1%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="mali1-1">
                                <td>
                                    <input type="text" size="1" id="radif" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44"  maxlength="44" id="onvan-mali1-1" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali1-1" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali1-1" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali1-1" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali1')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-mali1-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-mali1-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload1" onclick="ShowFileManage('Mali1_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row1" onclick="DeleteRow('mali1-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali1-2">
                                <td>
                                    <input type="text" size="1" id="radif" value="2" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali1-2" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali1-2" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali1-2" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali1-2" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali1')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-mali1-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-mali1-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload2" onclick="ShowFileManage('Mali1_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row2" onclick="DeleteRow('mali1-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali1-3">
                                <td>
                                    <input type="text" size="1" id="radif" value="3" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali1-3" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali1-3" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali1-3" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali1-3" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali1')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-mali1-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-mali1-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload3" onclick="ShowFileManage('Mali1_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row3" onclick="DeleteRow('mali1-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali1-4">
                                <td>
                                    <input type="text" size="1" id="radif" value="4" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali1-4" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali1-4" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali1-4" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali1-4" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali1')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-mali1-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-mali1-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload4" onclick="ShowFileManage('Mali1_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row4" onclick="DeleteRow('mali1-',4)">
                                         [حذف]
                                     </label>
                                </td>
                              <tfoot>
                                <tr  class="mali1-1">
                                  <th width="1%">جمع</th>
                                  <th width="7%"></th>
                                  <th width="3%"><input type="text" class="en" size="15" id="jam-mali1" disabled></th>
                                  <th width="1%"></th>
                                  <th width="3%"></th>
                                </tr>
                              </tfoot>
                          </tbody>
                    </table>
                    <div class="upload-note-mali1">
                         <textarea id="note-mali1" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('mali2-')" >+</a>قراردادهای در دست اجرا</p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="1%">ردیف</th>
                              <th width="4%">عنوان پروژه/محصول/خدمت</br>محل اجرا<br/>کارفرما</th>
                              <th width="3%">درصد پیشرفت<br/><br/>مبلغ قرارداد(ریال)</th>
                              <th width="1%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="mali2-1">
                                <td>
                                    <input type="text" size="1" id="radif" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali2-1" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali2-1" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali2-1" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali2-1">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali2-1" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali2')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali2-1">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali2-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload5" onclick="ShowFileManage('Mali2_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row5" onclick="DeleteRow('mali2-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali2-2">
                                <td>
                                    <input type="text" size="1" id="radif" value="2" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali2-2" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali2-2" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali2-2" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali2-2">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali2-2" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali2')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali2-2">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali2-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload6" onclick="ShowFileManage('Mali2_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row6" onclick="DeleteRow('mali2-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali2-3">
                                <td>
                                    <input type="text" size="1" id="radif" value="3" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali2-3" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali2-3" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali2-3" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali2-3">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali2-3" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali2')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali2-3">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali2-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload7" onclick="ShowFileManage('Mali2_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row7" onclick="DeleteRow('mali2-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali2-4">
                                <td>
                                    <input type="text" size="1" id="radif" value="4" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali2-4" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali2-4" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali2-4" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali2-4">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali2-4" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali2')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali2-4">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali2-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload8" onclick="ShowFileManage('Mali2_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row8" onclick="DeleteRow('mali2-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                              <tfoot>
                                <tr  class="mali2-1">
                                  <th width="1%">جمع</th>
                                  <th width="7%"></th>
                                  <th width="3%"><input type="text" class="en"  size="15" id="jam-mali2" disabled></th>
                                  <th width="1%"></th>
                                  <th width="3%"></th>
                                </tr>
                              </tfoot>
                          </tbody>
                    </table>
                    <div class="upload-note-mali2">
                         <textarea id="note-mali2" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('mali3-')" >+</a>قراردادهايی که از طريق پارک منعقد گرديده است (قراردادهای اجراء شده و در دست اجرا)</p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="1%">ردیف</th>
                              <th width="4%">عنوان پروژه/محصول/خدمت<br/>محل اجرا<br/>کارفرما</th>
                              <th width="3%">درصد پیشرفت<br/><br/>مبلغ قرارداد(ریال)</th>
                              <th width="1%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="mali3-1">
                                <td>
                                    <input type="text" size="1" id="radif" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali3-1" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali3-1" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali3-1" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali3-1">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali3-1" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali3')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali3-1">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali3-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload9" onclick="ShowFileManage('Mali3_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row9" onclick="DeleteRow('mali3-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali3-2">
                                <td>
                                    <input type="text" size="1" id="radif" value="2" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali3-2" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali3-2" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali3-2" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali3-2">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali3-2" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali3')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali3-2">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali3-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload10" onclick="ShowFileManage('Mali3_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row10" onclick="DeleteRow('mali3-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali3-3">
                                <td>
                                    <input type="text" size="1" id="radif" value="3" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali3-3" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali3-3" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali3-3" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali3-3">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali3-3" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali3')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali3-3">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali3-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload11" onclick="ShowFileManage('Mali3_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row11" onclick="DeleteRow('mali3-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali3-4">
                                <td>
                                    <input type="text" size="1" id="radif" value="4" disabled>
                                </td>
                                <td>
                                    <input type="text" size="44" maxlength="44" id="onvan-mali3-4" placeholder="عنوان پروژه/محصول/خدمت">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="mahal-mali3-4" placeholder="محل اجرا">
                                    <br/>
                                    <input type="text" size="44" maxlength="44" id="karfarma-mali3-4" placeholder="کارفرما">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="darsad-mali3-4">
                                    <br/>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali3-4" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali3')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali3-4">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali3-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload12" onclick="ShowFileManage('Mali3_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row12" onclick="DeleteRow('mali3-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                              <tfoot>
                                <tr  class="mali3-1">
                                  <th width="1%">جمع</th>
                                  <th width="7%"></th>
                                  <th width="3%"><input type="text" class="en"  size="15" id="jam-mali3" disabled></th>
                                  <th width="1%"></th>
                                  <th width="3%"></th>
                                </tr>
                              </tfoot>
                          </tbody>
                          </tbody>
                    </table>
                    <div class="upload-note-mali3">
                         <textarea id="note-mali3" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('mali4-')" >+</a>جذب سرمايه گذار (انعقاد قرارداد/تفاهم نامه)</p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="1%">ردیف</th>
                              <th width="5%">نام سرمایه گذار</th>
                              <th width="2%">میزان جذب سرمایه(ریال)</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <td width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="mali4-1">
                                <td>
                                    <input type="text" size="1" id="radif" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-mali4-1" placeholder="نام سرمایه گذار">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali4-1" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali4')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali4-1">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali4-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload13" onclick="ShowFileManage('Mali4_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row13" onclick="DeleteRow('mali4-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali4-2">
                                <td>
                                    <input type="text" size="1" id="radif" value="2" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-mali4-2" placeholder="نام سرمایه گذار">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali4-2" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali4')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali4-2">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali4-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload14" onclick="ShowFileManage('Mali4_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row14" onclick="DeleteRow('mali4-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali4-3">
                                <td>
                                    <input type="text" size="1" id="radif" value="3" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-mali4-3" placeholder="نام سرمایه گذار">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali4-3" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali4')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali4-3">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali4-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload15" onclick="ShowFileManage('Mali4_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row15" onclick="DeleteRow('mali4-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="mali4-4">
                                <td>
                                    <input type="text" size="1" id="radif" value="4" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-mali4-4" placeholder="نام سرمایه گذار">
                                </td>
                                <td>
                                    <input type="text" class="en" size="15" maxlength="15" id="mablagh-mali4-4" onkeyup="javascript:this.value=Comma(this.value);SetJam('mali4')">
                                </td>
                                <td>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiaz-mali4-4">
                                    <br/>
                                    <input type="text" class="en" size="3" maxlength="3" id="emtiazm-mali4-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload16" onclick="ShowFileManage('Mali4_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row16" onclick="DeleteRow('mali4-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          <tfoot>
                            <tr class="mali4-1">
                              <th width="1%">جمع</th>
                              <th width="7%"></th>
                              <th width="3%"><input type="text" class="en"  size="15" id="jam-mali4" disabled></th>
                              <th width="1%"></th>
                              <td width="3%"></th>
                            </tr>
                          </tfoot>
                          </tbody>
                    </table>
                    <div class="upload-note-mali4">
                         <textarea id="note-mali4" placeholder="توضیحات"></textarea>
                    </div>
                    <br/>
                    <br/>
                </div> <!--Page1-->
                
                <div id="page2" class="tabcontent"> <!-- Page 2 -->
                    <p class="lbl-member">دستاوردهای علمی، پژوهشی و توسعه دامنه فعاليت <lable id="emz">(حداکثر 10 امتياز)</lable></p>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast1-')" >+</a>ثبت اختراع/ثبت نرم افزار/ثبت ژن/ ثبت ميکروارگانيسم (مورد تائيد مراجع ذی صلاح داخلی/خارجی)<br/><br/><lable id="emz">(حداکثر4 امتياز) (هر ثبت اختراع 1 امتياز) (هر ثبت اختراع دارای گواهی ارزيابی اختراع از سازمان پژوهش های علمی و صنعتی ايران 4 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast1-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast1-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast1-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast1-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast1-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast1-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload17" onclick="ShowFileManage('Dast1_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row17" onclick="DeleteRow('dast1-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast1-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast1-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast1-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast1-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast1-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast1-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload18" onclick="ShowFileManage('Dast1_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row18" onclick="DeleteRow('dast1-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast1-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast1-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast1-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast1-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast1-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast1-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload19" onclick="ShowFileManage('Dast1_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row19" onclick="DeleteRow('dast1-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast1-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast1-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast1-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast1-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast1-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast1-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload20" onclick="ShowFileManage('Dast1_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row20" onclick="DeleteRow('dast1-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast2-')" >+</a>اخذ گواهينامه صلاحيت پيمانکاری/ پروانه فعاليت جديد يا توسعه دامنه فعاليت از مراجع ذيربط <lable id="emz">(هر مورد 2 امتياز و حداکثر4 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast2-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast2-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast2-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast2-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast2-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast2-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload21" onclick="ShowFileManage('Dast2_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row21" onclick="DeleteRow('dast2-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast2-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast2-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast2-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast2-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast2-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast2-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload22" onclick="ShowFileManage('Dast2_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row22" onclick="DeleteRow('dast2-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast2-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast2-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast2-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast2-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast2-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast2-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload23" onclick="ShowFileManage('Dast2_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row23" onclick="DeleteRow('dast2-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast2-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast2-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast2-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast2-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast2-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast2-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload24" onclick="ShowFileManage('Dast2_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row24" onclick="DeleteRow('dast2-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast3-')" >+</a>تاييديه علمی و مجوز (از مراجعی نظير سازمان پژوهش های علمی و صنعتی ايران و نيز اداره کل دامپزشکی، اداره کل نظارت غذا، دارو و ساير مراجع ذيصلاح)<br/><br/><lable id="emz">(هر مورد 4 امتياز و حداکثر 8 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast3-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast3-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast3-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast3-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast3-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast3-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload25" onclick="ShowFileManage('Dast3_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row25" onclick="DeleteRow('dast3-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast3-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast3-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast3-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast3-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast3-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast3-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload26" onclick="ShowFileManage('Dast3_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row26" onclick="DeleteRow('dast3-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast3-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast3-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast3-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast3-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast3-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast3-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload27" onclick="ShowFileManage('Dast3_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row27" onclick="DeleteRow('dast3-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast3-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast3-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast3-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast3-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast3-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast3-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload28" onclick="ShowFileManage('Dast3_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row28" onclick="DeleteRow('dast3-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast4-')" >+</a>چاپ مقالات علمی پژوهشی داخلی/خارجی در مجلات علمی وزارت علوم مشروط به درج اسم پارک به عنوان حامی<br/><br/><lable id="emz">(حداکثر 4 امتياز)(هر مقاله داخلی 2 امتياز، هر مقاله خارجی 4 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast4-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast4-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast4-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast4-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast4-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast4-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload29" onclick="ShowFileManage('Dast4_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row29" onclick="DeleteRow('dast4-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast4-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast4-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast4-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast4-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast4-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast4-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload30" onclick="ShowFileManage('Dast4_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row30" onclick="DeleteRow('dast4-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast4-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast4-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast4-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast4-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast4-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast4-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload31" onclick="ShowFileManage('Dast4_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row31" onclick="DeleteRow('dast4-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast4-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast4-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast4-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast4-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast4-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast4-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload32" onclick="ShowFileManage('Dast4_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row32" onclick="DeleteRow('dast4-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast5-')" >+</a>ثبت اختراع خارج از کشور دستاوردهای مرتبط با ايده محوری يا زمينه تخصصی  <lable id="emz">(هر اختراع 10 امتياز و حداکثر 10 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast5-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast5-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast5-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast5-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast5-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast5-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload33" onclick="ShowFileManage('Dast5_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row33" onclick="DeleteRow('dast5-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast5-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast5-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast5-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast5-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast5-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast5-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload34" onclick="ShowFileManage('Dast5_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row34" onclick="DeleteRow('dast5-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast5-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast5-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast5-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast5-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast5-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast5-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload35" onclick="ShowFileManage('Dast5_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row35" onclick="DeleteRow('dast5-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast5-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast5-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast5-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast5-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast5-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast5-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload36" onclick="ShowFileManage('Dast5_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row36" onclick="DeleteRow('dast5-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('dast6-')" >+</a>کسب جوايز و تقديرنامه در سال ارزيابی  <lable id="emz">(حداکثر 4 امتياز) </lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="8%">عنوان</th>
                              <th width="8%">مرجع ثبت یا صدور مجوز<br/><br/>تاریخ</th>
                              <th width="2%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="dast6-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast6-1" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast6-1" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast6-1">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast6-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast6-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload37" onclick="ShowFileManage('Dast6_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row37" onclick="DeleteRow('dast6-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast6-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast6-2" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast6-2" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast6-2">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast6-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast6-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload38" onclick="ShowFileManage('Dast6_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row38" onclick="DeleteRow('dast6-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast6-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast6-3" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast6-3" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast6-3">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast6-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast6-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload39" onclick="ShowFileManage('Dast6_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row39" onclick="DeleteRow('dast6-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="dast6-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-dast6-4" placeholder="عنوان">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="marja-dast6-4" placeholder="مرجع ثبت یا صدور مجوز">
                                    <br/>
                                    <br/>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-dast6-4">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-dast6-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-dast6-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload40" onclick="ShowFileManage('Dast6_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row40" onclick="DeleteRow('dast6-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br/>
                    <br/>
                </div> <!--Page2-->

                
                <div id="page3" class="tabcontent"> <!-- Page 3 -->
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('niroo')" >+</a>نيروی انسانی <lable id="emz">(حداکثر 10 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="2%">ردیف</th>
                              <th width="14%">نام و نام خانوادگی</th>
                              <th width="7%">میزان تحصیلات</th>
                              <th width="4%">همکاری</th>
                              <th width="2%">سابقه تجربی</th>
                              <th width="3%">وضعیت بیمه</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width ="1%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="niroo1">
                                <td>
                                    <input type="text" size="2" id="radif" value="1" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo1" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo1">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo1">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo1">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo1">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo1">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo1">
                                </td>
                                <td>
                                    <a href="#" id="del-row41" class="rowsEditDelete" onclick ="DeleteRow('niroo',1)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo2">
                                <td>
                                    <input type="text" size="2" id="radif" value="2" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo2" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo2">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo2">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo2">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo2">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo2">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo2">
                                </td>
                                <td>
                                    <a href="#" id="del-row42" class="rowsEditDelete" onclick ="DeleteRow('niroo',2)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo3">
                                <td>
                                    <input type="text" size="2" id="radif" value="3" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo3" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo3">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo3">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo3">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo3">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo3">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo3">
                                </td>
                                <td>
                                    <a href="#" id="del-row43" class="rowsEditDelete" onclick ="DeleteRow('niroo',3)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo4">
                                <td>
                                    <input type="text" size="2" id="radif" value="4" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo4" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo4">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo4">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo4">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo4">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo4">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo4">
                                </td>
                                <td>
                                    <a href="#" id="del-row44" class="rowsEditDelete" onclick ="DeleteRow('niroo',4)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo5">
                                <td>
                                    <input type="text" size="2" id="radif" value="5" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo5" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo5">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo5">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo5">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo5">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo5">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo5">
                                </td>
                                <td>
                                    <a href="#" id="del-row45" class="rowsEditDelete" onclick ="DeleteRow('niroo',5)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo6">
                                <td>
                                    <input type="text" size="2" id="radif" value="6" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo6" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo6">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo6">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo6">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo6">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo6">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo6">
                                </td>
                                <td>
                                    <a href="#" id="del-row46" class="rowsEditDelete" onclick ="DeleteRow('niroo',6)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo7">
                                <td>
                                    <input type="text" size="2" id="radif" value="7" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo7" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo7">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo7">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo7">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo7">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo7">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo7">
                                </td>
                                <td>
                                    <a href="#" id="del-row47" class="rowsEditDelete" onclick ="DeleteRow('niroo',7)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo8">
                                <td>
                                    <input type="text" size="2" id="radif" value="8" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo8" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo8">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo8">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo8">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo8">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo8">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo8">
                                </td>
                                <td>
                                    <a href="#" id="del-row48" class="rowsEditDelete" onclick ="DeleteRow('niroo',8)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo9">
                                <td>
                                    <input type="text" size="2" id="radif" value="9" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo9" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo9">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo9">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo9">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo9">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo9">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo9">
                                </td>
                                <td>
                                    <a href="#" id="del-row49" class="rowsEditDelete" onclick ="DeleteRow('niroo',9)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                            <tr class="niroo10">
                                <td>
                                    <input type="text" size="2" id="radif" value="10" disabled>
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-niroo10" placeholder="نام و نام خانوادگی">
                                </td>
                                <td>
                                    <select style="width:200px;" id="tahsil-niroo10">
                                        <option value="">انتخاب...</option>
                                        <option value="دیپلم و زیر دایپلم">دیپلم و زیر دیپلم</option>
                                        <option value="دیپلم">دیپلم</option>
                                        <option value="فوق دیپلم">فوق دیپلم</option>
                                        <option value="کارشناسی">کارشناسی</option>
                                        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
                                        <option value="دکترا و بالاتر">دکترا و بالاتر</option>
                                    </select>
                                </td>
                                <td>
                                    <select style="width:120px;" id="hamkari-niroo10">
                                        <option value="">انتخاب...</option>
                                        <option value="تمام وقت">تمام وقت</option>
                                        <option value="پاره وقت">پاره وقت</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="sabeghe-niroo10">
                                </td>
                                <td>
                                    <select style="width:90px;" id="bime-niroo10">
                                        <option value="">انتخاب...</option>
                                        <option value="بیمه">بیمه</option>
                                        <option value="بازنشسته">بازنشسته</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiaz-niroo10">
                                    <br/>
                                    <input type="text" class="en" size="4" maxlength="4" id="emtiazm-niroo10">
                                </td>
                                <td>
                                    <a href="#" id="del-row50" class="rowsEditDelete" onclick ="DeleteRow('niroo',10)" ><img src='../images/delete.png'></a>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-niroo">
                        <label class="upload-btn" id="file-upload41" onclick="ShowFileManage('Niroo','');">
                            آپلود مستندات نیروی انسانی
                        </label>
                    </div>
                </div> <!--Page3-->
                
                <div id="page4" class="tabcontent">   <!-- Page 4 -->
                    <p class="lbl-member">بازاريابی <lable id="emz">(حداکثر 10 امتياز)</lable></p>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('bazar1-')" >+</a>شرکت در نمايشگاه های داخلی/ خارجی <lable id="emz">(حداکثر 5 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="12%">نام نمایشگاه</th>
                              <th width="12%">محل برگزاری</th>
                              <th width="3%">تاریخ برگزاری<br/><br/>داخلی/خارجی</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="4%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="bazar1-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar1-1" placeholder="نام نمایشگاه">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar1-1" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="9" maxlength="10" id="date-bazar1-1">
                                    <br/>
                                    <br/>
                                    <select style="width:100px;" id="type-bazar1-1">
                                        <option value="">انتخاب...</option>
                                        <option value="داخلی">داخلی</option>
                                        <option value="خارجی">خارجی</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar1-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar1-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload42" onclick="ShowFileManage('Bazar1_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row51" onclick="DeleteRow('bazar1-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar1-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar1-2" placeholder="نام نمایشگاه">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar1-2" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="9" maxlength="10" id="date-bazar1-2">
                                    <br/>
                                    <br/>
                                    <select style="width:100px;" id="type-bazar1-2">
                                        <option value="">انتخاب...</option>
                                        <option value="داخلی">داخلی</option>
                                        <option value="خارجی">خارجی</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar1-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar1-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload43" onclick="ShowFileManage('Bazar1_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row52" onclick="DeleteRow('bazar1-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar1-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar1-3" placeholder="نام نمایشگاه">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar1-3" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="9" maxlength="10" id="date-bazar1-3">
                                    <br/>
                                    <br/>
                                    <select style="width:100px;" id="type-bazar1-3">
                                        <option value="">انتخاب...</option>
                                        <option value="داخلی">داخلی</option>
                                        <option value="خارجی">خارجی</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar1-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar1-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload44" onclick="ShowFileManage('Bazar1_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row53" onclick="DeleteRow('bazar1-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar1-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar1-4" placeholder="نام نمایشگاه">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar1-4" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="9" maxlength="10" id="date-bazar1-4">
                                    <br/>
                                    <br/>
                                    <select style="width:100px;" id="type-bazar1-4">
                                        <option value="">انتخاب...</option>
                                        <option value="داخلی">داخلی</option>
                                        <option value="خارجی">خارجی</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar1-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar1-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload45" onclick="ShowFileManage('Bazar1_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row54" onclick="DeleteRow('bazar1-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-bazar1">
                         <textarea id="note-bazar1" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member">تبليغات در رسانه ها و غيره <lable id="emz">( نام رسانه و نوع تبليغ ذکر شود) (حداکثر 2 امتياز)</lable></p>


                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="75%">شرح</th>
                              <th width="10%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="15%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>
                                    <textarea id="onvan-bazar2" class="MyText"></textarea>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload46" onclick="ShowFileManage('Bazar2','');">
                                         [فایل ها]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>   
                    <!--<label class="upload-btn1" id="files-bazar2" onclick="ShowFileManage('Bazar2','');">-->
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('bazar3-')" >+</a>شرکت در جشنواره ها، سمينارها <lable id="emz">(حداکثر 1 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="11%">عنوان(جشنواره/سمینار)</th>
                              <th width="3%">تاریخ برگزاری</th>
                              <th width="11%">نام برگزارکننده<br/><br/>محل برگزاری</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="bazar3-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar3-1" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar3-1">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-bazar3-1"placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar3-1"placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar3-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar3-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload47" onclick="ShowFileManage('Bazar3_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row55" onclick="DeleteRow('bazar3-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar3-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar3-2" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar3-2">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-bazar3-2" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar3-2" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar3-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar3-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload48" onclick="ShowFileManage('Bazar3_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row56" onclick="DeleteRow('bazar3-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar3-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar3-3" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar3-3">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-bazar3-3" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar3-3" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar3-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar3-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload49" onclick="ShowFileManage('Bazar3_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row57" onclick="DeleteRow('bazar3-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar3-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar3-4" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar3-4">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-bazar3-4" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar3-4" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar3-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar3-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload50" onclick="ShowFileManage('Bazar3_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row58" onclick="DeleteRow('bazar3-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-bazar3">
                         <textarea id="note-bazar3" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('bazar4-')" >+</a>برگزاری جشنواره ها، سمينارها <lable id="emz">(حداکثر 2 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="11%">عنوان(جشنواره/سمینار)</th>
                              <th width="3%">تاریخ برگزاری</th>
                              <th width="11%">محل برگزاری<br/><br/>نقش شرکت</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="bazar4-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar4-1" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar4-1">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar4-1" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-bazar4-1">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar4-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar4-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload51" onclick="ShowFileManage('Bazar4_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row59" onclick="DeleteRow('bazar4-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar4-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar4-2" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar4-2">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar4-2" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-bazar4-2">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar4-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar4-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload52" onclick="ShowFileManage('Bazar4_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row60" onclick="DeleteRow('bazar4-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar4-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar4-3" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar4-3">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar4-3" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-bazar4-3">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar4-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar4-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload53" onclick="ShowFileManage('Bazar4_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row61" onclick="DeleteRow('bazar4-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="bazar4-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-bazar4-4" placeholder="عنوان(جشنواره/سمینار)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-bazar4-4">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-bazar4-4" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-bazar4-4">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-bazar4-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-bazar4-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload54" onclick="ShowFileManage('Bazar4_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row62" onclick="DeleteRow('bazar4-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-bazar4">
                         <textarea id="note-bazar4" placeholder="توضیحات"></textarea>
                    </div>
                </div> <!--Page4-->
                
                <div id="page5" class="tabcontent">  <!-- Page 5 -->
                    <p class="lbl-member">فعاليت های آموزشی <lable id="emz">(حداکثر 10 امتياز)</lable> </p>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('amoozeshi1-')" >+</a>شرکت در همايش ها و دوره های آموزشی <lable id="emz">(حداکثر 4 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="13%">عنوان(جشنواره/سمینار/همایش/دوره آموزشی)</th>
                              <th width="4%">تاریخ برگزاری</th>
                              <th width="13%">نام برگزارکننده<br/><br/>محل برگزاری</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <td width="3%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="amoozeshi1-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi1-1" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi1-1">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-amoozeshi1-1" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi1-1" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi1-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi1-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload55" onclick="ShowFileManage('Amoozeshi1_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row63" onclick="DeleteRow('amoozeshi1-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi1-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi1-2" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi1-2">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-amoozeshi1-2" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi1-2" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi1-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi1-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload56" onclick="ShowFileManage('Amoozeshi1_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row64" onclick="DeleteRow('amoozeshi1-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi1-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi1-3" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi1-3">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-amoozeshi1-3" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi1-3" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi1-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi1-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload57" onclick="ShowFileManage('Amoozeshi1_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row65" onclick="DeleteRow('amoozeshi1-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi1-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi1-4" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi1-4">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="bargozar-amoozeshi1-4" placeholder="نام برگزارکننده">
                                    <br/>
                                    <br/>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi1-4" placeholder="محل برگزاری">
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi1-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi1-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload58" onclick="ShowFileManage('Amoozeshi1_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row66" onclick="DeleteRow('amoozeshi1-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-amoozeshi1">
                         <textarea id="note-amoozeshi1" placeholder="توضیحات"></textarea>
                    </div>
                    <p class="lbl-member"><a href="#" class="btns add-link" onclick ="AddRow('amoozeshi2-')" >+</a>برگزاری همايش ها و دوره های آموزشی <lable id="emz">(حداکثر 6 امتياز)</lable></p>
                    <table id="t-input">
                          <thead>
                            <tr>
                              <th width="13%">عنوان(جشنواره/سمینار/همایش/دوره آموزشی)</th>
                              <th width="4%">تاریخ برگزاری</th>
                              <th width="13%">محل برگزاری<br/><br/>نقش شرکت</th>
                              <th width="3%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                              <th width="4%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="amoozeshi2-1">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi2-1" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi2-1">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi2-1" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-amoozeshi2-1">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi2-1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi2-1">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload59" onclick="ShowFileManage('Amoozeshi2_',1);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row67" onclick="DeleteRow('amoozeshi2-',1)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi2-2">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi2-2" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi2-2">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi2-2" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-amoozeshi2-2">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi2-2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi2-2">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload60" onclick="ShowFileManage('Amoozeshi2_',2);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row68" onclick="DeleteRow('amoozeshi2-',2)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi2-3">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi2-3" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi2-3">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi2-3" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-amoozeshi2-3">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi2-3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi2-3">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload61" onclick="ShowFileManage('Amoozeshi2_',3);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row69" onclick="DeleteRow('amoozeshi2-',3)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                            <tr class="amoozeshi2-4">
                                <td>
                                    <input type="text" size="50" maxlength="50" id="onvan-amoozeshi2-4" placeholder="عنوان(جشنواره/سمینار/همایش/دوره آموزشی)">
                                </td>
                                <td>
                                    <input type="text" class="en" size="10" maxlength="10" id="date-amoozeshi2-4">
                                </td>
                                <td>
                                    <input type="text" size="50" maxlength="50" id="mahal-amoozeshi2-4" placeholder="محل برگزاری">
                                    <br/>
                                    <br/>
                                    <select style="width:200px;" id="naghsh-amoozeshi2-4">
                                        <option value="">انتخاب...</option>
                                        <option value="برگزارکننده اصلی">برگزارکننده اصلی</option>
                                        <option value="مشارکت کننده">مشارکت کننده</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-amoozeshi2-4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-amoozeshi2-4">
                                </td>
                                <td>
                                     <label class="upload-btn" id="file-upload62" onclick="ShowFileManage('Amoozeshi2_',4);">
                                         [فایل ها]
                                     </label>
                                     <br/>
                                     <br/>
                                     <label class="upload-btn" id="del-row70" onclick="DeleteRow('amoozeshi2-',4)">
                                         [حذف]
                                     </label>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                    <div class="upload-note-amoozeshi2">
                         <textarea id="note-amoozeshi2" placeholder="توضیحات"></textarea>
                    </div>
                </div> <!--Page5-->
                
                <div id="page6" class="tabcontent">  <!-- Page 6 -->
                    <p class="lbl-member">تعامل با پارک <lable id="emz">(حداکثر 10 امتياز)</lable></p>
                    <table id="t-input" style="text-align:right;">
                          <thead>
                            <tr>
                              <th width="90%">عنوان</th>
                              <th width="10%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>
                                حضور مستمر در پارک (برای شرکت های دارای قرارداد پشتيبانی اين امتياز محاسبه نمی شود) <lable id="emz1">(حداکثر 2 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamolp1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamolp1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                تحويل به موقع گزارشات و پاسخ به مکاتبات <lable id="emz1">(حداکثر 3 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamolp2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamolp2">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                حضور در جلسات <lable id="emz1">(حداکثر 3 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamolp3">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamolp3">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                رعايت سياست های پارک <lable id="emz1">(حداکثر 2 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamolp4">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamolp4">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                تعامل با سازمان ها و نهادهای خارج از پارک <lable id="emz1">(حداکثر 2 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamolp5">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamolp5">
                                </td>
                            </tr>
                          </tbody>
                    </table>
                </div> <!--Page6-->

                <div id="page7" class="tabcontent">  <!-- Page 7 -->
                    <p class="lbl-member">تعامل شرکت با ساير واحدهای عضو پارک و مرکز رشد  <lable id="emz">(حداکثر 10 امتياز)</lable></p>
                    <table id="t-input" style="text-align:right;">
                          <thead>
                            <tr>
                              <th width="90%">عنوان</th>
                              <th width="10%">امتیاز کارشناس<br/><br/>امتیاز مدیر</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>
                                تعامل با ساير شرکتهای  پارک به صورت برون سپاری <lable id="emz1">(حداکثر 6 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamols1">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamols1">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                تعامل با ساير شرکتهای پارک به صورت اجرای کارمشترک <lable id="emz1">(حداکثر 4 امتياز)</lable>   
                                </td>
                                <td style="text-align:center;">
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiaz-taamols2">
                                    <br/>
                                    <input type="text" class="en" size="2" maxlength="2" id="emtiazm-taamols2">
                                </td>
                            </tr>
                          </tbody>
                    </table>
                </div> <!--Page7-->

                <div id="page8" class="tabcontent">  <!-- Page 8 -->
                    <p class="lbl-member">نظر سنجی</p>
                    <table id="t-input" style="text-align:right;">
                          <thead>
                            <tr>
                              <th width="5%">ردیف</th>
                              <th width="80%">عنوان</th>
                              <th width="15%">امتیاز</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="1" disabled>
                                </td>
                                <td>
                                   موثر بودن برگزاری کلاس های آموزشی جهت بالا بردن مهارت های شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji1">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="2" disabled>
                                </td>
                                <td>
                                   موثر بودن سرمايه گذاری در بخش تحقيق و توسعه در توسعه شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji2">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="3" disabled>
                                </td>
                                <td>
                                   موثر بودن اجرای قانون مالکيت فکری در توسعه شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji3">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="4" disabled>
                                </td>
                                <td>
                                   موثر بودن استفاده از معافيت های مالياتی، عوارض، حقوق گمرکی در توسعه شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji4">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="5" disabled>
                                </td>
                                <td>
                                   موثر بودن شبکه های ارتباطی بين شرکت ها در توسعه شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji5">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="6" disabled>
                                </td>
                                <td>
                                   موثر بودن سياست تشويقی دولت ( تسهيلات بانکی ارزان ) در توسعه شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji6">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="7" disabled>
                                </td>
                                <td>
                                   موثر بودن شبکه های ارتباطی با کشور های اسلامي در توسعه  شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji7">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="8" disabled>
                                </td>
                                <td>
                                   موثر بودن محيط کسب و کار (ميزان تورم، رانت های اقتصادی، اخذ مجوز و اعتبار، تجارت فرامرزی و بی ثباتی مواد اوليه ....) بر توسعه  شرکت 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji8">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="9" disabled>
                                </td>
                                <td>
                                   نحوه برخورد و شفافیت اطلاع رسانی مدیر مراکز رشد و مسئولین مراکز تابعه در خصوص فرآیند انجام کار،آیین نامه ها و دستورالعمل های مربوطه
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji9">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="10" disabled>
                                </td>
                                <td>
                                   نحوه عملکرد پارک / مراکز رشد در ارائه خدمات حمایتی مالی و مطابقت آن با قرارداد فی مابین
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji10">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="11" disabled>
                                </td>
                                <td>
                                   نحوه عملکرد پارک / مراکز رشد در ارائه خدمات مشاوره (فنی / بازاریابی / حقوقی / مالیاتی و...) 
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji11">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="12" disabled>
                                </td>
                                <td>
                                   نحوه عملکرد پارک / مراکز رشد در ارائه خدمات آزمایشگاهی / کارگاهی و تامین امکانات عمومی مورد نیاز پیاده سازی ایده
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji12">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="13" disabled>
                                </td>
                                <td>
                                   نحوه عملکرد پارک / مراکز رشد در مورد خدمات اینترنت و شبکه
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji13">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" size="2" id="radif" value="14" disabled>
                                </td>
                                <td>
                                   سهولت،روانی و سرعت روند رسیدگی به تقا ضا ها
                                </td>
                                <td>
                                    <select style="width:150px;" id="nazar-sanji14">
                                        <option value="">انتخاب...</option>
                                        <option value="عالی">عالی</option>
                                        <option value="خوب">خوب</option>
                                        <option value="متوسط">متوسط</option>
                                        <option value="ضعیف">ضعیف</option>
                                        <option value=نامطلوب>نامطلوب</option>
                                    </select>
                                </td>
                            </tr>
                          </tbody>
                    </table>
                </div> <!--Page8-->

                <div id="page9" class="tabcontent">  <!-- Page 9 -->
                    <p class="lbl-member">گزارش اقدامات/فعاليت های انجام شده طی دوره یکساله قرارداد اخير چالش ها و مشکلات دوره یکساله</p>
                    <textarea class="MyText" id="report"></textarea>
                </div> <!--Page9-->
				
                <div class="btn-holder">
                    <a href="javascript:%20Save_Report(0)" id="save" class="btns">ذخیره</a>
                    <?php if ( $_COOKIE["user_type"]=="corp" ) { ?> 
                        <a href="javascript:%20Save_Report(1)" id="send" class="btns">ذخیره و ارسال</a>
                    <?php } ?>
                    <a href="javascript:%20Print_Report()" id="print-rep" class="btns">چاپ</a>
                    <?php
                        //if ( $_COOKIE["user_type"]!="corp" )
                        //{
                    ?>
                            <a href="#" id="close-form" class="btns" onclick ="exit_new_form()" >انصراف</a>
                    <?php
                        //}
                    ?>
                </div>
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
                    <?php
                    if ( $_COOKIE["user_type"]=="corp" )
                    {
                    ?>
                         <label class="btns">
                             <?php echo "<input id='upload_files' type='file'' accept='.jpg,.jpeg,.png,.bmp,.pdf' onchange='UploadFiles()'/>"?>
                             اضافه کردن فایل
                         </label>
                     <?php
                     }
                     ?>
                     <!--<a href="#" id="cancle" class="btns" onclick ="hide_window('FileManager')" >بازگشت</a>-->
                     <a href="#" id="cancle" class="btns" onclick ="CloseFileManager()" >بازگشت</a>
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

        new persianDate().format();
        
        var index;
        var files_mali1_1=[];   //Mali1_1
        var files_mali1_2=[];   //Mali1_2
        var files_mali1_3=[];   //Mali1_3
        var files_mali1_4=[];   //Mali1_4
        var files_mali2_1=[];   //Mali2_1
        var files_mali2_2=[];   //Mali2_2
        var files_mali2_3=[];   //Mali2_3
        var files_mali2_4=[];   //Mali2_4
        var files_mali3_1=[];   //Mali3_1
        var files_mali3_2=[];   //Mali3_2
        var files_mali3_3=[];   //Mali3_3
        var files_mali3_4=[];   //Mali3_4
        var files_mali4_1=[];   //Mali4_1
        var files_mali4_2=[];   //Mali4_1
        var files_mali4_3=[];   //Mali4_1
        var files_mali4_4=[];   //Mali4_1
        var files_niroo=[];     //Niroo
        
        var files5=[];   //Dast
        
        var files_bazar1_1=[];   //Bazar1
        var files_bazar1_2=[];   //Bazar1
        var files_bazar1_3=[];   //Bazar1
        var files_bazar1_4=[];   //Bazar1
        var files_bazar2=[];     //Bazar2
        var files_bazar3_1=[];   //Bazar1
        var files_bazar3_2=[];   //Bazar1
        var files_bazar3_3=[];   //Bazar1
        var files_bazar3_4=[];   //Bazar1
        var files_bazar4_1=[];   //Bazar1
        var files_bazar4_2=[];   //Bazar1
        var files_bazar4_3=[];   //Bazar1
        var files_bazar4_4=[];   //Bazar1

        var files_amoozeshi1_1=[];  //Faaliat1_1
        var files_amoozeshi1_2=[];  //Faaliat1_2
        var files_amoozeshi1_3=[];  //Faaliat1_3
        var files_amoozeshi1_4=[];  //Faaliat1_4
        var files_amoozeshi2_1=[];  //Faaliat1_1
        var files_amoozeshi2_2=[];  //Faaliat1_2
        var files_amoozeshi2_3=[];  //Faaliat1_3
        var files_amoozeshi2_4=[];  //Faaliat1_4

        var files_dast1_1=[];  //Faaliat1_1
        var files_dast1_2=[];  //Faaliat1_1
        var files_dast1_3=[];  //Faaliat1_1
        var files_dast1_4=[];  //Faaliat1_1
        var files_dast2_1=[];  //Faaliat1_1
        var files_dast2_2=[];  //Faaliat1_1
        var files_dast2_3=[];  //Faaliat1_1
        var files_dast2_4=[];  //Faaliat1_1
        var files_dast3_1=[];  //Faaliat1_1
        var files_dast3_2=[];  //Faaliat1_1
        var files_dast3_3=[];  //Faaliat1_1
        var files_dast3_4=[];  //Faaliat1_1
        var files_dast4_1=[];  //Faaliat1_1
        var files_dast4_2=[];  //Faaliat1_1
        var files_dast4_3=[];  //Faaliat1_1
        var files_dast4_4=[];  //Faaliat1_1
        var files_dast5_1=[];  //Faaliat1_1
        var files_dast5_2=[];  //Faaliat1_1
        var files_dast5_3=[];  //Faaliat1_1
        var files_dast5_4=[];  //Faaliat1_1
        var files_dast6_1=[];  //Faaliat1_1
        var files_dast6_2=[];  //Faaliat1_1
        var files_dast6_3=[];  //Faaliat1_1
        var files_dast6_4=[];  //Faaliat1_1
        
        //var files10=[];  //Faaliat1
        //var files11=[];  //Faaliat2

        if ( getCookie("user_type")=="corp" )
        {
            SetCorpInfo(getCookie("user_code"),getCookie("state_code"),getCookie("center_code"),getCookie("user_name"),);
        }

        function SetCorpInfo(code, CodeState, CodeCenter, name)
        {
             $('#save').css('pointer-events','none');
             $('#send').css('pointer-events','none');
             files_mali1_1=[];   //Mali1_1
             files_mali1_2=[];   //Mali1_2
             files_mali1_3=[];   //Mali1_3
             files_mali1_4=[];   //Mali1_4
             files_mali2_1=[];   //Mali2_1
             files_mali2_2=[];   //Mali2_2
             files_mali2_3=[];   //Mali2_3
             files_mali2_4=[];   //Mali2_4
             files_mali3_1=[];   //Mali3_1
             files_mali3_2=[];   //Mali3_2
             files_mali3_3=[];   //Mali3_3
             files_mali3_4=[];   //Mali3_4
             files_mali4_1=[];   //Mali4_1
             files_mali4_2=[];   //Mali4_1
             files_mali4_3=[];   //Mali4_1
             files_mali4_4=[];   //Mali4_1
             files_niroo=[];     //Niroo
            
             files5=[];   //Dast
            
             files_bazar1_1=[];   //Bazar1
             files_bazar1_2=[];   //Bazar1
             files_bazar1_3=[];   //Bazar1
             files_bazar1_4=[];   //Bazar1
             files_bazar2=[];     //Bazar2
             files_bazar3_1=[];   //Bazar1
             files_bazar3_2=[];   //Bazar1
             files_bazar3_3=[];   //Bazar1
             files_bazar3_4=[];   //Bazar1
             files_bazar4_1=[];   //Bazar1
             files_bazar4_2=[];   //Bazar1
             files_bazar4_3=[];   //Bazar1
             files_bazar4_4=[];   //Bazar1
    
             files_amoozeshi1_1=[];  //Faaliat1_1
             files_amoozeshi1_2=[];  //Faaliat1_2
             files_amoozeshi1_3=[];  //Faaliat1_3
             files_amoozeshi1_4=[];  //Faaliat1_4
             files_amoozeshi2_1=[];  //Faaliat1_1
             files_amoozeshi2_2=[];  //Faaliat1_2
             files_amoozeshi2_3=[];  //Faaliat1_3
             files_amoozeshi2_4=[];  //Faaliat1_4
    
             files_dast1_1=[];  //Faaliat1_1
             files_dast1_2=[];  //Faaliat1_1
             files_dast1_3=[];  //Faaliat1_1
             files_dast1_4=[];  //Faaliat1_1
             files_dast2_1=[];  //Faaliat1_1
             files_dast2_2=[];  //Faaliat1_1
             files_dast2_3=[];  //Faaliat1_1
             files_dast2_4=[];  //Faaliat1_1
             files_dast3_1=[];  //Faaliat1_1
             files_dast3_2=[];  //Faaliat1_1
             files_dast3_3=[];  //Faaliat1_1
             files_dast3_4=[];  //Faaliat1_1
             files_dast4_1=[];  //Faaliat1_1
             files_dast4_2=[];  //Faaliat1_1
             files_dast4_3=[];  //Faaliat1_1
             files_dast4_4=[];  //Faaliat1_1
             files_dast5_1=[];  //Faaliat1_1
             files_dast5_2=[];  //Faaliat1_1
             files_dast5_3=[];  //Faaliat1_1
             files_dast5_4=[];  //Faaliat1_1
             files_dast6_1=[];  //Faaliat1_1
             files_dast6_2=[];  //Faaliat1_1
             files_dast6_3=[];  //Faaliat1_1
             files_dast6_4=[];  //Faaliat1_1
            show_window("Waiting");
            $(".mali1-1,.mali1-2,.mali1-3,.mali1-4,.mali2-1,.mali2-2,.mali2-3,.mali2-4,.mali3-1,.mali3-2,.mali3-3,.mali3-4,.mali4-1,.mali4-2,.mali4-3,.mali4-4").css("display","none");
            $(".dast1-1,.dast1-2,.dast1-3,.dast1-4,.dast2-1,.dast2-2,.dast2-3,.dast2-4,.dast3-1,.dast3-2,.dast3-3,.dast3-4,.dast4-1,.dast4-2,.dast4-3,.dast4-4").css("display","none");
            $(".dast5-1,.dast5-2,.dast5-3,.dast5-4,.dast6-1,.dast6-2,.dast6-3,.dast6-4").css("display","none");
            $(".niroo1,.niroo2,.niroo3,.niroo4,.niroo5,.niroo6,.niroo7,.niroo8,.niroo9,.niroo10,.bazar1-1,.bazar1-2,.bazar1-3,.bazar1-4").css("display","none");
            $(".bazar3-1,.bazar3-2,.bazar3-3,.bazar3-4,.bazar4-1,.bazar4-2,.bazar4-3,.bazar4-4,.amoozeshi1-1,.amoozeshi1-2,.amoozeshi1-3,.amoozeshi1-4").css("display","none");
            $(".amoozeshi2-1,.amoozeshi2-2,.amoozeshi2-3,.amoozeshi2-4").css("display","none");
            $(".upload-note-mali1,.upload-note-mali2,.upload-note-mali3,.upload-note-mali4,.upload-note-bazar1,.upload-note-bazar3").css("display","none");
            $(".upload-note-bazar4,.upload-note-amoozeshi1,.upload-note-amoozeshi2").css("display","none");
            $(".tabcontent").css("width","100%");
            $(".tabcontent").css("height","75%");
            $(".tabcontent").css("overflow-y","auto");
			$('#years').empty();
            Set_fields();
            document.getElementById("UserCode").value=code;
            document.getElementById("StateCode").value=CodeState;
            document.getElementById("CenterCode").value=CodeCenter;

            var current_year=new persianDate().year();
            select = document.getElementById('years');
            var opt = document.createElement('option');
            opt.value = current_year;
            opt.innerHTML = "گزارش سال "+current_year;
            select.appendChild(opt);
            
            var search=true;
            var form_data = new FormData();
            form_data.append('code', code);
            form_data.append('search', search);
            form_data.append('year', current_year);
            form_data.append('what', "corp-emtiaz");
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
                        Set_Empty();
                    }
                    else
                    {
                        document.getElementById("NewEdit").value="EDIT";
                        var obj = JSON.parse(response);
                        if ( obj[0].send=="1" )
                        {
                            $("#save").css("display","none");
                            $("#send").css("display","none");
                            $("#report-status").html("این گزارش را قبلا ارسال شده و ویرایش آن ممکن نیست");
                            $("#report-status").css("display","block");
                            $("#report-open").css("display","block");
                            $("#close-form").text("بازگشت");
                            Set_disable(true);
                            Set_fields();
                        }
                        /**********************************************/
                        if ( obj[0].onvan_mali1_1!="" || obj[0].note_mali1!="" ) { $(".mali1-1").css("display","table-row"); $(".upload-note-mali1").css("display","block"); }
                        if ( obj[0].onvan_mali1_2!="" ) { $(".mali1-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali1_3!="" ) { $(".mali1-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali1_4!="" ) { $(".mali1-4").css("display","table-row"); }
                        $('#onvan-mali1-1').val(obj[0].onvan_mali1_1);
                        $('#mahal-mali1-1').val(obj[0].mahal_mali1_1);
                        $('#karfarma-mali1-1').val(obj[0].karfarma_mali1_1);
                        $('#mablagh-mali1-1').val(obj[0].mablagh_mali1_1.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali1-1').val(obj[0].emtiaz_mali1_1);
                        $('#onvan-mali1-2').val(obj[0].onvan_mali1_2);
                        $('#mahal-mali1-2').val(obj[0].mahal_mali1_2);
                        $('#karfarma-mali1-2').val(obj[0].karfarma_mali1_2);
                        $('#mablagh-mali1-2').val(obj[0].mablagh_mali1_2.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali1-2').val(obj[0].emtiaz_mali1_2);
                        $('#onvan-mali1-3').val(obj[0].onvan_mali1_3);
                        $('#mahal-mali1-3').val(obj[0].mahal_mali1_3);
                        $('#karfarma-mali1-3').val(obj[0].karfarma_mali1_3);
                        $('#mablagh-mali1-3').val(obj[0].mablagh_mali1_3.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali1-3').val(obj[0].emtiaz_mali1_3);
                        $('#onvan-mali1-4').val(obj[0].onvan_mali1_4);
                        $('#mahal-mali1-4').val(obj[0].mahal_mali1_4);
                        $('#karfarma-mali1-4').val(obj[0].karfarma_mali1_4);
                        $('#mablagh-mali1-4').val(obj[0].mablagh_mali1_4.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali1-4').val(obj[0].emtiaz_mali1_4);
                        $('#note-mali1').val(obj[0].note_mali1);
                        jam=parseInt(obj[0].mablagh_mali1_1)+parseInt(obj[0].mablagh_mali1_2)+parseInt(obj[0].mablagh_mali1_3)+parseInt(obj[0].mablagh_mali1_4);
                        jam=jam.toString();
                        $('#jam-mali1').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        files_mali1_1=[];
                        files_mali1_2=[];
                        files_mali1_3=[];
                        files_mali1_4=[];
                        if ( obj[0].files_mali1_1.length>0 )
                        {
                            FilesList=obj[0].files_mali1_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali1_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali1_2.length>0 )
                        {
                            FilesList=obj[0].files_mali1_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali1_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali1_3.length>0 )
                        {
                            FilesList=obj[0].files_mali1_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali1_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali1_4.length>0 )
                        {
                            FilesList=obj[0].files_mali1_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali1_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_mali2_1!="" || obj[0].note_mali2!="" ) { $(".mali2-1").css("display","table-row"); $(".upload-note-mali2").css("display","block"); }
                        if ( obj[0].onvan_mali2_2!="" ) { $(".mali2-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali2_3!="" ) { $(".mali2-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali2_4!="" ) { $(".mali2-4").css("display","table-row"); }
                        $('#onvan-mali2-1').val(obj[0].onvan_mali2_1);
                        $('#mahal-mali2-1').val(obj[0].mahal_mali2_1);
                        $('#karfarma-mali2-1').val(obj[0].karfarma_mali2_1);
                        $('#mablagh-mali2-1').val(obj[0].mablagh_mali2_1.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali2-1').val(obj[0].emtiaz_mali2_1);
                        $('#darsad-mali2-1').val(obj[0].darsad_mali2_1);
                        $('#onvan-mali2-2').val(obj[0].onvan_mali2_2);
                        $('#mahal-mali2-2').val(obj[0].mahal_mali2_2);
                        $('#karfarma-mali2-2').val(obj[0].karfarma_mali2_2);
                        $('#mablagh-mali2-2').val(obj[0].mablagh_mali2_2.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali2-2').val(obj[0].emtiaz_mali2_2);
                        $('#darsad-mali2-2').val(obj[0].darsad_mali2_2);
                        $('#onvan-mali2-3').val(obj[0].onvan_mali2_3);
                        $('#mahal-mali2-3').val(obj[0].mahal_mali2_3);
                        $('#karfarma-mali2-3').val(obj[0].karfarma_mali2_3);
                        $('#mablagh-mali2-3').val(obj[0].mablagh_mali2_3.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali2-3').val(obj[0].emtiaz_mali2_3);
                        $('#darsad-mali2-3').val(obj[0].darsad_mali2_3);
                        $('#onvan-mali2-4').val(obj[0].onvan_mali2_4);
                        $('#mahal-mali2-4').val(obj[0].mahal_mali2_4);
                        $('#karfarma-mali2-4').val(obj[0].karfarma_mali2_4);
                        $('#mablagh-mali2-4').val(obj[0].mablagh_mali2_4.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali2-4').val(obj[0].emtiaz_mali2_4);
                        $('#darsad-mali2-4').val(obj[0].darsad_mali2_4);
                        $('#note-mali2').val(obj[0].note_mali2);
                        jam=parseInt(obj[0].mablagh_mali2_1)+parseInt(obj[0].mablagh_mali2_2)+parseInt(obj[0].mablagh_mali2_3)+parseInt(obj[0].mablagh_mali2_4);
                        jam=jam.toString();
                        $('#jam-mali2').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        files_mali2_1=[];
                        files_mali2_2=[];
                        files_mali2_3=[];
                        files_mali2_4=[];
                        if ( obj[0].files_mali2_1.length>0 )
                        {
                            FilesList=obj[0].files_mali2_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali2_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali2_2.length>0 )
                        {
                            FilesList=obj[0].files_mali2_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali2_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali2_3.length>0 )
                        {
                            FilesList=obj[0].files_mali2_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali2_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali2_4.length>0 )
                        {
                            FilesList=obj[0].files_mali2_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali2_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_mali3_1!="" || obj[0].note_mali3!="" ) { $(".mali3-1").css("display","table-row"); $(".upload-note-mali3").css("display","block"); }
                        if ( obj[0].onvan_mali3_2!="" ) { $(".mali3-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali3_3!="" ) { $(".mali3-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali3_4!="" ) { $(".mali3-4").css("display","table-row"); }
                        $('#onvan-mali3-1').val(obj[0].onvan_mali3_1);
                        $('#mahal-mali3-1').val(obj[0].mahal_mali3_1);
                        $('#karfarma-mali3-1').val(obj[0].karfarma_mali3_1);
                        $('#mablagh-mali3-1').val(obj[0].mablagh_mali3_1.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali3-1').val(obj[0].emtiaz_mali3_1);
                        $('#darsad-mali3-1').val(obj[0].darsad_mali3_1);
                        $('#onvan-mali3-2').val(obj[0].onvan_mali3_2);
                        $('#mahal-mali3-2').val(obj[0].mahal_mali3_2);
                        $('#karfarma-mali3-2').val(obj[0].karfarma_mali3_2);
                        $('#mablagh-mali3-2').val(obj[0].mablagh_mali3_2.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali3-2').val(obj[0].emtiaz_mali3_2);
                        $('#darsad-mali3-2').val(obj[0].darsad_mali3_2);
                        $('#onvan-mali3-3').val(obj[0].onvan_mali3_3);
                        $('#mahal-mali3-3').val(obj[0].mahal_mali3_3);
                        $('#karfarma-mali3-3').val(obj[0].karfarma_mali3_3);
                        $('#mablagh-mali3-3').val(obj[0].mablagh_mali3_3.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali3-3').val(obj[0].emtiaz_mali3_3);
                        $('#darsad-mali3-3').val(obj[0].darsad_mali3_3);
                        $('#onvan-mali3-4').val(obj[0].onvan_mali3_4);
                        $('#mahal-mali3-4').val(obj[0].mahal_mali3_4);
                        $('#karfarma-mali3-4').val(obj[0].karfarma_mali3_4);
                        $('#mablagh-mali3-4').val(obj[0].mablagh_mali3_4.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali3-4').val(obj[0].emtiaz_mali3_4);
                        $('#darsad-mali3-4').val(obj[0].darsad_mali3_4);
                        $('#note-mali3').val(obj[0].note_mali3);
                        jam=parseInt(obj[0].mablagh_mali3_1)+parseInt(obj[0].mablagh_mali3_2)+parseInt(obj[0].mablagh_mali3_3)+parseInt(obj[0].mablagh_mali3_4);
                        jam=jam.toString();
                        $('#jam-mali3').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        files_mali3_1=[];
                        files_mali3_2=[];
                        files_mali3_3=[];
                        files_mali3_4=[];
                        if ( obj[0].files_mali3_1.length>0 )
                        {
                            FilesList=obj[0].files_mali3_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali3_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali3_2.length>0 )
                        {
                            FilesList=obj[0].files_mali3_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali3_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali3_3.length>0 )
                        {
                            FilesList=obj[0].files_mali3_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali3_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali3_4.length>0 )
                        {
                            FilesList=obj[0].files_mali3_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali3_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_mali4_1!="" || obj[0].note_mali4!="" ) { $(".mali4-1").css("display","table-row"); $(".upload-note-mali4").css("display","block"); }
                        if ( obj[0].onvan_mali4_2!="" ) { $(".mali4-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali4_3!="" ) { $(".mali4-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali4_4!="" ) { $(".mali4-4").css("display","table-row"); }
                        $('#onvan-mali4-1').val(obj[0].onvan_mali4_1);
                        $('#mablagh-mali4-1').val(obj[0].mablagh_mali4_1.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali4-1').val(obj[0].emtiaz_mali4_1);
                        $('#onvan-mali4-2').val(obj[0].onvan_mali4_2);
                        $('#mablagh-mali4-2').val(obj[0].mablagh_mali4_2.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali4-2').val(obj[0].emtiaz_mali4_2);
                        $('#onvan-mali4-3').val(obj[0].onvan_mali4_3);
                        $('#mablagh-mali4-3').val(obj[0].mablagh_mali4_3.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali4-3').val(obj[0].emtiaz_mali4_3);
                        $('#onvan-mali4-4').val(obj[0].onvan_mali4_4);
                        $('#mablagh-mali4-4').val(obj[0].mablagh_mali4_4.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        $('#emtiaz-mali4-4').val(obj[0].emtiaz_mali4_4);
                        $('#note-mali4').val(obj[0].note_mali4);
                        jam=parseInt(obj[0].mablagh_mali4_1)+parseInt(obj[0].mablagh_mali4_2)+parseInt(obj[0].mablagh_mali4_3)+parseInt(obj[0].mablagh_mali4_4);
                        jam=jam.toString();
                        $('#jam-mali4').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        files_mali4_1=[];
                        files_mali4_2=[];
                        files_mali4_3=[];
                        files_mali4_4=[];
                        if ( obj[0].files_mali4_1.length>0 )
                        {
                            FilesList=obj[0].files_mali4_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali4_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali4_2.length>0 )
                        {
                            FilesList=obj[0].files_mali4_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali4_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali4_3.length>0 )
                        {
                            FilesList=obj[0].files_mali4_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali4_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_mali4_4.length>0 )
                        {
                            FilesList=obj[0].files_mali4_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_mali4_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        $('#emtiazm-mali1-1').val(obj[0].emtiazm_mali1_1);
                        $('#emtiazm-mali1-2').val(obj[0].emtiazm_mali1_2);
                        $('#emtiazm-mali1-3').val(obj[0].emtiazm_mali1_3);
                        $('#emtiazm-mali1-4').val(obj[0].emtiazm_mali1_4);
                        $('#emtiazm-mali2-1').val(obj[0].emtiazm_mali2_1);
                        $('#emtiazm-mali2-2').val(obj[0].emtiazm_mali2_2);
                        $('#emtiazm-mali2-3').val(obj[0].emtiazm_mali2_3);
                        $('#emtiazm-mali2-4').val(obj[0].emtiazm_mali2_4);
                        $('#emtiazm-mali3-1').val(obj[0].emtiazm_mali3_1);
                        $('#emtiazm-mali3-2').val(obj[0].emtiazm_mali3_2);
                        $('#emtiazm-mali3-3').val(obj[0].emtiazm_mali3_3);
                        $('#emtiazm-mali3-4').val(obj[0].emtiazm_mali3_4);
                        $('#emtiazm-mali4-1').val(obj[0].emtiazm_mali4_1);
                        $('#emtiazm-mali4-2').val(obj[0].emtiazm_mali4_2);
                        $('#emtiazm-mali4-3').val(obj[0].emtiazm_mali4_3);
                        $('#emtiazm-mali4-4').val(obj[0].emtiazm_mali4_4);
                        $('#emtiazm-niroo1').val(obj[0].emtiazm_niroo1);
                        $('#emtiazm-niroo2').val(obj[0].emtiazm_niroo2);
                        $('#emtiazm-niroo3').val(obj[0].emtiazm_niroo3);
                        $('#emtiazm-niroo4').val(obj[0].emtiazm_niroo4);
                        $('#emtiazm-niroo5').val(obj[0].emtiazm_niroo5);
                        $('#emtiazm-niroo6').val(obj[0].emtiazm_niroo6);
                        $('#emtiazm-niroo7').val(obj[0].emtiazm_niroo7);
                        $('#emtiazm-niroo8').val(obj[0].emtiazm_niroo8);
                        $('#emtiazm-niroo9').val(obj[0].emtiazm_niroo9);
                        $('#emtiazm-niroo10').val(obj[0].emtiazm_niroo10);
                        $('#emtiazm-bazar1-1').val(obj[0].emtiazm_bazar1_1);
                        $('#emtiazm-bazar1-2').val(obj[0].emtiazm_bazar1_2);
                        $('#emtiazm-bazar1-3').val(obj[0].emtiazm_bazar1_3);
                        $('#emtiazm-bazar1-4').val(obj[0].emtiazm_bazar1_4);
                        $('#emtiaz-bazar2').val(obj[0].emtiaz_bazar2);
                        $('#emtiazm-bazar2').val(obj[0].emtiazm_bazar2);
                        $('#emtiazm-bazar3-1').val(obj[0].emtiazm_bazar3_1);
                        $('#emtiazm-bazar3-2').val(obj[0].emtiazm_bazar3_2);
                        $('#emtiazm-bazar3-3').val(obj[0].emtiazm_bazar3_3);
                        $('#emtiazm-bazar3-4').val(obj[0].emtiazm_bazar3_4);
                        $('#emtiazm-bazar4-1').val(obj[0].emtiazm_bazar4_1);
                        $('#emtiazm-bazar4-2').val(obj[0].emtiazm_bazar4_2);
                        $('#emtiazm-bazar4-3').val(obj[0].emtiazm_bazar4_3);
                        $('#emtiazm-bazar4-4').val(obj[0].emtiazm_bazar4_4);
                        $('#emtiazm-amoozeshi1-1').val(obj[0].emtiazm_amoozeshi1_1);
                        $('#emtiazm-amoozeshi1-2').val(obj[0].emtiazm_amoozeshi1_2);
                        $('#emtiazm-amoozeshi1-3').val(obj[0].emtiazm_amoozeshi1_3);
                        $('#emtiazm-amoozeshi1-4').val(obj[0].emtiazm_amoozeshi1_4);
                        $('#emtiazm-amoozeshi2-1').val(obj[0].emtiazm_amoozeshi2_1);
                        $('#emtiazm-amoozeshi2-2').val(obj[0].emtiazm_amoozeshi2_2);
                        $('#emtiazm-amoozeshi2-3').val(obj[0].emtiazm_amoozeshi2_3);
                        $('#emtiazm-amoozeshi2-4').val(obj[0].emtiazm_amoozeshi2_4);
                        $('#emtiazm-taamolp1').val(obj[0].emtiazm_taamolp1);
                        $('#emtiazm-taamolp2').val(obj[0].emtiazm_taamolp2);
                        $('#emtiazm-taamolp3').val(obj[0].emtiazm_taamolp3);
                        $('#emtiazm-taamolp4').val(obj[0].emtiazm_taamolp4);
                        $('#emtiazm-taamolp5').val(obj[0].emtiazm_taamolp5);
                        $('#emtiazm-taamols1').val(obj[0].emtiazm_taamols1);
                        $('#emtiazm-taamols2').val(obj[0].emtiazm_taamols2);
                        if ( obj[0].onvan_dast1_1!="" ) { $(".dast1-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast1_2!="" ) { $(".dast1-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast1_3!="" ) { $(".dast1-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast1_4!="" ) { $(".dast1-4").css("display","table-row"); }
                        if ( obj[0].onvan_dast2_1!="" ) { $(".dast2-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast2_2!="" ) { $(".dast2-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast2_3!="" ) { $(".dast2-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast2_4!="" ) { $(".dast2-4").css("display","table-row"); }
                        if ( obj[0].onvan_dast3_1!="" ) { $(".dast3-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast3_2!="" ) { $(".dast3-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast3_3!="" ) { $(".dast3-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast3_4!="" ) { $(".dast3-4").css("display","table-row"); }
                        if ( obj[0].onvan_dast4_1!="" ) { $(".dast4-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast4_2!="" ) { $(".dast4-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast4_3!="" ) { $(".dast4-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast4_4!="" ) { $(".dast4-4").css("display","table-row"); }
                        if ( obj[0].onvan_dast5_1!="" ) { $(".dast5-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast5_2!="" ) { $(".dast5-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast5_3!="" ) { $(".dast5-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast5_4!="" ) { $(".dast5-4").css("display","table-row"); }
                        if ( obj[0].onvan_dast6_1!="" ) { $(".dast6-1").css("display","table-row"); }
                        if ( obj[0].onvan_dast6_2!="" ) { $(".dast6-2").css("display","table-row"); }
                        if ( obj[0].onvan_dast6_3!="" ) { $(".dast6-3").css("display","table-row"); }
                        if ( obj[0].onvan_dast6_4!="" ) { $(".dast6-4").css("display","table-row"); }
                        $('#onvan-dast1-1').val(obj[0].onvan_dast1_1);
                        $('#marja-dast1-1').val(obj[0].marja_dast1_1);
                        $('#date-dast1-1').val(obj[0].date_dast1_1);
                        $('#emtiaz-dast1-1').val(obj[0].emtiaz_dast1_1);
                        $('#emtiazm-dast1-1').val(obj[0].emtiazm_dast1_1);
                        $('#onvan-dast1-2').val(obj[0].onvan_dast1_2);
                        $('#marja-dast1-2').val(obj[0].marja_dast1_2);
                        $('#date-dast1-2').val(obj[0].date_dast1_2);
                        $('#emtiaz-dast1-2').val(obj[0].emtiaz_dast1_2);
                        $('#emtiazm-dast1-2').val(obj[0].emtiazm_dast1_2);
                        $('#onvan-dast1-3').val(obj[0].onvan_dast1_3);
                        $('#marja-dast1-3').val(obj[0].marja_dast1_3);
                        $('#date-dast1-3').val(obj[0].date_dast1_3);
                        $('#emtiaz-dast1-3').val(obj[0].emtiaz_dast1_3);
                        $('#emtiazm-dast1-3').val(obj[0].emtiazm_dast1_3);
                        $('#onvan-dast1-4').val(obj[0].onvan_dast1_4);
                        $('#marja-dast1-4').val(obj[0].marja_dast1_4);
                        $('#date-dast1-4').val(obj[0].date_dast1_4);
                        $('#emtiaz-dast1-4').val(obj[0].emtiaz_dast1_4);
                        $('#emtiazm-dast1-4').val(obj[0].emtiazm_dast1_4);
                        $('#onvan-dast2-1').val(obj[0].onvan_dast2_1);
                        $('#marja-dast2-1').val(obj[0].marja_dast2_1);
                        $('#date-dast2-1').val(obj[0].date_dast2_1);
                        $('#emtiaz-dast2-1').val(obj[0].emtiaz_dast2_1);
                        $('#emtiazm-dast2-1').val(obj[0].emtiazm_dast2_1);
                        $('#onvan-dast2-2').val(obj[0].onvan_dast2_2);
                        $('#marja-dast2-2').val(obj[0].marja_dast2_2);
                        $('#date-dast2-2').val(obj[0].date_dast2_2);
                        $('#emtiaz-dast2-2').val(obj[0].emtiaz_dast2_2);
                        $('#emtiazm-dast2-2').val(obj[0].emtiazm_dast2_2);
                        $('#onvan-dast2-3').val(obj[0].onvan_dast2_3);
                        $('#marja-dast2-3').val(obj[0].marja_dast2_3);
                        $('#date-dast2-3').val(obj[0].date_dast2_3);
                        $('#emtiaz-dast2-3').val(obj[0].emtiaz_dast2_3);
                        $('#emtiazm-dast2-3').val(obj[0].emtiazm_dast2_3);
                        $('#onvan-dast2-4').val(obj[0].onvan_dast2_4);
                        $('#marja-dast2-4').val(obj[0].marja_dast2_4);
                        $('#date-dast2-4').val(obj[0].date_dast2_4);
                        $('#emtiaz-dast2-4').val(obj[0].emtiaz_dast2_4);
                        $('#emtiazm-dast2-4').val(obj[0].emtiazm_dast2_4);
                        $('#onvan-dast3-1').val(obj[0].onvan_dast3_1);
                        $('#marja-dast3-1').val(obj[0].marja_dast3_1);
                        $('#date-dast3-1').val(obj[0].date_dast3_1);
                        $('#emtiaz-dast3-1').val(obj[0].emtiaz_dast3_1);
                        $('#emtiazm-dast3-1').val(obj[0].emtiazm_dast3_1);
                        $('#onvan-dast3-2').val(obj[0].onvan_dast3_2);
                        $('#marja-dast3-2').val(obj[0].marja_dast3_2);
                        $('#date-dast3-2').val(obj[0].date_dast3_2);
                        $('#emtiaz-dast3-2').val(obj[0].emtiaz_dast3_2);
                        $('#emtiazm-dast3-2').val(obj[0].emtiazm_dast3_2);
                        $('#onvan-dast3-3').val(obj[0].onvan_dast3_3);
                        $('#marja-dast3-3').val(obj[0].marja_dast3_3);
                        $('#date-dast3-3').val(obj[0].date_dast3_3);
                        $('#emtiaz-dast3-3').val(obj[0].emtiaz_dast3_3);
                        $('#emtiazm-dast3-3').val(obj[0].emtiazm_dast3_3);
                        $('#onvan-dast3-4').val(obj[0].onvan_dast3_4);
                        $('#marja-dast3-4').val(obj[0].marja_dast3_4);
                        $('#date-dast3-4').val(obj[0].date_dast3_4);
                        $('#emtiaz-dast3-4').val(obj[0].emtiaz_dast3_4);
                        $('#emtiazm-dast3-4').val(obj[0].emtiazm_dast3_4);
                        $('#onvan-dast4-1').val(obj[0].onvan_dast4_1);
                        $('#marja-dast4-1').val(obj[0].marja_dast4_1);
                        $('#date-dast4-1').val(obj[0].date_dast4_1);
                        $('#emtiaz-dast4-1').val(obj[0].emtiaz_dast4_1);
                        $('#emtiazm-dast4-1').val(obj[0].emtiazm_dast4_1);
                        $('#onvan-dast4-2').val(obj[0].onvan_dast4_2);
                        $('#marja-dast4-2').val(obj[0].marja_dast4_2);
                        $('#date-dast4-2').val(obj[0].date_dast4_2);
                        $('#emtiaz-dast4-2').val(obj[0].emtiaz_dast4_2);
                        $('#emtiazm-dast4-2').val(obj[0].emtiazm_dast4_2);
                        $('#onvan-dast4-3').val(obj[0].onvan_dast4_3);
                        $('#marja-dast4-3').val(obj[0].marja_dast4_3);
                        $('#date-dast4-3').val(obj[0].date_dast4_3);
                        $('#emtiaz-dast4-3').val(obj[0].emtiaz_dast4_3);
                        $('#emtiazm-dast4-3').val(obj[0].emtiazm_dast4_3);
                        $('#onvan-dast4-4').val(obj[0].onvan_dast4_4);
                        $('#marja-dast4-4').val(obj[0].marja_dast4_4);
                        $('#date-dast4-4').val(obj[0].date_dast4_4);
                        $('#emtiaz-dast4-4').val(obj[0].emtiaz_dast4_4);
                        $('#emtiazm-dast4-4').val(obj[0].emtiazm_dast4_4);
                        $('#onvan-dast5-1').val(obj[0].onvan_dast5_1);
                        $('#marja-dast5-1').val(obj[0].marja_dast5_1);
                        $('#date-dast5-1').val(obj[0].date_dast5_1);
                        $('#emtiaz-dast5-1').val(obj[0].emtiaz_dast5_1);
                        $('#emtiazm-dast5-1').val(obj[0].emtiazm_dast5_1);
                        $('#onvan-dast5-2').val(obj[0].onvan_dast5_2);
                        $('#marja-dast5-2').val(obj[0].marja_dast5_2);
                        $('#date-dast5-2').val(obj[0].date_dast5_2);
                        $('#emtiaz-dast5-2').val(obj[0].emtiaz_dast5_2);
                        $('#emtiazm-dast5-2').val(obj[0].emtiazm_dast5_2);
                        $('#onvan-dast5-3').val(obj[0].onvan_dast5_3);
                        $('#marja-dast5-3').val(obj[0].marja_dast5_3);
                        $('#date-dast5-3').val(obj[0].date_dast5_3);
                        $('#emtiaz-dast5-3').val(obj[0].emtiaz_dast5_3);
                        $('#emtiazm-dast5-3').val(obj[0].emtiazm_dast5_3);
                        $('#onvan-dast5-4').val(obj[0].onvan_dast5_4);
                        $('#marja-dast5-4').val(obj[0].marja_dast5_4);
                        $('#date-dast5-4').val(obj[0].date_dast5_4);
                        $('#emtiaz-dast5-4').val(obj[0].emtiaz_dast5_4);
                        $('#emtiazm-dast5-4').val(obj[0].emtiazm_dast5_4);
                        $('#onvan-dast6-1').val(obj[0].onvan_dast6_1);
                        $('#marja-dast6-1').val(obj[0].marja_dast6_1);
                        $('#date-dast6-1').val(obj[0].date_dast6_1);
                        $('#emtiaz-dast6-1').val(obj[0].emtiaz_dast6_1);
                        $('#emtiazm-dast6-1').val(obj[0].emtiazm_dast6_1);
                        $('#onvan-dast6-2').val(obj[0].onvan_dast6_2);
                        $('#marja-dast6-2').val(obj[0].marja_dast6_2);
                        $('#date-dast6-2').val(obj[0].date_dast6_2);
                        $('#emtiaz-dast6-2').val(obj[0].emtiaz_dast6_2);
                        $('#emtiazm-dast6-2').val(obj[0].emtiazm_dast6_2);
                        $('#onvan-dast6-3').val(obj[0].onvan_dast6_3);
                        $('#marja-dast6-3').val(obj[0].marja_dast6_3);
                        $('#date-dast6-3').val(obj[0].date_dast6_3);
                        $('#emtiaz-dast6-3').val(obj[0].emtiaz_dast6_3);
                        $('#emtiazm-dast6-3').val(obj[0].emtiazm_dast6_3);
                        $('#onvan-dast6-4').val(obj[0].onvan_dast6_4);
                        $('#marja-dast6-4').val(obj[0].marja_dast6_4);
                        $('#date-dast6-4').val(obj[0].date_dast6_4);
                        $('#emtiaz-dast6-4').val(obj[0].emtiaz_dast6_4);
                        $('#emtiazm-dast6-4').val(obj[0].emtiazm_dast6_4);
                        if ( obj[0].files_dast1_1.length>0 )
                        {
                            FilesList=obj[0].files_dast1_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast1_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast1_2.length>0 )
                        {
                            FilesList=obj[0].files_dast1_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast1_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast1_3.length>0 )
                        {
                            FilesList=obj[0].files_dast1_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast1_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast1_4.length>0 )
                        {
                            FilesList=obj[0].files_dast1_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast1_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast2_1.length>0 )
                        {
                            FilesList=obj[0].files_dast2_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast2_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast2_2.length>0 )
                        {
                            FilesList=obj[0].files_dast2_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast2_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast2_3.length>0 )
                        {
                            FilesList=obj[0].files_dast2_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast2_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast2_4.length>0 )
                        {
                            FilesList=obj[0].files_dast2_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast2_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast3_1.length>0 )
                        {
                            FilesList=obj[0].files_dast3_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast3_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast3_2.length>0 )
                        {
                            FilesList=obj[0].files_dast3_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast3_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast3_3.length>0 )
                        {
                            FilesList=obj[0].files_dast3_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast3_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast3_4.length>0 )
                        {
                            FilesList=obj[0].files_dast3_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast3_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast4_1.length>0 )
                        {
                            FilesList=obj[0].files_dast4_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast4_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast4_2.length>0 )
                        {
                            FilesList=obj[0].files_dast4_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast4_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast4_3.length>0 )
                        {
                            FilesList=obj[0].files_dast4_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast4_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast4_4.length>0 )
                        {
                            FilesList=obj[0].files_dast4_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast4_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast5_1.length>0 )
                        {
                            FilesList=obj[0].files_dast5_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast5_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast5_2.length>0 )
                        {
                            FilesList=obj[0].files_dast5_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast5_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast5_3.length>0 )
                        {
                            FilesList=obj[0].files_dast5_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast5_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast5_4.length>0 )
                        {
                            FilesList=obj[0].files_dast5_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast5_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast6_1.length>0 )
                        {
                            FilesList=obj[0].files_dast6_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast6_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast6_2.length>0 )
                        {
                            FilesList=obj[0].files_dast6_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast6_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast6_3.length>0 )
                        {
                            FilesList=obj[0].files_dast6_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast6_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_dast6_4.length>0 )
                        {
                            FilesList=obj[0].files_dast6_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_dast6_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        
                        if ( obj[0].onvan_niroo1!="" ) { $(".niroo1").css("display","table-row"); }
                        if ( obj[0].onvan_niroo2!="" ) { $(".niroo2").css("display","table-row"); }
                        if ( obj[0].onvan_niroo3!="" ) { $(".niroo3").css("display","table-row"); }
                        if ( obj[0].onvan_niroo4!="" ) { $(".niroo4").css("display","table-row"); }
                        if ( obj[0].onvan_niroo5!="" ) { $(".niroo5").css("display","table-row"); }
                        if ( obj[0].onvan_niroo6!="" ) { $(".niroo6").css("display","table-row"); }
                        if ( obj[0].onvan_niroo7!="" ) { $(".niroo7").css("display","table-row"); }
                        if ( obj[0].onvan_niroo8!="" ) { $(".niroo8").css("display","table-row"); }
                        if ( obj[0].onvan_niroo9!="" ) { $(".niroo9").css("display","table-row"); }
                        if ( obj[0].onvan_niroo10!="" ) { $(".niroo10").css("display","table-row"); }
                        $('#onvan-niroo1').val(obj[0].onvan_niroo1);
                        $('#tahsil-niroo1').val(obj[0].tahsil_niroo1);
                        $('#hamkari-niroo1').val(obj[0].hamkari_niroo1);
                        $('#sabeghe-niroo1').val(obj[0].sabeghe_niroo1);
                        $('#bime-niroo1').val(obj[0].bime_niroo1);
                        $('#emtiaz-niroo1').val(obj[0].emtiaz_niroo1);
                        $('#onvan-niroo2').val(obj[0].onvan_niroo2);
                        $('#tahsil-niroo2').val(obj[0].tahsil_niroo2);
                        $('#hamkari-niroo2').val(obj[0].hamkari_niroo2);
                        $('#sabeghe-niroo2').val(obj[0].sabeghe_niroo2);
                        $('#bime-niroo2').val(obj[0].bime_niroo2);
                        $('#emtiaz-niroo2').val(obj[0].emtiaz_niroo2);
                        $('#onvan-niroo3').val(obj[0].onvan_niroo3);
                        $('#tahsil-niroo3').val(obj[0].tahsil_niroo3);
                        $('#hamkari-niroo3').val(obj[0].hamkari_niroo3);
                        $('#sabeghe-niroo3').val(obj[0].sabeghe_niroo3);
                        $('#bime-niroo3').val(obj[0].bime_niroo3);
                        $('#emtiaz-niroo3').val(obj[0].emtiaz_niroo3);
                        $('#onvan-niroo4').val(obj[0].onvan_niroo4);
                        $('#tahsil-niroo4').val(obj[0].tahsil_niroo4);
                        $('#hamkari-niroo4').val(obj[0].hamkari_niroo4);
                        $('#sabeghe-niroo4').val(obj[0].sabeghe_niroo4);
                        $('#bime-niroo4').val(obj[0].bime_niroo4);
                        $('#emtiaz-niroo4').val(obj[0].emtiaz_niroo4);
                        $('#onvan-niroo5').val(obj[0].onvan_niroo5);
                        $('#tahsil-niroo5').val(obj[0].tahsil_niroo5);
                        $('#hamkari-niroo5').val(obj[0].hamkari_niroo5);
                        $('#sabeghe-niroo5').val(obj[0].sabeghe_niroo5);
                        $('#bime-niroo5').val(obj[0].bime_niroo5);
                        $('#emtiaz-niroo5').val(obj[0].emtiaz_niroo5);
                        $('#onvan-niroo6').val(obj[0].onvan_niroo6);
                        $('#tahsil-niroo6').val(obj[0].tahsil_niroo6);
                        $('#hamkari-niroo6').val(obj[0].hamkari_niroo6);
                        $('#sabeghe-niroo6').val(obj[0].sabeghe_niroo6);
                        $('#bime-niroo6').val(obj[0].bime_niroo6);
                        $('#emtiaz-niroo6').val(obj[0].emtiaz_niroo6);
                        $('#onvan-niroo7').val(obj[0].onvan_niroo7);
                        $('#tahsil-niroo7').val(obj[0].tahsil_niroo7);
                        $('#hamkari-niroo7').val(obj[0].hamkari_niroo7);
                        $('#sabeghe-niroo7').val(obj[0].sabeghe_niroo7);
                        $('#bime-niroo7').val(obj[0].bime_niroo7);
                        $('#emtiaz-niroo7').val(obj[0].emtiaz_niroo7);
                        $('#onvan-niroo8').val(obj[0].onvan_niroo8);
                        $('#tahsil-niroo8').val(obj[0].tahsil_niroo8);
                        $('#hamkari-niroo8').val(obj[0].hamkari_niroo8);
                        $('#sabeghe-niroo8').val(obj[0].sabeghe_niroo8);
                        $('#bime-niroo8').val(obj[0].bime_niroo8);
                        $('#emtiaz-niroo8').val(obj[0].emtiaz_niroo8);
                        $('#onvan-niroo9').val(obj[0].onvan_niroo9);
                        $('#tahsil-niroo9').val(obj[0].tahsil_niroo9);
                        $('#hamkari-niroo9').val(obj[0].hamkari_niroo9);
                        $('#sabeghe-niroo9').val(obj[0].sabeghe_niroo9);
                        $('#bime-niroo9').val(obj[0].bime_niroo9);
                        $('#emtiaz-niroo9').val(obj[0].emtiaz_niroo9);
                        $('#onvan-niroo10').val(obj[0].onvan_niroo10);
                        $('#tahsil-niroo10').val(obj[0].tahsil_niroo10);
                        $('#hamkari-niroo10').val(obj[0].hamkari_niroo10);
                        $('#sabeghe-niroo10').val(obj[0].sabeghe_niroo10);
                        $('#bime-niroo10').val(obj[0].bime_niroo10);
                        $('#emtiaz-niroo10').val(obj[0].emtiaz_niroo10);
                        files_niroo=[];
                        if ( obj[0].files_niroo.length>0 )
                        {
                            FilesList=obj[0].files_niroo.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_niroo[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_bazar1_1!="" || obj[0].note_bazar1!="" ) { $(".bazar1-1").css("display","table-row");  $(".upload-note-bazar1").css("display","block"); }
                        if ( obj[0].onvan_bazar1_2!="" ) { $(".bazar1-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar1_3!="" ) { $(".bazar1-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar1_4!="" ) { $(".bazar1-4").css("display","table-row"); }
                        $('#onvan-bazar1-1').val(obj[0].onvan_bazar1_1);
                        $('#mahal-bazar1-1').val(obj[0].mahal_bazar1_1);
                        $('#date-bazar1-1').val(obj[0].date_bazar1_1);
                        $('#type-bazar1-1').val(obj[0].type_bazar1_1);
                        $('#emtiaz-bazar1-1').val(obj[0].emtiaz_bazar1_1);
                        $('#onvan-bazar1-2').val(obj[0].onvan_bazar1_2);
                        $('#mahal-bazar1-2').val(obj[0].mahal_bazar1_2);
                        $('#date-bazar1-2').val(obj[0].date_bazar1_2);
                        $('#type-bazar1-2').val(obj[0].type_bazar1_2);
                        $('#emtiaz-bazar1-2').val(obj[0].emtiaz_bazar1_2);
                        $('#onvan-bazar1-3').val(obj[0].onvan_bazar1_3);
                        $('#mahal-bazar1-3').val(obj[0].mahal_bazar1_3);
                        $('#date-bazar1-3').val(obj[0].date_bazar1_3);
                        $('#type-bazar1-3').val(obj[0].type_bazar1_3);
                        $('#emtiaz-bazar1-3').val(obj[0].emtiaz_bazar1_3);
                        $('#onvan-bazar1-4').val(obj[0].onvan_bazar1_4);
                        $('#mahal-bazar1-4').val(obj[0].mahal_bazar1_4);
                        $('#date-bazar1-4').val(obj[0].date_bazar1_4);
                        $('#type-bazar1-4').val(obj[0].type_bazar1_4);
                        $('#emtiaz-bazar1-4').val(obj[0].emtiaz_bazar1_4);
                        $('#note-bazar1').val(obj[0].note_bazar1);
                        files_bazar1_1=[];
                        files_bazar1_2=[];
                        files_bazar1_3=[];
                        files_bazar1_4=[];
                        if ( obj[0].files_bazar1_1.length>0 )
                        {
                            FilesList=obj[0].files_bazar1_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar1_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar1_2.length>0 )
                        {
                            FilesList=obj[0].files_bazar1_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar1_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar1_3.length>0 )
                        {
                            FilesList=obj[0].files_bazar1_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar1_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar1_4.length>0 )
                        {
                            FilesList=obj[0].files_bazar1_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar1_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        $('#onvan-bazar2').val(obj[0].onvan_bazar2);
                        files_bazar2=[];
                        if ( obj[0].files_bazar2.length>0 )
                        {
                            FilesList=obj[0].files_bazar2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_bazar3_1!="" || obj[0].note_bazar3!="" ) { $(".bazar3-1").css("display","table-row");  $(".upload-note-bazar3").css("display","block"); }
                        if ( obj[0].onvan_bazar3_2!="" ) { $(".bazar3-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar3_3!="" ) { $(".bazar3-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar3_4!="" ) { $(".bazar3-4").css("display","table-row"); }
                        $('#onvan-bazar3-1').val(obj[0].onvan_bazar3_1);
                        $('#date-bazar3-1').val(obj[0].date_bazar3_1);
                        $('#bargozar-bazar3-1').val(obj[0].bargozar_bazar3_1);
                        $('#mahal-bazar3-1').val(obj[0].mahal_bazar3_1);
                        $('#emtiaz-bazar3-1').val(obj[0].emtiaz_bazar3_1);
                        $('#onvan-bazar3-2').val(obj[0].onvan_bazar3_2);
                        $('#date-bazar3-2').val(obj[0].date_bazar3_2);
                        $('#bargozar-bazar3-2').val(obj[0].bargozar_bazar3_2);
                        $('#mahal-bazar3-2').val(obj[0].mahal_bazar3_2);
                        $('#emtiaz-bazar3-2').val(obj[0].emtiaz_bazar3_2);
                        $('#onvan-bazar3-3').val(obj[0].onvan_bazar3_3);
                        $('#date-bazar3-3').val(obj[0].date_bazar3_3);
                        $('#bargozar-bazar3-3').val(obj[0].bargozar_bazar3_3);
                        $('#mahal-bazar3-3').val(obj[0].mahal_bazar3_3);
                        $('#emtiaz-bazar3-3').val(obj[0].emtiaz_bazar3_3);
                        $('#onvan-bazar3-4').val(obj[0].onvan_bazar3_4);
                        $('#date-bazar3-4').val(obj[0].date_bazar3_4);
                        $('#bargozar-bazar3-4').val(obj[0].bargozar_bazar3_4);
                        $('#mahal-bazar3-4').val(obj[0].mahal_bazar3_4);
                        $('#emtiaz-bazar3-4').val(obj[0].emtiaz_bazar3_4);
                        $('#note-bazar3').val(obj[0].note_bazar3);
                        files_bazar3_1=[];
                        files_bazar3_2=[];
                        files_bazar3_3=[];
                        files_bazar3_4=[];
                        if ( obj[0].files_bazar3_1.length>0 )
                        {
                            FilesList=obj[0].files_bazar3_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar3_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar3_2.length>0 )
                        {
                            FilesList=obj[0].files_bazar3_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar3_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar3_3.length>0 )
                        {
                            FilesList=obj[0].files_bazar3_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar3_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar3_4.length>0 )
                        {
                            FilesList=obj[0].files_bazar3_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar3_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_bazar4_1!="" || obj[0].note_bazar4!="" ) { $(".bazar4-1").css("display","table-row"); $(".upload-note-bazar4").css("display","block"); }
                        if ( obj[0].onvan_bazar4_2!="" ) { $(".bazar4-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar4_3!="" ) { $(".bazar4-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar4_4!="" ) { $(".bazar4-4").css("display","table-row"); }
                        $('#onvan-bazar4-1').val(obj[0].onvan_bazar4_1);
                        $('#date-bazar4-1').val(obj[0].date_bazar4_1);
                        $('#mahal-bazar4-1').val(obj[0].mahal_bazar4_1);
                        $('#naghsh-bazar4-1').val(obj[0].naghsh_bazar4_1);
                        $('#emtiaz-bazar4-1').val(obj[0].emtiaz_bazar4_1);
                        $('#onvan-bazar4-2').val(obj[0].onvan_bazar4_2);
                        $('#date-bazar4-2').val(obj[0].date_bazar4_2);
                        $('#mahal-bazar4-2').val(obj[0].mahal_bazar4_2);
                        $('#naghsh-bazar4-2').val(obj[0].naghsh_bazar4_2);
                        $('#emtiaz-bazar4-2').val(obj[0].emtiaz_bazar4_2);
                        $('#onvan-bazar4-3').val(obj[0].onvan_bazar4_3);
                        $('#date-bazar4-3').val(obj[0].date_bazar4_3);
                        $('#mahal-bazar4-3').val(obj[0].mahal_bazar4_3);
                        $('#naghsh-bazar4-3').val(obj[0].naghsh_bazar4_3);
                        $('#emtiaz-bazar4-3').val(obj[0].emtiaz_bazar4_3);
                        $('#onvan-bazar4-4').val(obj[0].onvan_bazar4_4);
                        $('#date-bazar4-4').val(obj[0].date_bazar4_4);
                        $('#mahal-bazar4-4').val(obj[0].mahal_bazar4_4);
                        $('#naghsh-bazar4-4').val(obj[0].naghsh_bazar4_4);
                        $('#emtiaz-bazar4-4').val(obj[0].emtiaz_bazar4_4);
                        $('#note-bazar4').val(obj[0].note_bazar4);
                        files_bazar4_1=[];
                        files_bazar4_2=[];
                        files_bazar4_3=[];
                        files_bazar4_4=[];
                        if ( obj[0].files_bazar4_1.length>0 )
                        {
                            FilesList=obj[0].files_bazar4_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar4_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar4_2.length>0 )
                        {
                            FilesList=obj[0].files_bazar4_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar4_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar4_3.length>0 )
                        {
                            FilesList=obj[0].files_bazar4_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar4_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_bazar4_4.length>0 )
                        {
                            FilesList=obj[0].files_bazar4_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_bazar4_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_amoozeshi1_1!="" || obj[0].note_amoozeshi1!="" ) { $(".amoozeshi1-1").css("display","table-row"); $(".upload-note-amoozeshi1").css("display","block"); }
                        if ( obj[0].onvan_amoozeshi1_2!="" ) { $(".amoozeshi1-2").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi1_3!="" ) { $(".amoozeshi1-3").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi1_4!="" ) { $(".amoozeshi1-4").css("display","table-row"); }
                        $('#onvan-amoozeshi1-1').val(obj[0].onvan_amoozeshi1_1);
                        $('#date-amoozeshi1-1').val(obj[0].date_amoozeshi1_1);
                        $('#bargozar-amoozeshi1-1').val(obj[0].bargozar_amoozeshi1_1);
                        $('#mahal-amoozeshi1-1').val(obj[0].mahal_amoozeshi1_1);
                        $('#emtiaz-amoozeshi1-1').val(obj[0].emtiaz_amoozeshi1_1);
                        $('#onvan-amoozeshi1-2').val(obj[0].onvan_amoozeshi1_2);
                        $('#date-amoozeshi1-2').val(obj[0].date_amoozeshi1_2);
                        $('#bargozar-amoozeshi1-2').val(obj[0].bargozar_amoozeshi1_2);
                        $('#mahal-amoozeshi1-2').val(obj[0].mahal_amoozeshi1_2);
                        $('#emtiaz-amoozeshi1-2').val(obj[0].emtiaz_amoozeshi1_2);
                        $('#onvan-amoozeshi1-3').val(obj[0].onvan_amoozeshi1_3);
                        $('#date-amoozeshi1-3').val(obj[0].date_amoozeshi1_3);
                        $('#bargozar-amoozeshi1-3').val(obj[0].bargozar_amoozeshi1_3);
                        $('#mahal-amoozeshi1-3').val(obj[0].mahal_amoozeshi1_3);
                        $('#emtiaz-amoozeshi1-3').val(obj[0].emtiaz_amoozeshi1_3);
                        $('#onvan-amoozeshi1-4').val(obj[0].onvan_amoozeshi1_4);
                        $('#date-amoozeshi1-4').val(obj[0].date_amoozeshi1_4);
                        $('#bargozar-amoozeshi1-4').val(obj[0].bargozar_amoozeshi1_4);
                        $('#mahal-amoozeshi1-4').val(obj[0].mahal_amoozeshi1_4);
                        $('#emtiaz-amoozeshi1-4').val(obj[0].emtiaz_amoozeshi1_4);
                        $('#note-amoozeshi1').val(obj[0].note_amoozeshi1);
                        files_amoozeshi1_1=[];
                        files_amoozeshi1_2=[];
                        files_amoozeshi1_3=[];
                        files_amoozeshi1_4=[];
                        if ( obj[0].files_amoozeshi1_1.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi1_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi1_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi1_2.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi1_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi1_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi1_3.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi1_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi1_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi1_4.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi1_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi1_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].onvan_amoozeshi2_1!="" || obj[0].note_amoozeshi2!="" ) { $(".amoozeshi2-1").css("display","table-row"); $(".upload-note-amoozeshi2").css("display","block"); }
                        if ( obj[0].onvan_amoozeshi2_2!="" ) { $(".amoozeshi2-2").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi2_3!="" ) { $(".amoozeshi2-3").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi2_4!="" ) { $(".amoozeshi2-4").css("display","table-row"); }
                        $('#onvan-amoozeshi2-1').val(obj[0].onvan_amoozeshi2_1);
                        $('#date-amoozeshi2-1').val(obj[0].date_amoozeshi2_1);
                        $('#mahal-amoozeshi2-1').val(obj[0].mahal_amoozeshi2_1);
                        $('#naghsh-amoozeshi2-1').val(obj[0].naghsh_amoozeshi2_1);
                        $('#emtiaz-amoozeshi2-1').val(obj[0].emtiaz_amoozeshi2_1);
                        $('#onvan-amoozeshi2-2').val(obj[0].onvan_amoozeshi2_2);
                        $('#date-amoozeshi2-2').val(obj[0].date_amoozeshi2_2);
                        $('#mahal-amoozeshi2-2').val(obj[0].mahal_amoozeshi2_2);
                        $('#naghsh-amoozeshi2-2').val(obj[0].naghsh_amoozeshi2_2);
                        $('#emtiaz-amoozeshi2-2').val(obj[0].emtiaz_amoozeshi2_2);
                        $('#onvan-amoozeshi2-3').val(obj[0].onvan_amoozeshi2_3);
                        $('#date-amoozeshi2-3').val(obj[0].date_amoozeshi2_3);
                        $('#mahal-amoozeshi2-3').val(obj[0].mahal_amoozeshi2_3);
                        $('#naghsh-amoozeshi2-3').val(obj[0].naghsh_amoozeshi2_3);
                        $('#emtiaz-amoozeshi2-3').val(obj[0].emtiaz_amoozeshi2_3);
                        $('#onvan-amoozeshi2-4').val(obj[0].onvan_amoozeshi2_4);
                        $('#date-amoozeshi2-4').val(obj[0].date_amoozeshi2_4);
                        $('#mahal-amoozeshi2-4').val(obj[0].mahal_amoozeshi2_4);
                        $('#naghsh-amoozeshi2-4').val(obj[0].naghsh_amoozeshi2_4);
                        $('#emtiaz-amoozeshi2-4').val(obj[0].emtiaz_amoozeshi2_4);
                        $('#note-amoozeshi2').val(obj[0].note_amoozeshi2);
                        files_amoozeshi2_1=[];
                        files_amoozeshi2_2=[];
                        files_amoozeshi2_3=[];
                        files_amoozeshi2_4=[];
                        if ( obj[0].files_amoozeshi2_1.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi2_1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi2_1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi2_2.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi2_2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi2_2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi2_3.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi2_3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi2_3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        if ( obj[0].files_amoozeshi2_4.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi2_4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files_amoozeshi2_4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
            
                        $('#emtiaz-taamolp1').val(obj[0].emtiaz_taamolp1);
                        $('#emtiaz-taamolp2').val(obj[0].emtiaz_taamolp2);
                        $('#emtiaz-taamolp3').val(obj[0].emtiaz_taamolp3);
                        $('#emtiaz-taamolp4').val(obj[0].emtiaz_taamolp4);
                        $('#emtiaz-taamolp5').val(obj[0].emtiaz_taamolp5);
                        $('#emtiaz-taamols1').val(obj[0].emtiaz_taamols1);
                        $('#emtiaz-taamols2').val(obj[0].emtiaz_taamols2);
            
                        $('#nazar-sanji1').val(obj[0].nazar_sanji1);
                        $('#nazar-sanji2').val(obj[0].nazar_sanji2);
                        $('#nazar-sanji3').val(obj[0].nazar_sanji3);
                        $('#nazar-sanji4').val(obj[0].nazar_sanji4);
                        $('#nazar-sanji5').val(obj[0].nazar_sanji5);
                        $('#nazar-sanji6').val(obj[0].nazar_sanji6);
                        $('#nazar-sanji7').val(obj[0].nazar_sanji7);
                        $('#nazar-sanji8').val(obj[0].nazar_sanji8);
                        $('#nazar-sanji9').val(obj[0].nazar_sanji9);
                        $('#nazar-sanji10').val(obj[0].nazar_sanji10);
                        $('#nazar-sanji11').val(obj[0].nazar_sanji11);
                        $('#nazar-sanji12').val(obj[0].nazar_sanji12);
                        $('#nazar-sanji13').val(obj[0].nazar_sanji13);
                        $('#nazar-sanji14').val(obj[0].nazar_sanji14);
                        
                        $("#file-upload1").html("[فایل ها]"+"["+files_mali1_1.length+"]")
                        $("#file-upload2").html("[فایل ها]"+"["+files_mali1_2.length+"]")
                        $("#file-upload3").html("[فایل ها]"+"["+files_mali1_3.length+"]")
                        $("#file-upload4").html("[فایل ها]"+"["+files_mali1_4.length+"]")
                        $("#file-upload5").html("[فایل ها]"+"["+files_mali2_1.length+"]")
                        $("#file-upload6").html("[فایل ها]"+"["+files_mali2_2.length+"]")
                        $("#file-upload7").html("[فایل ها]"+"["+files_mali2_3.length+"]")
                        $("#file-upload8").html("[فایل ها]"+"["+files_mali2_4.length+"]")
                        $("#file-upload9").html("[فایل ها]"+"["+files_mali3_1.length+"]")
                        $("#file-upload10").html("[فایل ها]"+"["+files_mali3_2.length+"]")
                        $("#file-upload11").html("[فایل ها]"+"["+files_mali3_3.length+"]")
                        $("#file-upload12").html("[فایل ها]"+"["+files_mali3_4.length+"]")
                        $("#file-upload13").html("[فایل ها]"+"["+files_mali4_1.length+"]")
                        $("#file-upload14").html("[فایل ها]"+"["+files_mali4_2.length+"]")
                        $("#file-upload15").html("[فایل ها]"+"["+files_mali4_3.length+"]")
                        $("#file-upload16").html("[فایل ها]"+"["+files_mali4_4.length+"]")
                        $("#file-upload17").html("[فایل ها]"+"["+files_dast1_1.length+"]")
                        $("#file-upload18").html("[فایل ها]"+"["+files_dast1_2.length+"]")
                        $("#file-upload19").html("[فایل ها]"+"["+files_dast1_3.length+"]")
                        $("#file-upload20").html("[فایل ها]"+"["+files_dast1_4.length+"]")
                        $("#file-upload21").html("[فایل ها]"+"["+files_dast2_1.length+"]")
                        $("#file-upload22").html("[فایل ها]"+"["+files_dast2_2.length+"]")
                        $("#file-upload23").html("[فایل ها]"+"["+files_dast2_3.length+"]")
                        $("#file-upload24").html("[فایل ها]"+"["+files_dast2_4.length+"]")
                        $("#file-upload25").html("[فایل ها]"+"["+files_dast3_1.length+"]")
                        $("#file-upload26").html("[فایل ها]"+"["+files_dast3_2.length+"]")
                        $("#file-upload27").html("[فایل ها]"+"["+files_dast3_3.length+"]")
                        $("#file-upload28").html("[فایل ها]"+"["+files_dast3_4.length+"]")
                        $("#file-upload29").html("[فایل ها]"+"["+files_dast4_1.length+"]")
                        $("#file-upload30").html("[فایل ها]"+"["+files_dast4_2.length+"]")
                        $("#file-upload31").html("[فایل ها]"+"["+files_dast4_3.length+"]")
                        $("#file-upload32").html("[فایل ها]"+"["+files_dast4_4.length+"]")
                        $("#file-upload33").html("[فایل ها]"+"["+files_dast5_1.length+"]")
                        $("#file-upload34").html("[فایل ها]"+"["+files_dast5_2.length+"]")
                        $("#file-upload35").html("[فایل ها]"+"["+files_dast5_3.length+"]")
                        $("#file-upload36").html("[فایل ها]"+"["+files_dast5_4.length+"]")
                        $("#file-upload37").html("[فایل ها]"+"["+files_dast6_1.length+"]")
                        $("#file-upload38").html("[فایل ها]"+"["+files_dast6_2.length+"]")
                        $("#file-upload39").html("[فایل ها]"+"["+files_dast6_3.length+"]")
                        $("#file-upload40").html("[فایل ها]"+"["+files_dast6_4.length+"]")
                        $("#file-upload41").html("آپلود مستندات نیروی انسانی"+" ["+files_niroo.length+"]")
                        $("#file-upload42").html("[فایل ها]"+"["+files_bazar1_1.length+"]")
                        $("#file-upload43").html("[فایل ها]"+"["+files_bazar1_2.length+"]")
                        $("#file-upload44").html("[فایل ها]"+"["+files_bazar1_3.length+"]")
                        $("#file-upload45").html("[فایل ها]"+"["+files_bazar1_4.length+"]")
                        $("#file-upload46").html("[فایل ها]"+"["+files_bazar2.length+"]")
                        $("#file-upload47").html("[فایل ها]"+"["+files_bazar3_1.length+"]")
                        $("#file-upload48").html("[فایل ها]"+"["+files_bazar3_2.length+"]")
                        $("#file-upload49").html("[فایل ها]"+"["+files_bazar3_3.length+"]")
                        $("#file-upload50").html("[فایل ها]"+"["+files_bazar3_4.length+"]")
                        $("#file-upload51").html("[فایل ها]"+"["+files_bazar4_1.length+"]")
                        $("#file-upload52").html("[فایل ها]"+"["+files_bazar4_2.length+"]")
                        $("#file-upload53").html("[فایل ها]"+"["+files_bazar4_3.length+"]")
                        $("#file-upload54").html("[فایل ها]"+"["+files_bazar4_4.length+"]")
                        $("#file-upload55").html("[فایل ها]"+"["+files_amoozeshi1_1.length+"]")
                        $("#file-upload56").html("[فایل ها]"+"["+files_amoozeshi1_2.length+"]")
                        $("#file-upload57").html("[فایل ها]"+"["+files_amoozeshi1_3.length+"]")
                        $("#file-upload58").html("[فایل ها]"+"["+files_amoozeshi1_4.length+"]")
                        $("#file-upload59").html("[فایل ها]"+"["+files_amoozeshi2_1.length+"]")
                        $("#file-upload60").html("[فایل ها]"+"["+files_amoozeshi2_2.length+"]")
                        $("#file-upload61").html("[فایل ها]"+"["+files_amoozeshi2_3.length+"]")
                        $("#file-upload62").html("[فایل ها]"+"["+files_amoozeshi2_4.length+"]")
            
                        $('#report').val(obj[0].report);
                    }
                }
             });

             var get_years=true;
             var form_data = new FormData();                  
             form_data.append('code', code);
             form_data.append('get_years', get_years);
             $.ajax({
                 url: 'includes/get_years.php', 
                 cache: false,
                 contentType: false,
                 processData: false,
                 data: form_data,                         
                 type: 'post',
                 success: function(response)
                 {
                    $('#year').empty();
                    if ( response != 0) 
                    {
                        var obj = JSON.parse(response);
                        select = document.getElementById('years');
                        var i;
                        for (i=0;i<obj.length;i++)
                        {
                            if ( obj[i].year!=current_year )
                            {
                                var opt = document.createElement('option');
                                opt.value = obj[i].year;
                                opt.innerHTML = " گزارش سال "+obj[i].year;
                                select.appendChild(opt);
                            }
                        }
                    }
                    else
                    {
                        //var obj = JSON.parse(response);
                        //select = document.getElementById('years');
                        //var opt = document.createElement('option');
                        //opt.value = current_year;
                        //opt.innerHTML = "گزارش سال "+current_year;
                        //select.appendChild(opt);
                    }
                    setTimeout(function()
                    { 
                        hide_window("Waiting");
                        show_window("FormEmtiaz");
                        $('#save').css('pointer-events','');
                        $('#send').css('pointer-events','');
                    }, 1500);
                 }
              });
                          
          /*setTimeout(function()
          { 
              hide_window("Waiting");
              show_window("FormEmtiaz");
              $('#save').css('pointer-events','');
              $('#send').css('pointer-events','');
          }, 1500);*/
        }

        
       function AddRow(cl)
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
            switch (cl)
            {
                case "mali1-" :
                    if ( index>1 && document.getElementById("onvan-mali1-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-mali1").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-mali1-"+index).focus(); 
                    break;
                case "mali2-" :
                    if ( index>1 && document.getElementById("onvan-mali2-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-mali2").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-mali2-"+index).focus(); 
                    break;
                case "mali3-" :
                    if ( index>1 && document.getElementById("onvan-mali3-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-mali3").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-mali3-"+index).focus(); 
                    break;
                case "mali4-" :
                    if ( index>1 && document.getElementById("onvan-mali4-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-mali4").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-mali4-"+index).focus(); 
                    break;
                case "dast1-" :
                    if ( index>1 && document.getElementById("onvan-dast1-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard1").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast1-"+index).focus(); 
                    break;
                case "dast2-" :
                    if ( index>1 && document.getElementById("onvan-dast2-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard2").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast2-"+index).focus(); 
                    break;
                case "dast3-" :
                    if ( index>1 && document.getElementById("onvan-dast3-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard3").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast3-"+index).focus(); 
                    break;
                case "dast4-" :
                    if ( index>1 && document.getElementById("onvan-dast4-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard4").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast4-"+index).focus(); 
                    break;
                case "dast5-" :
                    if ( index>1 && document.getElementById("onvan-dast5-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard5").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast5-"+index).focus(); 
                    break;
                case "dast6-" :
                    if ( index>1 && document.getElementById("onvan-dast6-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-dastavard6").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-dast6-"+index).focus(); 
                    break;
                case "niroo" :
                    if ( index>1 && document.getElementById("onvan-niroo"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-niroo").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-niroo"+index).focus(); 
                    break;
                case "bazar1-" :
                    if ( index>1 && document.getElementById("onvan-bazar1-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-bazar1").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-bazar1-"+index).focus(); 
                    break;
                case "bazar3-" :
                    if ( index>1 && document.getElementById("onvan-bazar3-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-bazar3").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-bazar3-"+index).focus(); 
                    break;
                case "bazar4-" :
                    if ( index>1 && document.getElementById("onvan-bazar4-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-bazar4").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-bazar4-"+index).focus(); 
                    break;
                case "amoozeshi1-" :
                    if ( index>1 && document.getElementById("onvan-amoozeshi1-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-amoozeshi1").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-amoozeshi1-"+index).focus(); 
                    break;
                case "amoozeshi2-" :
                    if ( index>1 && document.getElementById("onvan-amoozeshi2-"+(index-1)).value=="" )
                    {
                        swal("ردیف قبلی وارد نشده است", {icon: "warning",});
                        return;
                    }
                    $(".upload-note-amoozeshi2").css("display","block");
                    $(MemClass).css("display","table-row");
                    document.getElementById("onvan-amoozeshi2-"+index).focus(); 
                    break;
            }
            Set_fields();
        }
        
        /****** Delete Row ******/
        function DeleteRow(part, row)
        {
             index=row;
             mems=0;
             limit=4;
             if ( part=="niroo" ) { limit=10; }
             swal({
               title: "برای حذف مطمئن هستید؟",
               text: "با تایید اطلاعات مربوطه حذف می شود",
               icon: "warning",
               buttons: ["انصراف", "تایید"],
               dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) 
               {
               
                    for (index=1;index<=limit;index++)
                    {
                       MemClass="."+part+index;
                       if ( $(MemClass).css("display")!="none" )
                       {
                           mems+=1;
                       }
                       else
                       {
                           break;
                       }
                    }
                    MemClass="."+part+mems;
                    
                     switch (part)
                     {
                      case "mali1-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-mali1-"+index).val($("#onvan-mali1-"+idx).val());
                                      $("#mahal-mali1-"+index).val($("#mahal-mali1-"+idx).val());
                                      $("#karfarma-mali1-"+index).val($("#karfarma-mali1-"+idx).val());
                                      $("#mablagh-mali1-"+index).val($("#mablagh-mali1-"+idx).val());
                                      $("#emtiaz-mali1-"+index).val($("#emtiaz-mali1-"+idx).val());
                                    }
                                //}
                                //else
                                //{
                                      //$("#onvan-mali1-4").val("");
                                      //$("#mahal-mali1-4").val("");
                                      //$("#karfarma-mali1-4").val("");
                                      //$("#mablagh-mali1-4").val(0);
                                      //$("#emtiaz-mali1-4").val(0);
                                //}
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-mali1").css("display","none");
                                    $("#note-mali1").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "mali2-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-mali2-"+index).val($("#onvan-mali2-"+idx).val());
                                      $("#mahal-mali2-"+index).val($("#mahal-mali2-"+idx).val());
                                      $("#karfarma-mali2-"+index).val($("#karfarma-mali2-"+idx).val());
                                      $("#mablagh-mali2-"+index).val($("#mablagh-mali2-"+idx).val());
                                      $("#emtiaz-mali2-"+index).val($("#emtiaz-mali2-"+idx).val());
                                      $("#darsad-mali2-"+index).val($("#darsad-mali2-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-mali2-4").val("");
                                      $("#mahal-mali2-4").val("");
                                      $("#karfarma-mali2-4").val("");
                                      $("#mablagh-mali2-4").val(0);
                                      $("#emtiaz-mali2-4").val(0);
                                      $("#darsad-mali2-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-mali2").css("display","none");
                                    $("#note-mali2").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "mali3-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-mali3-"+index).val($("#onvan-mali3-"+idx).val());
                                      $("#mahal-mali3-"+index).val($("#mahal-mali3-"+idx).val());
                                      $("#karfarma-mali3-"+index).val($("#karfarma-mali3-"+idx).val());
                                      $("#mablagh-mali3-"+index).val($("#mablagh-mali3-"+idx).val());
                                      $("#emtiaz-mali3-"+index).val($("#emtiaz-mali3-"+idx).val());
                                      $("#darsad-mali3-"+index).val($("#darsad-mali3-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-mali3-4").val("");
                                      $("#mahal-mali3-4").val("");
                                      $("#karfarma-mali3-4").val("");
                                      $("#mablagh-mali3-4").val(0);
                                      $("#emtiaz-mali3-4").val(0);
                                      $("#darsad-mali3-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-mali3").css("display","none");
                                    $("#note-mali3").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "mali4-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-mali4-"+index).val($("#onvan-mali4-"+idx).val());
                                      $("#mablagh-mali4-"+index).val($("#mablagh-mali4-"+idx).val());
                                      $("#emtiaz-mali4-"+index).val($("#emtiaz-mali4-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-mali4-4").val("");
                                      $("#mablagh-mali4-4").val(0);
                                      $("#emtiaz-mali4-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-mali4").css("display","none");
                                    $("#note-mali4").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast1-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast1-"+index).val($("#onvan-dast1-"+idx).val());
                                      $("#marja-dast1-"+index).val($("#marja-dast1-"+idx).val());
                                      $("#date-dast1-"+index).val($("#date-dast1-"+idx).val());
                                      $("#emtiaz-dast1-"+index).val($("#emtiaz-dast1-"+idx).val());
                                      $("#emtiazm-dast1-"+index).val($("#emtiazm-dast1-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast1-4").val("");
                                      $("#marja-dast1-4").val(0);
                                      $("#date-dast1-4").val(0);
                                      $("#emtiaz-dast1-4").val(0);
                                      $("#emtiazm-dast1-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast1").css("display","none");
                                    $("#note-dast1").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast2-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast2-"+index).val($("#onvan-dast2-"+idx).val());
                                      $("#marja-dast2-"+index).val($("#marja-dast2-"+idx).val());
                                      $("#date-dast2-"+index).val($("#date-dast2-"+idx).val());
                                      $("#emtiaz-dast2-"+index).val($("#emtiaz-dast2-"+idx).val());
                                      $("#emtiazm-dast2-"+index).val($("#emtiazm-dast2-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast2-4").val("");
                                      $("#marja-dast2-4").val(0);
                                      $("#date-dast2-4").val(0);
                                      $("#emtiaz-dast2-4").val(0);
                                      $("#emtiazm-dast2-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast2").css("display","none");
                                    $("#note-dast2").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast3-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast3-"+index).val($("#onvan-dast3-"+idx).val());
                                      $("#marja-dast3-"+index).val($("#marja-dast3-"+idx).val());
                                      $("#date-dast3-"+index).val($("#date-dast3-"+idx).val());
                                      $("#emtiaz-dast3-"+index).val($("#emtiaz-dast3-"+idx).val());
                                      $("#emtiazm-dast3-"+index).val($("#emtiazm-dast3-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast3-4").val("");
                                      $("#marja-dast3-4").val(0);
                                      $("#date-dast3-4").val(0);
                                      $("#emtiaz-dast3-4").val(0);
                                      $("#emtiazm-dast3-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast3").css("display","none");
                                    $("#note-dast3").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast4-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast4-"+index).val($("#onvan-dast4-"+idx).val());
                                      $("#marja-dast4-"+index).val($("#marja-dast4-"+idx).val());
                                      $("#date-dast4-"+index).val($("#date-dast4-"+idx).val());
                                      $("#emtiaz-dast4-"+index).val($("#emtiaz-dast4-"+idx).val());
                                      $("#emtiazm-dast4-"+index).val($("#emtiazm-dast4-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast4-4").val("");
                                      $("#marja-dast4-4").val(0);
                                      $("#date-dast4-4").val(0);
                                      $("#emtiaz-dast4-4").val(0);
                                      $("#emtiazm-dast4-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast4").css("display","none");
                                    $("#note-dast4").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast5-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast5-"+index).val($("#onvan-dast5-"+idx).val());
                                      $("#marja-dast5-"+index).val($("#marja-dast5-"+idx).val());
                                      $("#date-dast5-"+index).val($("#date-dast5-"+idx).val());
                                      $("#emtiaz-dast5-"+index).val($("#emtiaz-dast5-"+idx).val());
                                      $("#emtiazm-dast5-"+index).val($("#emtiazm-dast5-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast5-4").val("");
                                      $("#marja-dast5-4").val(0);
                                      $("#date-dast5-4").val(0);
                                      $("#emtiaz-dast5-4").val(0);
                                      $("#emtiazm-dast5-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast5").css("display","none");
                                    $("#note-dast5").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "dast6-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-dast6-"+index).val($("#onvan-dast6-"+idx).val());
                                      $("#marja-dast6-"+index).val($("#marja-dast6-"+idx).val());
                                      $("#date-dast6-"+index).val($("#date-dast6-"+idx).val());
                                      $("#emtiaz-dast6-"+index).val($("#emtiaz-dast6-"+idx).val());
                                      $("#emtiazm-dast6-"+index).val($("#emtiazm-dast6-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-dast6-4").val("");
                                      $("#marja-dast6-4").val(0);
                                      $("#date-dast6-4").val(0);
                                      $("#emtiaz-dast6-4").val(0);
                                      $("#emtiazm-dast6-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-dast6").css("display","none");
                                    $("#note-dast6").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "niroo":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-niroo"+index).val($("#onvan-niroo"+idx).val());
                                      $("#tahsil-niroo"+index).val($("#tahsil-niroo"+idx).val());
                                      $("#hamkari-niroo"+index).val($("#hamkari-niroo"+idx).val());
                                      $("#sabeghe-niroo"+index).val($("#sabeghe-niroo"+idx).val());
                                      $("#bime-niroo"+index).val($("#bime-niroo"+idx).val());
                                      $("#emtiaz-niroo"+index).val($("#emtiaz-niroo"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-niroo10").val("");
                                      $("#tahsil-niroo10").val("");
                                      $("#hamkari-niroo10").val("");
                                      $("#sabeghe-niroo10").val(0);
                                      $("#bime-niroo10").val("");
                                      $("#emtiaz-niroo10").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-niroo").css("display","none");
                                    $("#note-niroo").val("");
                                    $("#files-niroo").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "bazar1-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-bazar1-"+index).val($("#onvan-bazar1-"+idx).val());
                                      $("#mahal-bazar1-"+index).val($("#mahal-bazar1-"+idx).val());
                                      $("#date-bazar1-"+index).val($("#date-bazar1-"+idx).val());
                                      $("#type-bazar1-"+index).val($("#type-bazar1-"+idx).val());
                                      $("#emtiaz-bazar1-"+index).val($("#emtiaz-bazar1-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-bazar1-4").val("");
                                      $("#mahal-bazar1-4").val("");
                                      $("#date-bazar1-4").val("");
                                      $("#type-bazar1-4").val("");
                                      $("#emtiaz-bazar1-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-bazar1").css("display","none");
                                    $("#note-bazar1").val("");
                                    $("#files-bazar1").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "bazar3-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-bazar3-"+index).val($("#onvan-bazar3-"+idx).val());
                                      $("#date-bazar3-"+index).val($("#date-bazar3-"+idx).val());
                                      $("#bargozar-bazar3-"+index).val($("#bargozar-bazar3-"+idx).val());
                                      $("#mahal-bazar3-"+index).val($("#mahal-bazar3-"+idx).val());
                                      $("#emtiaz-bazar3-"+index).val($("#emtiaz-bazar3-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-bazar3-4").val("");
                                      $("#date-bazar3-4").val("");
                                      $("#bargozar-bazar3-4").val("");
                                      $("#mahal-bazar3-4").val("");
                                      $("#emtiaz-bazar3-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-bazar3").css("display","none");
                                    $("#note-bazar3").val("");
                                    $("#files-bazar3").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "bazar4-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-bazar4-"+index).val($("#onvan-bazar4-"+idx).val());
                                      $("#date-bazar4-"+index).val($("#date-bazar4-"+idx).val());
                                      $("#mahal-bazar4-"+index).val($("#mahal-bazar4-"+idx).val());
                                      $("#naghsh-bazar4-"+index).val($("#naghsh-bazar4-"+idx).val());
                                      $("#emtiaz-bazar4-"+index).val($("#emtiaz-bazar4-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-bazar4-4").val("");
                                      $("#date-bazar4-4").val("");
                                      $("#mahal-bazar4-4").val("");
                                      $("#naghsh-bazar4-4").val("");
                                      $("#emtiaz-bazar4-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-bazar4").css("display","none");
                                    $("#note-bazar4").val("");
                                    $("#files-bazar4").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "amoozeshi1-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-amoozeshi1-"+index).val($("#onvan-amoozeshi1-"+idx).val());
                                      $("#date-amoozeshi1-"+index).val($("#date-amoozeshi1-"+idx).val());
                                      $("#bargozar-amoozeshi1-"+index).val($("#bargozar-amoozeshi1-"+idx).val());
                                      $("#mahal-amoozeshi1-"+index).val($("#mahal-amoozeshi1-"+idx).val());
                                      $("#emtiaz-amoozeshi1-"+index).val($("#emtiaz-amoozeshi1-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-amoozeshi1-4").val("");
                                      $("#date-amoozeshi1-4").val("");
                                      $("#bargozar-amoozeshi1-4").val("");
                                      $("#mahal-amoozeshi1-4").val("");
                                      $("#emtiaz-amoozeshi1-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-amoozeshi1").css("display","none");
                                    $("#note-amoozeshi1").val("");
                                    $("#files-amoozeshi1").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      case "amoozeshi2-":
                                //if ( mems<limit )
                                //{
                                    for (index=row;index<=mems;index++)
                                    {
                                      idx=index+1;  
                                      $("#onvan-amoozeshi2-"+index).val($("#onvan-amoozeshi2-"+idx).val());
                                      $("#date-amoozeshi2-"+index).val($("#date-amoozeshi2-"+idx).val());
                                      $("#mahal-amoozeshi2-"+index).val($("#mahal-amoozeshi2-"+idx).val());
                                      $("#naghsh-amoozeshi2-"+index).val($("#naghsh-amoozeshi2-"+idx).val());
                                      $("#emtiaz-amoozeshi2-"+index).val($("#emtiaz-amoozeshi2-"+idx).val());
                                    }
                                //}
                                /*else
                                {
                                      $("#onvan-amoozeshi2-4").val("");
                                      $("#date-amoozeshi2-4").val("");
                                      $("#mahal-amoozeshi2-4").val("");
                                      $("#naghsh-amoozeshi2-4").val("");
                                      $("#emtiaz-amoozeshi2-4").val(0);
                                }*/
                                $(MemClass).css("display","none" );
                                if (mems==1 )
                                {
                                    $(".upload-note-amoozeshi2").css("display","none");
                                    $("#note-amoozeshi2").val("");
                                    $("#files-amoozeshi2").val("");
                                }
                                swal("اطلاعات با موفقیت حذف شد", {icon: "success",});
                                break;
                      }
               } 
               else 
               {
                 swal("شما از حذف اطلاعات انصراف دادید");
               }
             });
        }

        
        /**** Save Report ****/
        function Save_Report(param)
        {
            var save=true;
            var form_data = new FormData();
            form_data.append('user-code',document.getElementById("UserCode").value);
            form_data.append('state-code',document.getElementById("StateCode").value);
            form_data.append('center-code',document.getElementById("CenterCode").value);
            form_data.append('year',document.getElementById("years").value);
            form_data.append('NewEdit',document.getElementById("NewEdit").value);
           
            form_data.append('onvan-mali1-1',document.getElementById("onvan-mali1-1").value);
            form_data.append('mahal-mali1-1',document.getElementById("mahal-mali1-1").value);
            form_data.append('karfarma-mali1-1',document.getElementById("karfarma-mali1-1").value);
            form_data.append('mablagh-mali1-1',$("#mablagh-mali1-1").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali1-1',document.getElementById("emtiaz-mali1-1").value);
            form_data.append('onvan-mali1-2',document.getElementById("onvan-mali1-2").value);
            form_data.append('mahal-mali1-2',document.getElementById("mahal-mali1-2").value);
            form_data.append('karfarma-mali1-2',document.getElementById("karfarma-mali1-2").value);
            form_data.append('mablagh-mali1-2',$("#mablagh-mali1-2").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali1-2',document.getElementById("emtiaz-mali1-2").value);
            form_data.append('onvan-mali1-3',document.getElementById("onvan-mali1-3").value);
            form_data.append('mahal-mali1-3',document.getElementById("mahal-mali1-3").value);
            form_data.append('karfarma-mali1-3',document.getElementById("karfarma-mali1-3").value);
            form_data.append('mablagh-mali1-3',$("#mablagh-mali1-3").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali1-3',document.getElementById("emtiaz-mali1-3").value);
            form_data.append('onvan-mali1-4',document.getElementById("onvan-mali1-4").value);
            form_data.append('mahal-mali1-4',document.getElementById("mahal-mali1-4").value);
            form_data.append('karfarma-mali1-4',document.getElementById("karfarma-mali1-4").value);
            form_data.append('mablagh-mali1-4',$("#mablagh-mali1-4").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali1-4',document.getElementById("emtiaz-mali1-4").value);
            form_data.append('note-mali1',document.getElementById("note-mali1").value);
            for (var i = 0; i < files_mali1_1.length; i++) 
            {
                form_data.append('fileMali1-1[]', files_mali1_1[i].name);
            }
            for (var i = 0; i < files_mali1_2.length; i++) 
            {
                form_data.append('fileMali1-2[]', files_mali1_2[i].name);
            }
            for (var i = 0; i < files_mali1_3.length; i++) 
            {
                form_data.append('fileMali1-3[]', files_mali1_3[i].name);
            }
            for (var i = 0; i < files_mali1_4.length; i++) 
            {
                form_data.append('fileMali1-4[]', files_mali1_4[i].name);
            }
            form_data.append('onvan-mali2-1',document.getElementById("onvan-mali2-1").value);
            form_data.append('mahal-mali2-1',document.getElementById("mahal-mali2-1").value);
            form_data.append('karfarma-mali2-1',document.getElementById("karfarma-mali2-1").value);
            form_data.append('mablagh-mali2-1',$("#mablagh-mali2-1").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali2-1',document.getElementById("emtiaz-mali2-1").value);
            form_data.append('darsad-mali2-1',document.getElementById("darsad-mali2-1").value);
            form_data.append('onvan-mali2-2',document.getElementById("onvan-mali2-2").value);
            form_data.append('mahal-mali2-2',document.getElementById("mahal-mali2-2").value);
            form_data.append('karfarma-mali2-2',document.getElementById("karfarma-mali2-2").value);
            form_data.append('mablagh-mali2-2',$("#mablagh-mali2-2").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali2-2',document.getElementById("emtiaz-mali2-2").value);
            form_data.append('darsad-mali2-2',document.getElementById("darsad-mali2-2").value);
            form_data.append('onvan-mali2-3',document.getElementById("onvan-mali2-3").value);
            form_data.append('mahal-mali2-3',document.getElementById("mahal-mali2-3").value);
            form_data.append('karfarma-mali2-3',document.getElementById("karfarma-mali2-3").value);
            form_data.append('mablagh-mali2-3',$("#mablagh-mali2-3").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali2-3',document.getElementById("emtiaz-mali2-3").value);
            form_data.append('darsad-mali2-3',document.getElementById("darsad-mali2-3").value);
            form_data.append('onvan-mali2-4',document.getElementById("onvan-mali2-4").value);
            form_data.append('mahal-mali2-4',document.getElementById("mahal-mali2-4").value);
            form_data.append('karfarma-mali2-4',document.getElementById("karfarma-mali2-4").value);
            form_data.append('mablagh-mali2-4',$("#mablagh-mali2-4").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali2-4',document.getElementById("emtiaz-mali2-4").value);
            form_data.append('darsad-mali2-4',document.getElementById("darsad-mali2-4").value);
            form_data.append('note-mali2',document.getElementById("note-mali2").value);
            for (var i = 0; i < files_mali2_1.length; i++) 
            {
                form_data.append('fileMali2-1[]', files_mali2_1[i].name);
            }
            for (var i = 0; i < files_mali2_2.length; i++) 
            {
                form_data.append('fileMali2-2[]', files_mali2_2[i].name);
            }
            for (var i = 0; i < files_mali2_3.length; i++) 
            {
                form_data.append('fileMali2-3[]', files_mali2_3[i].name);
            }
            for (var i = 0; i < files_mali2_4.length; i++) 
            {
                form_data.append('fileMali2-4[]', files_mali2_4[i].name);
            }
            form_data.append('onvan-mali3-1',document.getElementById("onvan-mali3-1").value);
            form_data.append('mahal-mali3-1',document.getElementById("mahal-mali3-1").value);
            form_data.append('karfarma-mali3-1',document.getElementById("karfarma-mali3-1").value);
            form_data.append('mablagh-mali3-1',$("#mablagh-mali3-1").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali3-1',document.getElementById("emtiaz-mali3-1").value);
            form_data.append('darsad-mali3-1',document.getElementById("darsad-mali3-1").value);
            form_data.append('onvan-mali3-2',document.getElementById("onvan-mali3-2").value);
            form_data.append('mahal-mali3-2',document.getElementById("mahal-mali3-2").value);
            form_data.append('karfarma-mali3-2',document.getElementById("karfarma-mali3-2").value);
            form_data.append('mablagh-mali3-2',$("#mablagh-mali3-2").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali3-2',document.getElementById("emtiaz-mali3-2").value);
            form_data.append('darsad-mali3-2',document.getElementById("darsad-mali3-2").value);
            form_data.append('onvan-mali3-3',document.getElementById("onvan-mali3-3").value);
            form_data.append('mahal-mali3-3',document.getElementById("mahal-mali3-3").value);
            form_data.append('karfarma-mali3-3',document.getElementById("karfarma-mali3-3").value);
            form_data.append('mablagh-mali3-3',$("#mablagh-mali3-3").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali3-3',document.getElementById("emtiaz-mali3-3").value);
            form_data.append('darsad-mali3-3',document.getElementById("darsad-mali3-3").value);
            form_data.append('onvan-mali3-4',document.getElementById("onvan-mali3-4").value);
            form_data.append('mahal-mali3-4',document.getElementById("mahal-mali3-4").value);
            form_data.append('karfarma-mali3-4',document.getElementById("karfarma-mali3-4").value);
            form_data.append('mablagh-mali3-4',$("#mablagh-mali3-4").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali3-4',document.getElementById("emtiaz-mali3-4").value);
            form_data.append('darsad-mali3-4',document.getElementById("darsad-mali3-4").value);
            form_data.append('note-mali3',document.getElementById("note-mali3").value);
            for (var i = 0; i < files_mali3_1.length; i++) 
            {
                form_data.append('fileMali3-1[]', files_mali3_1[i].name);
            }
            for (var i = 0; i < files_mali3_2.length; i++) 
            {
                form_data.append('fileMali3-2[]', files_mali3_2[i].name);
            }
            for (var i = 0; i < files_mali3_3.length; i++) 
            {
                form_data.append('fileMali3-3[]', files_mali3_3[i].name);
            }
            for (var i = 0; i < files_mali3_4.length; i++) 
            {
                form_data.append('fileMali3-4[]', files_mali3_4[i].name);
            }
            form_data.append('onvan-mali4-1',document.getElementById("onvan-mali4-1").value);
            form_data.append('mablagh-mali4-1',$("#mablagh-mali4-1").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali4-1',document.getElementById("emtiaz-mali4-1").value);
            form_data.append('onvan-mali4-2',document.getElementById("onvan-mali4-2").value);
            form_data.append('mablagh-mali4-2',$("#mablagh-mali4-2").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali4-2',document.getElementById("emtiaz-mali4-2").value);
            form_data.append('onvan-mali4-3',document.getElementById("onvan-mali4-3").value);
            form_data.append('mablagh-mali4-3',$("#mablagh-mali4-3").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali4-3',document.getElementById("emtiaz-mali4-3").value);
            form_data.append('onvan-mali4-4',document.getElementById("onvan-mali4-4").value);
            form_data.append('mablagh-mali4-4',$("#mablagh-mali4-4").val().replace(/,/g, ''));
            form_data.append('emtiaz-mali4-4',document.getElementById("emtiaz-mali4-4").value);
            form_data.append('note-mali4',document.getElementById("note-mali4").value);
            for (var i = 0; i < files_mali4_1.length; i++) 
            {
                form_data.append('fileMali4-1[]', files_mali4_1[i].name);
            }
            for (var i = 0; i < files_mali4_2.length; i++) 
            {
                form_data.append('fileMali4-2[]', files_mali4_2[i].name);
            }
            for (var i = 0; i < files_mali4_3.length; i++) 
            {
                form_data.append('fileMali4-3[]', files_mali4_3[i].name);
            }
            for (var i = 0; i < files_mali4_4.length; i++) 
            {
                form_data.append('fileMali4-4[]', files_mali4_4[i].name);
            }
            /*form_data.append('onvan-dast1',document.getElementById("onvan-dast1").value);
            form_data.append('marja-dast1',document.getElementById("marja-dast1").value);
            form_data.append('date-dast1',document.getElementById("date-dast1").value);
            form_data.append('emtiaz-dast1',document.getElementById("emtiaz-dast1").value);
            form_data.append('onvan-dast2',document.getElementById("onvan-dast2").value);
            form_data.append('marja-dast2',document.getElementById("marja-dast2").value);
            form_data.append('date-dast2',document.getElementById("date-dast2").value);
            form_data.append('emtiaz-dast2',document.getElementById("emtiaz-dast2").value);
            form_data.append('onvan-dast3',document.getElementById("onvan-dast3").value);
            form_data.append('marja-dast3',document.getElementById("marja-dast3").value);
            form_data.append('date-dast3',document.getElementById("date-dast3").value);
            form_data.append('emtiaz-dast3',document.getElementById("emtiaz-dast3").value);
            form_data.append('onvan-dast4',document.getElementById("onvan-dast4").value);
            form_data.append('marja-dast4',document.getElementById("marja-dast4").value);
            form_data.append('date-dast4',document.getElementById("date-dast4").value);
            form_data.append('emtiaz-dast4',document.getElementById("emtiaz-dast4").value);
            form_data.append('onvan-dast5',document.getElementById("onvan-dast5").value);
            form_data.append('marja-dast5',document.getElementById("marja-dast5").value);
            form_data.append('date-dast5',document.getElementById("date-dast5").value);
            form_data.append('emtiaz-dast5',document.getElementById("emtiaz-dast5").value);
            form_data.append('onvan-dast6',document.getElementById("onvan-dast6").value);
            form_data.append('marja-dast6',document.getElementById("marja-dast6").value);
            form_data.append('date-dast6',document.getElementById("date-dast6").value);
            form_data.append('emtiaz-dast6',document.getElementById("emtiaz-dast6").value);
            form_data.append('note-dast',document.getElementById("note-dast").value);
            for (var i = 0; i < files5.length; i++) 
            {
                form_data.append('fileDast[]', files5[i].name);
            }*/
            form_data.append('onvan-dast1-1',document.getElementById("onvan-dast1-1").value);
            form_data.append('marja-dast1-1',document.getElementById("marja-dast1-1").value);
            form_data.append('date-dast1-1',document.getElementById("date-dast1-1").value);
            form_data.append('emtiaz-dast1-1',document.getElementById("emtiaz-dast1-1").value);
            form_data.append('emtiazm-dast1-1',document.getElementById("emtiazm-dast1-1").value);
            for (var i = 0; i < files_dast1_1.length; i++) 
            {
                form_data.append('fileDast1-1[]', files_dast1_1[i].name);
            }
            form_data.append('onvan-dast1-2',document.getElementById("onvan-dast1-2").value);
            form_data.append('marja-dast1-2',document.getElementById("marja-dast1-2").value);
            form_data.append('date-dast1-2',document.getElementById("date-dast1-2").value);
            form_data.append('emtiaz-dast1-2',document.getElementById("emtiaz-dast1-2").value);
            form_data.append('emtiazm-dast1-2',document.getElementById("emtiazm-dast1-2").value);
            for (var i = 0; i < files_dast1_2.length; i++) 
            {
                form_data.append('fileDast1-2[]', files_dast1_2[i].name);
            }
            form_data.append('onvan-dast1-3',document.getElementById("onvan-dast1-3").value);
            form_data.append('marja-dast1-3',document.getElementById("marja-dast1-3").value);
            form_data.append('date-dast1-3',document.getElementById("date-dast1-3").value);
            form_data.append('emtiaz-dast1-3',document.getElementById("emtiaz-dast1-3").value);
            form_data.append('emtiazm-dast1-3',document.getElementById("emtiazm-dast1-3").value);
            for (var i = 0; i < files_dast1_3.length; i++) 
            {
                form_data.append('fileDast1-3[]', files_dast1_3[i].name);
            }
            form_data.append('onvan-dast1-4',document.getElementById("onvan-dast1-4").value);
            form_data.append('marja-dast1-4',document.getElementById("marja-dast1-4").value);
            form_data.append('date-dast1-4',document.getElementById("date-dast1-4").value);
            form_data.append('emtiaz-dast1-4',document.getElementById("emtiaz-dast1-4").value);
            form_data.append('emtiazm-dast1-4',document.getElementById("emtiazm-dast1-4").value);
            for (var i = 0; i < files_dast1_4.length; i++) 
            {
                form_data.append('fileDast1-4[]', files_dast1_4[i].name);
            }
            form_data.append('onvan-dast2-1',document.getElementById("onvan-dast2-1").value);
            form_data.append('marja-dast2-1',document.getElementById("marja-dast2-1").value);
            form_data.append('date-dast2-1',document.getElementById("date-dast2-1").value);
            form_data.append('emtiaz-dast2-1',document.getElementById("emtiaz-dast2-1").value);
            form_data.append('emtiazm-dast2-1',document.getElementById("emtiazm-dast2-1").value);
            for (var i = 0; i < files_dast2_1.length; i++) 
            {
                form_data.append('fileDast2-1[]', files_dast2_1[i].name);
            }
            form_data.append('onvan-dast2-2',document.getElementById("onvan-dast2-2").value);
            form_data.append('marja-dast2-2',document.getElementById("marja-dast2-2").value);
            form_data.append('date-dast2-2',document.getElementById("date-dast2-2").value);
            form_data.append('emtiaz-dast2-2',document.getElementById("emtiaz-dast2-2").value);
            form_data.append('emtiazm-dast2-2',document.getElementById("emtiazm-dast2-2").value);
            for (var i = 0; i < files_dast2_2.length; i++) 
            {
                form_data.append('fileDast2-2[]', files_dast2_2[i].name);
            }
            form_data.append('onvan-dast2-3',document.getElementById("onvan-dast2-3").value);
            form_data.append('marja-dast2-3',document.getElementById("marja-dast2-3").value);
            form_data.append('date-dast2-3',document.getElementById("date-dast2-3").value);
            form_data.append('emtiaz-dast2-3',document.getElementById("emtiaz-dast2-3").value);
            form_data.append('emtiazm-dast2-3',document.getElementById("emtiazm-dast2-3").value);
            for (var i = 0; i < files_dast2_3.length; i++) 
            {
                form_data.append('fileDast2-3[]', files_dast2_3[i].name);
            }
            form_data.append('onvan-dast2-4',document.getElementById("onvan-dast2-4").value);
            form_data.append('marja-dast2-4',document.getElementById("marja-dast2-4").value);
            form_data.append('date-dast2-4',document.getElementById("date-dast2-4").value);
            form_data.append('emtiaz-dast2-4',document.getElementById("emtiaz-dast2-4").value);
            form_data.append('emtiazm-dast2-4',document.getElementById("emtiazm-dast2-4").value);
            for (var i = 0; i < files_dast2_4.length; i++) 
            {
                form_data.append('fileDast2-4[]', files_dast2_4[i].name);
            }
            form_data.append('onvan-dast3-1',document.getElementById("onvan-dast3-1").value);
            form_data.append('marja-dast3-1',document.getElementById("marja-dast3-1").value);
            form_data.append('date-dast3-1',document.getElementById("date-dast3-1").value);
            form_data.append('emtiaz-dast3-1',document.getElementById("emtiaz-dast3-1").value);
            form_data.append('emtiazm-dast3-1',document.getElementById("emtiazm-dast3-1").value);
            for (var i = 0; i < files_dast3_1.length; i++) 
            {
                form_data.append('fileDast3-1[]', files_dast3_1[i].name);
            }
            form_data.append('onvan-dast3-2',document.getElementById("onvan-dast3-2").value);
            form_data.append('marja-dast3-2',document.getElementById("marja-dast3-2").value);
            form_data.append('date-dast3-2',document.getElementById("date-dast3-2").value);
            form_data.append('emtiaz-dast3-2',document.getElementById("emtiaz-dast3-2").value);
            form_data.append('emtiazm-dast3-2',document.getElementById("emtiazm-dast3-2").value);
            for (var i = 0; i < files_dast3_2.length; i++) 
            {
                form_data.append('fileDast3-2[]', files_dast3_2[i].name);
            }
            form_data.append('onvan-dast3-3',document.getElementById("onvan-dast3-3").value);
            form_data.append('marja-dast3-3',document.getElementById("marja-dast3-3").value);
            form_data.append('date-dast3-3',document.getElementById("date-dast3-3").value);
            form_data.append('emtiaz-dast3-3',document.getElementById("emtiaz-dast3-3").value);
            form_data.append('emtiazm-dast3-3',document.getElementById("emtiazm-dast3-3").value);
            for (var i = 0; i < files_dast3_3.length; i++) 
            {
                form_data.append('fileDast3-3[]', files_dast3_3[i].name);
            }
            form_data.append('onvan-dast3-4',document.getElementById("onvan-dast3-4").value);
            form_data.append('marja-dast3-4',document.getElementById("marja-dast3-4").value);
            form_data.append('date-dast3-4',document.getElementById("date-dast3-4").value);
            form_data.append('emtiaz-dast3-4',document.getElementById("emtiaz-dast3-4").value);
            form_data.append('emtiazm-dast3-4',document.getElementById("emtiazm-dast3-4").value);
            for (var i = 0; i < files_dast3_4.length; i++) 
            {
                form_data.append('fileDast3-4[]', files_dast3_4[i].name);
            }
            form_data.append('onvan-dast4-1',document.getElementById("onvan-dast4-1").value);
            form_data.append('marja-dast4-1',document.getElementById("marja-dast4-1").value);
            form_data.append('date-dast4-1',document.getElementById("date-dast4-1").value);
            form_data.append('emtiaz-dast4-1',document.getElementById("emtiaz-dast4-1").value);
            form_data.append('emtiazm-dast4-1',document.getElementById("emtiazm-dast4-1").value);
            for (var i = 0; i < files_dast4_1.length; i++) 
            {
                form_data.append('fileDast4-1[]', files_dast4_1[i].name);
            }
            form_data.append('onvan-dast4-2',document.getElementById("onvan-dast4-2").value);
            form_data.append('marja-dast4-2',document.getElementById("marja-dast4-2").value);
            form_data.append('date-dast4-2',document.getElementById("date-dast4-2").value);
            form_data.append('emtiaz-dast4-2',document.getElementById("emtiaz-dast4-2").value);
            form_data.append('emtiazm-dast4-2',document.getElementById("emtiazm-dast4-2").value);
            for (var i = 0; i < files_dast4_2.length; i++) 
            {
                form_data.append('fileDast4-2[]', files_dast4_2[i].name);
            }
            form_data.append('onvan-dast4-3',document.getElementById("onvan-dast4-3").value);
            form_data.append('marja-dast4-3',document.getElementById("marja-dast4-3").value);
            form_data.append('date-dast4-3',document.getElementById("date-dast4-3").value);
            form_data.append('emtiaz-dast4-3',document.getElementById("emtiaz-dast4-3").value);
            form_data.append('emtiazm-dast4-3',document.getElementById("emtiazm-dast4-3").value);
            for (var i = 0; i < files_dast4_3.length; i++) 
            {
                form_data.append('fileDast4-3[]', files_dast4_3[i].name);
            }
            form_data.append('onvan-dast4-4',document.getElementById("onvan-dast4-4").value);
            form_data.append('marja-dast4-4',document.getElementById("marja-dast4-4").value);
            form_data.append('date-dast4-4',document.getElementById("date-dast4-4").value);
            form_data.append('emtiaz-dast4-4',document.getElementById("emtiaz-dast4-4").value);
            form_data.append('emtiazm-dast4-4',document.getElementById("emtiazm-dast4-4").value);
            for (var i = 0; i < files_dast4_4.length; i++) 
            {
                form_data.append('fileDast4-4[]', files_dast4_4[i].name);
            }
            form_data.append('onvan-dast5-1',document.getElementById("onvan-dast5-1").value);
            form_data.append('marja-dast5-1',document.getElementById("marja-dast5-1").value);
            form_data.append('date-dast5-1',document.getElementById("date-dast5-1").value);
            form_data.append('emtiaz-dast5-1',document.getElementById("emtiaz-dast5-1").value);
            form_data.append('emtiazm-dast5-1',document.getElementById("emtiazm-dast5-1").value);
            for (var i = 0; i < files_dast5_1.length; i++) 
            {
                form_data.append('fileDast5-1[]', files_dast5_1[i].name);
            }
            form_data.append('onvan-dast5-2',document.getElementById("onvan-dast5-2").value);
            form_data.append('marja-dast5-2',document.getElementById("marja-dast5-2").value);
            form_data.append('date-dast5-2',document.getElementById("date-dast5-2").value);
            form_data.append('emtiaz-dast5-2',document.getElementById("emtiaz-dast5-2").value);
            form_data.append('emtiazm-dast5-2',document.getElementById("emtiazm-dast5-2").value);
            for (var i = 0; i < files_dast5_2.length; i++) 
            {
                form_data.append('fileDast5-2[]', files_dast5_2[i].name);
            }
            form_data.append('onvan-dast5-3',document.getElementById("onvan-dast5-3").value);
            form_data.append('marja-dast5-3',document.getElementById("marja-dast5-3").value);
            form_data.append('date-dast5-3',document.getElementById("date-dast5-3").value);
            form_data.append('emtiaz-dast5-3',document.getElementById("emtiaz-dast5-3").value);
            form_data.append('emtiazm-dast5-3',document.getElementById("emtiazm-dast5-3").value);
            for (var i = 0; i < files_dast5_3.length; i++) 
            {
                form_data.append('fileDast5-3[]', files_dast5_3[i].name);
            }
            form_data.append('onvan-dast5-4',document.getElementById("onvan-dast5-4").value);
            form_data.append('marja-dast5-4',document.getElementById("marja-dast5-4").value);
            form_data.append('date-dast5-4',document.getElementById("date-dast5-4").value);
            form_data.append('emtiaz-dast5-4',document.getElementById("emtiaz-dast5-4").value);
            form_data.append('emtiazm-dast5-4',document.getElementById("emtiazm-dast5-4").value);
            for (var i = 0; i < files_dast5_4.length; i++) 
            {
                form_data.append('fileDast5-4[]', files_dast5_4[i].name);
            }
            form_data.append('onvan-dast6-1',document.getElementById("onvan-dast6-1").value);
            form_data.append('marja-dast6-1',document.getElementById("marja-dast6-1").value);
            form_data.append('date-dast6-1',document.getElementById("date-dast6-1").value);
            form_data.append('emtiaz-dast6-1',document.getElementById("emtiaz-dast6-1").value);
            form_data.append('emtiazm-dast6-1',document.getElementById("emtiazm-dast6-1").value);
            for (var i = 0; i < files_dast6_1.length; i++) 
            {
                form_data.append('fileDast6-1[]', files_dast6_1[i].name);
            }
            form_data.append('onvan-dast6-2',document.getElementById("onvan-dast6-2").value);
            form_data.append('marja-dast6-2',document.getElementById("marja-dast6-2").value);
            form_data.append('date-dast6-2',document.getElementById("date-dast6-2").value);
            form_data.append('emtiaz-dast6-2',document.getElementById("emtiaz-dast6-2").value);
            form_data.append('emtiazm-dast6-2',document.getElementById("emtiazm-dast6-2").value);
            for (var i = 0; i < files_dast6_2.length; i++) 
            {
                form_data.append('fileDast6-2[]', files_dast6_2[i].name);
            }
            form_data.append('onvan-dast6-3',document.getElementById("onvan-dast6-3").value);
            form_data.append('marja-dast6-3',document.getElementById("marja-dast6-3").value);
            form_data.append('date-dast6-3',document.getElementById("date-dast6-3").value);
            form_data.append('emtiaz-dast6-3',document.getElementById("emtiaz-dast6-3").value);
            form_data.append('emtiazm-dast6-3',document.getElementById("emtiazm-dast6-3").value);
            for (var i = 0; i < files_dast6_3.length; i++) 
            {
                form_data.append('fileDast6-3[]', files_dast6_3[i].name);
            }
            form_data.append('onvan-dast6-4',document.getElementById("onvan-dast6-4").value);
            form_data.append('marja-dast6-4',document.getElementById("marja-dast6-4").value);
            form_data.append('date-dast6-4',document.getElementById("date-dast6-4").value);
            form_data.append('emtiaz-dast6-4',document.getElementById("emtiaz-dast6-4").value);
            form_data.append('emtiazm-dast6-4',document.getElementById("emtiazm-dast6-4").value);
            for (var i = 0; i < files_dast6_4.length; i++) 
            {
                form_data.append('fileDast6-4[]', files_dast6_4[i].name);
            }
            form_data.append('onvan-niroo1',document.getElementById("onvan-niroo1").value);
            form_data.append('tahsil-niroo1',document.getElementById("tahsil-niroo1").value);
            form_data.append('hamkari-niroo1',document.getElementById("hamkari-niroo1").value);
            form_data.append('sabeghe-niroo1',document.getElementById("sabeghe-niroo1").value);
            form_data.append('bime-niroo1',document.getElementById("bime-niroo1").value);
            form_data.append('emtiaz-niroo1',document.getElementById("emtiaz-niroo1").value);
            form_data.append('onvan-niroo2',document.getElementById("onvan-niroo2").value);
            form_data.append('tahsil-niroo2',document.getElementById("tahsil-niroo2").value);
            form_data.append('hamkari-niroo2',document.getElementById("hamkari-niroo2").value);
            form_data.append('sabeghe-niroo2',document.getElementById("sabeghe-niroo2").value);
            form_data.append('bime-niroo2',document.getElementById("bime-niroo2").value);
            form_data.append('emtiaz-niroo2',document.getElementById("emtiaz-niroo2").value);
            form_data.append('onvan-niroo3',document.getElementById("onvan-niroo3").value);
            form_data.append('tahsil-niroo3',document.getElementById("tahsil-niroo3").value);
            form_data.append('hamkari-niroo3',document.getElementById("hamkari-niroo3").value);
            form_data.append('sabeghe-niroo3',document.getElementById("sabeghe-niroo3").value);
            form_data.append('bime-niroo3',document.getElementById("bime-niroo3").value);
            form_data.append('emtiaz-niroo3',document.getElementById("emtiaz-niroo3").value);
            form_data.append('onvan-niroo4',document.getElementById("onvan-niroo4").value);
            form_data.append('tahsil-niroo4',document.getElementById("tahsil-niroo4").value);
            form_data.append('hamkari-niroo4',document.getElementById("hamkari-niroo4").value);
            form_data.append('sabeghe-niroo4',document.getElementById("sabeghe-niroo4").value);
            form_data.append('bime-niroo4',document.getElementById("bime-niroo4").value);
            form_data.append('emtiaz-niroo4',document.getElementById("emtiaz-niroo4").value);
            form_data.append('onvan-niroo5',document.getElementById("onvan-niroo5").value);
            form_data.append('tahsil-niroo5',document.getElementById("tahsil-niroo5").value);
            form_data.append('hamkari-niroo5',document.getElementById("hamkari-niroo5").value);
            form_data.append('sabeghe-niroo5',document.getElementById("sabeghe-niroo5").value);
            form_data.append('bime-niroo5',document.getElementById("bime-niroo5").value);
            form_data.append('emtiaz-niroo5',document.getElementById("emtiaz-niroo5").value);
            form_data.append('onvan-niroo6',document.getElementById("onvan-niroo6").value);
            form_data.append('tahsil-niroo6',document.getElementById("tahsil-niroo6").value);
            form_data.append('hamkari-niroo6',document.getElementById("hamkari-niroo6").value);
            form_data.append('sabeghe-niroo6',document.getElementById("sabeghe-niroo6").value);
            form_data.append('bime-niroo6',document.getElementById("bime-niroo6").value);
            form_data.append('emtiaz-niroo6',document.getElementById("emtiaz-niroo6").value);
            form_data.append('onvan-niroo7',document.getElementById("onvan-niroo7").value);
            form_data.append('tahsil-niroo7',document.getElementById("tahsil-niroo7").value);
            form_data.append('hamkari-niroo7',document.getElementById("hamkari-niroo7").value);
            form_data.append('sabeghe-niroo7',document.getElementById("sabeghe-niroo7").value);
            form_data.append('bime-niroo7',document.getElementById("bime-niroo7").value);
            form_data.append('emtiaz-niroo7',document.getElementById("emtiaz-niroo7").value);
            form_data.append('onvan-niroo8',document.getElementById("onvan-niroo8").value);
            form_data.append('tahsil-niroo8',document.getElementById("tahsil-niroo8").value);
            form_data.append('hamkari-niroo8',document.getElementById("hamkari-niroo8").value);
            form_data.append('sabeghe-niroo8',document.getElementById("sabeghe-niroo8").value);
            form_data.append('bime-niroo8',document.getElementById("bime-niroo8").value);
            form_data.append('emtiaz-niroo8',document.getElementById("emtiaz-niroo8").value);
            form_data.append('onvan-niroo9',document.getElementById("onvan-niroo9").value);
            form_data.append('tahsil-niroo9',document.getElementById("tahsil-niroo9").value);
            form_data.append('hamkari-niroo9',document.getElementById("hamkari-niroo9").value);
            form_data.append('sabeghe-niroo9',document.getElementById("sabeghe-niroo9").value);
            form_data.append('bime-niroo9',document.getElementById("bime-niroo9").value);
            form_data.append('emtiaz-niroo9',document.getElementById("emtiaz-niroo9").value);
            form_data.append('onvan-niroo10',document.getElementById("onvan-niroo10").value);
            form_data.append('tahsil-niroo10',document.getElementById("tahsil-niroo10").value);
            form_data.append('hamkari-niroo10',document.getElementById("hamkari-niroo10").value);
            form_data.append('sabeghe-niroo10',document.getElementById("sabeghe-niroo10").value);
            form_data.append('bime-niroo10',document.getElementById("bime-niroo10").value);
            form_data.append('emtiaz-niroo10',document.getElementById("emtiaz-niroo10").value);
            for (var i = 0; i < files_niroo.length; i++) 
            {
                form_data.append('fileNiroo[]', files_niroo[i].name);
            }
            form_data.append('onvan-bazar1-1',document.getElementById("onvan-bazar1-1").value);
            form_data.append('mahal-bazar1-1',document.getElementById("mahal-bazar1-1").value);
            form_data.append('date-bazar1-1',document.getElementById("date-bazar1-1").value);
            form_data.append('type-bazar1-1',document.getElementById("type-bazar1-1").value);
            form_data.append('emtiaz-bazar1-1',document.getElementById("emtiaz-bazar1-1").value);
            form_data.append('onvan-bazar1-2',document.getElementById("onvan-bazar1-2").value);
            form_data.append('mahal-bazar1-2',document.getElementById("mahal-bazar1-2").value);
            form_data.append('date-bazar1-2',document.getElementById("date-bazar1-2").value);
            form_data.append('type-bazar1-2',document.getElementById("type-bazar1-2").value);
            form_data.append('emtiaz-bazar1-2',document.getElementById("emtiaz-bazar1-2").value);
            form_data.append('onvan-bazar1-3',document.getElementById("onvan-bazar1-3").value);
            form_data.append('mahal-bazar1-3',document.getElementById("mahal-bazar1-3").value);
            form_data.append('date-bazar1-3',document.getElementById("date-bazar1-3").value);
            form_data.append('type-bazar1-3',document.getElementById("type-bazar1-3").value);
            form_data.append('emtiaz-bazar1-3',document.getElementById("emtiaz-bazar1-3").value);
            form_data.append('onvan-bazar1-4',document.getElementById("onvan-bazar1-4").value);
            form_data.append('mahal-bazar1-4',document.getElementById("mahal-bazar1-4").value);
            form_data.append('date-bazar1-4',document.getElementById("date-bazar1-4").value);
            form_data.append('type-bazar1-4',document.getElementById("type-bazar1-4").value);
            form_data.append('emtiaz-bazar1-4',document.getElementById("emtiaz-bazar1-4").value);
            form_data.append('note-bazar1',document.getElementById("note-bazar1").value);
            for (var i = 0; i < files_bazar1_1.length; i++) 
            {
                form_data.append('fileBazar1-1[]', files_bazar1_1[i].name);
            }
            for (var i = 0; i < files_bazar1_2.length; i++) 
            {
                form_data.append('fileBazar1-2[]', files_bazar1_2[i].name);
            }
            for (var i = 0; i < files_bazar1_3.length; i++) 
            {
                form_data.append('fileBazar1-3[]', files_bazar1_3[i].name);
            }
            for (var i = 0; i < files_bazar1_4.length; i++) 
            {
                form_data.append('fileBazar1-4[]', files_bazar1_4[i].name);
            }

            form_data.append('onvan-bazar2',document.getElementById("onvan-bazar2").value);
            for (var i = 0; i < files_bazar2.length; i++) 
            {
                form_data.append('fileBazar2[]', files_bazar2[i].name);
            }
            form_data.append('onvan-bazar3-1',document.getElementById("onvan-bazar3-1").value);
            form_data.append('date-bazar3-1',document.getElementById("date-bazar3-1").value);
            form_data.append('bargozar-bazar3-1',document.getElementById("bargozar-bazar3-1").value);
            form_data.append('mahal-bazar3-1',document.getElementById("mahal-bazar3-1").value);
            form_data.append('emtiaz-bazar3-1',document.getElementById("emtiaz-bazar3-1").value);
            form_data.append('onvan-bazar3-2',document.getElementById("onvan-bazar3-2").value);
            form_data.append('date-bazar3-2',document.getElementById("date-bazar3-2").value);
            form_data.append('bargozar-bazar3-2',document.getElementById("bargozar-bazar3-2").value);
            form_data.append('mahal-bazar3-2',document.getElementById("mahal-bazar3-2").value);
            form_data.append('emtiaz-bazar3-2',document.getElementById("emtiaz-bazar3-2").value);
            form_data.append('onvan-bazar3-3',document.getElementById("onvan-bazar3-3").value);
            form_data.append('date-bazar3-3',document.getElementById("date-bazar3-3").value);
            form_data.append('bargozar-bazar3-3',document.getElementById("bargozar-bazar3-3").value);
            form_data.append('mahal-bazar3-3',document.getElementById("mahal-bazar3-3").value);
            form_data.append('emtiaz-bazar3-3',document.getElementById("emtiaz-bazar3-3").value);
            form_data.append('onvan-bazar3-4',document.getElementById("onvan-bazar3-4").value);
            form_data.append('date-bazar3-4',document.getElementById("date-bazar3-4").value);
            form_data.append('bargozar-bazar3-4',document.getElementById("bargozar-bazar3-4").value);
            form_data.append('mahal-bazar3-4',document.getElementById("mahal-bazar3-4").value);
            form_data.append('emtiaz-bazar3-4',document.getElementById("emtiaz-bazar3-4").value);
            form_data.append('note-bazar3',document.getElementById("note-bazar3").value);
            for (var i = 0; i < files_bazar3_1.length; i++) 
            {
                form_data.append('fileBazar3-1[]', files_bazar3_1[i].name);
            }
            for (var i = 0; i < files_bazar3_2.length; i++) 
            {
                form_data.append('fileBazar3-2[]', files_bazar3_2[i].name);
            }
            for (var i = 0; i < files_bazar3_3.length; i++) 
            {
                form_data.append('fileBazar3-3[]', files_bazar3_3[i].name);
            }
            for (var i = 0; i < files_bazar3_4.length; i++) 
            {
                form_data.append('fileBazar3-4[]', files_bazar3_4[i].name);
            }
            form_data.append('onvan-bazar4-1',document.getElementById("onvan-bazar4-1").value);
            form_data.append('date-bazar4-1',document.getElementById("date-bazar4-1").value);
            form_data.append('mahal-bazar4-1',document.getElementById("mahal-bazar4-1").value);
            form_data.append('naghsh-bazar4-1',document.getElementById("naghsh-bazar4-1").value);
            form_data.append('emtiaz-bazar4-1',document.getElementById("emtiaz-bazar4-1").value);
            form_data.append('onvan-bazar4-2',document.getElementById("onvan-bazar4-2").value);
            form_data.append('date-bazar4-2',document.getElementById("date-bazar4-2").value);
            form_data.append('mahal-bazar4-2',document.getElementById("mahal-bazar4-2").value);
            form_data.append('naghsh-bazar4-2',document.getElementById("naghsh-bazar4-2").value);
            form_data.append('emtiaz-bazar4-2',document.getElementById("emtiaz-bazar4-2").value);
            form_data.append('onvan-bazar4-3',document.getElementById("onvan-bazar4-3").value);
            form_data.append('date-bazar4-3',document.getElementById("date-bazar4-3").value);
            form_data.append('mahal-bazar4-3',document.getElementById("mahal-bazar4-3").value);
            form_data.append('naghsh-bazar4-3',document.getElementById("naghsh-bazar4-3").value);
            form_data.append('emtiaz-bazar4-3',document.getElementById("emtiaz-bazar4-3").value);
            form_data.append('onvan-bazar4-4',document.getElementById("onvan-bazar4-4").value);
            form_data.append('date-bazar4-4',document.getElementById("date-bazar4-4").value);
            form_data.append('mahal-bazar4-4',document.getElementById("mahal-bazar4-4").value);
            form_data.append('naghsh-bazar4-4',document.getElementById("naghsh-bazar4-4").value);
            form_data.append('emtiaz-bazar4-4',document.getElementById("emtiaz-bazar4-4").value);
            form_data.append('note-bazar4',document.getElementById("note-bazar4").value);
            for (var i = 0; i < files_bazar4_1.length; i++) 
            {
                form_data.append('fileBazar4-1[]', files_bazar4_1[i].name);
            }
            for (var i = 0; i < files_bazar4_2.length; i++) 
            {
                form_data.append('fileBazar4-2[]', files_bazar4_2[i].name);
            }
            for (var i = 0; i < files_bazar4_3.length; i++) 
            {
                form_data.append('fileBazar4-3[]', files_bazar4_3[i].name);
            }
            for (var i = 0; i < files_bazar4_4.length; i++) 
            {
                form_data.append('fileBazar4-4[]', files_bazar4_4[i].name);
            }
            form_data.append('onvan-amoozeshi1-1',document.getElementById("onvan-amoozeshi1-1").value);
            form_data.append('date-amoozeshi1-1',document.getElementById("date-amoozeshi1-1").value);
            form_data.append('bargozar-amoozeshi1-1',document.getElementById("bargozar-amoozeshi1-1").value);
            form_data.append('mahal-amoozeshi1-1',document.getElementById("mahal-amoozeshi1-1").value);
            form_data.append('emtiaz-amoozeshi1-1',document.getElementById("emtiaz-amoozeshi1-1").value);
            form_data.append('onvan-amoozeshi1-2',document.getElementById("onvan-amoozeshi1-2").value);
            form_data.append('date-amoozeshi1-2',document.getElementById("date-amoozeshi1-2").value);
            form_data.append('bargozar-amoozeshi1-2',document.getElementById("bargozar-amoozeshi1-2").value);
            form_data.append('mahal-amoozeshi1-2',document.getElementById("mahal-amoozeshi1-2").value);
            form_data.append('emtiaz-amoozeshi1-2',document.getElementById("emtiaz-amoozeshi1-2").value);
            form_data.append('onvan-amoozeshi1-3',document.getElementById("onvan-amoozeshi1-3").value);
            form_data.append('date-amoozeshi1-3',document.getElementById("date-amoozeshi1-3").value);
            form_data.append('bargozar-amoozeshi1-3',document.getElementById("bargozar-amoozeshi1-3").value);
            form_data.append('mahal-amoozeshi1-3',document.getElementById("mahal-amoozeshi1-3").value);
            form_data.append('emtiaz-amoozeshi1-3',document.getElementById("emtiaz-amoozeshi1-3").value);
            form_data.append('onvan-amoozeshi1-4',document.getElementById("onvan-amoozeshi1-4").value);
            form_data.append('date-amoozeshi1-4',document.getElementById("date-amoozeshi1-4").value);
            form_data.append('bargozar-amoozeshi1-4',document.getElementById("bargozar-amoozeshi1-4").value);
            form_data.append('mahal-amoozeshi1-4',document.getElementById("mahal-amoozeshi1-4").value);
            form_data.append('emtiaz-amoozeshi1-4',document.getElementById("emtiaz-amoozeshi1-4").value);
            form_data.append('note-amoozeshi1',document.getElementById("note-amoozeshi1").value);
            for (var i = 0; i < files_amoozeshi1_1.length; i++) 
            {
                form_data.append('fileAmoozeshi1-1[]', files_amoozeshi1_1[i].name);
            }
            for (var i = 0; i < files_amoozeshi1_2.length; i++) 
            {
                form_data.append('fileAmoozeshi1-2[]', files_amoozeshi1_2[i].name);
            }
            for (var i = 0; i < files_amoozeshi1_3.length; i++) 
            {
                form_data.append('fileAmoozeshi1-3[]', files_amoozeshi1_3[i].name);
            }
            for (var i = 0; i < files_amoozeshi1_4.length; i++) 
            {
                form_data.append('fileAmoozeshi1-4[]', files_amoozeshi1_4[i].name);
            }
            form_data.append('onvan-amoozeshi2-1',document.getElementById("onvan-amoozeshi2-1").value);
            form_data.append('date-amoozeshi2-1',document.getElementById("date-amoozeshi2-1").value);
            form_data.append('mahal-amoozeshi2-1',document.getElementById("mahal-amoozeshi2-1").value);
            form_data.append('naghsh-amoozeshi2-1',document.getElementById("naghsh-amoozeshi2-1").value);
            form_data.append('emtiaz-amoozeshi2-1',document.getElementById("emtiaz-amoozeshi2-1").value);
            form_data.append('onvan-amoozeshi2-2',document.getElementById("onvan-amoozeshi2-2").value);
            form_data.append('date-amoozeshi2-2',document.getElementById("date-amoozeshi2-2").value);
            form_data.append('mahal-amoozeshi2-2',document.getElementById("mahal-amoozeshi2-2").value);
            form_data.append('naghsh-amoozeshi2-2',document.getElementById("naghsh-amoozeshi2-2").value);
            form_data.append('emtiaz-amoozeshi2-2',document.getElementById("emtiaz-amoozeshi2-2").value);
            form_data.append('onvan-amoozeshi2-3',document.getElementById("onvan-amoozeshi2-3").value);
            form_data.append('date-amoozeshi2-3',document.getElementById("date-amoozeshi2-3").value);
            form_data.append('mahal-amoozeshi2-3',document.getElementById("mahal-amoozeshi2-3").value);
            form_data.append('naghsh-amoozeshi2-3',document.getElementById("naghsh-amoozeshi2-3").value);
            form_data.append('emtiaz-amoozeshi2-3',document.getElementById("emtiaz-amoozeshi2-3").value);
            form_data.append('onvan-amoozeshi2-4',document.getElementById("onvan-amoozeshi2-4").value);
            form_data.append('date-amoozeshi2-4',document.getElementById("date-amoozeshi2-4").value);
            form_data.append('mahal-amoozeshi2-4',document.getElementById("mahal-amoozeshi2-4").value);
            form_data.append('naghsh-amoozeshi2-4',document.getElementById("naghsh-amoozeshi2-4").value);
            form_data.append('emtiaz-amoozeshi2-4',document.getElementById("emtiaz-amoozeshi2-4").value);
            form_data.append('note-amoozeshi2',document.getElementById("note-amoozeshi2").value);
            for (var i = 0; i < files_amoozeshi2_1.length; i++) 
            {
                form_data.append('fileAmoozeshi2-1[]', files_amoozeshi2_1[i].name);
            }
            for (var i = 0; i < files_amoozeshi2_2.length; i++) 
            {
                form_data.append('fileAmoozeshi2-2[]', files_amoozeshi2_2[i].name);
            }
            for (var i = 0; i < files_amoozeshi2_3.length; i++) 
            {
                form_data.append('fileAmoozeshi2-3[]', files_amoozeshi2_3[i].name);
            }
            for (var i = 0; i < files_amoozeshi2_4.length; i++) 
            {
                form_data.append('fileAmoozeshi2-4[]', files_amoozeshi2_4[i].name);
            }

            form_data.append('emtiaz-taamolp1',document.getElementById("emtiaz-taamolp1").value);
            form_data.append('emtiaz-taamolp2',document.getElementById("emtiaz-taamolp2").value);
            form_data.append('emtiaz-taamolp3',document.getElementById("emtiaz-taamolp3").value);
            form_data.append('emtiaz-taamolp4',document.getElementById("emtiaz-taamolp4").value);
            form_data.append('emtiaz-taamolp5',document.getElementById("emtiaz-taamolp5").value);
            form_data.append('emtiaz-taamols1',document.getElementById("emtiaz-taamols1").value);
            form_data.append('emtiaz-taamols2',document.getElementById("emtiaz-taamols2").value);

            form_data.append('nazar-sanji1',document.getElementById("nazar-sanji1").value);
            form_data.append('nazar-sanji2',document.getElementById("nazar-sanji2").value);
            form_data.append('nazar-sanji3',document.getElementById("nazar-sanji3").value);
            form_data.append('nazar-sanji4',document.getElementById("nazar-sanji4").value);
            form_data.append('nazar-sanji5',document.getElementById("nazar-sanji5").value);
            form_data.append('nazar-sanji6',document.getElementById("nazar-sanji6").value);
            form_data.append('nazar-sanji7',document.getElementById("nazar-sanji7").value);
            form_data.append('nazar-sanji8',document.getElementById("nazar-sanji8").value);
            form_data.append('nazar-sanji9',document.getElementById("nazar-sanji9").value);
            form_data.append('nazar-sanji10',document.getElementById("nazar-sanji10").value);
            form_data.append('nazar-sanji11',document.getElementById("nazar-sanji11").value);
            form_data.append('nazar-sanji12',document.getElementById("nazar-sanji12").value);
            form_data.append('nazar-sanji13',document.getElementById("nazar-sanji13").value);
            form_data.append('nazar-sanji14',document.getElementById("nazar-sanji14").value);
            
            
            /*******************/
            form_data.append('emtiazm-mali1-1',$('#emtiazm-mali1-1').val());
            form_data.append('emtiazm-mali1-2',$('#emtiazm-mali1-2').val());
            form_data.append('emtiazm-mali1-3',$('#emtiazm-mali1-3').val());
            form_data.append('emtiazm-mali1-4',$('#emtiazm-mali1-4').val());
            form_data.append('emtiazm-mali2-1',$('#emtiazm-mali2-1').val());
            form_data.append('emtiazm-mali2-2',$('#emtiazm-mali2-2').val());
            form_data.append('emtiazm-mali2-3',$('#emtiazm-mali2-3').val());
            form_data.append('emtiazm-mali2-4',$('#emtiazm-mali2-4').val());
            form_data.append('emtiazm-mali3-1',$('#emtiazm-mali3-1').val());
            form_data.append('emtiazm-mali3-2',$('#emtiazm-mali3-2').val());
            form_data.append('emtiazm-mali3-3',$('#emtiazm-mali3-3').val());
            form_data.append('emtiazm-mali3-4',$('#emtiazm-mali3-4').val());
            form_data.append('emtiazm-mali4-1',$('#emtiazm-mali4-1').val());
            form_data.append('emtiazm-mali4-2',$('#emtiazm-mali4-2').val());
            form_data.append('emtiazm-mali4-3',$('#emtiazm-mali4-3').val());
            form_data.append('emtiazm-mali4-4',$('#emtiazm-mali4-4').val());
            form_data.append('emtiazm-niroo1',$('#emtiazm-niroo1').val());
            form_data.append('emtiazm-niroo2',$('#emtiazm-niroo2').val());
            form_data.append('emtiazm-niroo3',$('#emtiazm-niroo3').val());
            form_data.append('emtiazm-niroo4',$('#emtiazm-niroo4').val());
            form_data.append('emtiazm-niroo5',$('#emtiazm-niroo5').val());
            form_data.append('emtiazm-niroo6',$('#emtiazm-niroo6').val());
            form_data.append('emtiazm-niroo7',$('#emtiazm-niroo7').val());
            form_data.append('emtiazm-niroo8',$('#emtiazm-niroo8').val());
            form_data.append('emtiazm-niroo9',$('#emtiazm-niroo9').val());
            form_data.append('emtiazm-niroo10',$('#emtiazm-niroo10').val());
            form_data.append('emtiazm-bazar1-1',$('#emtiazm-bazar1-1').val());
            form_data.append('emtiazm-bazar1-2',$('#emtiazm-bazar1-2').val());
            form_data.append('emtiazm-bazar1-3',$('#emtiazm-bazar1-3').val());
            form_data.append('emtiazm-bazar1-4',$('#emtiazm-bazar1-4').val());
            form_data.append('emtiaz-bazar2',$('#emtiaz-bazar2').val());
            form_data.append('emtiazm-bazar2',$('#emtiazm-bazar2').val());
            form_data.append('emtiazm-bazar3-1',$('#emtiazm-bazar3-1').val());
            form_data.append('emtiazm-bazar3-2',$('#emtiazm-bazar3-2').val());
            form_data.append('emtiazm-bazar3-3',$('#emtiazm-bazar3-3').val());
            form_data.append('emtiazm-bazar3-4',$('#emtiazm-bazar3-4').val());
            form_data.append('emtiazm-bazar4-1',$('#emtiazm-bazar4-1').val());
            form_data.append('emtiazm-bazar4-2',$('#emtiazm-bazar4-2').val());
            form_data.append('emtiazm-bazar4-3',$('#emtiazm-bazar4-3').val());
            form_data.append('emtiazm-bazar4-4',$('#emtiazm-bazar4-4').val());
            form_data.append('emtiazm-amoozeshi1-1',$('#emtiazm-amoozeshi1-1').val());
            form_data.append('emtiazm-amoozeshi1-2',$('#emtiazm-amoozeshi1-2').val());
            form_data.append('emtiazm-amoozeshi1-3',$('#emtiazm-amoozeshi1-3').val());
            form_data.append('emtiazm-amoozeshi1-4',$('#emtiazm-amoozeshi1-4').val());
            form_data.append('emtiazm-amoozeshi2-1',$('#emtiazm-amoozeshi2-1').val());
            form_data.append('emtiazm-amoozeshi2-2',$('#emtiazm-amoozeshi2-2').val());
            form_data.append('emtiazm-amoozeshi2-3',$('#emtiazm-amoozeshi2-3').val());
            form_data.append('emtiazm-amoozeshi2-4',$('#emtiazm-amoozeshi2-4').val());
            form_data.append('emtiazm-taamolp1',$('#emtiazm-taamolp1').val());
            form_data.append('emtiazm-taamolp2',$('#emtiazm-taamolp2').val());
            form_data.append('emtiazm-taamolp3',$('#emtiazm-taamolp3').val());
            form_data.append('emtiazm-taamolp4',$('#emtiazm-taamolp4').val());
            form_data.append('emtiazm-taamolp5',$('#emtiazm-taamolp5').val());
            form_data.append('emtiazm-taamols1',$('#emtiazm-taamols1').val());
            form_data.append('emtiazm-taamols2',$('#emtiazm-taamols2').val());
            /*******************/
            form_data.append('send',param);

            form_data.append('report',document.getElementById("report").value);


            form_data.append('save', save);
            form_data.append('what', "corp-report");
            $("#snackbar").css("background-color","blue");
            $("#snackbar").html("در حال ذخیره سازی اطلاعات");
            ShowFloatingMessage();

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
                    $("#snackbar").css("background-color","darkgreen");
                    $("#snackbar").css("border","4px solid green");
                    $("#snackbar").html("ذخیره سازی با موفقیت انجام شد");
                    ShowFloatingMessage();
                    //if ( getCookie("user_type")!="corp" )
                    //{
                        hide_window('FormEmtiaz');
                    //}
                }
             });
        }
        
        
        function Send_Report()
        {
            Save_Report();
            var save=true;
            var form_data = new FormData();
            form_data.append('user-code',document.getElementById("UserCode").value);
            form_data.append('center-code',document.getElementById("CenterCode").value);
            form_data.append('year',document.getElementById("years").value);
            form_data.append('NewEdit',document.getElementById("NewEdit").value);

            form_data.append('save', save);
            form_data.append('what', "send-report");
            $("#snackbar").css("background-color","blue");
            $("#snackbar").html("در حال ارسال اطلاعات");
            ShowFloatingMessage();
            $.ajax({
                url: 'includes/save.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    //alert("111111111111111111111111111");
                    $("#snackbar").css("background-color","darkgreen");
                    $("#snackbar").css("border","4px solid green");
                    $("#snackbar").html("اطلاغات با موفقیت ارسال شد");
                    ShowFloatingMessage();
                    hide_window('FormEmtiaz');
                }
             });
        }

        
        
        function SetInfo()
        {
            var search=true;
            var form_data = new FormData();
            form_data.append('code',document.getElementById("UserCode").value);
            form_data.append('year',document.getElementById("years").value);

            form_data.append('what', "refresh-emtiaz");
            form_data.append('search', "search");
            $.ajax({
                url: 'includes/search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    if ( response!=0 )
                    {
                        var obj = JSON.parse(response);
                        
                        $(".mali1-1,.mali1-2,.mali1-3,.mali1-4,.mali2-1,.mali2-2,.mali2-3,.mali2-4,.mali3-1,.mali3-2,.mali3-3,.mali3-4,.mali4-1,.mali4-2,.mali4-3,.mali4-4").css("display","none");
                        $(".niroo1,.niroo2,.niroo3,.niroo4,.niroo5,.niroo6,.niroo7,.niroo8,.niroo9,.niroo10,.bazar1-1,.bazar1-2,.bazar1-3,.bazar1-4").css("display","none");
                        $(".bazar3-1,.bazar3-2,.bazar3-3,.bazar3-4,.bazar4-1,.bazar4-2,.bazar4-3,.bazar4-4,.amoozeshi1-1,.amoozeshi1-2,.amoozeshi1-3,.amoozeshi1-4").css("display","none");
                        $(".amoozeshi2-1,.amoozeshi2-2,.amoozeshi2-3,.amoozeshi2-4").css("display","none");
                        $(".upload-note-mali1,.upload-note-mali2,.upload-note-mali3,.upload-note-mali4,.upload-note-bazar1,.upload-note-bazar3").css("display","none");
                        $(".upload-note-bazar4,.upload-note-amoozeshi1,.upload-note-amoozeshi2").css("display","none");
                        
                        Set_Empty();
                        
                        if ( obj[0].send=="1" )
                        {
                            $("#save").css("display","none");
                            $("#send").css("display","none");
                            $("#report-status").html("شما این گزارش را قبلا ارسال کرده اید و ویرایش آن ممکن نیست");
                            $("#close-form").text("بازگشت");
                            $("#report-status").css("display","block");
                            $("#report-open").css("display","block");
                            Set_disable(true);
                            Set_fields();
                        }
                        /**********************************************/
                        if ( obj[0].onvan_mali1_1!="" || obj[0].note_mali1!="" || obj[0].files_mali1!="" ) { $(".mali1-1").css("display","table-row"); $(".upload-note-mali1").css("display","block"); }
                        if ( obj[0].onvan_mali1_2!="" ) { $(".mali1-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali1_3!="" ) { $(".mali1-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali1_4!="" ) { $(".mali1-4").css("display","table-row"); }
                        $('#onvan-mali1-1').val(obj[0].onvan_mali1_1);
                        $('#mahal-mali1-1').val(obj[0].mahal_mali1_1);
                        $('#karfarma-mali1-1').val(obj[0].karfarma_mali1_1);
                        $('#mablagh-mali1-1').val(obj[0].mablagh_mali1_1);
                        $('#emtiaz-mali1-1').val(obj[0].emtiaz_mali1_1);
                        $('#onvan-mali1-2').val(obj[0].onvan_mali1_2);
                        $('#mahal-mali1-2').val(obj[0].mahal_mali1_2);
                        $('#karfarma-mali1-2').val(obj[0].karfarma_mali1_2);
                        $('#mablagh-mali1-2').val(obj[0].mablagh_mali1_2);
                        $('#emtiaz-mali1-2').val(obj[0].emtiaz_mali1_2);
                        $('#onvan-mali1-3').val(obj[0].onvan_mali1_3);
                        $('#mahal-mali1-3').val(obj[0].mahal_mali1_3);
                        $('#karfarma-mali1-3').val(obj[0].karfarma_mali1_3);
                        $('#mablagh-mali1-3').val(obj[0].mablagh_mali1_3);
                        $('#emtiaz-mali1-3').val(obj[0].emtiaz_mali1_3);
                        $('#onvan-mali1-4').val(obj[0].onvan_mali1_4);
                        $('#mahal-mali1-4').val(obj[0].mahal_mali1_4);
                        $('#karfarma-mali1-4').val(obj[0].karfarma_mali1_4);
                        $('#mablagh-mali1-4').val(obj[0].mablagh_mali1_4);
                        $('#emtiaz-mali1-4').val(obj[0].emtiaz_mali1_4);
                        $('#note-mali1').val(obj[0].note_mali1);
                        if ( obj[0].files_mali1.length>0 )
                        {
                            FilesList=obj[0].files_mali1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files1[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-mali1").get(0).files.length; i++) 
                        {
                            $('#fileMali1[]', $('#files-mali1').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_mali2_1!="" || obj[0].note_mali2!="" || obj[0].files_mali2!="" ) { $(".mali2-1").css("display","table-row"); $(".upload-note-mali2").css("display","block"); }
                        if ( obj[0].onvan_mali2_2!="" ) { $(".mali2-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali2_3!="" ) { $(".mali2-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali2_4!="" ) { $(".mali2-4").css("display","table-row"); }
                        $('#onvan-mali2-1').val(obj[0].onvan_mali2_1);
                        $('#mahal-mali2-1').val(obj[0].mahal_mali2_1);
                        $('#karfarma-mali2-1').val(obj[0].karfarma_mali2_1);
                        $('#mablagh-mali2-1').val(obj[0].mablagh_mali2_1);
                        $('#emtiaz-mali2-1').val(obj[0].emtiaz_mali2_1);
                        $('#darsad-mali2-1').val(obj[0].darsad_mali2_1);
                        $('#onvan-mali2-2').val(obj[0].onvan_mali2_2);
                        $('#mahal-mali2-2').val(obj[0].mahal_mali2_2);
                        $('#karfarma-mali2-2').val(obj[0].karfarma_mali2_2);
                        $('#mablagh-mali2-2').val(obj[0].mablagh_mali2_2);
                        $('#emtiaz-mali2-2').val(obj[0].emtiaz_mali2_2);
                        $('#darsad-mali2-2').val(obj[0].darsad_mali2_2);
                        $('#onvan-mali2-3').val(obj[0].onvan_mali2_3);
                        $('#mahal-mali2-3').val(obj[0].mahal_mali2_3);
                        $('#karfarma-mali2-3').val(obj[0].karfarma_mali2_3);
                        $('#mablagh-mali2-3').val(obj[0].mablagh_mali2_3);
                        $('#emtiaz-mali2-3').val(obj[0].emtiaz_mali2_3);
                        $('#darsad-mali2-3').val(obj[0].darsad_mali2_3);
                        $('#onvan-mali2-4').val(obj[0].onvan_mali2_4);
                        $('#mahal-mali2-4').val(obj[0].mahal_mali2_4);
                        $('#karfarma-mali2-4').val(obj[0].karfarma_mali2_4);
                        $('#mablagh-mali2-4').val(obj[0].mablagh_mali2_4);
                        $('#emtiaz-mali2-4').val(obj[0].emtiaz_mali2_4);
                        $('#darsad-mali2-4').val(obj[0].darsad_mali2_4);
                        $('#note-mali2').val(obj[0].note_mali2);
                        if ( obj[0].files_mali2.length>0 )
                        {
                            FilesList=obj[0].files_mali2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files2[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-mali2").get(0).files.length; i++) 
                        {
                            $('#fileMali2[]', $('#files-mali2').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_mali3_1!="" || obj[0].note_mali3!="" || obj[0].files_mali3!="" ) { $(".mali3-1").css("display","table-row"); $(".upload-note-mali3").css("display","block"); }
                        if ( obj[0].onvan_mali3_2!="" ) { $(".mali3-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali3_3!="" ) { $(".mali3-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali3_4!="" ) { $(".mali3-4").css("display","table-row"); }
                        $('#onvan-mali3-1').val(obj[0].onvan_mali3_1);
                        $('#mahal-mali3-1').val(obj[0].mahal_mali3_1);
                        $('#karfarma-mali3-1').val(obj[0].karfarma_mali3_1);
                        $('#mablagh-mali3-1').val(obj[0].mablagh_mali3_1);
                        $('#emtiaz-mali3-1').val(obj[0].emtiaz_mali3_1);
                        $('#darsad-mali3-1').val(obj[0].darsad_mali3_1);
                        $('#onvan-mali3-2').val(obj[0].onvan_mali3_2);
                        $('#mahal-mali3-2').val(obj[0].mahal_mali3_2);
                        $('#karfarma-mali3-2').val(obj[0].karfarma_mali3_2);
                        $('#mablagh-mali3-2').val(obj[0].mablagh_mali3_2);
                        $('#emtiaz-mali3-2').val(obj[0].emtiaz_mali3_2);
                        $('#darsad-mali3-2').val(obj[0].darsad_mali3_2);
                        $('#onvan-mali3-3').val(obj[0].onvan_mali3_3);
                        $('#mahal-mali3-3').val(obj[0].mahal_mali3_3);
                        $('#karfarma-mali3-3').val(obj[0].karfarma_mali3_3);
                        $('#mablagh-mali3-3').val(obj[0].mablagh_mali3_3);
                        $('#emtiaz-mali3-3').val(obj[0].emtiaz_mali3_3);
                        $('#darsad-mali3-3').val(obj[0].darsad_mali3_3);
                        $('#onvan-mali3-4').val(obj[0].onvan_mali3_4);
                        $('#mahal-mali3-4').val(obj[0].mahal_mali3_4);
                        $('#karfarma-mali3-4').val(obj[0].karfarma_mali3_4);
                        $('#mablagh-mali3-4').val(obj[0].mablagh_mali3_4);
                        $('#emtiaz-mali3-4').val(obj[0].emtiaz_mali3_4);
                        $('#darsad-mali3-4').val(obj[0].darsad_mali3_4);
                        $('#note-mali3').val(obj[0].note_mali3);
                        if ( obj[0].files_mali3.length>0 )
                        {
                            FilesList=obj[0].files_mali3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files3[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-mali3").get(0).files.length; i++) 
                        {
                            $('#fileMali3[]', $('#files-mali3').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_mali4_1!="" || obj[0].note_mali4!="" || obj[0].files_mali4!="" ) { $(".mali4-1").css("display","table-row"); $(".upload-note-mali4").css("display","block"); }
                        if ( obj[0].onvan_mali4_2!="" ) { $(".mali4-2").css("display","table-row"); }
                        if ( obj[0].onvan_mali4_3!="" ) { $(".mali4-3").css("display","table-row"); }
                        if ( obj[0].onvan_mali4_4!="" ) { $(".mali4-4").css("display","table-row"); }
                        $('#onvan-mali4-1').val(obj[0].onvan_mali4_1);
                        $('#mablagh-mali4-1').val(obj[0].mablagh_mali4_1);
                        $('#emtiaz-mali4-1').val(obj[0].emtiaz_mali4_1);
                        $('#onvan-mali4-2').val(obj[0].onvan_mali4_2);
                        $('#mablagh-mali4-2').val(obj[0].mablagh_mali4_2);
                        $('#emtiaz-mali4-2').val(obj[0].emtiaz_mali4_2);
                        $('#onvan-mali4-3').val(obj[0].onvan_mali4_3);
                        $('#mablagh-mali4-3').val(obj[0].mablagh_mali4_3);
                        $('#emtiaz-mali4-3').val(obj[0].emtiaz_mali4_3);
                        $('#onvan-mali4-4').val(obj[0].onvan_mali4_4);
                        $('#mablagh-mali4-4').val(obj[0].mablagh_mali4_4);
                        $('#emtiaz-mali4-4').val(obj[0].emtiaz_mali4_4);
                        $('#note-mali4').val(obj[0].note_mali4);
                        if ( obj[0].files_mali4.length>0 )
                        {
                            FilesList=obj[0].files_mali4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files4[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-mali4").get(0).files.length; i++) 
                        {
                            $('#fileMali4[]', $('#files-mali4').prop('files')[i]);
                        }*/
                        $('#onvan-dast1').val(obj[0].onvan_dast1);
                        $('#marja-dast1').val(obj[0].marja_dast1);
                        $('#date-dast1').val(obj[0].date_dast1);
                        $('#emtiaz-dast1').val(obj[0].emtiaz_dast1);
                        $('#onvan-dast2').val(obj[0].onvan_dast2);
                        $('#marja-dast2').val(obj[0].marja_dast2);
                        $('#date-dast2').val(obj[0].date_dast2);
                        $('#emtiaz-dast2').val(obj[0].emtiaz_dast2);
                        $('#onvan-dast3').val(obj[0].onvan_dast3);
                        $('#marja-dast3').val(obj[0].marja_dast3);
                        $('#date-dast3').val(obj[0].date_dast3);
                        $('#emtiaz-dast3').val(obj[0].emtiaz_dast3);
                        $('#onvan-dast4').val(obj[0].onvan_dast4);
                        $('#marja-dast4').val(obj[0].marja_dast4);
                        $('#date-dast4').val(obj[0].date_dast4);
                        $('#emtiaz-dast4').val(obj[0].emtiaz_dast4);
                        $('#onvan-dast5').val(obj[0].onvan_dast5);
                        $('#marja-dast5').val(obj[0].marja_dast5);
                        $('#date-dast5').val(obj[0].date_dast5);
                        $('#emtiaz-dast5').val(obj[0].emtiaz_dast5);
                        $('#onvan-dast6').val(obj[0].onvan_dast6);
                        $('#marja-dast6').val(obj[0].marja_dast6);
                        $('#date-dast6').val(obj[0].date_dast6);
                        $('#emtiaz-dast6').val(obj[0].emtiaz_dast6);
                        $('#note-dast').val(obj[0].note_dast);
                        if ( obj[0].files_dast.length>0 )
                        {
                            FilesList=obj[0].files_dast.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files5[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }

                        if ( obj[0].onvan_niroo1!="" ) { $(".niroo1").css("display","table-row"); }
                        if ( obj[0].onvan_niroo2!="" ) { $(".niroo2").css("display","table-row"); }
                        if ( obj[0].onvan_niroo3!="" ) { $(".niroo3").css("display","table-row"); }
                        if ( obj[0].onvan_niroo4!="" ) { $(".niroo4").css("display","table-row"); }
                        if ( obj[0].onvan_niroo5!="" ) { $(".niroo5").css("display","table-row"); }
                        if ( obj[0].onvan_niroo6!="" ) { $(".niroo6").css("display","table-row"); }
                        if ( obj[0].onvan_niroo7!="" ) { $(".niroo7").css("display","table-row"); }
                        if ( obj[0].onvan_niroo8!="" ) { $(".niroo8").css("display","table-row"); }
                        if ( obj[0].onvan_niroo9!="" ) { $(".niroo9").css("display","table-row"); }
                        if ( obj[0].onvan_niroo10!="" ) { $(".niroo10").css("display","table-row"); }
                        $('#onvan-niroo1').val(obj[0].onvan_niroo1);
                        $('#tahsil-niroo1').val(obj[0].tahsil_niroo1);
                        $('#hamkari-niroo1').val(obj[0].hamkari_niroo1);
                        $('#sabeghe-niroo1').val(obj[0].sabeghe_niroo1);
                        $('#bime-niroo1').val(obj[0].bime_niroo1);
                        $('#emtiaz-niroo1').val(obj[0].emtiaz_niroo1);
                        $('#onvan-niroo2').val(obj[0].onvan_niroo2);
                        $('#tahsil-niroo2').val(obj[0].tahsil_niroo2);
                        $('#hamkari-niroo2').val(obj[0].hamkari_niroo2);
                        $('#sabeghe-niroo2').val(obj[0].sabeghe_niroo2);
                        $('#bime-niroo2').val(obj[0].bime_niroo2);
                        $('#emtiaz-niroo2').val(obj[0].emtiaz_niroo2);
                        $('#onvan-niroo3').val(obj[0].onvan_niroo3);
                        $('#tahsil-niroo3').val(obj[0].tahsil_niroo3);
                        $('#hamkari-niroo3').val(obj[0].hamkari_niroo3);
                        $('#sabeghe-niroo3').val(obj[0].sabeghe_niroo3);
                        $('#bime-niroo3').val(obj[0].bime_niroo3);
                        $('#emtiaz-niroo3').val(obj[0].emtiaz_niroo3);
                        $('#onvan-niroo4').val(obj[0].onvan_niroo4);
                        $('#tahsil-niroo4').val(obj[0].tahsil_niroo4);
                        $('#hamkari-niroo4').val(obj[0].hamkari_niroo4);
                        $('#sabeghe-niroo4').val(obj[0].sabeghe_niroo4);
                        $('#bime-niroo4').val(obj[0].bime_niroo4);
                        $('#emtiaz-niroo4').val(obj[0].emtiaz_niroo4);
                        $('#onvan-niroo5').val(obj[0].onvan_niroo5);
                        $('#tahsil-niroo5').val(obj[0].tahsil_niroo5);
                        $('#hamkari-niroo5').val(obj[0].hamkari_niroo5);
                        $('#sabeghe-niroo5').val(obj[0].sabeghe_niroo5);
                        $('#bime-niroo5').val(obj[0].bime_niroo5);
                        $('#emtiaz-niroo5').val(obj[0].emtiaz_niroo5);
                        $('#onvan-niroo6').val(obj[0].onvan_niroo6);
                        $('#tahsil-niroo6').val(obj[0].tahsil_niroo6);
                        $('#hamkari-niroo6').val(obj[0].hamkari_niroo6);
                        $('#sabeghe-niroo6').val(obj[0].sabeghe_niroo6);
                        $('#bime-niroo6').val(obj[0].bime_niroo6);
                        $('#emtiaz-niroo6').val(obj[0].emtiaz_niroo6);
                        $('#onvan-niroo7').val(obj[0].onvan_niroo7);
                        $('#tahsil-niroo7').val(obj[0].tahsil_niroo7);
                        $('#hamkari-niroo7').val(obj[0].hamkari_niroo7);
                        $('#sabeghe-niroo7').val(obj[0].sabeghe_niroo7);
                        $('#bime-niroo7').val(obj[0].bime_niroo7);
                        $('#emtiaz-niroo7').val(obj[0].emtiaz_niroo7);
                        $('#onvan-niroo8').val(obj[0].onvan_niroo8);
                        $('#tahsil-niroo8').val(obj[0].tahsil_niroo8);
                        $('#hamkari-niroo8').val(obj[0].hamkari_niroo8);
                        $('#sabeghe-niroo8').val(obj[0].sabeghe_niroo8);
                        $('#bime-niroo8').val(obj[0].bime_niroo8);
                        $('#emtiaz-niroo8').val(obj[0].emtiaz_niroo8);
                        $('#onvan-niroo9').val(obj[0].onvan_niroo9);
                        $('#tahsil-niroo9').val(obj[0].tahsil_niroo9);
                        $('#hamkari-niroo9').val(obj[0].hamkari_niroo9);
                        $('#sabeghe-niroo9').val(obj[0].sabeghe_niroo9);
                        $('#bime-niroo9').val(obj[0].bime_niroo9);
                        $('#emtiaz-niroo9').val(obj[0].emtiaz_niroo9);
                        $('#onvan-niroo10').val(obj[0].onvan_niroo10);
                        $('#tahsil-niroo10').val(obj[0].tahsil_niroo10);
                        $('#hamkari-niroo10').val(obj[0].hamkari_niroo10);
                        $('#sabeghe-niroo10').val(obj[0].sabeghe_niroo10);
                        $('#bime-niroo10').val(obj[0].bime_niroo10);
                        $('#emtiaz-niroo10').val(obj[0].emtiaz_niroo10);
                        if ( obj[0].onvan_bazar1_1!="" || obj[0].note_bazar1!="" || obj[0].files_bazar1!="" ) { $(".bazar1-1").css("display","table-row");  $(".upload-note-bazar1").css("display","block"); }
                        if ( obj[0].onvan_bazar1_2!="" ) { $(".bazar1-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar1_3!="" ) { $(".bazar1-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar1_4!="" ) { $(".bazar1-4").css("display","table-row"); }
                        $('#onvan-bazar1-1').val(obj[0].onvan_bazar1_1);
                        $('#mahal-bazar1-1').val(obj[0].mahal_bazar1_1);
                        $('#date-bazar1-1').val(obj[0].date_bazar1_1);
                        $('#type-bazar1-1').val(obj[0].type_bazar1_1);
                        $('#emtiaz-bazar1-1').val(obj[0].emtiaz_bazar1_1);
                        $('#onvan-bazar1-2').val(obj[0].onvan_bazar1_2);
                        $('#mahal-bazar1-2').val(obj[0].mahal_bazar1_2);
                        $('#date-bazar1-2').val(obj[0].date_bazar1_2);
                        $('#type-bazar1-2').val(obj[0].type_bazar1_2);
                        $('#emtiaz-bazar1-2').val(obj[0].emtiaz_bazar1_2);
                        $('#onvan-bazar1-3').val(obj[0].onvan_bazar1_3);
                        $('#mahal-bazar1-3').val(obj[0].mahal_bazar1_3);
                        $('#date-bazar1-3').val(obj[0].date_bazar1_3);
                        $('#type-bazar1-3').val(obj[0].type_bazar1_3);
                        $('#emtiaz-bazar1-3').val(obj[0].emtiaz_bazar1_3);
                        $('#onvan-bazar1-4').val(obj[0].onvan_bazar1_4);
                        $('#mahal-bazar1-4').val(obj[0].mahal_bazar1_4);
                        $('#date-bazar1-4').val(obj[0].date_bazar1_4);
                        $('#type-bazar1-4').val(obj[0].type_bazar1_4);
                        $('#emtiaz-bazar1-4').val(obj[0].emtiaz_bazar1_4);
                        $('#note-bazar1').val(obj[0].note_bazar1);
                        if ( obj[0].files_bazar1.length>0 )
                        {
                            FilesList=obj[0].files_bazar1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files6[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-bazar1").get(0).files.length; i++) 
                        {
                            $('#fileBazar1[]', $('#files-bazar1').prop('files')[i]);
                        }*/
                        $('#onvan-bazar2').val(obj[0].onvan_bazar2);
                        if ( obj[0].files_bazar2.length>0 )
                        {
                            FilesList=obj[0].files_bazar2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files7[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-bazar2").get(0).files.length; i++) 
                        {
                            $('#fileBazar2[]', $('#files-bazar2').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_bazar3_1!="" || obj[0].note_bazar3!="" || obj[0].files_bazar3!="" ) { $(".bazar3-1").css("display","table-row");  $(".upload-note-bazar3").css("display","block"); }
                        if ( obj[0].onvan_bazar3_2!="" ) { $(".bazar3-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar3_3!="" ) { $(".bazar3-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar3_4!="" ) { $(".bazar3-4").css("display","table-row"); }
                        $('#onvan-bazar3-1').val(obj[0].onvan_bazar3_1);
                        $('#date-bazar3-1').val(obj[0].date_bazar3_1);
                        $('#bargozar-bazar3-1').val(obj[0].bargozar_bazar3_1);
                        $('#mahal-bazar3-1').val(obj[0].mahal_bazar3_1);
                        $('#emtiaz-bazar3-1').val(obj[0].emtiaz_bazar3_1);
                        $('#onvan-bazar3-2').val(obj[0].onvan_bazar3_2);
                        $('#date-bazar3-2').val(obj[0].date_bazar3_2);
                        $('#bargozar-bazar3-2').val(obj[0].bargozar_bazar3_2);
                        $('#mahal-bazar3-2').val(obj[0].mahal_bazar3_2);
                        $('#emtiaz-bazar3-2').val(obj[0].emtiaz_bazar3_2);
                        $('#onvan-bazar3-3').val(obj[0].onvan_bazar3_3);
                        $('#date-bazar3-3').val(obj[0].date_bazar3_3);
                        $('#bargozar-bazar3-3').val(obj[0].bargozar_bazar3_3);
                        $('#mahal-bazar3-3').val(obj[0].mahal_bazar3_3);
                        $('#emtiaz-bazar3-3').val(obj[0].emtiaz_bazar3_3);
                        $('#onvan-bazar3-4').val(obj[0].onvan_bazar3_4);
                        $('#date-bazar3-4').val(obj[0].date_bazar3_4);
                        $('#bargozar-bazar3-4').val(obj[0].bargozar_bazar3_4);
                        $('#mahal-bazar3-4').val(obj[0].mahal_bazar3_4);
                        $('#emtiaz-bazar3-4').val(obj[0].emtiaz_bazar3_4);
                        $('#note-bazar3').val(obj[0].note_bazar3);
                        if ( obj[0].files_bazar3.length>0 )
                        {
                            FilesList=obj[0].files_bazar3.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files8[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-bazar3").get(0).files.length; i++) 
                        {
                            $('#fileBazar3[]', $('#files-bazar3').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_bazar4_1!="" || obj[0].note_bazar4!="" || obj[0].files_bazar4!="" ) { $(".bazar4-1").css("display","table-row"); $(".upload-note-bazar4").css("display","block"); }
                        if ( obj[0].onvan_bazar4_2!="" ) { $(".bazar4-2").css("display","table-row"); }
                        if ( obj[0].onvan_bazar4_3!="" ) { $(".bazar4-3").css("display","table-row"); }
                        if ( obj[0].onvan_bazar4_4!="" ) { $(".bazar4-4").css("display","table-row"); }
                        $('#onvan-bazar4-1').val(obj[0].onvan_bazar4_1);
                        $('#date-bazar4-1').val(obj[0].date_bazar4_1);
                        $('#mahal-bazar4-1').val(obj[0].mahal_bazar4_1);
                        $('#naghsh-bazar4-1').val(obj[0].naghsh_bazar4_1);
                        $('#emtiaz-bazar4-1').val(obj[0].emtiaz_bazar4_1);
                        $('#onvan-bazar4-2').val(obj[0].onvan_bazar4_2);
                        $('#date-bazar4-2').val(obj[0].date_bazar4_2);
                        $('#mahal-bazar4-2').val(obj[0].mahal_bazar4_2);
                        $('#naghsh-bazar4-2').val(obj[0].naghsh_bazar4_2);
                        $('#emtiaz-bazar4-2').val(obj[0].emtiaz_bazar4_2);
                        $('#onvan-bazar4-3').val(obj[0].onvan_bazar4_3);
                        $('#date-bazar4-3').val(obj[0].date_bazar4_3);
                        $('#mahal-bazar4-3').val(obj[0].mahal_bazar4_3);
                        $('#naghsh-bazar4-3').val(obj[0].naghsh_bazar4_3);
                        $('#emtiaz-bazar4-3').val(obj[0].emtiaz_bazar4_3);
                        $('#onvan-bazar4-4').val(obj[0].onvan_bazar4_4);
                        $('#date-bazar4-4').val(obj[0].date_bazar4_4);
                        $('#mahal-bazar4-4').val(obj[0].mahal_bazar4_4);
                        $('#naghsh-bazar4-4').val(obj[0].naghsh_bazar4_4);
                        $('#emtiaz-bazar4-4').val(obj[0].emtiaz_bazar4_4);
                        $('#note-bazar4').val(obj[0].note_bazar4);
                        if ( obj[0].files_bazar4.length>0 )
                        {
                            FilesList=obj[0].files_bazar4.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files9[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-bazar4").get(0).files.length; i++) 
                        {
                            $('#fileBazar4[]', $('#files-bazar4').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_amoozeshi1_1!="" || obj[0].note_amoozeshi1!="" || obj[0].files_amoozeshi1!="" ) { $(".amoozeshi1-1").css("display","table-row"); $(".upload-note-amoozeshi1").css("display","block"); }
                        if ( obj[0].onvan_amoozeshi1_2!="" ) { $(".amoozeshi1-2").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi1_3!="" ) { $(".amoozeshi1-3").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi1_4!="" ) { $(".amoozeshi1-4").css("display","table-row"); }
                        $('#onvan-amoozeshi1-1').val(obj[0].onvan_amoozeshi1_1);
                        $('#date-amoozeshi1-1').val(obj[0].date_amoozeshi1_1);
                        $('#bargozar-amoozeshi1-1').val(obj[0].bargozar_amoozeshi1_1);
                        $('#mahal-amoozeshi1-1').val(obj[0].mahal_amoozeshi1_1);
                        $('#emtiaz-amoozeshi1-1').val(obj[0].emtiaz_amoozeshi1_1);
                        $('#onvan-amoozeshi1-2').val(obj[0].onvan_amoozeshi1_2);
                        $('#date-amoozeshi1-2').val(obj[0].date_amoozeshi1_2);
                        $('#bargozar-amoozeshi1-2').val(obj[0].bargozar_amoozeshi1_2);
                        $('#mahal-amoozeshi1-2').val(obj[0].mahal_amoozeshi1_2);
                        $('#emtiaz-amoozeshi1-2').val(obj[0].emtiaz_amoozeshi1_2);
                        $('#onvan-amoozeshi1-3').val(obj[0].onvan_amoozeshi1_3);
                        $('#date-amoozeshi1-3').val(obj[0].date_amoozeshi1_3);
                        $('#bargozar-amoozeshi1-3').val(obj[0].bargozar_amoozeshi1_3);
                        $('#mahal-amoozeshi1-3').val(obj[0].mahal_amoozeshi1_3);
                        $('#emtiaz-amoozeshi1-3').val(obj[0].emtiaz_amoozeshi1_3);
                        $('#onvan-amoozeshi1-4').val(obj[0].onvan_amoozeshi1_4);
                        $('#date-amoozeshi1-4').val(obj[0].date_amoozeshi1_4);
                        $('#bargozar-amoozeshi1-4').val(obj[0].bargozar_amoozeshi1_4);
                        $('#mahal-amoozeshi1-4').val(obj[0].mahal_amoozeshi1_4);
                        $('#emtiaz-amoozeshi1-4').val(obj[0].emtiaz_amoozeshi1_4);
                        $('#note-amoozeshi1').val(obj[0].note_amoozeshi1);
                        if ( obj[0].files_amoozeshi1.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi1.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files10[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-amoozeshi1").get(0).files.length; i++) 
                        {
                            $('#fileAmoozeshi1[]', $('#files-amoozeshi1').prop('files')[i]);
                        }*/
                        if ( obj[0].onvan_amoozeshi2_1!="" || obj[0].note_amoozeshi2!="" || obj[0].files_amoozeshi2!="" ) { $(".amoozeshi2-1").css("display","table-row"); $(".upload-note-amoozeshi2").css("display","block"); }
                        if ( obj[0].onvan_amoozeshi2_2!="" ) { $(".amoozeshi2-2").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi2_3!="" ) { $(".amoozeshi2-3").css("display","table-row"); }
                        if ( obj[0].onvan_amoozeshi2_4!="" ) { $(".amoozeshi2-4").css("display","table-row"); }
                        $('#onvan-amoozeshi2-1').val(obj[0].onvan_amoozeshi2_1);
                        $('#date-amoozeshi2-1').val(obj[0].date_amoozeshi2_1);
                        $('#mahal-amoozeshi2-1').val(obj[0].mahal_amoozeshi2_1);
                        $('#naghsh-amoozeshi2-1').val(obj[0].naghsh_amoozeshi2_1);
                        $('#emtiaz-amoozeshi2-1').val(obj[0].emtiaz_amoozeshi2_1);
                        $('#onvan-amoozeshi2-2').val(obj[0].onvan_amoozeshi2_2);
                        $('#date-amoozeshi2-2').val(obj[0].date_amoozeshi2_2);
                        $('#mahal-amoozeshi2-2').val(obj[0].mahal_amoozeshi2_2);
                        $('#naghsh-amoozeshi2-2').val(obj[0].naghsh_amoozeshi2_2);
                        $('#emtiaz-amoozeshi2-2').val(obj[0].emtiaz_amoozeshi2_2);
                        $('#onvan-amoozeshi2-3').val(obj[0].onvan_amoozeshi2_3);
                        $('#date-amoozeshi2-3').val(obj[0].date_amoozeshi2_3);
                        $('#mahal-amoozeshi2-3').val(obj[0].mahal_amoozeshi2_3);
                        $('#naghsh-amoozeshi2-3').val(obj[0].naghsh_amoozeshi2_3);
                        $('#emtiaz-amoozeshi2-3').val(obj[0].emtiaz_amoozeshi2_3);
                        $('#onvan-amoozeshi2-4').val(obj[0].onvan_amoozeshi2_4);
                        $('#date-amoozeshi2-4').val(obj[0].date_amoozeshi2_4);
                        $('#mahal-amoozeshi2-4').val(obj[0].mahal_amoozeshi2_4);
                        $('#naghsh-amoozeshi2-4').val(obj[0].naghsh_amoozeshi2_4);
                        $('#emtiaz-amoozeshi2-4').val(obj[0].emtiaz_amoozeshi2_4);
                        $('#note-amoozeshi2').val(obj[0].note_amoozeshi2);
                        if ( obj[0].files_amoozeshi2.length>0 )
                        {
                            FilesList=obj[0].files_amoozeshi2.split(",");
                            for (var j=0;j<FilesList.length;j++)
                            {
                                files11[j]={"name":FilesList[j],"type":FilesList[j].split(".").pop(),"location":"HOST"};
                            }
                        }
                        /*for (var i = 0; i < $("#files-amoozeshi2").get(0).files.length; i++) 
                        {
                            $('#fileAmoozeshi2[]', $('#files-amoozeshi2').prop('files')[i]);
                        }*/
            
                        $('#emtiaz-taamolp1').val(obj[0].emtiaz_taamolp1);
                        $('#emtiaz-taamolp2').val(obj[0].emtiaz_taamolp2);
                        $('#emtiaz-taamolp3').val(obj[0].emtiaz_taamolp3);
                        $('#emtiaz-taamolp4').val(obj[0].emtiaz_taamolp4);
                        $('#emtiaz-taamolp5').val(obj[0].emtiaz_taamolp5);
                        $('#emtiaz-taamols1').val(obj[0].emtiaz_taamols1);
                        $('#emtiaz-taamols2').val(obj[0].emtiaz_taamols2);
            
                        $('#nazar-sanji1').val(obj[0].nazar_sanji1);
                        $('#nazar-sanji2').val(obj[0].nazar_sanji2);
                        $('#nazar-sanji3').val(obj[0].nazar_sanji3);
                        $('#nazar-sanji4').val(obj[0].nazar_sanji4);
                        $('#nazar-sanji5').val(obj[0].nazar_sanji5);
                        $('#nazar-sanji6').val(obj[0].nazar_sanji6);
                        $('#nazar-sanji7').val(obj[0].nazar_sanji7);
                        $('#nazar-sanji8').val(obj[0].nazar_sanji8);
                        $('#nazar-sanji9').val(obj[0].nazar_sanji9);
                        $('#nazar-sanji10').val(obj[0].nazar_sanji10);
                        $('#nazar-sanji11').val(obj[0].nazar_sanji11);
                        $('#nazar-sanji12').val(obj[0].nazar_sanji12);
                        $('#nazar-sanji13').val(obj[0].nazar_sanji13);
                        $('#nazar-sanji14').val(obj[0].nazar_sanji14);
                        $('#report').val(obj[0].report);
                    }
                    else
                    {
                        Set_disable(false);
                        Set_Empty();
                        $("#report-status").css("display","none");
                        $("#report-open").css("display","none");
                        $(".mali1-1,.mali1-2,.mali1-3,.mali1-4,.mali2-1,.mali2-2,.mali2-3,.mali2-4,.mali3-1,.mali3-2,.mali3-3,.mali3-4,.mali4-1,.mali4-2,.mali4-3,.mali4-4").css("display","none");
                        $(".niroo1,.niroo2,.niroo3,.niroo4,.niroo5,.niroo6,.niroo7,.niroo8,.niroo9,.niroo10,.bazar1-1,.bazar1-2,.bazar1-3,.bazar1-4").css("display","none");
                        $(".bazar3-1,.bazar3-2,.bazar3-3,.bazar3-4,.bazar4-1,.bazar4-2,.bazar4-3,.bazar4-4,.amoozeshi1-1,.amoozeshi1-2,.amoozeshi1-3,.amoozeshi1-4").css("display","none");
                        $(".amoozeshi2-1,.amoozeshi2-2,.amoozeshi2-3,.amoozeshi2-4").css("display","none");
                        $(".upload-note-mali1,.upload-note-mali2,.upload-note-mali3,.upload-note-mali4,.upload-note-bazar1,.upload-note-bazar3").css("display","none");
                        $(".upload-note-bazar4,.upload-note-amoozeshi1,.upload-note-amoozeshi2").css("display","none");
                        $("#save").css("display","inline");
                        $("#send").css("display","inline");
                        $("#close-form").text("انصراف");
                    }
                }
             });
        }
        
        function Set_Empty()
        {
            files1=[];
            files2=[];
            files3=[];
            files4=[];
            files5=[];
            files6=[];
            files7=[];
            files8=[];
            files9=[];
            files10=[];
            files11=[];

            $('#onvan-mali1-1').val("");
            $('#mahal-mali1-1').val("");
            $('#karfarma-mali1-1').val("");
            $('#mablagh-mali1-1').val("");
            $('#emtiaz-mali1-1').val("");
            $('#onvan-mali1-2').val("");
            $('#mahal-mali1-2').val("");
            $('#karfarma-mali1-2').val("");
            $('#mablagh-mali1-2').val("");
            $('#emtiaz-mali1-2').val("");
            $('#onvan-mali1-3').val("");
            $('#mahal-mali1-3').val("");
            $('#karfarma-mali1-3').val("");
            $('#mablagh-mali1-3').val("");
            $('#emtiaz-mali1-3').val("");
            $('#onvan-mali1-4').val("");
            $('#mahal-mali1-4').val("");
            $('#karfarma-mali1-4').val("");
            $('#mablagh-mali1-4').val("");
            $('#emtiaz-mali1-4').val("");
            $('#note-mali1').val();
            $('#files-mali1').val("")
            $('#onvan-mali2-1').val("");
            $('#mahal-mali2-1').val("");
            $('#karfarma-mali2-1').val("");
            $('#mablagh-mali2-1').val("");
            $('#emtiaz-mali2-1').val("");
            $('#darsad-mali2-1').val("");
            $('#onvan-mali2-2').val("");
            $('#mahal-mali2-2').val("");
            $('#karfarma-mali2-2').val("");
            $('#mablagh-mali2-2').val("");
            $('#emtiaz-mali2-2').val("");
            $('#darsad-mali2-2').val("");
            $('#onvan-mali2-3').val("");
            $('#mahal-mali2-3').val("");
            $('#karfarma-mali2-3').val("");
            $('#mablagh-mali2-3').val("");
            $('#emtiaz-mali2-3').val("");
            $('#darsad-mali2-3').val("");
            $('#onvan-mali2-4').val("");
            $('#mahal-mali2-4').val("");
            $('#karfarma-mali2-4').val("");
            $('#mablagh-mali2-4').val("");
            $('#emtiaz-mali2-4').val("");
            $('#darsad-mali2-4').val("");
            $('#note-mali2').val("");
            $('#files-mali2').val("");
            $('#onvan-mali3-1').val("");
            $('#mahal-mali3-1').val("");
            $('#karfarma-mali3-1').val("");
            $('#mablagh-mali3-1').val("");
            $('#emtiaz-mali3-1').val("");
            $('#darsad-mali3-1').val("");
            $('#onvan-mali3-2').val("");
            $('#mahal-mali3-2').val("");
            $('#karfarma-mali3-2').val("");
            $('#mablagh-mali3-2').val("");
            $('#emtiaz-mali3-2').val("");
            $('#darsad-mali3-2').val("");
            $('#onvan-mali3-3').val("");
            $('#mahal-mali3-3').val("");
            $('#karfarma-mali3-3').val("");
            $('#mablagh-mali3-3').val("");
            $('#emtiaz-mali3-3').val("");
            $('#darsad-mali3-3').val("");
            $('#onvan-mali3-4').val("");
            $('#mahal-mali3-4').val("");
            $('#karfarma-mali3-4').val("");
            $('#mablagh-mali3-4').val("");
            $('#emtiaz-mali3-4').val("");
            $('#darsad-mali3-4').val("");
            $('#note-mali3').val("");
                $('#files-mali3').val("");
            $('#onvan-mali4-1').val("");
            $('#mablagh-mali4-1').val("");
            $('#emtiaz-mali4-1').val("");
            $('#onvan-mali4-2').val("");
            $('#mablagh-mali4-2').val("");
            $('#emtiaz-mali4-2').val("");
            $('#onvan-mali4-3').val("");
            $('#mablagh-mali4-3').val("");
            $('#emtiaz-mali4-3').val("");
            $('#onvan-mali4-4').val("");
            $('#mablagh-mali4-4').val("");
            $('#emtiaz-mali4-4').val("");
            $('#note-mali4').val("");
                $('#files-mali4').val("");
            $('#onvan-dast1').val("");
            $('#marja-dast1').val("");
            $('#date-dast1').val("");
            $('#emtiaz-dast1').val("");
            $('#onvan-dast2').val("");
            $('#marja-dast2').val("");
            $('#date-dast2').val("");
            $('#emtiaz-dast2').val("");
            $('#onvan-dast3').val("");
            $('#marja-dast3').val("");
            $('#date-dast3').val("");
            $('#emtiaz-dast3').val("");
            $('#onvan-dast4').val("");
            $('#marja-dast4').val("");
            $('#date-dast4').val("");
            $('#emtiaz-dast4').val("");
            $('#onvan-dast5').val("");
            $('#marja-dast5').val("");
            $('#date-dast5').val("");
            $('#emtiaz-dast5').val("");
            $('#onvan-dast6').val("");
            $('#marja-dast6').val("");
            $('#date-dast6').val("");
            $('#emtiaz-dast6').val("");
            $('#note-dast').val("");
            $('#onvan-niroo1').val("");
            $('#tahsil-niroo1').val("");
            $('#hamkari-niroo1').val("");
            $('#sabeghe-niroo1').val("");
            $('#bime-niroo1').val("");
            $('#emtiaz-niroo1').val("");
            $('#onvan-niroo2').val("");
            $('#tahsil-niroo2').val("");
            $('#hamkari-niroo2').val("");
            $('#sabeghe-niroo2').val("");
            $('#bime-niroo2').val("");
            $('#emtiaz-niroo2').val("");
            $('#onvan-niroo3').val("");
            $('#tahsil-niroo3').val("");
            $('#hamkari-niroo3').val("");
            $('#sabeghe-niroo3').val("");
            $('#bime-niroo3').val("");
            $('#emtiaz-niroo3').val("");
            $('#onvan-niroo4').val("");
            $('#tahsil-niroo4').val("");
            $('#hamkari-niroo4').val("");
            $('#sabeghe-niroo4').val("");
            $('#bime-niroo4').val("");
            $('#emtiaz-niroo4').val("");
            $('#onvan-niroo5').val("");
            $('#tahsil-niroo5').val("");
            $('#hamkari-niroo5').val("");
            $('#sabeghe-niroo5').val("");
            $('#bime-niroo5').val("");
            $('#emtiaz-niroo5').val("");
            $('#onvan-niroo6').val("");
            $('#tahsil-niroo6').val("");
            $('#hamkari-niroo6').val("");
            $('#sabeghe-niroo6').val("");
            $('#bime-niroo6').val("");
            $('#emtiaz-niroo6').val("");
            $('#onvan-niroo7').val("");
            $('#tahsil-niroo7').val("");
            $('#hamkari-niroo7').val("");
            $('#sabeghe-niroo7').val("");
            $('#bime-niroo7').val("");
            $('#emtiaz-niroo7').val("");
            $('#onvan-niroo8').val("");
            $('#tahsil-niroo8').val("");
            $('#hamkari-niroo8').val("");
            $('#sabeghe-niroo8').val("");
            $('#bime-niroo8').val("");
            $('#emtiaz-niroo8').val("");
            $('#onvan-niroo9').val("");
            $('#tahsil-niroo9').val("");
            $('#hamkari-niroo9').val("");
            $('#sabeghe-niroo9').val("");
            $('#bime-niroo9').val("");
            $('#emtiaz-niroo9').val("");
            $('#onvan-niroo10').val("");
            $('#tahsil-niroo10').val("");
            $('#hamkari-niroo10').val("");
            $('#sabeghe-niroo10').val("");
            $('#bime-niroo10').val("");
            $('#emtiaz-niroo10').val("");
            $('#onvan-bazar1-1').val("");
            $('#mahal-bazar1-1').val("");
            $('#date-bazar1-1').val("");
            $('#type-bazar1-1').val("");
            $('#emtiaz-bazar1-1').val("");
            $('#onvan-bazar1-2').val("");
            $('#mahal-bazar1-2').val("");
            $('#date-bazar1-2').val("");
            $('#type-bazar1-2').val("");
            $('#emtiaz-bazar1-2').val("");
            $('#onvan-bazar1-3').val("");
            $('#mahal-bazar1-3').val("");
            $('#date-bazar1-3').val("");
            $('#type-bazar1-3').val("");
            $('#emtiaz-bazar1-3').val("");
            $('#onvan-bazar1-4').val("");
            $('#mahal-bazar1-4').val("");
            $('#date-bazar1-4').val("");
            $('#type-bazar1-4').val("");
            $('#emtiaz-bazar1-4').val("");
            $('#note-bazar1').val("");
                $('#files-bazar1').val("");
            $('#onvan-bazar2').val("");
                $('#files-bazar2').val("");
            $('#onvan-bazar3-1').val("");
            $('#date-bazar3-1').val("");
            $('#bargozar-bazar3-1').val("");
            $('#mahal-bazar3-1').val("");
            $('#emtiaz-bazar3-1').val("");
            $('#onvan-bazar3-2').val("");
            $('#date-bazar3-2').val("");
            $('#bargozar-bazar3-2').val("");
            $('#mahal-bazar3-2').val("");
            $('#emtiaz-bazar3-2').val("");
            $('#onvan-bazar3-3').val("");
            $('#date-bazar3-3').val("");
            $('#bargozar-bazar3-3').val("");
            $('#mahal-bazar3-3').val("");
            $('#emtiaz-bazar3-3').val("");
            $('#onvan-bazar3-4').val("");
            $('#date-bazar3-4').val("");
            $('#bargozar-bazar3-4').val("");
            $('#mahal-bazar3-4').val("");
            $('#emtiaz-bazar3-4').val("");
            $('#note-bazar3').val("");
                $('#files-bazar3').val("");
            $('#onvan-bazar4-1').val("");
            $('#date-bazar4-1').val("");
            $('#mahal-bazar4-1').val("");
            $('#naghsh-bazar4-1').val("");
            $('#emtiaz-bazar4-1').val("");
            $('#onvan-bazar4-2').val("");
            $('#date-bazar4-2').val("");
            $('#mahal-bazar4-2').val("");
            $('#naghsh-bazar4-2').val("");
            $('#emtiaz-bazar4-2').val("");
            $('#onvan-bazar4-3').val("");
            $('#date-bazar4-3').val("");
            $('#mahal-bazar4-3').val("");
            $('#naghsh-bazar4-3').val("");
            $('#emtiaz-bazar4-3').val("");
            $('#onvan-bazar4-4').val("");
            $('#date-bazar4-4').val("");
            $('#mahal-bazar4-4').val("");
            $('#naghsh-bazar4-4').val("");
            $('#emtiaz-bazar4-4').val("");
            $('#note-bazar4').val("");
                $('#files-bazar4').val("");
            $('#onvan-amoozeshi1-1').val("");
            $('#date-amoozeshi1-1').val("");
            $('#bargozar-amoozeshi1-1').val("");
            $('#mahal-amoozeshi1-1').val("");
            $('#emtiaz-amoozeshi1-1').val("");
            $('#onvan-amoozeshi1-2').val("");
            $('#date-amoozeshi1-2').val("");
            $('#bargozar-amoozeshi1-2').val("");
            $('#mahal-amoozeshi1-2').val("");
            $('#emtiaz-amoozeshi1-2').val("");
            $('#onvan-amoozeshi1-3').val("");
            $('#date-amoozeshi1-3').val("");
            $('#bargozar-amoozeshi1-3').val("");
            $('#mahal-amoozeshi1-3').val("");
            $('#emtiaz-amoozeshi1-3').val("");
            $('#onvan-amoozeshi1-4').val("");
            $('#date-amoozeshi1-4').val("");
            $('#bargozar-amoozeshi1-4').val("");
            $('#mahal-amoozeshi1-4').val("");
            $('#emtiaz-amoozeshi1-4').val("");
            $('#note-amoozeshi1').val("");
                $('#files-amoozeshi1').val("");
            $('#onvan-amoozeshi2-1').val("");
            $('#date-amoozeshi2-1').val("");
            $('#mahal-amoozeshi2-1').val("");
            $('#naghsh-amoozeshi2-1').val("");
            $('#emtiaz-amoozeshi2-1').val("");
            $('#onvan-amoozeshi2-2').val("");
            $('#date-amoozeshi2-2').val("");
            $('#mahal-amoozeshi2-2').val("");
            $('#naghsh-amoozeshi2-2').val("");
            $('#emtiaz-amoozeshi2-2').val("");
            $('#onvan-amoozeshi2-3').val("");
            $('#date-amoozeshi2-3').val("");
            $('#mahal-amoozeshi2-3').val("");
            $('#naghsh-amoozeshi2-3').val("");
            $('#emtiaz-amoozeshi2-3').val("");
            $('#onvan-amoozeshi2-4').val("");
            $('#date-amoozeshi2-4').val("");
            $('#mahal-amoozeshi2-4').val("");
            $('#naghsh-amoozeshi2-4').val("");
            $('#emtiaz-amoozeshi2-4').val("");
            $('#note-amoozeshi2').val("");
                $('#files-amoozeshi2').val("");
            $('#emtiaz-taamolp1').val("");
            $('#emtiaz-taamolp2').val("");
            $('#emtiaz-taamolp3').val("");
            $('#emtiaz-taamolp4').val("");
            $('#emtiaz-taamolp5').val("");
            $('#emtiaz-taamols1').val("");
            $('#emtiaz-taamols2').val("");

            $('#nazar-sanji1').val("");
            $('#nazar-sanji2').val("");
            $('#nazar-sanji3').val("");
            $('#nazar-sanji4').val("");
            $('#nazar-sanji5').val("");
            $('#nazar-sanji6').val("");
            $('#nazar-sanji7').val("");
            $('#nazar-sanji8').val("");
            $('#nazar-sanji9').val("");
            $('#nazar-sanji10').val("");
            $('#nazar-sanji11').val("");
            $('#nazar-sanji12').val("");
            $('#nazar-sanji13').val("");
            $('#nazar-sanji14').val("");

            $('#report').val("");
        }

        function Set_disable(param)
        {
            $("#onvan-mali1-1").prop('disabled', param);
            $('#mahal-mali1-1').prop('disabled', param);
            $('#karfarma-mali1-1').prop('disabled', param);
            $('#mablagh-mali1-1').prop('disabled', param);
            $('#emtiaz-mali1-1').prop('disabled', param);
            $('#onvan-mali1-2').prop('disabled', param);
            $('#mahal-mali1-2').prop('disabled', param);
            $('#karfarma-mali1-2').prop('disabled', param);
            $('#mablagh-mali1-2').prop('disabled', param);
            $('#emtiaz-mali1-2').prop('disabled', param);
            $('#onvan-mali1-3').prop('disabled', param);
            $('#mahal-mali1-3').prop('disabled', param);
            $('#karfarma-mali1-3').prop('disabled', param);
            $('#mablagh-mali1-3').prop('disabled', param);
            $('#emtiaz-mali1-3').prop('disabled', param);
            $('#onvan-mali1-4').prop('disabled', param);
            $('#mahal-mali1-4').prop('disabled', param);
            $('#karfarma-mali1-4').prop('disabled', param);
            $('#mablagh-mali1-4').prop('disabled', param);
            $('#emtiaz-mali1-4').prop('disabled', param);
            $('#note-mali1').prop('disabled', param);
            $('#files-mali1').prop('disabled', param);
            $('#onvan-mali2-1').prop('disabled', param);
            $('#mahal-mali2-1').prop('disabled', param);
            $('#karfarma-mali2-1').prop('disabled', param);
            $('#mablagh-mali2-1').prop('disabled', param);
            $('#emtiaz-mali2-1').prop('disabled', param);
            $('#darsad-mali2-1').prop('disabled', param);
            $('#onvan-mali2-2').prop('disabled', param);
            $('#mahal-mali2-2').prop('disabled', param);
            $('#karfarma-mali2-2').prop('disabled', param);
            $('#mablagh-mali2-2').prop('disabled', param);
            $('#emtiaz-mali2-2').prop('disabled', param);
            $('#darsad-mali2-2').prop('disabled', param);
            $('#onvan-mali2-3').prop('disabled', param);
            $('#mahal-mali2-3').prop('disabled', param);
            $('#karfarma-mali2-3').prop('disabled', param);
            $('#mablagh-mali2-3').prop('disabled', param);
            $('#emtiaz-mali2-3').prop('disabled', param);
            $('#darsad-mali2-3').prop('disabled', param);
            $('#onvan-mali2-4').prop('disabled', param);
            $('#mahal-mali2-4').prop('disabled', param);
            $('#karfarma-mali2-4').prop('disabled', param);
            $('#mablagh-mali2-4').prop('disabled', param);
            $('#emtiaz-mali2-4').prop('disabled', param);
            $('#darsad-mali2-4').prop('disabled', param);
            $('#note-mali2').prop('disabled', param);
            $('#files-mali2').prop('disabled', param);
            $('#onvan-mali3-1').prop('disabled', param);
            $('#mahal-mali3-1').prop('disabled', param);
            $('#karfarma-mali3-1').prop('disabled', param);
            $('#mablagh-mali3-1').prop('disabled', param);
            $('#emtiaz-mali3-1').prop('disabled', param);
            $('#darsad-mali3-1').prop('disabled', param);
            $('#onvan-mali3-2').prop('disabled', param);
            $('#mahal-mali3-2').prop('disabled', param);
            $('#karfarma-mali3-2').prop('disabled', param);
            $('#mablagh-mali3-2').prop('disabled', param);
            $('#emtiaz-mali3-2').prop('disabled', param);
            $('#darsad-mali3-2').prop('disabled', param);
            $('#onvan-mali3-3').prop('disabled', param);
            $('#mahal-mali3-3').prop('disabled', param);
            $('#karfarma-mali3-3').prop('disabled', param);
            $('#mablagh-mali3-3').prop('disabled', param);
            $('#emtiaz-mali3-3').prop('disabled', param);
            $('#darsad-mali3-3').prop('disabled', param);
            $('#onvan-mali3-4').prop('disabled', param);
            $('#mahal-mali3-4').prop('disabled', param);
            $('#karfarma-mali3-4').prop('disabled', param);
            $('#mablagh-mali3-4').prop('disabled', param);
            $('#emtiaz-mali3-4').prop('disabled', param);
            $('#darsad-mali3-4').prop('disabled', param);
            $('#note-mali3').prop('disabled', param);
                $('#files-mali3').prop('disabled', param);
            $('#onvan-mali4-1').prop('disabled', param);
            $('#mablagh-mali4-1').prop('disabled', param);
            $('#emtiaz-mali4-1').prop('disabled', param);
            $('#onvan-mali4-2').prop('disabled', param);
            $('#mablagh-mali4-2').prop('disabled', param);
            $('#emtiaz-mali4-2').prop('disabled', param);
            $('#onvan-mali4-3').prop('disabled', param);
            $('#mablagh-mali4-3').prop('disabled', param);
            $('#emtiaz-mali4-3').prop('disabled', param);
            $('#onvan-mali4-4').prop('disabled', param);
            $('#mablagh-mali4-4').prop('disabled', param);
            $('#emtiaz-mali4-4').prop('disabled', param);
            $('#note-mali4').prop('disabled', param);
                $('#files-mali4').prop('disabled', param);
            $('#onvan-dast1').prop('disabled', param);
            $('#marja-dast1').prop('disabled', param);
            $('#date-dast1').prop('disabled', param);
            $('#emtiaz-dast1').prop('disabled', param);
            $('#onvan-dast2').prop('disabled', param);
            $('#marja-dast2').prop('disabled', param);
            $('#date-dast2').prop('disabled', param);
            $('#emtiaz-dast2').prop('disabled', param);
            $('#onvan-dast3').prop('disabled', param);
            $('#marja-dast3').prop('disabled', param);
            $('#date-dast3').prop('disabled', param);
            $('#emtiaz-dast3').prop('disabled', param);
            $('#onvan-dast4').prop('disabled', param);
            $('#marja-dast4').prop('disabled', param);
            $('#date-dast4').prop('disabled', param);
            $('#emtiaz-dast4').prop('disabled', param);
            $('#onvan-dast5').prop('disabled', param);
            $('#marja-dast5').prop('disabled', param);
            $('#date-dast5').prop('disabled', param);
            $('#emtiaz-dast5').prop('disabled', param);
            $('#onvan-dast6').prop('disabled', param);
            $('#marja-dast6').prop('disabled', param);
            $('#date-dast6').prop('disabled', param);
            $('#emtiaz-dast6').prop('disabled', param);
            $('#note-dast').prop('disabled', param);
            $('#onvan-niroo1').prop('disabled', param);
            $('#tahsil-niroo1').prop('disabled', param);
            $('#hamkari-niroo1').prop('disabled', param);
            $('#sabeghe-niroo1').prop('disabled', param);
            $('#bime-niroo1').prop('disabled', param);
            $('#emtiaz-niroo1').prop('disabled', param);
            $('#onvan-niroo2').prop('disabled', param);
            $('#tahsil-niroo2').prop('disabled', param);
            $('#hamkari-niroo2').prop('disabled', param);
            $('#sabeghe-niroo2').prop('disabled', param);
            $('#bime-niroo2').prop('disabled', param);
            $('#emtiaz-niroo2').prop('disabled', param);
            $('#onvan-niroo3').prop('disabled', param);
            $('#tahsil-niroo3').prop('disabled', param);
            $('#hamkari-niroo3').prop('disabled', param);
            $('#sabeghe-niroo3').prop('disabled', param);
            $('#bime-niroo3').prop('disabled', param);
            $('#emtiaz-niroo3').prop('disabled', param);
            $('#onvan-niroo4').prop('disabled', param);
            $('#tahsil-niroo4').prop('disabled', param);
            $('#hamkari-niroo4').prop('disabled', param);
            $('#sabeghe-niroo4').prop('disabled', param);
            $('#bime-niroo4').prop('disabled', param);
            $('#emtiaz-niroo4').prop('disabled', param);
            $('#onvan-niroo5').prop('disabled', param);
            $('#tahsil-niroo5').prop('disabled', param);
            $('#hamkari-niroo5').prop('disabled', param);
            $('#sabeghe-niroo5').prop('disabled', param);
            $('#bime-niroo5').prop('disabled', param);
            $('#emtiaz-niroo5').prop('disabled', param);
            $('#onvan-niroo6').prop('disabled', param);
            $('#tahsil-niroo6').prop('disabled', param);
            $('#hamkari-niroo6').prop('disabled', param);
            $('#sabeghe-niroo6').prop('disabled', param);
            $('#bime-niroo6').prop('disabled', param);
            $('#emtiaz-niroo6').prop('disabled', param);
            $('#onvan-niroo7').prop('disabled', param);
            $('#tahsil-niroo7').prop('disabled', param);
            $('#hamkari-niroo7').prop('disabled', param);
            $('#sabeghe-niroo7').prop('disabled', param);
            $('#bime-niroo7').prop('disabled', param);
            $('#emtiaz-niroo7').prop('disabled', param);
            $('#onvan-niroo8').prop('disabled', param);
            $('#tahsil-niroo8').prop('disabled', param);
            $('#hamkari-niroo8').prop('disabled', param);
            $('#sabeghe-niroo8').prop('disabled', param);
            $('#bime-niroo8').prop('disabled', param);
            $('#emtiaz-niroo8').prop('disabled', param);
            $('#onvan-niroo9').prop('disabled', param);
            $('#tahsil-niroo9').prop('disabled', param);
            $('#hamkari-niroo9').prop('disabled', param);
            $('#sabeghe-niroo9').prop('disabled', param);
            $('#bime-niroo9').prop('disabled', param);
            $('#emtiaz-niroo9').prop('disabled', param);
            $('#onvan-niroo10').prop('disabled', param);
            $('#tahsil-niroo10').prop('disabled', param);
            $('#hamkari-niroo10').prop('disabled', param);
            $('#sabeghe-niroo10').prop('disabled', param);
            $('#bime-niroo10').prop('disabled', param);
            $('#emtiaz-niroo10').prop('disabled', param);
            $('#onvan-bazar1-1').prop('disabled', param);
            $('#mahal-bazar1-1').prop('disabled', param);
            $('#date-bazar1-1').prop('disabled', param);
            $('#type-bazar1-1').prop('disabled', param);
            $('#emtiaz-bazar1-1').prop('disabled', param);
            $('#onvan-bazar1-2').prop('disabled', param);
            $('#mahal-bazar1-2').prop('disabled', param);
            $('#date-bazar1-2').prop('disabled', param);
            $('#type-bazar1-2').prop('disabled', param);
            $('#emtiaz-bazar1-2').prop('disabled', param);
            $('#onvan-bazar1-3').prop('disabled', param);
            $('#mahal-bazar1-3').prop('disabled', param);
            $('#date-bazar1-3').prop('disabled', param);
            $('#type-bazar1-3').prop('disabled', param);
            $('#emtiaz-bazar1-3').prop('disabled', param);
            $('#onvan-bazar1-4').prop('disabled', param);
            $('#mahal-bazar1-4').prop('disabled', param);
            $('#date-bazar1-4').prop('disabled', param);
            $('#type-bazar1-4').prop('disabled', param);
            $('#emtiaz-bazar1-4').prop('disabled', param);
            $('#note-bazar1').prop('disabled', param);
                $('#files-bazar1').prop('disabled', param);
            $('#onvan-bazar2').prop('disabled', param);
                $('#files-bazar2').prop('disabled', param);
            $('#onvan-bazar3-1').prop('disabled', param);
            $('#date-bazar3-1').prop('disabled', param);
            $('#bargozar-bazar3-1').prop('disabled', param);
            $('#mahal-bazar3-1').prop('disabled', param);
            $('#emtiaz-bazar3-1').prop('disabled', param);
            $('#onvan-bazar3-2').prop('disabled', param);
            $('#date-bazar3-2').prop('disabled', param);
            $('#bargozar-bazar3-2').prop('disabled', param);
            $('#mahal-bazar3-2').prop('disabled', param);
            $('#emtiaz-bazar3-2').prop('disabled', param);
            $('#onvan-bazar3-3').prop('disabled', param);
            $('#date-bazar3-3').prop('disabled', param);
            $('#bargozar-bazar3-3').prop('disabled', param);
            $('#mahal-bazar3-3').prop('disabled', param);
            $('#emtiaz-bazar3-3').prop('disabled', param);
            $('#onvan-bazar3-4').prop('disabled', param);
            $('#date-bazar3-4').prop('disabled', param);
            $('#bargozar-bazar3-4').prop('disabled', param);
            $('#mahal-bazar3-4').prop('disabled', param);
            $('#emtiaz-bazar3-4').prop('disabled', param);
            $('#note-bazar3').prop('disabled', param);
                $('#files-bazar3').prop('disabled', param);
            $('#onvan-bazar4-1').prop('disabled', param);
            $('#date-bazar4-1').prop('disabled', param);
            $('#mahal-bazar4-1').prop('disabled', param);
            $('#naghsh-bazar4-1').prop('disabled', param);
            $('#emtiaz-bazar4-1').prop('disabled', param);
            $('#onvan-bazar4-2').prop('disabled', param);
            $('#date-bazar4-2').prop('disabled', param);
            $('#mahal-bazar4-2').prop('disabled', param);
            $('#naghsh-bazar4-2').prop('disabled', param);
            $('#emtiaz-bazar4-2').prop('disabled', param);
            $('#onvan-bazar4-3').prop('disabled', param);
            $('#date-bazar4-3').prop('disabled', param);
            $('#mahal-bazar4-3').prop('disabled', param);
            $('#naghsh-bazar4-3').prop('disabled', param);
            $('#emtiaz-bazar4-3').prop('disabled', param);
            $('#onvan-bazar4-4').prop('disabled', param);
            $('#date-bazar4-4').prop('disabled', param);
            $('#mahal-bazar4-4').prop('disabled', param);
            $('#naghsh-bazar4-4').prop('disabled', param);
            $('#emtiaz-bazar4-4').prop('disabled', param);
            $('#note-bazar4').prop('disabled', param);
                $('#files-bazar4').prop('disabled', param);
            $('#onvan-amoozeshi1-1').prop('disabled', param);
            $('#date-amoozeshi1-1').prop('disabled', param);
            $('#bargozar-amoozeshi1-1').prop('disabled', param);
            $('#mahal-amoozeshi1-1').prop('disabled', param);
            $('#emtiaz-amoozeshi1-1').prop('disabled', param);
            $('#onvan-amoozeshi1-2').prop('disabled', param);
            $('#date-amoozeshi1-2').prop('disabled', param);
            $('#bargozar-amoozeshi1-2').prop('disabled', param);
            $('#mahal-amoozeshi1-2').prop('disabled', param);
            $('#emtiaz-amoozeshi1-2').prop('disabled', param);
            $('#onvan-amoozeshi1-3').prop('disabled', param);
            $('#date-amoozeshi1-3').prop('disabled', param);
            $('#bargozar-amoozeshi1-3').prop('disabled', param);
            $('#mahal-amoozeshi1-3').prop('disabled', param);
            $('#emtiaz-amoozeshi1-3').prop('disabled', param);
            $('#onvan-amoozeshi1-4').prop('disabled', param);
            $('#date-amoozeshi1-4').prop('disabled', param);
            $('#bargozar-amoozeshi1-4').prop('disabled', param);
            $('#mahal-amoozeshi1-4').prop('disabled', param);
            $('#emtiaz-amoozeshi1-4').prop('disabled', param);
            $('#note-amoozeshi1').prop('disabled', param);
                $('#files-amoozeshi1').prop('disabled', param);
            $('#onvan-amoozeshi2-1').prop('disabled', param);
            $('#date-amoozeshi2-1').prop('disabled', param);
            $('#mahal-amoozeshi2-1').prop('disabled', param);
            $('#naghsh-amoozeshi2-1').prop('disabled', param);
            $('#emtiaz-amoozeshi2-1').prop('disabled', param);
            $('#onvan-amoozeshi2-2').prop('disabled', param);
            $('#date-amoozeshi2-2').prop('disabled', param);
            $('#mahal-amoozeshi2-2').prop('disabled', param);
            $('#naghsh-amoozeshi2-2').prop('disabled', param);
            $('#emtiaz-amoozeshi2-2').prop('disabled', param);
            $('#onvan-amoozeshi2-3').prop('disabled', param);
            $('#date-amoozeshi2-3').prop('disabled', param);
            $('#mahal-amoozeshi2-3').prop('disabled', param);
            $('#naghsh-amoozeshi2-3').prop('disabled', param);
            $('#emtiaz-amoozeshi2-3').prop('disabled', param);
            $('#onvan-amoozeshi2-4').prop('disabled', param);
            $('#date-amoozeshi2-4').prop('disabled', param);
            $('#mahal-amoozeshi2-4').prop('disabled', param);
            $('#naghsh-amoozeshi2-4').prop('disabled', param);
            $('#emtiaz-amoozeshi2-4').prop('disabled', param);
            $('#note-amoozeshi2').prop('disabled', param);
                $('#files-amoozeshi2').prop('disabled', param);
            $('#emtiaz-taamolp1').prop('disabled', param);
            $('#emtiaz-taamolp2').prop('disabled', param);
            $('#emtiaz-taamolp3').prop('disabled', param);
            $('#emtiaz-taamolp4').prop('disabled', param);
            $('#emtiaz-taamolp5').prop('disabled', param);
            $('#emtiaz-taamols1').prop('disabled', param);
            $('#emtiaz-taamols2').prop('disabled', param);
            $('#nazar-sanji1').prop('disabled', param);
            $('#nazar-sanji2').prop('disabled', param);
            $('#nazar-sanji3').prop('disabled', param);
            $('#nazar-sanji4').prop('disabled', param);
            $('#nazar-sanji5').prop('disabled', param);
            $('#nazar-sanji6').prop('disabled', param);
            $('#nazar-sanji7').prop('disabled', param);
            $('#nazar-sanji8').prop('disabled', param);
            $('#nazar-sanji9').prop('disabled', param);
            $('#nazar-sanji10').prop('disabled', param);
            $('#nazar-sanji11').prop('disabled', param);
            $('#nazar-sanji12').prop('disabled', param);
            $('#nazar-sanji13').prop('disabled', param);
            $('#nazar-sanji14').prop('disabled', param);
            $('#report').prop('disabled', param);
            $('#upload_files').prop('disabled', param);
            if ( param==true)
            {
                $('.rowsEditDelete').css("pointer-events","none");
                $('.add-link').css("pointer-events","none");
                $('.upload-btn').css("pointer-events","none");
            }
            else
            {
                $('.rowsEditDelete').css("pointer-events","auto");
                $('.add-link').css("pointer-events","auto");
                $('.upload-btn').css("pointer-events","auto");
            }
            
        }
        
        
        function Set_fields()
        {
            if (getCookie("user_type")!="corp" )
            {
                $('#FormEmtiaz *').prop('disabled', true);
                $('#del-row1,#del-row2,#del-row3,#del-row4,#del-row5,#del-row6,#del-row7,#del-row8,#del-row9,#del-row10').css('pointer-events','none');
                $('#del-row11,#del-row12,#del-row13,#del-row14,#del-row15,#del-row16,#del-row17,#del-row18,#del-row19,#del-row20').css('pointer-events','none');
                $('#del-row21,#del-row22,#del-row23,#del-row24,#del-row25,#del-row26,#del-row27,#del-row28,#del-row29,#del-row30').css('pointer-events','none');
                $('#del-row31,#del-row32,#del-row33,#del-row34,#del-row35,#del-row36,#del-row37,#del-row38,#del-row39,#del-row40').css('pointer-events','none');
                $('#del-row41,#del-row42,#del-row43,#del-row44,#del-row45,#del-row46,#del-row47,#del-row48,#del-row49,#del-row50').css('pointer-events','none');
                $('#del-row51,#del-row52,#del-row53,#del-row54,#del-row55,#del-row56,#del-row57,#del-row58,#del-row59,#del-row60').css('pointer-events','none');
                $('#del-row61,#del-row62,#del-row63,#del-row64,#del-row65,#del-row66,#del-row67,#del-row68,#del-row69,#del-row70').css('pointer-events','none');
                $('.add-link').css('pointer-events','none');
                $('.tablinks').prop('disabled', false);
                if ( getCookie("user_type")!="mali" )
                {
                    param=false;
                }
                else
                {
                    param=true;
                }
            }
            else
            {
                param=true;
            }
            $('#years').prop('disabled', false);
            $('#emtiaz-mali1-1,#emtiaz-mali1-2,#emtiaz-mali1-3,#emtiaz-mali1-4').prop('disabled', param);
            $('#emtiaz-mali2-1,#emtiaz-mali2-2,#emtiaz-mali2-3,#emtiaz-mali2-4').prop('disabled', param);
            $('#emtiaz-mali3-1,#emtiaz-mali3-2,#emtiaz-mali3-3,#emtiaz-mali3-4').prop('disabled', param);
            $('#emtiaz-mali4-1,#emtiaz-mali4-2,#emtiaz-mali4-3,#emtiaz-mali4-4').prop('disabled', param);
            $('#emtiaz-dast1-1,#emtiaz-dast1-2,#emtiaz-dast1-3,#emtiaz-dast1-4').prop('disabled', param);
            $('#emtiaz-dast2-1,#emtiaz-dast2-2,#emtiaz-dast2-3,#emtiaz-dast2-4').prop('disabled', param);
            $('#emtiaz-dast3-1,#emtiaz-dast3-2,#emtiaz-dast3-3,#emtiaz-dast3-4').prop('disabled', param);
            $('#emtiaz-dast4-1,#emtiaz-dast4-2,#emtiaz-dast4-3,#emtiaz-dast4-4').prop('disabled', param);
            $('#emtiaz-dast5-1,#emtiaz-dast5-2,#emtiaz-dast5-3,#emtiaz-dast5-4').prop('disabled', param);
            $('#emtiaz-dast6-1,#emtiaz-dast6-2,#emtiaz-dast6-3,#emtiaz-dast6-4').prop('disabled', param);
            $('#emtiaz-niroo1,#emtiaz-niroo2,#emtiaz-niroo3,#emtiaz-niroo4,#emtiaz-niroo5,#emtiaz-niroo6,#emtiaz-niroo7,#emtiaz-niroo8,#emtiaz-niroo9,#emtiaz-niroo10').prop('disabled', param);
            $('#emtiaz-bazar1-1,#emtiaz-bazar1-2,#emtiaz-bazar1-3,#emtiaz-bazar1-4').prop('disabled', param);
            $('#emtiaz-bazar2').prop('disabled', param);
            $('#emtiaz-bazar3-1,#emtiaz-bazar3-2,#emtiaz-bazar3-3,#emtiaz-bazar3-4').prop('disabled', param);
            $('#emtiaz-bazar4-1,#emtiaz-bazar4-2,#emtiaz-bazar4-3,#emtiaz-bazar4-4').prop('disabled', param);
            $('#emtiaz-amoozeshi1-1,#emtiaz-amoozeshi1-2,#emtiaz-amoozeshi1-3,#emtiaz-amoozeshi1-4').prop('disabled', param);
            $('#emtiaz-amoozeshi2-1,#emtiaz-amoozeshi2-2,#emtiaz-amoozeshi2-3,#emtiaz-amoozeshi2-4').prop('disabled', param);
            $('#emtiaz-taamolp1,#emtiaz-taamolp2,#emtiaz-taamolp3,#emtiaz-taamolp4,#emtiaz-taamolp5').prop('disabled', param);
            $('#emtiaz-taamols1,#emtiaz-taamols2').prop('disabled', param);
            $('#emtiazm-mali1-1,#emtiazm-mali1-2,#emtiazm-mali1-3,#emtiazm-mali1-4').prop('disabled', param);
            $('#emtiazm-mali2-1,#emtiazm-mali2-2,#emtiazm-mali2-3,#emtiazm-mali2-4').prop('disabled', param);
            $('#emtiazm-mali3-1,#emtiazm-mali3-2,#emtiazm-mali3-3,#emtiazm-mali3-4').prop('disabled', param);
            $('#emtiazm-mali4-1,#emtiazm-mali4-2,#emtiazm-mali4-3,#emtiazm-mali4-4').prop('disabled', param);
            $('#emtiazm-dast1-1,#emtiazm-dast1-2,#emtiazm-dast1-3,#emtiazm-dast1-4').prop('disabled', param);
            $('#emtiazm-dast2-1,#emtiazm-dast2-2,#emtiazm-dast2-3,#emtiazm-dast2-4').prop('disabled', param);
            $('#emtiazm-dast3-1,#emtiazm-dast3-2,#emtiazm-dast3-3,#emtiazm-dast3-4').prop('disabled', param);
            $('#emtiazm-dast4-1,#emtiazm-dast4-2,#emtiazm-dast4-3,#emtiazm-dast4-4').prop('disabled', param);
            $('#emtiazm-dast5-1,#emtiazm-dast5-2,#emtiazm-dast5-3,#emtiazm-dast5-4').prop('disabled', param);
            $('#emtiazm-dast6-1,#emtiazm-dast6-2,#emtiazm-dast6-3,#emtiazm-dast6-4').prop('disabled', param);
            $('#emtiazm-niroo1,#emtiazm-niroo2,#emtiazm-niroo3,#emtiazm-niroo4,#emtiazm-niroo5,#emtiazm-niroo6,#emtiazm-niroo7,#emtiazm-niroo8,#emtiazm-niroo9,#emtiazm-niroo10').prop('disabled', param);
            $('#emtiazm-bazar1-1,#emtiazm-bazar1-2,#emtiazm-bazar1-3,#emtiazm-bazar1-4').prop('disabled', param);
            $('#emtiazm-bazar2').prop('disabled', param);
            $('#emtiazm-bazar3-1,#emtiazm-bazar3-2,#emtiazm-bazar3-3,#emtiazm-bazar3-4').prop('disabled', param);
            $('#emtiazm-bazar4-1,#emtiazm-bazar4-2,#emtiazm-bazar4-3,#emtiazm-bazar4-4').prop('disabled', param);
            $('#emtiazm-amoozeshi1-1,#emtiazm-amoozeshi1-2,#emtiazm-amoozeshi1-3,#emtiazm-amoozeshi1-4').prop('disabled', param);
            $('#emtiazm-amoozeshi2-1,#emtiazm-amoozeshi2-2,#emtiazm-amoozeshi2-3,#emtiazm-amoozeshi2-4').prop('disabled', param);
            $('#emtiazm-taamolp1,#emtiazm-taamolp2,#emtiazm-taamolp3,#emtiazm-taamolp4,#emtiazm-taamolp5').prop('disabled', param);
            $('#emtiazm-taamols1,#emtiazm-taamols2').prop('disabled', param);
            /*if ( getCookie("user_type")=="admin" )
            {
                param=true;
                $('#emtiaz-mali1-1,#emtiaz-mali1-2,#emtiaz-mali1-3,#emtiaz-mali1-4').prop('disabled', param);
                $('#emtiaz-mali2-1,#emtiaz-mali2-2,#emtiaz-mali2-3,#emtiaz-mali2-4').prop('disabled', param);
                $('#emtiaz-mali3-1,#emtiaz-mali3-2,#emtiaz-mali3-3,#emtiaz-mali3-4').prop('disabled', param);
                $('#emtiaz-mali4-1,#emtiaz-mali4-2,#emtiaz-mali4-3,#emtiaz-mali4-4').prop('disabled', param);
                $('#emtiaz-dast1-1,#emtiaz-dast1-2,#emtiaz-dast1-3,#emtiaz-dast1-4').prop('disabled', param);
                $('#emtiaz-dast2-1,#emtiaz-dast2-2,#emtiaz-dast2-3,#emtiaz-dast2-4').prop('disabled', param);
                $('#emtiaz-dast3-1,#emtiaz-dast3-2,#emtiaz-dast3-3,#emtiaz-dast3-4').prop('disabled', param);
                $('#emtiaz-dast4-1,#emtiaz-dast4-2,#emtiaz-dast4-3,#emtiaz-dast4-4').prop('disabled', param);
                $('#emtiaz-dast5-1,#emtiaz-dast5-2,#emtiaz-dast5-3,#emtiaz-dast5-4').prop('disabled', param);
                $('#emtiaz-dast6-1,#emtiaz-dast6-2,#emtiaz-dast6-3,#emtiaz-dast6-4').prop('disabled', param);
                $('#emtiaz-niroo1,#emtiaz-niroo2,#emtiaz-niroo3,#emtiaz-niroo4,#emtiaz-niroo5,#emtiaz-niroo6,#emtiaz-niroo7,#emtiaz-niroo8,#emtiaz-niroo9,#emtiaz-niroo10').prop('disabled', param);
                $('#emtiaz-bazar1-1,#emtiaz-bazar1-2,#emtiaz-bazar1-3,#emtiaz-bazar1-4').prop('disabled', param);
                $('#emtiaz-bazar2').prop('disabled', param);
                $('#emtiaz-bazar3-1,#emtiaz-bazar3-2,#emtiaz-bazar3-3,#emtiaz-bazar3-4').prop('disabled', param);
                $('#emtiaz-bazar4-1,#emtiaz-bazar4-2,#emtiaz-bazar4-3,#emtiaz-bazar4-4').prop('disabled', param);
                $('#emtiaz-amoozeshi1-1,#emtiaz-amoozeshi1-2,#emtiaz-amoozeshi1-3,#emtiaz-amoozeshi1-4').prop('disabled', param);
                $('#emtiaz-amoozeshi2-1,#emtiaz-amoozeshi2-2,#emtiaz-amoozeshi2-3,#emtiaz-amoozeshi2-4').prop('disabled', param);
                $('#emtiaz-taamolp1,#emtiaz-taamolp2,#emtiaz-taamolp3,#emtiaz-taamolp4,#emtiaz-taamolp5').prop('disabled', param);
                $('#emtiaz-taamols1,#emtiaz-taamols2').prop('disabled', param);
            }*/
            if ( getCookie("user_type")=="nazer" )
            {
                param=true;
                $('#emtiazm-mali1-1,#emtiazm-mali1-2,#emtiazm-mali1-3,#emtiazm-mali1-4').prop('disabled', param);
                $('#emtiazm-mali2-1,#emtiazm-mali2-2,#emtiazm-mali2-3,#emtiazm-mali2-4').prop('disabled', param);
                $('#emtiazm-mali3-1,#emtiazm-mali3-2,#emtiazm-mali3-3,#emtiazm-mali3-4').prop('disabled', param);
                $('#emtiazm-mali4-1,#emtiazm-mali4-2,#emtiazm-mali4-3,#emtiazm-mali4-4').prop('disabled', param);
                $('#emtiazm-dast1-1,#emtiazm-dast1-2,#emtiazm-dast1-3,#emtiazm-dast1-4').prop('disabled', param);
                $('#emtiazm-dast2-1,#emtiazm-dast2-2,#emtiazm-dast2-3,#emtiazm-dast2-4').prop('disabled', param);
                $('#emtiazm-dast3-1,#emtiazm-dast3-2,#emtiazm-dast3-3,#emtiazm-dast3-4').prop('disabled', param);
                $('#emtiazm-dast4-1,#emtiazm-dast4-2,#emtiazm-dast4-3,#emtiazm-dast4-4').prop('disabled', param);
                $('#emtiazm-dast5-1,#emtiazm-dast5-2,#emtiazm-dast5-3,#emtiazm-dast5-4').prop('disabled', param);
                $('#emtiazm-dast6-1,#emtiazm-dast6-2,#emtiazm-dast6-3,#emtiazm-dast6-4').prop('disabled', param);
                $('#emtiazm-niroo1,#emtiazm-niroo2,#emtiazm-niroo3,#emtiazm-niroo4,#emtiazm-niroo5,#emtiazm-niroo6,#emtiazm-niroo7,#emtiazm-niroo8,#emtiazm-niroo9,#emtiazm-niroo10').prop('disabled', param);
                $('#emtiazm-bazar1-1,#emtiazm-bazar1-2,#emtiazm-bazar1-3,#emtiazm-bazar1-4').prop('disabled', param);
                $('#emtiazm-bazar2').prop('disabled', param);
                $('#emtiazm-bazar3-1,#emtiazm-bazar3-2,#emtiazm-bazar3-3,#emtiazm-bazar3-4').prop('disabled', param);
                $('#emtiazm-bazar4-1,#emtiazm-bazar4-2,#emtiazm-bazar4-3,#emtiazm-bazar4-4').prop('disabled', param);
                $('#emtiazm-amoozeshi1-1,#emtiazm-amoozeshi1-2,#emtiazm-amoozeshi1-3,#emtiazm-amoozeshi1-4').prop('disabled', param);
                $('#emtiazm-amoozeshi2-1,#emtiazm-amoozeshi2-2,#emtiazm-amoozeshi2-3,#emtiazm-amoozeshi2-4').prop('disabled', param);
                $('#emtiazm-taamolp1,#emtiazm-taamolp2,#emtiazm-taamolp3,#emtiazm-taamolp4,#emtiazm-taamolp5').prop('disabled', param);
                $('#emtiazm-taamols1,#emtiazm-taamols2').prop('disabled', param);
            }
        }
        
        
                function Open_report()
                {

                     swal({
                       title: "برای باز کردن گزارش مطمئن هستید؟",
                       text: "با تایید گزارش برای کاربر فعال می شود",
                       icon: "warning",
                       buttons: ["انصراف", "تایید"],
                       dangerMode: true,
                     })
                     .then((willDelete) => {
                       if (willDelete) 
                       {
                            var open=true;
                            var form_data = new FormData();
                            form_data.append('code',document.getElementById("UserCode").value);
                            form_data.append('year',document.getElementById("years").value);
                
                            form_data.append('what', "open_report");
                            form_data.append('open', open);
                            $.ajax({
                                url: 'includes/open_report.php',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function(response)
                                {
                                    $("#snackbar").css("background-color","darkgreen");
                                    $("#snackbar").css("border","4px solid green");
                                    $("#snackbar").html("گزارش با موفقیت باز شد");
                                    $("#report-status").css("display","none");
                                    $("#report-open").css("display","none");
                                    ShowFloatingMessage();
                                }
                             });
                       }
                     });
                }

       
       
       /********* Upload Files ************/
       function UploadFiles(input,imageID) 
       {
            if ( input.files.length>10 )
            {
                swal("ماکزیمم تعداد فایل ها برای آپلود ده فایل می باشد", {icon: "warning",});
                return;
           }
       }
       
       function ManageFiles(part)
       {
            show_window('FormUpload');
       }


        function show_window(win)
        {
          document.getElementById(win).style.display = "block";
        }        
        function hide_window(win)
        {
          document.getElementById(win).style.display = "none";
        }        
        /*****************************************/        
        /*** Go To Next Element By Press ENTER ***/
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
        
        /******** Tab Pages ********/
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

        
        /*****************************************/
        function GoToProfile(code)
        {
            setCookie("user_page", code, 1); // a user page that we visit it
            //top.location = "control-panel.php?mnu=1";
            top.location = "includes/profile.php";
        }
        
        /***************************************/
        function SetJam(part)
        {
            switch (part)
            {
                case 'mali1':
                    jam=0;
                    if ( $("#mablagh-mali1-1").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali1-1").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali1-2").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali1-2").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali1-3").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali1-3").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali1-4").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali1-4").val().replace(/,/g, ''));
                    }
                    jam=jam.toString();
                    if ( jam=="NaN" ) { jam="0"; }
                    $('#jam-mali1').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    break;
                case 'mali2':
                    jam=0;
                    if ( $("#mablagh-mali2-1").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali2-1").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali2-2").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali2-2").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali2-3").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali2-3").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali2-4").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali2-4").val().replace(/,/g, ''));
                    }
                    jam=jam.toString();
                    if ( jam=="NaN" ) { jam="0"; }
                    $('#jam-mali2').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    break;
                case 'mali3':
                    jam=0;
                    if ( $("#mablagh-mali3-1").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali3-1").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali3-2").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali3-2").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali3-3").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali3-3").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali3-4").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali3-4").val().replace(/,/g, ''));
                    }
                    jam=jam.toString();
                    if ( jam=="NaN" ) { jam="0"; }
                    $('#jam-mali3').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    break;
                case 'mali4':
                    jam=0;
                    if ( $("#mablagh-mali4-1").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali4-1").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali4-2").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali4-2").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali4-3").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali4-3").val().replace(/,/g, ''));
                    }
                    if ( $("#mablagh-mali4-4").val()!="" )
                    {
                        jam=jam+parseInt($("#mablagh-mali4-4").val().replace(/,/g, ''));
                    }
                    jam=jam.toString();
                    if ( jam=="NaN" ) { jam="0"; }
                    $('#jam-mali4').val(jam.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                    break;
            }
        }
        
        
        function Print_Report()
        {
			var yr = $('#years').find(":selected").text();
			yr=yr.substr(10, 5);
            var search=true;
            var form_data = new FormData();
            form_data.append('code', $("#UserCode").val());
            form_data.append('search', search);
            //form_data.append('year', $("#years").val());
            form_data.append('year', yr);
            form_data.append('what', "rep-form");
            $.ajax({
                url: 'includes/search.php',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(response)
                {
                    if ( response>0 )
                    {
                        str="&code="+$("#UserCode").val();
                        str+="&year="+$("#years").val();
                        var win = window.open("includes/view_form.php?rp=1"+str, '_blank');
                        win.focus();
                    }
                    else
                    {
                        swal(" گزارشی برای سال "+$("#years").val()+" ورود داده نشده است ", {icon: "warning",});
                        return;
                    }
                }
            });
        }              


       /****************************************/
       /****************************************/
       /****************************************/
       /********** Upload Manage Strt **********/
        function ShowFileManage(part,num)
        {
            setCookie("UploadPart",part+num,1);
            switch (part+num)
            {
                case "Mali1_1":
                    var files=eval("files_mali1_1");
                    path="../images/corps/form/";
                    break;
                case "Mali1_2":
                    var files=eval("files_mali1_2");
                    path="../images/corps/form/";
                    break;
                case "Mali1_3":
                    var files=eval("files_mali1_3");
                    path="../images/corps/form/";
                    break;
                case "Mali1_4":
                    var files=eval("files_mali1_4");
                    path="../images/corps/form/";
                    break;
                case "Mali2_1":
                    var files=eval("files_mali2_1");
                    path="../images/corps/form/";
                    break;
                case "Mali2_2":
                    var files=eval("files_mali2_2");
                    path="../images/corps/form/";
                    break;
                case "Mali2_3":
                    var files=eval("files_mali2_3");
                    path="../images/corps/form/";
                    break;
                case "Mali2_4":
                    var files=eval("files_mali2_4");
                    path="../images/corps/form/";
                    break;
                case "Mali3_1":
                    var files=eval("files_mali3_1");
                    path="../images/corps/form/";
                    break;
                case "Mali3_2":
                    var files=eval("files_mali3_2");
                    path="../images/corps/form/";
                    break;
                case "Mali3_3":
                    var files=eval("files_mali3_3");
                    path="../images/corps/form/";
                    break;
                case "Mali3_4":
                    var files=eval("files_mali3_4");
                    path="../images/corps/form/";
                    break;
                case "Mali4_1":
                    var files=eval("files_mali4_1");
                    path="../images/corps/form/";
                    break;
                case "Mali4_2":
                    var files=eval("files_mali4_2");
                    path="../images/corps/form/";
                    break;
                case "Mali4_3":
                    var files=eval("files_mali4_3");
                    path="../images/corps/form/";
                    break;
                case "Mali4_4":
                    var files=eval("files_mali4_4");
                    path="../images/corps/form/";
                    break;
                case "Dast1_1":
                    var files=eval("files_dast1_1");
                    path="../images/corps/form/";
                    break;
                case "Dast1_2":
                    var files=eval("files_dast1_2");
                    path="../images/corps/form/";
                    break;
                case "Dast1_3":
                    var files=eval("files_dast1_3");
                    path="../images/corps/form/";
                    break;
                case "Dast1_4":
                    var files=eval("files_dast1_4");
                    path="../images/corps/form/";
                    break;
                case "Dast2_1":
                    var files=eval("files_dast2_1");
                    path="../images/corps/form/";
                    break;
                case "Dast2_2":
                    var files=eval("files_dast2_2");
                    path="../images/corps/form/";
                    break;
                case "Dast2_3":
                    var files=eval("files_dast2_3");
                    path="../images/corps/form/";
                    break;
                case "Dast2_4":
                    var files=eval("files_dast2_4");
                    path="../images/corps/form/";
                    break;
                case "Dast3_1":
                    var files=eval("files_dast3_1");
                    path="../images/corps/form/";
                    break;
                case "Dast3_2":
                    var files=eval("files_dast3_2");
                    path="../images/corps/form/";
                    break;
                case "Dast3_3":
                    var files=eval("files_dast3_3");
                    path="../images/corps/form/";
                    break;
                case "Dast3_4":
                    var files=eval("files_dast3_4");
                    path="../images/corps/form/";
                    break;
                case "Dast4_1":
                    var files=eval("files_dast4_1");
                    path="../images/corps/form/";
                    break;
                case "Dast4_2":
                    var files=eval("files_dast4_2");
                    path="../images/corps/form/";
                    break;
                case "Dast4_3":
                    var files=eval("files_dast4_3");
                    path="../images/corps/form/";
                    break;
                case "Dast4_4":
                    var files=eval("files_dast4_4");
                    path="../images/corps/form/";
                    break;
                case "Dast5_1":
                    var files=eval("files_dast5_1");
                    path="../images/corps/form/";
                    break;
                case "Dast5_2":
                    var files=eval("files_dast5_2");
                    path="../images/corps/form/";
                    break;
                case "Dast5_3":
                    var files=eval("files_dast5_3");
                    path="../images/corps/form/";
                    break;
                case "Dast5_4":
                    var files=eval("files_dast5_4");
                    path="../images/corps/form/";
                    break;
                case "Dast6_1":
                    var files=eval("files_dast6_1");
                    path="../images/corps/form/";
                    break;
                case "Dast6_2":
                    var files=eval("files_dast6_2");
                    path="../images/corps/form/";
                    break;
                case "Dast6_3":
                    var files=eval("files_dast6_3");
                    path="../images/corps/form/";
                    break;
                case "Dast6_4":
                    var files=eval("files_dast6_4");
                    path="../images/corps/form/";
                    break;
                case "Niroo":
                    var files=eval("files_niroo");
                    path="../images/corps/form/";
                    break;
                case "Bazar1_1":
                    var files=eval("files_bazar1_1");
                    path="../images/corps/form/";
                    break;
                case "Bazar1_2":
                    var files=eval("files_bazar1_2");
                    path="../images/corps/form/";
                    break;
                case "Bazar1_3":
                    var files=eval("files_bazar1_3");
                    path="../images/corps/form/";
                    break;
                case "Bazar1_4":
                    var files=eval("files_bazar1_4");
                    path="../images/corps/form/";
                    break;
                case "Bazar2":
                    var files=eval("files_bazar2");
                    path="../images/corps/form/";
                    break;
                case "Bazar3_1":
                    var files=eval("files_bazar3_1");
                    path="../images/corps/form/";
                    break;
                case "Bazar3_2":
                    var files=eval("files_bazar3_2");
                    path="../images/corps/form/";
                    break;
                case "Bazar3_3":
                    var files=eval("files_bazar3_3");
                    path="../images/corps/form/";
                    break;
                case "Bazar3_4":
                    var files=eval("files_bazar3_4");
                    path="../images/corps/form/";
                    break;
                case "Bazar4_1":
                    var files=eval("files_bazar4_1");
                    path="../images/corps/form/";
                    break;
                case "Bazar4_2":
                    var files=eval("files_bazar4_2");
                    path="../images/corps/form/";
                    break;
                case "Bazar4_3":
                    var files=eval("files_bazar4_3");
                    path="../images/corps/form/";
                    break;
                case "Bazar4_4":
                    var files=eval("files_bazar4_4");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi1_1":
                    var files=eval("files_amoozeshi1_1");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi1_2":
                    var files=eval("files_amoozeshi1_2");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi1_3":
                    var files=eval("files_amoozeshi1_3");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi1_4":
                    var files=eval("files_amoozeshi1_4");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi2_1":
                    var files=eval("files_amoozeshi2_1");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi2_2":
                    var files=eval("files_amoozeshi2_2");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi2_3":
                    var files=eval("files_amoozeshi2_3");
                    path="../images/corps/form/";
                    break;
                case "Amoozeshi2_4":
                    var files=eval("files_amoozeshi2_4");
                    path="../images/corps/form/";
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
             form_data.append('path', "../images/corps/form/");
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
                        case "Mali1_1":
                            var files=eval("files_mali1_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_2":
                            var files=eval("files_mali1_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_3":
                            var files=eval("files_mali1_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_4":
                            var files=eval("files_mali1_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_1":
                            var files=eval("files_mali2_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_2":
                            var files=eval("files_mali2_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_3":
                            var files=eval("files_mali2_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_4":
                            var files=eval("files_mali2_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_1":
                            var files=eval("files_mali3_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_2":
                            var files=eval("files_mali3_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_3":
                            var files=eval("files_mali3_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_4":
                            var files=eval("files_mali3_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_1":
                            var files=eval("files_mali4_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_2":
                            var files=eval("files_mali4_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_3":
                            var files=eval("files_mali4_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_4":
                            var files=eval("files_mali4_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_1":
                            var files=eval("files_dast1_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_2":
                            var files=eval("files_dast1_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_3":
                            var files=eval("files_dast1_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_4":
                            var files=eval("files_dast1_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_1":
                            var files=eval("files_dast2_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_2":
                            var files=eval("files_dast2_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_3":
                            var files=eval("files_dast2_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_4":
                            var files=eval("files_dast2_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_1":
                            var files=eval("files_dast3_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_2":
                            var files=eval("files_dast3_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_3":
                            var files=eval("files_dast3_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_4":
                            var files=eval("files_dast3_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_1":
                            var files=eval("files_dast4_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_2":
                            var files=eval("files_dast4_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_3":
                            var files=eval("files_dast4_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_4":
                            var files=eval("files_dast4_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_1":
                            var files=eval("files_dast5_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_2":
                            var files=eval("files_dast5_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_3":
                            var files=eval("files_dast5_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_4":
                            var files=eval("files_dast5_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_1":
                            var files=eval("files_dast6_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_2":
                            var files=eval("files_dast6_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_3":
                            var files=eval("files_dast6_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_4":
                            var files=eval("files_dast6_4");
                            path="../images/corps/form/";
                            break;
                        case "Niroo":
                            var files=eval("files_niroo");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_1":
                            var files=eval("files_bazar1_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_2":
                            var files=eval("files_bazar1_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_3":
                            var files=eval("files_bazar1_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_4":
                            var files=eval("files_bazar1_4");
                            path="../images/corps/form/";
                            break;
                        case "Bazar2":
                            var files=eval("files_bazar2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_1":
                            var files=eval("files_bazar3_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_2":
                            var files=eval("files_bazar3_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_3":
                            var files=eval("files_bazar3_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_4":
                            var files=eval("files_bazar3_4");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_1":
                            var files=eval("files_bazar4_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_2":
                            var files=eval("files_bazar4_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_3":
                            var files=eval("files_bazar4_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_4":
                            var files=eval("files_bazar4_4");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_1":
                            var files=eval("files_amoozeshi1_1");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_2":
                            var files=eval("files_amoozeshi1_2");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_3":
                            var files=eval("files_amoozeshi1_3");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_4":
                            var files=eval("files_amoozeshi1_4");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_1":
                            var files=eval("files_amoozeshi2_1");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_2":
                            var files=eval("files_amoozeshi2_2");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_3":
                            var files=eval("files_amoozeshi2_3");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_4":
                            var files=eval("files_amoozeshi2_4");
                            path="../images/corps/form/";
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
                        case "Mali1_1":
                            var files=eval("files_mali1_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_2":
                            var files=eval("files_mali1_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_3":
                            var files=eval("files_mali1_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali1_4":
                            var files=eval("files_mali1_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_1":
                            var files=eval("files_mali2_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_2":
                            var files=eval("files_mali2_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_3":
                            var files=eval("files_mali2_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali2_4":
                            var files=eval("files_mali2_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_1":
                            var files=eval("files_mali3_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_2":
                            var files=eval("files_mali3_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_3":
                            var files=eval("files_mali3_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali3_4":
                            var files=eval("files_mali3_4");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_1":
                            var files=eval("files_mali4_1");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_2":
                            var files=eval("files_mali4_2");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_3":
                            var files=eval("files_mali4_3");
                            path="../images/corps/form/";
                            break;
                        case "Mali4_4":
                            var files=eval("files_mali4_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_1":
                            var files=eval("files_dast1_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_2":
                            var files=eval("files_dast1_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_3":
                            var files=eval("files_dast1_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast1_4":
                            var files=eval("files_dast1_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_1":
                            var files=eval("files_dast2_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_2":
                            var files=eval("files_dast2_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_3":
                            var files=eval("files_dast2_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast2_4":
                            var files=eval("files_dast2_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_1":
                            var files=eval("files_dast3_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_2":
                            var files=eval("files_dast3_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_3":
                            var files=eval("files_dast3_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast3_4":
                            var files=eval("files_dast3_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_1":
                            var files=eval("files_dast4_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_2":
                            var files=eval("files_dast4_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_3":
                            var files=eval("files_dast4_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast4_4":
                            var files=eval("files_dast4_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_1":
                            var files=eval("files_dast5_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_2":
                            var files=eval("files_dast5_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_3":
                            var files=eval("files_dast5_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast5_4":
                            var files=eval("files_dast5_4");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_1":
                            var files=eval("files_dast6_1");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_2":
                            var files=eval("files_dast6_2");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_3":
                            var files=eval("files_dast6_3");
                            path="../images/corps/form/";
                            break;
                        case "Dast6_4":
                            var files=eval("files_dast6_4");
                            path="../images/corps/form/";
                            break;
                        case "Niroo":
                            var files=eval("files_niroo");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_1":
                            var files=eval("files_bazar1_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_2":
                            var files=eval("files_bazar1_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_3":
                            var files=eval("files_bazar1_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar1_4":
                            var files=eval("files_bazar1_4");
                            path="../images/corps/form/";
                            break;
                        case "Bazar2":
                            var files=eval("files_bazar2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_1":
                            var files=eval("files_bazar3_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_2":
                            var files=eval("files_bazar3_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_3":
                            var files=eval("files_bazar3_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar3_4":
                            var files=eval("files_bazar3_4");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_1":
                            var files=eval("files_bazar4_1");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_2":
                            var files=eval("files_bazar4_2");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_3":
                            var files=eval("files_bazar4_3");
                            path="../images/corps/form/";
                            break;
                        case "Bazar4_4":
                            var files=eval("files_bazar4_4");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_1":
                            var files=eval("files_amoozeshi1_1");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_2":
                            var files=eval("files_amoozeshi1_2");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_3":
                            var files=eval("files_amoozeshi1_3");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi1_4":
                            var files=eval("files_amoozeshi1_4");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_1":
                            var files=eval("files_amoozeshi2_1");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_2":
                            var files=eval("files_amoozeshi2_2");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_3":
                            var files=eval("files_amoozeshi2_3");
                            path="../images/corps/form/";
                            break;
                        case "Amoozeshi2_4":
                            var files=eval("files_amoozeshi2_4");
                            path="../images/corps/form/";
                            break;
                    }
                    
                 var del=true;
                 var form_data = new FormData();                  
                 form_data.append('file', files[index].name);
                 form_data.append('path', "../images/corps/form/");
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
               } 
             });
        }
        

        function exit_new_form()
        {
            for (var k=1;k<=62;k++)
            {
                switch (k)
                {
                    case 1:
                        var files=eval("files_mali1_1");
                        break;
                    case 2:
                        var files=eval("files_mali1_2");
                        break;
                    case 3:
                        var files=eval("files_mali1_3");
                        break;
                    case 4:
                        var files=eval("files_mali1_4");
                        break;
                    case 5:
                        var files=eval("files_mali2_1");
                        break;
                    case 6:
                        var files=eval("files_mali2_2");
                        break;
                    case 7:
                        var files=eval("files_mali2_3");
                        break;
                    case 8:
                        var files=eval("files_mali2_4");
                        break;
                    case 9:
                        var files=eval("files_mali3_1");
                        break;
                    case 10:
                        var files=eval("files_mali3_2");
                        break;
                    case 11:
                        var files=eval("files_mali3_3");
                        break;
                    case 12:
                        var files=eval("files_mali3_4");
                        break;
                    case 13:
                        var files=eval("files_mali4_1");
                        break;
                    case 14:
                        var files=eval("files_mali4_2");
                        break;
                    case 15:
                        var files=eval("files_mali4_3");
                        break;
                    case 16:
                        var files=eval("files_mali4_4");
                        break;
                    case 17:
                        var files=eval("files_niroo");
                        break;
                    case 18:
                        var files=eval("files_bazar1_1");
                        break;
                    case 19:
                        var files=eval("files_bazar1_2");
                        break;
                    case 20:
                        var files=eval("files_bazar1_3");
                        break;
                    case 21:
                        var files=eval("files_bazar1_4");
                        break;
                    case 22:
                        var files=eval("files_bazar2");
                        break;
                    case 23:
                        var files=eval("files_bazar3_1");
                        break;
                    case 24:
                        var files=eval("files_bazar3_2");
                        break;
                    case 25:
                        var files=eval("files_bazar3_3");
                        break;
                    case 26:
                        var files=eval("files_bazar3_4");
                        break;
                    case 27:
                        var files=eval("files_bazar4_1");
                        break;
                    case 28:
                        var files=eval("files_bazar4_2");
                        break;
                    case 29:
                        var files=eval("files_bazar4_3");
                        break;
                    case 30:
                        var files=eval("files_bazar4_4");
                        break;
                    case 31:
                        var files=eval("files_amoozeshi1_1");
                        break;
                    case 32:
                        var files=eval("files_amoozeshi1_2");
                        break;
                    case 33:
                        var files=eval("files_amoozeshi1_3");
                        break;
                    case 34:
                        var files=eval("files_amoozeshi1_4");
                        break;
                    case 35:
                        var files=eval("files_amoozeshi2_1");
                        break;
                    case 36:
                        var files=eval("files_amoozeshi2_2");
                        break;
                    case 37:
                        var files=eval("files_amoozeshi2_3");
                        break;
                    case 38:
                        var files=eval("files_amoozeshi2_4");
                        break;
                    case 39:
                        var files=eval("files_dast1_1");
                        break;
                    case 40:
                        var files=eval("files_dast1_2");
                        break;
                    case 41:
                        var files=eval("files_dast1_3");
                        break;
                    case 42:
                        var files=eval("files_dast1_4");
                        break;
                    case 43:
                        var files=eval("files_dast2_1");
                        break;
                    case 44:
                        var files=eval("files_dast2_2");
                        break;
                    case 45:
                        var files=eval("files_dast2_3");
                        break;
                    case 46:
                        var files=eval("files_dast2_4");
                        break;
                    case 47:
                        var files=eval("files_dast3_1");
                        break;
                    case 48:
                        var files=eval("files_dast3_2");
                        break;
                    case 49:
                        var files=eval("files_dast3_3");
                        break;
                    case 50:
                        var files=eval("files_dast3_4");
                        break;
                    case 51:
                        var files=eval("files_dast4_1");
                        break;
                    case 52:
                        var files=eval("files_dast4_2");
                        break;
                    case 53:
                        var files=eval("files_dast4_3");
                        break;
                    case 54:
                        var files=eval("files_dast4_4");
                        break;
                    case 55:
                        var files=eval("files_dast5_1");
                        break;
                    case 56:
                        var files=eval("files_dast5_2");
                        break;
                    case 57:
                        var files=eval("files_dast5_3");
                        break;
                    case 58:
                        var files=eval("files_dast5_4");
                        break;
                    case 59:
                        var files=eval("files_dast6_1");
                        break;
                    case 60:
                        var files=eval("files_dast6_2");
                        break;
                    case 61:
                        var files=eval("files_dast6_3");
                        break;
                    case 62:
                        var files=eval("files_dast6_4");
                        break;

                }
                for (var i=0;i<files.length;i++)
                {
                    if ( files[i].location=="HARD" )
                    {
                         var del=true;
                         var form_data = new FormData();                  
                         form_data.append('file', files[i].name);
                         form_data.append('path', "../images/corps/form/");
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
                /*for (var i=0;i<files.length;i++)
                {
                    if ( files[i].location=="HARD" )
                    {
                         files.splice(i, 1);
                    }
                }*/
             }
             var tableHeaderRowCount = 0;
             var table = document.getElementById('ManageTable');
             var rowCount = table.rows.length;
             for (var i = tableHeaderRowCount; i < rowCount; i++) 
             {
                 table.deleteRow(tableHeaderRowCount);
             }
             hide_window('FormEmtiaz');
        }

        function ShowFile(file_name)
        {
             var win = window.open("includes/show_file.php?file="+file_name, '_blank');
             win.focus();
        }
        
        function CloseFileManager()
        {
            switch (getCookie("UploadPart"))
            {
                case "Mali1_1":
                    $("#file-upload1").html("[فایل ها]"+"["+files_mali1_1.length+"]")
                    break;
                case "Mali1_2":
                    $("#file-upload2").html("[فایل ها]"+"["+files_mali1_2.length+"]")
                    break;
                case "Mali1_3":
                    $("#file-upload3").html("[فایل ها]"+"["+files_mali1_3.length+"]")
                    break;
                case "Mali1_4":
                    $("#file-upload4").html("[فایل ها]"+"["+files_mali1_4.length+"]")
                    break;
                case "Mali2_1":
                    $("#file-upload5").html("[فایل ها]"+"["+files_mali2_1.length+"]")
                    break;
                case "Mali2_2":
                    $("#file-upload6").html("[فایل ها]"+"["+files_mali2_2.length+"]")
                    break;
                case "Mali2_3":
                    $("#file-upload7").html("[فایل ها]"+"["+files_mali2_3.length+"]")
                    break;
                case "Mali2_4":
                    $("#file-upload8").html("[فایل ها]"+"["+files_mali2_4.length+"]")
                    break;
                case "Mali3_1":
                    $("#file-upload9").html("[فایل ها]"+"["+files_mali3_1.length+"]")
                    break;
                case "Mali3_2":
                    $("#file-upload10").html("[فایل ها]"+"["+files_mali3_2.length+"]")
                    break;
                case "Mali3_3":
                    $("#file-upload11").html("[فایل ها]"+"["+files_mali3_3.length+"]")
                    break;
                case "Mali3_4":
                    $("#file-upload12").html("[فایل ها]"+"["+files_mali3_4.length+"]")
                    break;
                case "Mali4_1":
                    $("#file-upload13").html("[فایل ها]"+"["+files_mali4_1.length+"]")
                    break;
                case "Mali4_2":
                    $("#file-upload14").html("[فایل ها]"+"["+files_mali4_2.length+"]")
                    break;
                case "Mali4_3":
                    $("#file-upload15").html("[فایل ها]"+"["+files_mali4_3.length+"]")
                    break;
                case "Mali4_4":
                    $("#file-upload16").html("[فایل ها]"+"["+files_mali4_4.length+"]")
                    break;
                case "Dast1_1":
                    $("#file-upload17").html("[فایل ها]"+"["+files_dast1_1.length+"]")
                    break;
                case "Dast1_2":
                    $("#file-upload18").html("[فایل ها]"+"["+files_dast1_2.length+"]")
                    break;
                case "Dast1_3":
                    $("#file-upload19").html("[فایل ها]"+"["+files_dast1_3.length+"]")
                    break;
                case "Dast1_4":
                    $("#file-upload20").html("[فایل ها]"+"["+files_dast1_4.length+"]")
                    break;
                case "Dast2_1":
                    $("#file-upload21").html("[فایل ها]"+"["+files_dast2_1.length+"]")
                    break;
                case "Dast2_2":
                    $("#file-upload22").html("[فایل ها]"+"["+files_dast2_2.length+"]")
                    break;
                case "Dast2_3":
                    $("#file-upload23").html("[فایل ها]"+"["+files_dast2_3.length+"]")
                    break;
                case "Dast2_4":
                    $("#file-upload24").html("[فایل ها]"+"["+files_dast2_4.length+"]")
                    break;
                case "Dast3_1":
                    $("#file-upload25").html("[فایل ها]"+"["+files_dast3_1.length+"]")
                    break;
                case "Dast3_2":
                    $("#file-upload26").html("[فایل ها]"+"["+files_dast3_2.length+"]")
                    break;
                case "Dast3_3":
                    $("#file-upload27").html("[فایل ها]"+"["+files_dast3_3.length+"]")
                    break;
                case "Dast3_4":
                    $("#file-upload28").html("[فایل ها]"+"["+files_dast3_4.length+"]")
                    break;
                case "Dast4_1":
                    $("#file-upload29").html("[فایل ها]"+"["+files_dast4_1.length+"]")
                    break;
                case "Dast4_2":
                    $("#file-upload30").html("[فایل ها]"+"["+files_dast4_2.length+"]")
                    break;
                case "Dast4_3":
                    $("#file-upload31").html("[فایل ها]"+"["+files_dast4_3.length+"]")
                    break;
                case "Dast4_4":
                    $("#file-upload32").html("[فایل ها]"+"["+files_dast4_4.length+"]")
                    break;
                case "Dast5_1":
                    $("#file-upload33").html("[فایل ها]"+"["+files_dast5_1.length+"]")
                    break;
                case "Dast5_2":
                    $("#file-upload34").html("[فایل ها]"+"["+files_dast5_2.length+"]")
                    break;
                case "Dast5_3":
                    $("#file-upload35").html("[فایل ها]"+"["+files_dast5_3.length+"]")
                    break;
                case "Dast5_4":
                    $("#file-upload36").html("[فایل ها]"+"["+files_dast5_4.length+"]")
                    break;
                case "Dast6_1":
                    $("#file-upload37").html("[فایل ها]"+"["+files_dast6_1.length+"]")
                    break;
                case "Dast6_2":
                    $("#file-upload38").html("[فایل ها]"+"["+files_dast6_2.length+"]")
                    break;
                case "Dast6_3":
                    $("#file-upload39").html("[فایل ها]"+"["+files_dast6_3.length+"]")
                    break;
                case "Dast6_4":
                    $("#file-upload40").html("[فایل ها]"+"["+files_dast6_4.length+"]")
                    break;
                case "Niroo":
                    $("#file-upload41").html("آپلود مستندات نیروی انسانی"+" ["+files_niroo.length+"]")
                    break;
                case "Bazar1_1":
                    $("#file-upload42").html("[فایل ها]"+"["+files_bazar1_1.length+"]")
                    break;
                case "Bazar1_2":
                    $("#file-upload43").html("[فایل ها]"+"["+files_bazar1_2.length+"]")
                    break;
                case "Bazar1_3":
                    $("#file-upload44").html("[فایل ها]"+"["+files_bazar1_3.length+"]")
                    break;
                case "Bazar1_4":
                    $("#file-upload45").html("[فایل ها]"+"["+files_bazar1_4.length+"]")
                    break;
                case "Bazar2":
                    $("#file-upload46").html("[فایل ها]"+"["+files_bazar2.length+"]")
                    break;
                case "Bazar3_1":
                    $("#file-upload47").html("[فایل ها]"+"["+files_bazar3_1.length+"]")
                    break;
                case "Bazar3_2":
                    $("#file-upload48").html("[فایل ها]"+"["+files_bazar3_2.length+"]")
                    break;
                case "Bazar3_3":
                    $("#file-upload49").html("[فایل ها]"+"["+files_bazar3_3.length+"]")
                    break;
                case "Bazar3_4":
                    $("#file-upload50").html("[فایل ها]"+"["+files_bazar3_4.length+"]")
                    break;
                case "Bazar4_1":
                    $("#file-upload51").html("[فایل ها]"+"["+files_bazar4_1.length+"]")
                    break;
                case "Bazar4_2":
                    $("#file-upload52").html("[فایل ها]"+"["+files_bazar4_2.length+"]")
                    break;
                case "Bazar4_3":
                    $("#file-upload53").html("[فایل ها]"+"["+files_bazar4_3.length+"]")
                    break;
                case "Bazar4_4":
                    $("#file-upload54").html("[فایل ها]"+"["+files_bazar4_4.length+"]")
                    break;
                case "Amoozeshi1_1":
                    $("#file-upload55").html("[فایل ها]"+"["+files_amoozeshi1_1.length+"]")
                    break;
                case "Amoozeshi1_2":
                    $("#file-upload56").html("[فایل ها]"+"["+files_amoozeshi1_2.length+"]")
                    break;
                case "Amoozeshi1_3":
                    $("#file-upload57").html("[فایل ها]"+"["+files_amoozeshi1_3.length+"]")
                    break;
                case "Amoozeshi1_4":
                    $("#file-upload58").html("[فایل ها]"+"["+files_amoozeshi1_4.length+"]")
                    break;
                case "Amoozeshi2_1":
                    $("#file-upload59").html("[فایل ها]"+"["+files_amoozeshi2_1.length+"]")
                    break;
                case "Amoozeshi2_2":
                    $("#file-upload60").html("[فایل ها]"+"["+files_amoozeshi2_2.length+"]")
                    break;
                case "Amoozeshi2_3":
                    $("#file-upload61").html("[فایل ها]"+"["+files_amoozeshi2_3.length+"]")
                    break;
                case "Amoozeshi2_4":
                    $("#file-upload62").html("[فایل ها]"+"["+files_amoozeshi2_4.length+"]")
                    break;
            }
          document.getElementById('FileManager').style.display = "none";
        }        


       /*********** Upload Manage End **************/
       /********************************************/
       /********************************************/
       /********************************************/

        function SearchTableItem() 
        {
          // Declare variables
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("SearchTable");
          filter = input.value.toUpperCase();
          //table = document.getElementById("data33");
          table=document.getElementById("data33");
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
            $(".area3").load("includes/corp-form-list.php");
        }

        function ChangeCenterFilter()
        {
            setCookie("filter1",$("#all_states").val(),1);
            setCookie("filter2",$("#all_centers").val(),1);
            $(".area3").load("includes/corp-form-list.php");
        }


        /*window.onerror = function(msg, url, linenumber) 
        {
            alert('Error message: '+msg+'\nURL: '+url+'\nLine Number: '+linenumber);
            return true;
        }*/

        
    </script>
</body>
</html>


