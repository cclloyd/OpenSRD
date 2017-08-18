<head>
	<?php include 'meta.php'; ?>
	<link rel="stylesheet" href="dmtools.css" style="text/css" />
</head>


<body><div id="wrapper">
	
	
<div id="header">
	<img src="http://www.d20pfsrd.com/wp-content/uploads/sites/12/2017/01/customLogo_gif.png" />
	<div id="menu">
		<ul>
			<li><a>Home</a></li>
			<li><a>Spells</a></li>
			<li><a>Feats</a></li>
			<li><a>Items</a></li>
		</ul>
	</div>
</div>




<?php
	
	$name = $_GET['spell'];

	$someJSON = file_get_contents("/web/srd.cclloyd.com/" . $name . ".json");

	$spell = json_decode($someJSON);
	
?>








<div id="spell">
	
	<h1><?php echo $spell->name;?></h1>
	<div id="spell-stats">
		<div id="spell-info">
			<span id="spell-school"><b>School</b> <?php echo $spell->school;?> [<?php echo $spell->subschool;?>]; </span>
			<span id="spell-level"><b>Level</b> <?php echo $spell->level;?>; </span>
			<span id="spell-domain"><b>Domain</b> <?php echo $spell->domain;?>; </span>
			<span id="spell-elemental-school"><b>Elemental School</b> <?php echo $spell->elementalschool;?></span>
		</div>
		
		<div id="spell-casting">
			<span id="spell-casting-header" class="spell-info-header">CASTING</span>
			<span><b>Casting Time</b> <?php echo $spell->castingtime;?></span>
			<span><b>Components</b> <?php echo $spell->components;?></span>
		</div>
		
		<div id="spell-effect">
			<span id="spell-effect-header" class="spell-info-header">EFFECT</span>
			<span><b>Range</b> <?php echo $spell->castingtime;?></span> <br>
			<span><b>Area</b> <?php echo $spell->area;?></span> <br>
			<span><b>Duration</b> <?php echo $spell->duration;?></span> <br>
			<span><b>Saving Throw</b> <?php echo $spell->save;?>; <b>Spell Resistance</b> <?php echo $spell->sr;?></span>
		</div>
	</div>
	
	
	<div id="spell-description">
		<span id="spell-description-header" class="spell-info-header">DESCRIPTION</span>
		
		<div id="spell-text"><?php  echo file_get_contents("/web/srd.cclloyd.com/desc_" . $name . ".json"); ?></div>
	</div>
	
	
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="http://srd.cclloyd.com/urlreplace.js"></script>

</div></body>





