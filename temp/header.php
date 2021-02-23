    <header class="main-header header-style-two">
    
    	<!-- Header Top -->
    	<div class="header-top">
        	<div class="auto-container">
            	<div class="inner-container clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left">
                    	<ul class="links clearfix">
                        	<li><a href="#"><span class="icon fa fa-phone"></span> 1-800-985-357</a></li>
                            <li><a href="#"><span class="icon fa fa-envelope"></span> info@nortech.com</a></li>
                            <li><a href="#"><span class="icon fa fa-map-marker"></span> 56, suit 799, melborne, Australia</a></li>
                        </ul>
                    </div>
                    
                    <!--Top Right-->
                    <div class="top-right clearfix">
                    	<!--social-icon-->
                        <div class="social-icon">
                        	<ul class="clearfix">
                            	<li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <!-- Header Top End -->
        
        <!-- Main Box -->
    	<div class="main-box">
        	<div class="auto-container">
            	<div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
                    </div>
                    <!--Nav Outer-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li  class="current"><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="#">About Us</a>
                                    	<ul>
                                            <li><a href="<?=page('about','0','','')?>">About Us</a></li>
                                            <li><a href="<?=page('team','0','','')?>">Team</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#">Services</a>
                                    	<ul>
                                            <li class="dropdown"><a href="<?=page('allservices','0','','')?>">Services</a>
                                            
                                            <ul >
                                             <li><a href="<?=page('allservices','0','','')?>">Services</a></li>
                                            
                                            </ul>
                                            </li>
                                            <li><a href="<?=page('singleservice','0','','')?>">Services Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Projects</a>
                                    	<ul>
                                            <li class="dropdown">
                                            <a href="<?=page('allprojects','0','','')?>">Projects</a>
                                             <ul >
                                             <li><a href="<?=page('allprojects','0','','')?>">project</a></li>
                                            
                                            </ul>
                                            
                                            </li>
                                            <li><a href="<?=page('singleproject','0','','')?>">Projects Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Careers</a>
                                    <ul>
                                            <li><a href="<?=page('alljobs','0','','')?>">Jobs</a></li>
                                            <li><a href="<?=page('jobdetails','0','','')?>">job details</a></li>
                                            <li><a href="<?=page('applyjob','0','','')?>">Apply Job</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?=page('contact','0','','')?>">Contact us</a></li>
                                 </ul>
                            </div>
                        </nav>
                        
                        <!-- Main Menu End-->
                        <div class="options-box">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="get" action="search.php">
                                                    <div class="form-group">
                                                        <input type="search" name="q" value="" placeholder="Search Here" required="">
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
    
    	<!--Sticky Header-->
        <div class="sticky-header">
        	<div class="auto-container">
                <div class="sticky-inner-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="index.html" class="img-responsive"><img src="images/logo-small.png" alt="" title=""></a>
                    </div>
                    
                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->    	
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            
                            <div class="navbar-collapse collapse clearfix">
                             <ul class="navigation clearfix">
                                    <li  class="current"><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="#">About Us</a>
                                    	<ul>
                                            <li><a href="<?=page('about','0','','')?>">About Us</a></li>
                                            <li><a href="<?=page('team','0','','')?>">Team</a></li>
                                        </ul>
                                    </li>
                                    
                                    <li class="dropdown"><a href="#">Services</a>
                                    	<ul>
                                            <li class="dropdown"><a href="<?=page('allservices','0','','')?>">Services</a>
                                            
                                            <ul >
                                             <li><a href="<?=page('allservices','0','','')?>">Services</a></li>
                                            
                                            </ul>
                                            </li>
                                            <li><a href="<?=page('singleservice','0','','')?>">Services Single</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Projects</a>
                                    	<ul>
                                            <li class="dropdown">
                                            <a href="<?=page('allprojects','0','','')?>">Projects</a>
                                             <ul >
                                             <li><a href="<?=page('allprojects','0','','')?>">project</a></li>
                                            
                                            </ul>
                                            
                                            </li>
                                            <li><a href="<?=page('singleproject','0','','')?>">Projects Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Careers</a>
                                    <ul>
                                            <li><a href="<?=page('alljobs','0','','')?>">Jobs</a></li>
                                            <li><a href="<?=page('jobdetails','0','','')?>">job details</a></li>
                                            <li><a href="<?=page('applyjob','0','','')?>">Apply Job</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?=page('contact','0','','')?>">Contact us</a></li>
                                 </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        
                        <!--Outer Box-->
                        <div class="outer-box">
                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu4">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="get" action="search.php">
                                                    <div class="form-group">
                                                        <input type="search" name="q" value="" placeholder="Search Here" required="">
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Sticky Header-->
    </header>