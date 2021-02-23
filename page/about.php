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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "service-req")) {
  $insertSQL = sprintf("INSERT INTO servicereq (Service, Name, Email, Phone, Question) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Service'], "text"),
                       GetSQLValueString($_POST['Name'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Phone'], "text"),
                       GetSQLValueString($_POST['Question'], "text"));

  mysql_select_db($database_config, $config);
  $Result1 = mysql_query($insertSQL, $config) or die(mysql_error());

  $insertGoTo = "about.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_config, $config);
$query_services = "SELECT * FROM services";
$services = mysql_query($query_services, $config) or die(mysql_error());
$row_services = mysql_fetch_assoc($services);
$totalRows_services = mysql_num_rows($services);

mysql_select_db($database_config, $config);
$query_serv = "SELECT * FROM services";
$serv = mysql_query($query_serv, $config) or die(mysql_error());
$row_serv = mysql_fetch_assoc($serv);
$totalRows_serv = mysql_num_rows($serv);
?>
     <!--Welcome Section-->
    <section class="welcome-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Column-->
                <div class="content-column col-md-7 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<!--Sec Title-->
                        <div class="sec-title">
                        	<div class="title">what we do</div>
                            <h2>Welcome to Our <br> Consulting Agency</h2>
                        </div>
                        <div class="text"><?=gettable('siteinfo','AboutFooter','0','','')?></div>
                        <div class="clearfix">
                        	<div class="pull-left">
                            	<a href="contact.html" class="theme-btn btn-style-four">Contact Us</a>
                            </div>
                            <div class="pull-right">
                            	<div class="phone"><span class="icon fa fa-phone"></span> <?=gettable('siteinfo','Phone','0','','')?></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Image Column-->
                <div class="image-column col-md-5 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="image">
                       	  <img src="images/<?=gettable('siteinfo','WelcomeImage','0','','')?>" alt="">
                          <a href="<?=gettable('siteinfo','YoutubeLink','0','','')?>" class="lightbox-image play-btn">
                                <span class="icon fa fa-play"></span>
                          </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Welcome Section-->
    
    <!-- Call To Action Section Two-->
    <section class="call-to-action-two">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3><?=gettable('siteinfo','Helpmsg','0','','')?></h3>
              <a href="<?=page('contact','0','','')?>" class="contact-btn">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- End Call To Section Two-->
    
    <!--Choose Section-->
    <section class="choose-section" style="background-image:url(images/background/5.jpg)">
    	<div class="auto-container">
        	<div class="sec-title light">
            	<div class="title">What We Do For You</div>
                <h2>Why Choose Us</h2>
            </div>
            <div class="row clearfix">
            	<!--Content Column-->
                <div class="content-column col-lg-3 col-md-4 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="text">
                        	<p><?=gettable('siteinfo','AboutFooter','0','','')?></p>
                        </div>
                    </div>
                </div>
                <!--Carousel Column-->
                <div class="carousel-column col-lg-9 col-md-8 col-sm-12 col-xs-12">
                	<div class="three-item-carousel owl-carousel owl-theme">
                      <?php do { ?>
  <!--Services Block-->
                        <div class="services-block-three">
                          <div class="inner-box">
                            <div class="icon-box">
                              <img src="images/resource/<?=$row_services['Image'] ?>"> 
                            </div>
                            <div class="lower-content">
                              <h3><a href="<?=page('singleservice','1','iservice',$row_services['iservice'])?>"><?=$row_services['Title'];?></a></h3>
                              <div class="text"><?php echo $row_services['Description']; ?></div>
                            </div>
                          </div>
                        </div>
                      <!--Services Block END-->
                      <?php } while ($row_services = mysql_fetch_assoc($services)); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Choose Section-->
    
    <!--Report Section-->
    <section class="report-section style-two">
    	
    </section>
    <!--End Report Section-->
    
    <!--Consulting Section-->
    <section class="consulting-section" style="background-image:url(images/background/3.jpg)">
    	<div class="auto-container">
        	<div class="row clearfix">
            	<!--Form Column-->
                <div class="form-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<!-- Consulting Form -->
                        <div class="consulting-form">
                          <form method="POST" action="<?php echo $editFormAction; ?>" name="service-req">
                                <div class="row clearfix">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <select name="Service" class="custom-select-box">
                                          <?php
do {  
?>
                                          <option value="<?php echo $row_serv['iservice']?>"><?php echo $row_serv['Title']?></option>
                                          <?php
} while ($row_serv = mysql_fetch_assoc($serv));
  $rows = mysql_num_rows($serv);
  if($rows > 0) {
      mysql_data_seek($serv, 0);
	  $row_serv = mysql_fetch_assoc($serv);
  }
?>
                                      </select>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="Name" placeholder="Name" required="">
                                    </div>
                
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="email" name="Email" placeholder="Email" required="">
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="tel" name="Phone" placeholder="Phone" required="">
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="Question" placeholder="Write Your Question Here ..."></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <button class="theme-btn btn-style-four" type="submit" name="submit-form">Submit Request</button>
                                    </div>
                                </div>
                                <input type="hidden" name="MM_insert" value="service-req">
                            </form>
                        </div>
                    </div>
                </div>
                <!--Content Column-->
                <div class="content-column col-md-6 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="sec-title light">
                        	<div class="title">Call to action</div>
                            <h2>Request a Service</h2>
                        </div>
                        <h3><?=gettable('siteinfo','AboutFooter','0','','')?> <span class="theme_color"><?=gettable('siteinfo','SiteName','0','','')?></span></h3>
                        <div class="text">Send us a email and we’ll get in touch shortly, or - We would be delighted to speak.</div>
                      <a href="<?=page('contact','0','','')?>" class="theme-btn btn-style-five">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Consulting Section-->
    
    <!--Counter Section-->
    <section class="counter-section">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Column-->
                <div class="content-column col-md-8 col-sm-12 col-xs-12">
                	<div class="inner-column">
                    	<div class="sec-title">
                        	<div class="title">Would you like to see </div>
                            <h2>Helping Finance Business</h2>
                        </div>
                        <div class="text">Each business niche may require a unique functionality of its own… With that notion v in mind, our team of professional If you are going to use a passage you need to be sure there isnanything emrassing</div>
                        <div class="fact-counter">
            	
                            <div class="row clearfix">
                            
                                <!--Column-->
                                <div class="column counter-column col-md-3 col-sm-3 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2500" data-stop="25">0</span>
                                        </div>
                                        <h4 class="counter-title">Years of Experience</h4>
                                    </div>
                                </div>
                        
                                <!--Column-->
                                <div class="column counter-column col-md-3 col-sm-3 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2500" data-stop="2348">0</span>
                                        </div>
                                        <h4 class="counter-title">Registered Cases</h4>
                                    </div>
                                </div>
                        
                                <!--Column-->
                                <div class="column counter-column col-md-3 col-sm-3 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2000" data-stop="4000">0</span>
                                        </div>
                                        <h4 class="counter-title">Happy Clients</h4>
                                    </div>
                                </div>
                                
                                <!--Column-->
                                <div class="column counter-column col-md-3 col-sm-3 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                            <span class="count-text" data-speed="2000" data-stop="47">0</span>
                                        </div>
                                        <h4 class="counter-title">Pofessional Advisors</h4>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!--Image Column-->
                <div class="image-column col-md-4 col-sm-12 col-xs-12">
               	  <div class="image wow fadeInRight" data-wow-delay="700ms" data-wow-duration="10000ms">
                    	<img src="images/resource/image-1.jpg" alt="">
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--End Counter Section-->    
    <!--Clients Section-->
    <section class="clients-section">
        <div class="auto-container">
            
            <div class="sponsors-outer">
                <!--Sponsors Carousel-->
                <ul class="sponsors-carousel owl-carousel owl-theme">
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
                    <li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
                </ul>
            </div>
            
        </div>
    </section>
    <!--End Clients Section-->
    <?php
mysql_free_result($services);

mysql_free_result($serv);
?>
