<?php 	
define('WEB', '/web/srd.cclloyd.com/public/');
?>
<head>
	<?php include 'meta.php'; ?>
</head>


<body><div id="wrapper">
	
<?php 
	
	include('header.php'); 
	

	
	
	


$sheets = ['1178421','1266961','1178753','1230249', '1227746'];


	
function printMod($val) {
	if ($val > 0)
		echo "+".$val;
	else
		echo $val;
}
	
	
?>
<div id="sheet-wrapper">
	
	
	<div id="sheet">
		<div id="info">
			<div id="name"></div>
		</div>
		
		<div id="stats">
			
		</div>
		
		<?php
			require WEB."DiceCalc/Calc.php";
			require WEB."DiceCalc/CalcDice.php";
			require WEB."DiceCalc/CalcOperation.php";
			require WEB."DiceCalc/CalcSet.php";
			require WEB."DiceCalc/Random.php";
		
		
			$calc = new Calc("3d6");
			var_dump($calc);
		?>
	</div>
	
	
	
	
	
	<?php
		/*
		foreach ($sheets as $sheetid) {
			
			$url = 'https://www.myth-weavers.com/api/v1/sheets/sheets/' . $sheetid;
			$sheetJSON = file_get_contents($url);
			$sheet = json_decode($sheetJSON);
			$data = $sheet->sheetdata->data;
			$portraitCSS = "url('" . $data->PicURL . "'); ";
			
			$casterMod;
			$wisModClasses = ['Cleric', 'Oracle', 'druid', 'Inquisitor', 'Ranger'];
			$intModClasses = ['Wizard', 'Psychic'];
			$chaModClasses = ['Sorcerer'];
			
			$modClass = explode("/", $data->Class);
			$modClass2 = explode(" ", $modClass[0]);
			foreach($wisModClasses as $modclass) {
				if (strcasecmp($modclass, $modClass2[0]) == 0) {
					$casterMod = $data->WisMod; break;
				}
			}
			foreach($intModClasses as $modclass) {
				if (strcasecmp($modclass, $modClass2[0]) == 0) {
					$casterMod = $data->IntMod; break;
				}
			}
	*/
	?>			
	
	
	
	<div style="height: 1000px"></div>

</div>
</div></body>

