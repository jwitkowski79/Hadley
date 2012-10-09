
<?php

	$xml_file = "portfolio.xml";
	$exhibitID = ($_GET['exhibitID'] != "") ? $_GET['exhibitID'] : 1;

	$xml_portfolio_title_key = "portfolio*exhibit*";

	$file = file_get_contents("portfolio.xml");
	$doc  = DOMDocument::loadXML($file);

	//$exhibits = $doc->getElementsByTagName("exhibit");

	$xpath = new DOMXpath($doc);
	$nodeList = $xpath->query('//exhibit[@id="'. $exhibitID .'"]');

	if ($nodeList->length) {
		$exhibit = $nodeList->item(0);

		$title = $exhibit->getAttribute('name');
		$type = $exhibit->getAttribute('type');

		$desc = $exhibit->getElementsByTagName('desc')->item(0)->getAttribute('content');
		$size = $exhibit->getElementsByTagName('desc')->item(0)->getAttribute('size');

		$images = $exhibit->getElementsByTagName('image');

		foreach ($images as $image) {
			$tmpZoom = $image->getAttribute('zoom');
			$tmpThumb = $image->getAttribute('thumb');

			$imageArray[$tmpZoom] = $tmpThumb;
		}
	}

?>

<div id='portfolioLanding'>
	<div id='portfolioHolder'>
		<div id='portfolioLImage'><img id='imgLarge' src='<?php echo key($imageArray); ?>' alt='' /></div>
		<div id='portfolioText'>
			<strong><?php echo $title; ?></strong><br/><?php echo $size; ?><p><?php echo $desc; ?></p>
			<ul>
				<?php
					foreach ($imageArray as $key=>$val) {
						
						echo "<li><img src='" . $val . "' thumb='" . $key . "' onclick='thumbClick(event);' class='portfolioImg' alt='' /></li>";
					}
				?>
			</ul>
		</div>
	</div>
</div>