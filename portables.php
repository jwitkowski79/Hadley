<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Hadley Exhibits Inc.</title>

		<link href='include/style/hadley.css' type='text/css' rel='stylesheet' />
		<script type='text/javascript' src='include/script/jquery-1.3.2.min.js'></script>

		<script type='text/javascript' language='javascript'>

			$(function() {

			});

			function thumbClick(e) {
				var event = e || window.event;
				var target = event.target || event.srcElement;  // get sender object

				$('#imgLarge').attr('src', $(target).attr('thumb'));
			}

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

		<?php

			$xml_file = "portfolio.xml";
			$exhibitID = ($_GET['exhibitID'] != "") ? $_GET['exhibitID'] : 1;

			$file = file_get_contents("portfolio.xml");
			$doc  = DOMDocument::loadXML($file);

			$xpath = new DOMXpath($doc);
			$nodeList = $xpath->query('//exhibit[@id="'. $exhibitID .'"]');

			if ($nodeList->length) {
				$exhibit = $nodeList->item(0);
				$type = $exhibit->getAttribute('type');

				$xpath = new DOMXpath($doc);
				$nodeList = $xpath->query('//exhibit[@type="'. $type .'"]');

				foreach ($nodeList as $node) {
					$id = $node->getAttribute('id');
					$navText = $node->getAttribute('navtext');

					$portableLinks[$id] = $navText;
				}
			}

			function renderPortableLinks() {
				global $portableLinks;
				echo("<span style='font-size:10px; line-height:14px; color:#333;'>");
				foreach ($portableLinks as $key=>$val) {
					echo(" - <a href='portables.php?exhibitID=" . $key . "'>" . $val . "</a><br />");
				}
				echo("</span><br />");
			}

		?>

		<div id='container'>
			<div id='containerBack'>

			<div id="containerInner">
				<?php include 'header.php' ?>
				<div id='content' style='margin-top:25px;'>
					<div id='portfolioNav'>

						<?php
							echo("<strong>portables</strong><br/>");
							renderPortableLinks();
						?>
						
						<div class="nimlokHolder">
						<img src="images/nimlock_logo2.jpg" alt="buy nimlok now"/>
						<iframe src="http://www.nimloktradeshowdisplays.com/Includes/Templates/BuyButtons.aspx?tr=E17DD6F3995E&btn=DA-60x100&url=h" scrolling="no" frameborder="0" height="100" width="60" allowtransparency="true" style="border:none; overflow:hidden; height:100px; width:60px;" ></iframe>
						</div><!--/nimlockHolder-->
					</div>
					

					<?php include('xmlparse.php') ?>

				</div>

				<div id='clear'></div>
				<div id='footer'>Hadley Exhibits Inc. All Rights Reserved  <a href="http://nimlok.com" target="_blank"><img src="images/logo_nimlock.gif" class="nimlock" alt="nimlok distributor" border="0"/></a></div>
			</div>

			</div>
		</div>
	</body>
</html>
