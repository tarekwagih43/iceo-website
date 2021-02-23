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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "contact-form")) {
  $insertSQL = sprintf("INSERT INTO contact (Name, Phone, Email, Message, IP, `Date`) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Message'], "text"),
                       GetSQLValueString($_POST['IP'], "text"),
                       GetSQLValueString($_POST['Date'], "text"));

  mysql_select_db($database_config, $config);
  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());

  $insertGoTo = "contact.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
    <!--Default Form Section-->
    <section class="default-form-section">
    	<div class="auto-container">
        	<!--Title Box-->
        	<div class="title-box">
            	<div class="title">Write a Message</div>
                <h2>Have Any Questions?</h2>
                <div class="text">Thank you very much for your interest in our company and our services and if you have any questions, please write us a message now!</div>
            </div>
            
            <!--Default Form-->
            <div class="default-form style-two contact-form">
                <form name="contact-form" method="POST" action="<?php echo $editFormAction; ?>" id="contact-form">
                    <div class="row clearfix">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="Name" value="" placeholder="Your name" required="">
                        </div> 
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" name="Phone" value="" placeholder="Your phone" required="">
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12	 col-xs-12">
                            <input type="email" name="Email" value="" placeholder="Your Email" required="">
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea name="Message" placeholder="Your Massage"></textarea>
                        </div>
                        
                        <div class="form-group text-center col-md-12 col-sm-12 col-xs-12">
                            <button type="submit" class="theme-btn message-btn">Send Massage</button>
                        </div>  
<input type="hidden" name="IP" value="<?php  $_SERVER['REMOTE_ADDR']  ?>">
<input type="hidden" name="Date" value="<?php  date('Y-m-d H:i:s')  ?>">
                                                              
                    </div>
                    <input type="hidden" name="MM_insert" value="contact-form">
                </form>
            </div>
            <!--End Default Form-->

            
        </div>
    </section>
    <!--End Default Form Section-->
    
    <!--Contact Info Section-->
    <section class="contact-info-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <div class="column col-md-4 col-sm-6 col-xs-12">
                	<ul>
                    	<li>
                            <span class="icon flaticon-placeholder"></span>
                            13005 Greenville Avenue <br> California, TX 70240
                        </li>
                    </ul>
                </div>
                
                <div class="column col-md-4 col-sm-6 col-xs-12">
                	<ul>
                    	<li>
                            <span class="icon flaticon-technology-2"></span>
                            +1 800125 6524 <br> mail@lezofinance.com
                        </li>
                    </ul>
                </div>
                
                <div class="column col-md-4 col-sm-6 col-xs-12">
                	<ul>
                    	<li>
                            <span class="icon flaticon-clock-2"></span>
                            10:00am to 6:00pm <br> Sunday Closed
                        </li>
                    </ul>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Contact Info Section-->
    
    <!--Map Section-->
    <section class="contact-map-section">
        <!--Map Outer-->
        <div class="map-outer">
            <!--Map Canvas-->
            <div class="map-canvas" data-zoom="12" data-lat="-37.817085" data-lng="144.955631" data-type="roadmap" data-hue="#ffc400" data-title="Envato" data-icon-path="images/icons/map-marker.png" data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
            </div>
        </div>
    </section>
    <!--End Map Section-->
