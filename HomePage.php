<?php 
class HomePage{
	

public $_css ="member.css";
//css 用來存外部css檔案的位置


public $_header="五子棋";
//realheader 是用來存放標題

//Menu 用來設定目錄內容，下面為預設值，可用setMenu函數更改。
public $_Menu;
private $arrofaddr=array("首頁"=>"main.php","註冊"=>"register.php","雙人遊戲"=>"game.php","排行榜"=>"level.php","登出"=>"logout.php");
public $_content;
//content 是用來存放作業內容的位置
public function setMenuD()
{
	
	//此函數用來設定作業目錄內容
	foreach ( $this->arrofaddr as $key => $value)
	{
		
	$this->_Menu .=<<<EOF
     <div id="link"><a href="
EOF;
	$this->_Menu .=$value;
	$this->_Menu .=<<<EOF
	 " target="_self"><font size="5">
EOF;
	 $this->_Menu .=$key;
     $this->_Menu .=<<<EOF
	 <br></font></a></div>
EOF;

	}
	
}
public function setMenu($x)
{
	
	$this->arrofaddr = $x;
	$this->_Menu="";
	//此函數用來設定作業目錄內容
	foreach ( $this->arrofaddr as $key => $value)
	{
		
	$this->_Menu .=<<<EOF
     <div id="link"><a href="
EOF;
	$this->_Menu .=$value;
	$this->_Menu .=<<<EOF
	 " target="_self"><font size="5">
EOF;
	 $this->_Menu .=$key;
     $this->_Menu .=<<<EOF
	 <br></font></a></div>
EOF;

	}
	
}

public function setContent($x)
{
	$this->_content = $x;
	//此函數用來設定作業內容
}
public function setSubject($x)
{
	$this->_header = $x;
	//此函數用來設定標題
}
public function setCSSFile($x)
{
	$this->_css = $x;
	//此函數用來設定樣式表
}
public function setJSFile($x)
{
	$this->_js= $x;
	//此函數用來設定樣式表
}
public function display()
{
	
	echo <<<EOF
<!DOCTYPE html>  
<html>
<meta charset="utf-8">
<head>
<title> $this->_header </title>
<link href= $this->_css  rel="stylesheet" type="text/css" />
<script src="member.js"></script>
</head>
<body>
<div id="sidebar">
$this->_Menu
</div>
<div id="content">
$this->_content
</div>
</body>

EOF;
	//此函式用來輸出最後要呈現的
}
}
 ?>

 
 
 