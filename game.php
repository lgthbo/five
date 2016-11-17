<?php
require_once "HomePage.php";
$page = new HomePage();
    $username1="";
	$username2="";
	$login=false;
	session_start();
	if($_SESSION["islog"]==true)
	{$login=true;
	$username1=$_SESSION["user1"];
	$username2=$_SESSION["user2"];
	}
	
$content=<<<EOF
<title>遊戲開始~~</title>
<link href="game.css" rel="stylesheet" type="text/css">
</head>

<h1 id="para" style=" color:blue; font-family: '標楷體', Helvetica, sans-serif; font-size:60px; float:clear; text-align:center;">     ＝＝＝五子棋＝＝＝ </h1>
<div id="container"></div>
<br><br>
<div id="answer"></div>
<script type="text/javascript" src="game0.js"></script>
<div id="btn">
<button type="button" id="again" onclick="init()">再來一局 </button>
EOF;


if($login==true){
$content.=<<<EOF
<button type="button" id="again" onclick="iflogin('$login','$username1','$username2')">排名對戰 </button>
EOF;
		$db = new mysqli('localhost', 'root', 'gj94ek', 'db0010766');
       if ($db->connect_errno) {                                                      //連結SQL伺服器
       echo 'Error [' . $db->connect_errno . '] ' . $db->connect_error;
       exit;}
	  $qs = "UPDATE score SET Score=Score+10";
      $qs.=" WHERE Name='$username1'";
	  $rs = $db->query($qs);

}
$content.=<<<EOF

EOF;
$page->setContent($content);
$page->setMenuD();
$page->display();
?>