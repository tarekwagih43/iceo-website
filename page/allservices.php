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

$maxRows_servs = 6;
$pageNum_servs = 0;
if (isset($_GET['pageNum_servs'])) {
  $pageNum_servs = $_GET['pageNum_servs'];
}
$startRow_servs = $pageNum_servs * $maxRows_servs;

mysql_select_db($database_config, $config);
$query_servs = "SELECT * FROM services";
$query_limit_servs = sprintf("%s LIMIT %d, %d", $query_servs, $startRow_servs, $maxRows_servs);
$servs = mysql_query($query_limit_servs, $config) or die(mysql_error());
$row_servs = mysql_fetch_assoc($servs);

if (isset($_GET['totalRows_servs'])) {
  $totalRows_servs = $_GET['totalRows_servs'];
} else {
  $all_servs = mysql_query($query_servs);
  $totalRows_servs = mysql_num_rows($all_servs);
}
$totalPages_servs = ceil($totalRows_servs/$maxRows_servs)-1;

mysql_select_db($database_config, $config);
$query_serviccat = "SELECT * FROM servicescat";
$serviccat = mysql_query($query_serviccat, $config) or die(mysql_error());
$row_serviccat = mysql_fetch_assoc($serviccat);
$totalRows_serviccat = mysql_num_rows($serviccat);
?>
<!--Services Section-->
    <section class="services-section">
    	<div class="auto-container">
        	<!--Sec Title-->
        	<div class="sec-title">
            	<div class="title">What We Do For You</div>
                <h2>Our Main Services</h2>
            </div>
            <div class="row clearfix">
              <?php do { ?>
  <!--Services Block Two-->
                <div class="services-block-two col-md-4 col-sm-6 col-xs-12">
                  <div class="inner-box">
                    <div class="image">
                      <img src="images/resource/<?php echo $row_servs['Image']; ?>" alt="">
                      <div class="icon-box">
                        <span class="icon flaticon-bank"></span>
                        </div>
                      <div class="overlay-box">
                        <div class="overlay-inner">
                          <div class="content">
                            <div class="overlay-icon">
                              <span class="icon flaticon-bank"></span>
                              </div>
                            <div class="text"><?php echo $row_servs['Description']; ?></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <div class="lower-box">
                      <h3><a href="<?=page('singleservice','1','iservice',$row_servs['iservice'])?>"><?php echo $row_servs['Title']; ?></a></h3>
                      <a href="<?=page('singleservice','1','iservice',$row_servs['iservice'])?>" class="arrow-box"><span class="fa fa-angle-right"></span></a>
                      </div>
                    </div>
                </div>
                <?php } while ($row_servs = mysql_fetch_assoc($servs)); ?>
                
            </div>
        </div>
    </section>
    <!--End Services Section-->
    
    <!--Approach Section-->
    <?php if ($totalRows_serviccat>0) { ?>
    <section class="approach-section" style="background-image:url(images/background/2.jpg)">
    	<div class="upper-box" style="background-image:url(images/background/1.jpg)">
        	<div class="auto-container">
                <div class="title">We Are Professionals</div>
                <h2>Services Categories</h2>
                <div class="quality">Services In Many scopes</div>
            </div>
        </div>
        
        <div class="auto-container">
        	<div class="blocks-section">
            	<div class="row clearfix">
                  <?php do { ?>
  <!--Services Block-->
                    <div class="services-block col-md-4 col-sm-6 col-xs-12">
                      <div class="inner-box">
                        <div class="icon-box">
                          <span class="icon flaticon-employee"></span>
                          </div>
                        <h3><a href="<?=page('allservices','1','servcat',$row_serviccat['iservicecat'])?>"><?php echo $row_serviccat['Title']; ?></a></h3>
                        <div class="text"><?php echo $row_serviccat['Description']; ?></div>
                        <div class="overlay-box" style="background-image:url(images/resource/service-1.jpg)">
                          <div class="overlay-inner">
                            <div class="icon-box">
                              <span class="icon flaticon-employee"></span>
                              </div>
                            <h4><a href="<?=page('allservices','1','servcat',$row_serviccat['iservicecat'])?>"><?php echo $row_serviccat['Title']; ?></a></h4>
                            <div class="overlay-text"><?php echo $row_serviccat['Description']; ?></div>
                            </div>
                          </div>
                        </div>
                    </div>
                  <!--Services Block End-->
                    <?php } while ($row_serviccat = mysql_fetch_assoc($serviccat)); ?>
                </div>
            </div>
        </div>
        
        <!--Steps Section-->
        <div class="steps-section">
        	
        </div>
        
    </section>
    <!--End Approach Section-->
    <?php } ?>
    
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
mysql_free_result($servs);

mysql_free_result($serviccat);
?>
