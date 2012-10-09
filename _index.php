<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta name="keywords" content="Hadley, exhibits, tradeshows, museums, visitors center" /> 
<meta name="description" content="Hadley Exhibits has been producing high-quality exhibits for museums, trade shows, corporate facilities and visitor centers for over fifty years" /> 

<title>Hadley Exhibits Inc.</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="include/script/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="include/script/jquery.cycle.min.js"></script>

<!-- include Cycle plugin -->





<!--  initialize the slideshow when the DOM is ready -->
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, 
		speed:  1000,
		timeout: 5000
	});
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20292542-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
</head>

<body>

<div id="container">
<div id="containerBack">
	<div id="containerInner">
		<?php include("header.php");?>
		<div id="content">
		<div class="imageBack">
			<div class="slideshow">
			<img src="images/home_oerlikon.jpg" alt="oerlikon" width="731" height="347"/>
			<img src="images/home_bethel.jpg" alt="Bethel Woods" width="731" height="347"/>
			<img src="images/home_capVisCen.jpg" alt="Capitol Visitors Center" width="731" height="347"/>
			<img src="images/home_wildCtr.jpg" alt="Wild Center" width="731" height="347"/>
			<img src="images/home_ericsson.jpg" alt="Wild Center" width="731" height="347"/>
			</div><!--end slideshow-->
		
		
		</div><!--endimage back-->
		
		<div id="bottomContent"><img src="images/callout_fpo.jpg" alt="Hadley Exhibits Services"/></div>
		<div id="bottomContentRight"><div class="hadleyis">Hadley Exhibits Is...</div>
		One of America&rsquo;s oldest exhibit companies, Hadley Exhibits provides unparalleled experience and quality workmanship. We have clients that have over a 20-year history with us and we work with them to build their brands, increase awareness of their products and services, and acquire leads when they attend tradeshows. Customer and client objectives drive everything we do at Hadley. Our goal is to not just build and manage exhibits, but to make a positive difference in businesses we service.</div>
		
		</div>
		
	
		
		
	
	
	<div id="clear"></div>
	<div id="footer">Hadley Exhibits Inc. All Rights Reserved <a href="http://nimlok.com" target="_blank"><img src="images/logo_nimlock.gif" class="nimlock" alt="nimlok distributor" border="0"/></a> </div>
	
	
	</div>
	</div>


</div>
</body>
</html>
