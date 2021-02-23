<?php
$prev = @$_GET['iservice'] ;
$prevpro = @$_GET['iproject'] ;
$title = $_GET['view'];
mysql_select_db($database_config, $config);
$query_pagename = "SELECT * FROM pager WHERE `PageLink` = '$title'";
$pagename = mysql_query($query_pagename, $config) or die(mysql_error());
$row_pagename = mysql_fetch_assoc($pagename);
$totalRows_pagename = mysql_num_rows($pagename);
?>
  <section class="page-title" style="background-image:url(images/background/<?php echo $row_pagename['Image']; ?>)">
    	<div class="auto-container">
        	<h1><?php echo $row_pagename['Title']; ?></h1>
            <ul class="page-breadcrumb">
            	<li><a href="index.php">Home</a></li>
<?php if(@$prev) { ?> <li><a href="<?=page('services','0','','')  ?>" > <?="Services"; ?></a> </li> <?php } ?>
<?php if(@$prevpro) { ?> <li><a href="<?=page('projects','0','','')  ?>" > <?="Projects"; ?></a> </li> <?php } ?>
                <li><?php echo $row_pagename['Title']; ?></li>
            </ul>
        </div>
    </section>
