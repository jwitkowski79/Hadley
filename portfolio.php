<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<title>Hadley Exhibits-Our Work</title>

		<link href='include/style/hadley.css' type='text/css' rel='stylesheet' />
		<script type='text/javascript' src='include/script/jquery-1.3.2.min.js'></script>

		<script type='text/javascript' language='javascript'>

			$(function() {
				$('#portfolioText img:first').addClass('portfolioImgSel').removeClass('portfolioImg');
			});

			function thumbClick(e) {
				var event = e || window.event;
				var target = event.target || event.srcElement;  // get sender object
				
				$('.portfolioImgSel').addClass('portfolioImg').removeClass('portfolioImgSel');  // clear border(s)
				$(target).removeClass('portfolioImg').addClass('portfolioImgSel');  // add border to just clicked
				
				$('#imgLarge').attr('src', $(target).attr('thumb'));  // change the big image
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

					$portfolioLinks[$id] = $navText;
				}
			}

			function renderTypeLinks() {
				global $portfolioLinks;
				echo("<span style='font-size:10px; line-height:14px; color:#333;'> <ul>");
				foreach ($portfolioLinks as $key=>$val) {
					if ($key == $_GET['exhibitID']) {
						echo("<li><span class='navSelected'>" . $val . "</span></li>");
					} else {
						echo("<li><a href='portfolio.php?exhibitID=" . $key . "'>" . $val . "</a></li>");
					}
				}
				echo("</ul></span>");
			}

		?>

		<div id='container'>
			<div id='containerBack'>

			<div id="containerInner">
			<?php include 'header.php' ?>
				

				<div id='content' style='margin-top:25px;'>
					<div id='portfolioNav'>

						<?php

							if ($type == 'trade') {
								echo("<strong>trade shows</strong><br/>");
								renderTypeLinks();
							} else {
								echo("<a href='listing.php?type=trade'>trade shows</a><br />");
							}

							if ($type == 'museum') {
								echo("<br /><strong>museums</strong><br/>");
								renderTypeLinks();
							} else {
								echo("<a href='listing.php?type=museum'>museums</a><br />");
							}

							if ($type == 'visitor') {
								echo("<br /><strong>visitor centers</strong><br/>");
								renderTypeLinks();
							} else {
								echo("<a href='listing.php?type=visitor'>visitor centers</a><br />");
							}

							if ($type == 'zoo') {
								echo("<br /><strong>zoos</strong><br/>");
								renderTypeLinks();
							} else {
								echo("<a href='listing.php?type=zoo'>zoos</a><br />");
							}
							
							if ($type == 'frank') {
								echo("<br /><strong>custom casework</strong><br />");
								renderTypeLinks();
							} else { 
								echo("<a href='listing.php?type=frank'>custom casework</a><br />");
							}

							if ($type == 'events') {
								echo("<br /><strong>events</strong><br />");
								renderTypeLinks();
							} else { 
								echo("<a href='listing.php?type=events'>events</a><br />");
							}
							
							if ($type == 'misc') {
								echo("<br /><strong>misc</strong><br />");
								renderTypeLinks();
							} else {
								echo("<a href='listing.php?type=misc'>misc</a>");
							}

						?>

					</div>

					<?php include('xmlparse.php') ?>

				</div>

				<div id='clear'></div>
				<div id='footer'>Hadley Exhibits Inc. All Rights Reserved </div>
			</div>

			</div>
		</div>
	</body>
</html>
