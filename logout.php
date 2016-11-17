<?php
require_once "HomePage.php";
$page = new HomePage();
session_start();
$content="<p>Logout Successed¡C</p>";
$_SESSION["islog"]=false;
$page->setContent($content);
$page->setMenuD();
$page->display();
?>