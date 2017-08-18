<?php 
	include '/web/srd.cclloyd.com/settings.php'; 
	define('WEB', '/web/srd.cclloyd.com/public/');
?>


<html>
	
<head>
	<link href="https://fonts.googleapis.com/css?family=Balthazar|Varela" rel="stylesheet">
	<link rel="stylesheet" href="/css/styles.css" style="text/css" />
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/jquery-ui.min.js"></script>
	<script src="/js/urlreplace.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Dosis:400,500,600,700,800|Exo:400,700,800,900|Iceland|Sarpanch:400,700,800,900" rel="stylesheet">

	<script src="/js/lodash.js"></script>
	<link rel="stylesheet" href="/js/gridstack.min.css" style="text/css" />
	<link rel="stylesheet" href="/js/gridstack-extra.min.css" style="text/css" />
	<link rel="stylesheet" href="/js/jquery-ui.min.css" style="text/css" />
	<link rel="stylesheet" href="/js/jquery-ui.structure.min.css" style="text/css" />
	<link rel="stylesheet" href="/js/jquery-ui.theme.min.css" style="text/css" />
	<script src="/js/gridstack.all.js"></script>

	<?php //include WEB.'meta.php'; ?>
	<?php //include '/web/srd.cclloyd.com/public/meta.php'; ?>
</head>

<body>
<?php
	$sheetid = $_GET['id'];	
	session_start();
	$_SESSION['currentSheetID'] = $sheetid;
	include WEB.'header.php';
	//$url = 'https://www.myth-weavers.com/api/v1/sheets/sheets/' . $sheetid;
	//$sheetJSON = file_get_contents($url);
	//$sheet = json_decode($sheetJSON);
?>
<style>
	
</style>
<?php 
$id = $sheetid;
$data = file_get_contents("http://srd.cclloyd.com/api/v1/sheets/sheets/$id");
$sheet = json_decode($data);
//var_dump($sheet);
$name = $sheet->name;

function getMod($num) {
	$val = floor(($num - 10)/2);
	if ($val > 0)
		return "+".$val;
	else
		return $val;
}
?>
<form id="sheet" method="post">
	
	<div>
		<div class="damage-reduction resist-element resist-fire" data-gs-x="0" data-gs-y="0">10 resist</div>
		<div class="damage-reduction resist-element resist-cold" data-gs-x="0" data-gs-y="1">15 resist</div>
		<div class="damage-reduction resist-element resist-acid immune" data-gs-x="0" data-gs-y="2">immune</div>
	</div>
	
	
	<div class="grid-stack">
	    <div class="grid-stack-item"
	        data-gs-x="0" data-gs-y="0"
	        data-gs-width="4" data-gs-height="2">
	            <div class="grid-stack-item-content"></div>
	    </div>
	    <div class="grid-stack-item"
	        data-gs-x="4" data-gs-y="0"
	        data-gs-width="4" data-gs-height="4">
	            <div class="grid-stack-item-content"></div>
	    </div>
	</div>
	
</form>
<script type="text/javascript">
$(function () {
    //$('#stats-stack').gridstack(options_stats);
    //$('#damage-reduction-stack').gridstack(options_damage_red
    
    $('.grid-stack').gridstack({
        cellHeight: '25px',
        cellWidth:  '25px',
        verticalMargin: 0,
        draggable: true,
        disableResize: true,
        animate: true,
        width: 10,
        height: 10,
    });
});
</script>

<div style="height: 1000px;"></div>
</body>
</html>