<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
	
$fily = '';
if ($_FILES["CV"]["error"] == 0)
{
$target_path = @$target_path . basename( $_FILES['CV']['name']);
$temp = explode(".", $_FILES['CV']["name"]);
$newfilename = round(microtime(true)) . '8.' . end($temp);
move_uploaded_file($_FILES['CV']['tmp_name'], "../files/images/cv/". $newfilename);
$fily = "files/images/cv/". $newfilename;
}

	
  $insertSQL = sprintf("INSERT INTO applyjob (FirstName, LastName, Email, Phone, CV, `Date`, JobID, IP) VALUES (%s, %s, %s, %s, '$fily', %s, %s, %s)",
                       GetSQLValueString($_POST['FirstName'], "text"),
                       GetSQLValueString($_POST['LastName'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Date'], "text"),
                       GetSQLValueString($_POST['JobID'], "text"),
                       GetSQLValueString($_POST['IP'], "text"));

  mysql_select_db($database_config, $config);
  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());

  $insertGoTo = "applyjob.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_config, $config);
$query_jobs = "SELECT * FROM jobs";
$jobs = mysql_query($query_jobs, $config) or die(mysql_error());
$row_jobs = mysql_fetch_assoc($jobs);
$totalRows_jobs = mysql_num_rows($jobs);
?>
    <!--CheckOut Page-->
    <div class="checkout-page">
    	<div class="auto-container">
       
          <!--Checkout Details-->
            <div class="checkout-form">
                <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
                    <div class="row clearfix">
                    	<!--Column-->
                        <div class="column col-md-12 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                            	<h2>Apply For Job</h2>
                            </div>
                            <div class="row clearfix">
                            	<div class="form-group col-md-12 col-sm-12 col-xs-12">
                                  <select name="JobID" class="custom-select-box">
                                    <option selected disabled style="display:none;" value="">-- select job -- </option>
                                    <?php
do {  
?>
                                    <option value="<?php echo $row_jobs['ijob']?>"><?php echo $row_jobs['Title']?></option>
                                    <?php
} while ($row_jobs = mysql_fetch_assoc($jobs));
  $rows = mysql_num_rows($jobs);
  if($rows > 0) {
      mysql_data_seek($jobs, 0);
	  $row_jobs = mysql_fetch_assoc($jobs);
  }
?>
                                  </select>
                                    </div>
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">First Name <sup>*</sup></div>
                                    <input type="text" name="FirstName" value="" placeholder="">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Last Name </div>
                                    <input type="text" name="LastName" value="" placeholder="">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="Email" name="Email" value="" placeholder="">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                	<div class="field-label">Phone</div>
                                    <input type="tel" name="Phone" value="" placeholder="">
                                </div>
                                
                                <!--Form Group-->
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
<div class="field-label">CV</div>
<input type="file" name="upload" >
                                </div>
                          </div>
<input type="hidden" name="IP" value="<?=$_SERVER['REMOTE_ADDR'];?>">
<input type="hidden" name="Date" value="<?=date('y-m-d h-s-m');?>">

                          <button type="submit" class="theme-btn btn-style-four pull-right">Apply</button>
                        </div>

                    </div>
                    <input type="hidden" name="MM_insert" value="form">
                </form>
            </div>
            <!--End Checkout Details-->
            

            
          
   	  </div>
    </div>
    <!--End CheckOut Page-->
    
    <?php
mysql_free_result($jobs);
?>
    