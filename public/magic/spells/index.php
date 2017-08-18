<?php 
	//include '/web/srd.cclloyd.com/settings.php'; 
?>

<html>
	
<head>
	<?php //include '/web/srd.cclloyd.com/meta.php'; 
		
	?>
	<link rel="stylesheet" href="spells.css" style="text/css" />
</head>


<body><div id="wrapper">
	
<?php 
	include $web.'header.php'; 
?>


<?php
	
	$name = $_GET['spell'];

	$someJSON = file_get_contents("/web/srd.cclloyd.com/magic/spells/" . $name . ".json");

	$spell = json_decode($someJSON);
	echo '<script type="text/javascript">var name=';
	echo "'";
	echo $spell->name . "'</script>";
	echo $spell->name;
?>








<div id="spell">
	
	<div id="path">magic > spells ></div>
	
	<h1 id="spell-title"><?php echo $spell->name;?></h1>
	
	<div id="spell-stats">
		<div id="spell-info">
			<span id="spell-school"><b>School</b> <?php echo $spell->school;?> [<?php echo $spell->subschool;?>]; </span>
			<span id="spell-level"><b>Level</b> <?php echo $spell->level;?>; </span>
			<span id="spell-domain"><b>Domain</b> <?php echo $spell->domain;?>; </span>
			<span id="spell-elemental-school"><b>Elemental School</b> <?php echo $spell->elementalschool;?></span>
		</div>
		
		<div id="spell-casting">
			<span class="spell-info-header">CASTING</span>
			<span><b>Casting Time</b> <?php echo $spell->castingtime;?></span>
			<span><b>Components</b> <?php echo $spell->components;?></span>
		</div>
		
		<div id="spell-effect">
			<span class="spell-info-header">EFFECT</span>
			<span><b>Range</b> <?php echo $spell->range;?></span> <br>
			<span><b>Area</b> <?php echo $spell->area;?></span> <br>
			<span><b>Duration</b> <?php echo $spell->duration;?></span> <br>
			<span><b>Saving Throw</b> <?php echo $spell->save;?>; <b>Spell Resistance</b> <?php echo $spell->sr;?></span>
		</div>
	</div>
	
	
	<div id="spell-description">
		<span id="spell-description" class="spell-info-header">DESCRIPTION</span>
		
		<div id="spell-text"><?php  echo file_get_contents("/web/srd.cclloyd.com/magic/spells/descriptions/desc_" . $name . ".json"); ?></div>
	</div>
	
	
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="http://srd.cclloyd.com/urlreplace.js"></script>

</div></body>





