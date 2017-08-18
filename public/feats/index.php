<head>
	<link href="https://fonts.googleapis.com/css?family=Balthazar|Varela" rel="stylesheet">
	


<link rel="stylesheet" href="http://srd.cclloyd.com/styles.css" style="text/css" />

</head>


<body><div id="wrapper">
	

<?php include('../header.php'); ?>





<?php
	
	$name = $_GET['feat'];
	$filename = "/web/srd.cclloyd.com/feats/" . $name . ".json";
	$json = file_get_contents($filename);
	$feat = json_decode($json);
	echo '<script type="text/javascript">var name=';
	echo "'";
	echo $spell->name . "'</script>";
	echo $spell->name;
?>




<style>
#feat {
	width: 80%;
	padding: 20px;
}
#feat-flavor-text {
	margin: 20px auto;
	padding-left: 20px;
}
#feat-prereqs, #feat-benefit, #feat-normal {
	margin-bottom: 20px;
}
#feat-benefit div {
	margin-bottom: 20px;
}
</style>



<div id="feat">
	
	<h1 id="feat-title"><?php echo $feat->name;?></h1>
	
	<div id="feat-flavor-text"><i><?php echo $feat->flavortext; ?></i></div>
	<div id="feat-prereqs"><b>Prerequisites: </b><?php echo $feat->prereqs; ?></div>
	<div id="feat-benefit">
		<div id="benefit"><b>Benefit: </b><?php echo $feat->benefit; ?></div>
		<div id="feat-motes"><b>Motes Gained: </b>none</div>
	</div>
	<div id="feat-normal"><b>Normal: </b></div>

	
	
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="http://srd.cclloyd.com/urlreplace.js"></script>

</div></body>





