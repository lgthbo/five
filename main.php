<?php
require_once "HomePage.php";
$page = new HomePage();
$username1 = "";
$password1 = "";
$username2 = "";
$password2 = "";
session_start();

if ( isset($_POST["register"]) )
{
$username1 = $_POST["username1"];
$password1 = $_POST["password1"];
$username2 = $_POST["username2"];
$password2 = $_POST["password2"];
}
$content="";

function check($u,$p)
{
	//$db=User::getInstance();
			
	  $db = new mysqli('localhost', 'root', 'gj94ek', 'db0010766');
       if ($db->connect_errno) {                                                      //連結SQL伺服器
       echo 'Error [' . $db->connect_errno . '] ' . $db->connect_error;
       exit;}
	$qs = "select * from member where Username = '$u'and Password = '$p'";
	$rs = $db->query($qs);
	if($rs->num_rows>0)
          return true;
    else return false;
}

if($_SESSION["islog"]==true)
{
	$username1=$_SESSION["user1"];
	$username2=$_SESSION["user2"];
	$content.='登入成功,歡迎' .$_SESSION["user1"]."以及".$_SESSION["user2"] ;
}
else if(check ($username1,$password1)   && check ($username2,$password2) )
{
	
	$_SESSION["islog"]=true;
	$_SESSION["user1"]=$username1;
	$_SESSION["user2"]=$username2;
	$content.='登入成功,歡迎' .$_SESSION["user1"]."以及".$_SESSION["user2"] ;
}
else
{
	$_SESSION["islog"]=false;
	$content.="<div>登入失敗或尚未登入</div>";
	
}
$content.=<<<EOF

<div id="F1">
  <fieldset>
<form id="form1" name="form1" method="post" action="login.php">
  <legend><span class="label">玩者一</span></legend>
<p><span class="label">帳號：<input type="text" name="username1" value='$username1' ></span></p>
 <p><span class="label">密碼：<input type="password" name="password1"value= $password1 ></span></p>.
  <legend><span class="label">玩者二</span></legend>
<p><span class="label">帳號：<input type="text" name="username2"  value='$username2' ></span></p>
 <p><span class="label">密碼：<input type="password" name="password2" value= $password2 ></span></p>.
 </fieldset>
   <p><input type="submit" value="資料送出" name="register">&nbsp;&nbsp;&nbsp;
     <input type="reset" value="重新填寫" name="clean"></p>
<form>
</div>

EOF;

$page->setContent($content);
$page->setMenuD();
$page->display();
?>
