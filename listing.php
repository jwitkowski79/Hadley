<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Hadley Exhibits-Our Work</title>

		<link href='include/style/hadley.css' type='text/css' rel='stylesheet' />
		<script type='text/javascript' src='include/script/jquery-1.3.2.min.js'></script>

		<script type='text/javascript' language='javascript'>

			$(function() {
				$('.portfolioImage').mouseover(function() {
					$(this).children('p').css('display', 'block').click(function() { window.location = $(this).parent().children('a').attr('href'); });
				}).mouseout(function() {
					$(this).children('p').css('display', 'none');
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
		<?php
			


			$xml_file = "portfolio.xml";

			$type = ($_GET['type'] != "") ? $_GET['type'] : 'trade';

			if ($type == 'portable') {
				$file = file_get_contents("portfolio.xml");
				$doc  = DOMDocument::loadXML($file);

				$xpath = new DOMXpath($doc);
				$nodeList = $xpath->query('//exhibit[@type="'. $type .'"]');

				if ($nodeList->length) {
					foreach ($nodeList as $node) {
						$id = $node->getAttribute('id');
						$navText = $node->getAttribute('navtext');

						$portableLinks[$id] = $navText;
					}
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

			<div id='containerInner'>
					<?php include 'header.php' ?>
			

				<div id='content' style='margin-top:25px;'>
					<div id='portfolioNav'>
						<?php
							if ($type == 'portable') {
								echo("<strong>portables</strong><br/>");
								renderPortableLinks();
								echo("<div class='nimlokHolder'>
						<img src='images/nimlock_logo2.jpg' alt='buy nimlok now'/>
						<iframe src='http://www.nimloktradeshowdisplays.com/Includes/Templates/BuyButtons.aspx?tr=E17DD6F3995E&btn=DA-60x100&url=h' scrolling='no' frameborder='0' height='100' width='60' allowtransparency='true' style='border:none; overflow:hidden; height:100px; width:60px' ></iframe>
						</div>");
								
							} else {
								echo(($type != 'trade') ? "<a href='listing.php?type=trade'>trade shows</a><br />" : "<strong>trade shows</strong><br />");
								echo(($type != 'museum') ? "<a href='listing.php?type=museum'>museums</a><br />" : "<strong>museums</strong><br />");
								echo(($type != 'visitor') ? "<a href='listing.php?type=visitor'>visitor centers</a><br />" : "<strong>visitor centers</strong><br />");
								echo(($type != 'zoo') ? "<a href='listing.php?type=zoo'>zoos</a><br />" : "<strong>zoos</strong><br />");
								echo(($type != 'frank') ? "<a href='listing.php?type=frank'>custom casework</a><br />" : "<strong>custom casework</strong><br />");
								echo(($type != 'events') ? "<a href='listing.php?type=events'>events</a><br/>" : "<strong>events</strong><br/>");
								echo(($type != 'misc') ? "<a href='listing.php?type=misc'>misc</a>" : "<strong>misc</strong>");
							}
						?>
			  		</div>

					<div id='portfolioLanding'>
						<?php

							$file = file_get_contents("portfolio.xml");
							$doc  = DOMDocument::loadXML($file);

							$xpath = new DOMXpath($doc);
							$nodeList = $xpath->query('//exhibit[@type="'. $type .'"]');

							$linkFile = ($type == 'portable') ? "portables.php" : "portfolio.php";
							
							$exhibitLength = ($nodeList->length > 13) ? 13 : $nodeList->length;

							for ($k = 0; k <= ($exhibitLength -= 1); $k += 1) {
								$node = $nodeList->item($k);
								
								$id = $node->getAttribute('id');
								$navText = $node->getAttribute('navtext');
								$thumbSrcOne = $node->getElementsByTagName('thumb');
								$thumbSrcTwo = $thumbSrcOne->item(0);
								$thumbSrc = $thumbSrcTwo->getAttribute('src');

								if ($thumbSrc != '') {
									echo("<div class='portfolioImage'><a href='" . $linkFile . "?exhibitID=" . $id . "'><img src='" . $thumbSrc . "' border='0' /></a><p>" . $navText . "</p></div>");
								}
							}

						?>
					</div>
				</div>

				<div id='clear'></div>
				<?php
							if ($type == 'portable') {
								echo("<div id='footer'>Hadley Exhibits Inc. All Rights Reserved  <a href='http://nimlok.com' target='_blank'><img src='images/logo_nimlock.gif' class='nimlock' alt='nimlok distributor' border='0'/></a></div>");
								
								
							} else {
				echo("<div id='footer'>Hadley Exhibits Inc. All Rights Reserved</div>");
				} ?>

			</div>
			</div>

		</div>

	</body>
</html>