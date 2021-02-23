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

require_once('Connections/config.php'); 
include ("temp/getdata.php");
include ("temp/head.php");
include ("temp/header.php");
/* Calling Hashtag*/
$q = @$_GET['q'];
$q = htmlentities($q, ENT_QUOTES, "UTF-8");
 
/*End Display Results*/
// GET NEWS
mysql_select_db($database_config, $config);
$query_search_services = "SELECT * FROM services WHERE (`Title` LIKE '%$q%' OR `Description` LIKE '%$q%' OR `Keywords` LIKE '%$q%') ";
$search_services = mysql_query($query_search_services, $config) or die(mysql_error());
$row_search_services = mysql_fetch_assoc($search_services);
$totalRows_search_services = mysql_num_rows($search_services);

// GET PROGRAMS

mysql_select_db($database_config, $config);
$query_search_projects = "SELECT * FROM projects WHERE (`Title` LIKE '%$q%' OR `Description` LIKE '%$q%' OR `Keywords` LIKE '%$q%'  OR `Client` LIKE '%$q%')";
$search_projects = mysql_query($query_search_projects, $config) or die(mysql_error());
$row_search_projects = mysql_fetch_assoc($search_projects);
$totalRows_search_projects = mysql_num_rows($search_projects);

// GET EPOSIDES
mysql_select_db($database_config, $config);
$query_search_jobs = "SELECT * FROM jobs WHERE (`Title` LIKE '%$q%' OR `Description` LIKE '%$q%' OR `Keywords` LIKE '%$q%' OR `Requirements` LIKE '%$q%' OR `Qualifications` LIKE '%$q%')";
$search_jobs = mysql_query($query_search_jobs, $config) or die(mysql_error());
$row_search_jobs = mysql_fetch_assoc($search_jobs);
$totalRows_search_jobs = mysql_num_rows($search_jobs);

$numberofresults = 0;
if(strlen($q)>2) { 
//Getting Results
if($totalRows_search_services>0) { $res_services = 1; }
if($totalRows_search_jobs>0) { $res_jobs = 1; }
if($totalRows_search_projects>0) { $res_projects = 1; }

$Results = $totalRows_search_services+$totalRows_search_projects+$totalRows_search_jobs;
}

?>
<section class="default-form-section">

<div class="auto-container">
<form method="get" action="search.php">
<div class="col-sm">
<input type="search" name="q" value="<?=$_GET['q'];?>" placeholder="Search Here" required="">
<button type="submit" class="btn"><span class="fa fa-search"></span></button>
</div>
</form>
</div>


<section class="experts-section">
    	<div class="auto-container">
        	<div class="row clearfix">
                
                <!--Content Column-->
                <div class="content-column col-md-12 col-xs-12 col-xs-12">
                	<div class="inner-column">
                    	
                        <div class="sec-title">
                        	<div class="title"><?php echo "Results" ?></div>
                        </div>
                        

<div class="fact-counter style-two">
            	
                            <div class="row clearfix">
                             <div class="column counter-column col-md-12 col-sm-6 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                          <span class="count-text" data-speed="2500" data-stop="<?=$numberofresults?>">0</span>
                                        </div>
                                        <h4 class="counter-title">Total Result</h4>
                                    </div>
                              </div>
                        
                            
                                <!--Column-->
                              <div class="column counter-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                          <span class="count-text" data-speed="3000" data-stop="<?=$totalRows_search_projects?>">0</span>
                                        </div>
                                        <h4 class="counter-title">Projects</h4>
                                    </div>
                              </div>
                        
                                <!--Column-->
                              <div class="column counter-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                          <span class="count-text" data-speed="3000" data-stop="<?=$totalRows_search_services?>">0</span>
                                        </div>
                                        <h4 class="counter-title">Services</h4>
                                    </div>
                              </div>
                              <div class="column counter-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="inner">
                                        <div class="count-outer count-box">
                                          <span class="count-text" data-speed="3000" data-stop="<?=$totalRows_search_jobs?>">0</span>
                                        </div>
                                        <h4 class="counter-title">Jobs</h4>
                                    </div>
                              </div>
                                
                            </div>
                            
                      </div>
                        
                    </div>
                </div>
                
            </div>
  </div>
</section>

  <?php if ($totalRows_search_projects>0) { ?>
    <h2 class="auto-container">Projects Result </h2>
    <?php do { ?>
      <div class="auto-container">
        <div class="inner-container clearfix"><div class="no-data">
  <a href="<?=page('singleproject','1','iproject',$row_search_projects['iproject'])?>"><h3><?php echo $row_search_projects['Title']; ?></h3></a></div>
          </div>
        </div>
      <?php } while ($row_search_projects = mysql_fetch_assoc($search_projects)); ?>
<?php } ?>
        
  <?php if ($totalRows_search_services>0) { ?>
      <h2 class="auto-container">services Result </h2>
    <?php do { ?>
    <div class="auto-container">
            <div class="inner-container clearfix"><div class="no-data">
<a href="<?=page('singleservice','1','iservice',$row_search_services['iservice'])?>"><h3><?php echo $row_search_services['Title']; ?></h3></a></div>
          </div>
  </div>
              <?php } while ($row_search_services = mysql_fetch_assoc($search_services)); ?>

        <?php } ?>
  <?php if ($totalRows_search_jobs>0) { ?>
        <h2 class="auto-container">Jobs Result </h2>
    <?php do { ?>

    <div class="auto-container">
            <div class="inner-container clearfix"><div class="no-data">
<a href="<?=page('jobdetails','1','ijob',$row_search_jobs['ijob'])?>"><h3><?php echo $row_search_jobs['Title']; ?></h3></a></div>
          </div>
  </div>
<?php } while ($row_search_jobs = mysql_fetch_assoc($search_jobs)); ?>

        <?php } ?>
            

</section>

<?php include ("temp/footer.php");?>
<?php include ("temp/js.php");?>

<?php
mysql_free_result($search_services);

mysql_free_result($search_projects);
?>
