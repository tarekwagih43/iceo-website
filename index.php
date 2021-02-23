<?php 
$page = "home";
include('Connections/config.php');
include('temp/getdata.php');
include('temp/head.php');
include('temp/header.php');
include('temp/slider.php');
include("page/$page.php");
include('temp/footer.php');
include('temp/js.php');
?>