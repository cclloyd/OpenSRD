<?php
	$root = "/web/srd.cclloyd.com/";
?>

<head>
	<?php include ($root.'meta.php'; ?>
	<link rel="stylesheet" href="simple.css" style="text/css" />
</head>


<body><div id="wrapper">
	
<?php include('/web/srd.cclloyd.com/header.php'); 
	
	/*
$url = "http://www.myth-weavers.com/sheet.html#id=1227746";
var_dump($url);
$html = file_get_html($url);
//echo "<pre>";
//foreach ( $html->find ( 'div' ) as $element ) {
var_dump(file_get_contents($url));
var_dump($html);*/

/*
$html = 'Assume this is html that you get';
$dom = new DOMDocument;
$dom->loadHTML($html);
$dom->preserveWhiteSpace = false;
$tables = $dom->getElementsByTagName('table');  // Sample to get table element
$rows = $tables->item(0)->getElementsByTagName('tr'); // sample to get rows of the table element
*/
	
/*	
$url = 'https://www.myth-weavers.com/api/v1/sheets/sheets/1178421';
$sheetJSON = file_get_contents($url);
$sheet = json_decode($sheetJSON);
$data = $sheet->sheetdata->data;
//$sheet->sheetdata->portrait = "https://i.imgur.com/XeGgqo0.png"
$sheet->portrait = "https://i.imgur.com/XeGgqo0.png";*/
/*
	//https://i.imgur.com/XeGgqo0.png
	*/
/*
$url2 = 'https://www.myth-weavers.com/api/v1/sheets/sheets/1227746';
$sheetJSON2 = file_get_contents($url2);
$sheet2 = json_decode($sheetJSON2);
$data2 = $sheet2->sheetdata->data;
*/




//$sheets = ['1178421','1266961','1178753'];
$sheets = ['1178421','1266961','1178753','1230249', '1227746', '1178578'];


	
function printMod($val) {
	if ($val > 0)
		echo "+".$val;
	else
		echo $val;
}
	
	
?>
<div id="sheet">
	
	<?php
		
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

	?>
	<div class="player-stat-card" >
		<div class="player-image" style="background-image: <?php echo $portraitCSS; ?>">
			<div class="player-image-mask"></div>
		</div>
			
			
			
		<div class="player-info">
			<div class="player-header-bar">
				<span class="player-name"><?php 
					$str = explode(" ", $sheet->sheetdata->name);
					echo $str[0] . " " . $str[1]
					?></span>
				<span class="player-close-button">×</span>
				<span class="player-popout-button">⇱</span>
			</div>
			
			<div class="player-class">Lvl <?php echo $data->Level . " — " . $data->Race . " " . $data->Class; ?></div>
			
			
			<div class="table ability-scores">
				<div class="tr inforow">
					<div class="td">Ability</div>
					<div class="td">Score</div>
					<div class="td">Mod</div>
					<div class="td">Temp Score</div>
					<div class="td">Temp Mod</div>
				</div>
				<div class="tr">
					<div class="th">STR</div>
					<div class="td"><?php echo $data->Str; ?></div>
					<div class="td"><?php printMod($data->StrMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Str; ?>"></div>
					<div class="td tempmod"><?php printMod($data->StrMod); ?></div>
				</div>
				<div class="tr">
					<div class="th">DEX</div>
					<div class="td"><?php echo $data->Dex; ?></div>
					<div class="td"><?php printMod($data->DexMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Dex; ?>"></div>
					<div class="td tempmod"><?php printMod($data->DexMod); ?></div>
				</div>
				<div class="tr">
					<div class="th">CON</div>
					<div class="td"><?php echo $data->Con; ?></div>
					<div class="td"><?php printMod($data->ConMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Con; ?>"></div>
					<div class="td tempmod"><?php printMod($data->ConMod); ?></div>
				</div>
				<div class="tr">
					<div class="th">INT</div>
					<div class="td"><?php echo $data->Int; ?></div>
					<div class="td"><?php printMod($data->IntMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Int; ?>"></div>
					<div class="td tempmod"><?php printMod($data->IntMod); ?></div>
				</div>
				<div class="tr">
					<div class="th">WIS</div>
					<div class="td"><?php echo $data->Wis; ?></div>
					<div class="td"><?php printMod($data->WisMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Wis; ?>"></div>
					<div class="td tempmod"><?php printMod($data->WisMod); ?></div>
				</div>
				<div class="tr">
					<div class="th">CHA</div>
					<div class="td"><?php echo $data->Cha; ?></div>
					<div class="td"><?php printMod($data->ChaMod); ?></div>
					<div class="td tempmod changable"><input type="text" name="StrTemp" title="StrTemp" class="tempmod" value="<?php echo $data->Cha; ?>"></div>
					<div class="td tempmod"><?php printMod($data->ChaMod); ?></div>
				</div>
			</div>
			
			<div class="table health">
				<div class="tr inforow"><div class="td"></div></div>
				<div class="tr"><div class="th">HP</div></div>
				<div class="tr"><div class="td"><?php echo $data->HP; ?></div></div>
				<div class="tr"><div class="th">Align</div></div>
				<div class="tr"><div class="td"><?php echo $data->Alignment; ?></div></div>
				<div class="tr"><div class="th">Speed</div></div>
				<div class="tr"><div class="td"><?php echo $data->Speed; ?></div></div>
			</div>
			
			
			<div class="table saves">
				<div class="tr">
					<div class="th">FORT</div>
					<div class="td"><?php printMod($data->Fort); ?></div>
				</div>
				<div class="tr">
					<div class="th">REF</div>
					<div class="td"><?php printMod($data->Reflex); ?></div>
				</div>
				<div class="tr">
					<div class="th">WILL</div>
					<div class="td"><?php printMod($data->Will); ?></div>
				</div>
			</div>
			
			
			<div class="table defense">
				<div class="tr">
					<div class="th">AC</div>
					<div class="td"><?php echo $data->AC; ?></div>
					<div class="th">Touch</div>
					<div class="td"><?php echo $data->ACTouch; ?></div>
				</div>
				<div class="tr">
					<div class="th">Flat</div>
					<div class="td"><?php echo $data->ACFlat; ?></div>
					<div class="th">CMD</div>
					<div class="td"><?php echo $data->CMD; ?></div>
				</div>
			</div>
			
			<div class="table dr">
				<div class="tr">
					<div class="th">DR</div>
					<div class="td"><?php echo $data->DamageRed; ?></div>
				</div>
			</div>
			
			<div class="table dc"> 
				<div class="tr">
					<div class="th">DC</div>
					<div class="th">1</div>
					<div class="th">2</div>
					<div class="th">3</div>
					<div class="th">4</div>
				</div>
				<div class="tr">
					<div class="td"></div>
					<div class="td"><?php echo $casterMod + 10 + 1;?></div>
					<div class="td"><?php echo $casterMod + 10 + 2;?></div>
					<div class="td"><?php echo $casterMod + 10 + 3;?></div>
					<div class="td"><?php echo $casterMod + 10 + 4;?></div>
				</div>
				<div class="tr">
					<div class="th">5</div>
					<div class="th">6</div>
					<div class="th">7</div>
					<div class="th">8</div>
					<div class="th">9</div>
				</div>
				<div class="tr">
					<div class="td"><?php echo $casterMod + 10 + 5;?></div>
					<div class="td"><?php echo $casterMod + 10 + 6;?></div>
					<div class="td"><?php echo $casterMod + 10 + 7;?></div>
					<div class="td"><?php echo $casterMod + 10 + 8;?></div>
					<div class="td"><?php echo $casterMod + 10 + 9;?></div>
				</div>
				</div>
			
	
			
			
	
			
			
			
		</div>

	</div>
	<?php 
		} /* End of Card Loop */ 
	?>
	
	
	<div class="blank-stat-card" >
		<div class="player-image" style="background-image: none">
			<div class="player-image-mask"></div>
		</div>
		<div class="add-player">
				<div class="add-button">+</div>
		</div>
	</div>
	
	
	
	<div style="height: 1000px"></div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="urlreplace.js"></script>

</div></body>





