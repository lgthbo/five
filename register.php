<?php
// 初始變數值
require_once "HomePage.php";
$page = new HomePage();
$showform = true;  // true顯示表單
$error = "";
$msg = "";
$name = "";
$account = "";
$pass1="";
$pass2="";
$email="";
$gender="";
session_start();

// 檢查是否是表單送回
if ( isset($_POST["register"]) ) { // 取得表單欄位值
    $name = $_POST["name"];
    $account = $_POST["account"];
	$pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $email = $_POST["email"];
	//$gender = $_POST["gender"];
	 // 檢查帳號欄位是否有輸入資料
    if  (empty($account)) {
         // 欄位沒填
         $error = "帳號欄位空白<br>";
    }
	if ($pass1 != "" && $pass2 != "") {
        if ($pass1 != $pass2) { // 檢查兩次密碼是否相同
             $error = $error . "密碼輸入不相同<br>";
        }
	} else {
            $error = $error . "密碼欄位空白<br>";	
	}
	if (empty($error)) { 
        // 表單處理後顯示結果
        $showform = false;
        $msg = "恭喜註冊成功<br>";
        $msg .= "";
        $msg .= "";
		
		$db = new mysqli('localhost', 'root', 'gj94ek', 'db0010766');
       if ($db->connect_errno) {                                                      //連結SQL伺服器
       echo 'Error [' . $db->connect_errno . '] ' . $db->connect_error;
       exit;}
	$qs = "INSERT INTO Member (Username,Password,email,veritfy) VALUES ('$account','$pass1','$email',1);";
	$rs = $db->query($qs);
	$qs = "INSERT INTO score(Name, Score) VALUES ('$account', '0');";
	$rs = $db->query($qs);
		
		
 	/*	switch (strtoupper($gender)) {
		case "M":
				$msg = $msg . "使用者姓別-男<br>"; break;
		case "F":
				$msg = $msg . "使用者姓別-女<br>"; break;
		} */
   }
}

$msg.=<<<EOF
<div id="F1">
<form id="form1" name="form1" method="post" action=  "register.php">
  <fieldset>
  <legend><span class="label">個人帳號註冊</span></legend>
  <p><span class="label">帳號：<input type="text" name="account" size="20" value= '$account'  ></span></p>
  <p><span class="label">姓名：<input type="text" name="name" size="20" value='$name' ></span></p>
  <p><span class="label">密碼：<input type="password" name="pass1" size="20" value=  '$pass1'  ></span></p>
  <p><span class="label">再輸入一次密碼：<input type="password" name="pass2" size="20" value= '$pass2' ></span></p>
  <p><span class="label">電子郵件地址: <input type="text" name="email" size="30" maxlength="40" value='$email'  ></span></p>        
  </fieldset>
  <p><input type="submit" value="資料送出" name="register">&nbsp;&nbsp;&nbsp;
     <input type="reset" value="重新填寫" name="clean"></p>
</form>
</div>
EOF;
 if ( $showform ) { // 顯示網頁表單
$page->setContent($msg);
$page->setMenuD();
$page->display();
if (!empty($error)) { echo "<h2>",$error,"</h2>"; }

} 
else{
   $page->setContent($msg);
$page->setMenuD();
$page->display(); }// 顯示表單處理結果
?>
