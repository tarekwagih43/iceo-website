<?php 
$page = $_GET['view'];
include('Connections/config.php');
include('temp/head.php');
include('temp/getdata.php');
include('temp/header.php');
include('temp/sliderpage.php');
include("page/$page.php");
include('temp/footer.php');
include('temp/js.php');
?>