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

mysql_select_db($database_config, $config);
$query_jobs = "SELECT * FROM jobs";
$jobs = mysql_query($query_jobs, $config) or die(mysql_error());
$row_jobs = mysql_fetch_assoc($jobs);
$totalRows_jobs = mysql_num_rows($jobs);
?>
    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Content Side-->
                <div class="content-side col-lg-9 col-md-8 col-sm-12 col-xs-12">
                	<div class="our-shop">
                        <!--Sort By-->
                        <div class="items-sorting">
                            <div class="row clearfix">
                                <div class="results-column pull-left col-md-6 col-sm-6 col-xs-12">
                                    <h4>Showing 1–9 of 15 results</h4>
                                </div>

                            </div>
                        </div>
                        
                        <div class="row clearfix">
                            
                            <!--Shop Item start-->
                            <div class="shop-item col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <div class="image">
                             <img src="images/resource/products/1.jpg" alt="">
                                        <div class="overlay-box">
                                            <ul class="cart-option">
                                                <li><a href="shop-detail.html"><span class="fa fa-shopping-cart"></span></a></li>
                                                <li><a href="images/resource/products/1.jpg" data-fancybox="images" data-caption="" class="link"><span class="icon fa fa-search"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="shop-detail.html">Flying Ninja</a></h3>
                                        <div class="price">$12.00</div>                                    
                                    </div>
                                </div>
                            </div>
                            <!--Shop Item End-->
                            
                        </div>
                        
                        <!--Styled Pagination-->
                        <ul class="styled-pagination text-center">
                            <li class="prev"><a href="#"><span class="fa fa-long-arrow-left"></span></a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#" class="active">2</a></li>
                            <li><a href="#">3</a></li>
                            <li class="next"><a href="#"><span class="fa fa-long-arrow-right"></span></a></li>
                        </ul>                
                        <!--End Styled Pagination-->
                        
                    </div>
                </div>
                
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-3 col-md-4 col-sm-12 col-xs-12">
                	<aside class="sidebar default-sidebar no-padd">
						
                        <!-- Search -->
                        <div class="sidebar-widget search-box style-two">
                        	<form method="post" action="contact.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search Product" required="">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
						</div>

                        
                        <!-- Top Related Posts -->
                        <div class="sidebar-widget related-posts">
                            <div class="sidebar-title">
                            	<h2>Popular Products</h2>
                            </div>
							<div class="post">
                            	<figure class="post-thumb"><a href="shop-detail.html"><img src="images/resource/products/prod-thumb-1.jpg" alt=""></a></figure>
                                <h4><a href="shop-detail.html">Woo Album #4</a></h4>
                                <div class="rating"><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-half-o light"></span></div>
                                <div class="price">$9.00</div>
                            </div>
                            
						</div>
                        
					</aside>
                </div>
                
            </div>
            
        </div>
    </div>
    <!--End Sidebar Page Container-->
    
    <!-- Call To Action Section -->
    <section class="call-to-action">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h3>If you have any query for related business... Just touch on this button</h3>
                <a href="contact.html" class="contact-btn">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->
    <?php
mysql_free_result($jobs);
?>
    