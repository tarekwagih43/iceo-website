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

$colname_servic = "-1";
if (isset($_GET['iservice'])) {
  $colname_servic = $_GET['iservice'];
}
mysql_select_db($database_config, $config);
$query_servic = sprintf("SELECT * FROM services WHERE iservice = %s", GetSQLValueString($colname_servic, "int"));
$servic = mysql_query($query_servic, $config) or die(mysql_error());
$row_servic = mysql_fetch_assoc($servic);
$totalRows_servic = mysql_num_rows($servic);

$maxRows_projects = 7;
$pageNum_projects = 0;
if (isset($_GET['pageNum_projects'])) {
  $pageNum_projects = $_GET['pageNum_projects'];
}
$startRow_projects = $pageNum_projects * $maxRows_projects;

$colname_projects = "-1";
if (isset($_GET['iservice'])) {
  $colname_projects = $_GET['iservice'];
}
mysql_select_db($database_config, $config);
$query_projects = sprintf("SELECT * FROM projects WHERE Service = %s", GetSQLValueString($colname_projects, "text"));
$query_limit_projects = sprintf("%s LIMIT %d, %d", $query_projects, $startRow_projects, $maxRows_projects);
$projects = mysql_query($query_limit_projects, $config) or die(mysql_error());
$row_projects = mysql_fetch_assoc($projects);

if (isset($_GET['totalRows_projects'])) {
  $totalRows_projects = $_GET['totalRows_projects'];
} else {
  $all_projects = mysql_query($query_projects);
  $totalRows_projects = mysql_num_rows($all_projects);
}
$totalPages_projects = ceil($totalRows_projects/$maxRows_projects)-1;

mysql_select_db($database_config, $config);
$query_servcat = "SELECT * FROM servicescat";
$servcat = mysql_query($query_servcat, $config) or die(mysql_error());
$row_servcat = mysql_fetch_assoc($servcat);
$totalRows_servcat = mysql_num_rows($servcat);
?>
<!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar default-sidebar no-padd">
                        <!--Help Widget-->
                        <div class="sidebar-widget help-widget">
                        	<div class="widget-inner">
                            	<h2>Need Help ?</h2>
                                <div class="text"><?=gettable('siteinfo','Helpmsg','0','','') ?></div>
                                <ul class="help-list">
                                	<li><span class="icon fa fa-phone"></span><?=gettable('siteinfo','Phone','0','','') ?></li>
                                    <li><span class="icon fa fa-envelope-o"></span><?=gettable('siteinfo','Email','0','','') ?></li>
                                </ul>
                            </div>
                        </div>
                        
                    </aside>
                </div>
                
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                	<div class="services-single">
						<div class="inner-box">
							<div class="image">
                            	<img src="images/resource/<?php echo $row_servic['Image']; ?>" alt="">
                            </div>
                            <h2><?php echo $row_servic['Title']; ?></h2>
                            <div class="text">
                            	<p><?php echo $row_servic['Description']; ?></p>
                                <div class="two-column row clearfix">
                                	<div class="column col-md-8 col-sm-8 col-xs-12">
                                    	<h3>Service Content</h3>
                                        <p><?php echo $row_servic['Content']; ?></p>
                                    </div>
                                    <div class="column col-md-4 col-sm-4 col-xs-12">
                                    	<div class="service-image">
                                        	<img src="images/resource/<?php echo $row_servic['Image2']; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <?php if ($totalRows_projects>0) { ?>
                                <h3>Our Related Projects of Service</h3> 
								<?php } ?>
                            </div>
                                        <?php if ($totalRows_projects>0) { ?>
                    
                            <!--Accordian Box-->
                            <ul class="accordion-box style-two">
                              <?php do { ?>
  <!--Block-->
                              <li class="accordion block <?php if ( $totalRows_projects =1) { echo "active-block"; } ?> ">
<div class="acc-btn <?php if ($totalRows_projects =1 ) { echo "active"; } ?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus-circle"></span> <span class="icon icon-minus fa fa-minus-circle"></span></div><a href="<?=page('singleproject','1','iproject',$row_projects['iproject'])?>"><?php echo $row_projects['Title']; ?></a></div>
                                  <div class="acc-content current">
                                    <div class="content">
                                      <div class="text"><?php echo $row_projects['Description']; ?></div>
                                      </div>
                                    </div>
                                </li>
                                <?php } while ($row_projects = mysql_fetch_assoc($projects)); ?>
                            </ul>
                            								<?php } ?>

                         
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
</div>
    <!--End Sidebar Page Container-->
    <?php
mysql_free_result($servic);

mysql_free_result($projects);

mysql_free_result($servcat);
?>
    