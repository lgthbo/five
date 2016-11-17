<?php
// 初始變數值
$showform = true;  // true顯示表單
require_once "HomePage.php";
$page = new HomePage();
$error = "";
$content = "";
$name = "";
$account = "帳號未輸入";
$passR="";
$pass1="";
$pass2="";
$email="";
$gender="";
$n=1;
session_start();

        // 表單處理, 顯示欄位輸入的資料
        $showform = false;
		$db = new mysqli('localhost', 'root', 'gj94ek', 'db0010766');
       if ($db->connect_errno) {                                                      //連結SQL伺服器
       echo 'Error [' . $db->connect_errno . '] ' . $db->connect_error;
       exit;}
	  $qs = "SELECT SQL_CALC_FOUND_ROWS Name,Score FROM score ORDER BY Score DESC";
	  $rs = $db->query($qs);

	   $rsl=$db->query("select found_rows()");
	   $content.="<div id=\"big\">";
	   $content.="<table>";
	     $content.="<tr>"; 
		 $content.="<td>名次</td>";
		 $content.="<td>帳號</td>";
		 $content.="<td>分數</td>";     //表格的各項標題
		 $content.="</tr>";
	 
	  while($row = $rs->fetch_object())
	   {
		 $content.="<tr>"; 
		 $content.="<td>".$n."</td>";
		 $content.="<td>".$row->Name."</td>";
		 $content.="<td>".$row->Score."</td>";
		 $content.="</tr>";
		 $n=$n+1;
	   }
	   $content.="</table>";
	   $content.="</div>";

   $page->setContent($content);
$page->setMenuD();
$page->display(); // 顯示表單處理結果
?>
