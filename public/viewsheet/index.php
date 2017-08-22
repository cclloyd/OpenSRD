<?php 
	include '/web/srd.cclloyd.com/settings.php'; 
	define('WEB', '/web/srd.cclloyd.com/public/');

function db_array($query) {
	$link = mysqli_connect('localhost', 'root', 'these7enpillar', 'websrd');
	if (!$link) {
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	$result = $link->query($query);
	$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
	return $data;
}

function db_single($query) {
	$link = mysqli_connect('localhost', 'root', 'these7enpillar', 'websrd');
	if (!$link) {
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	$result = $link->query($query);
	$data = mysqli_fetch_assoc($result);
	return $data;
}
function getSheet($sheetid) {
	//$link = new mysqli('localhost', 'srduser', 'these7enpillar');
	$id = $sheetid;
	$query = "SELECT * from sheets WHERE id='$id'";
	$data = db_single($query); 
	//$result = $link->query($query);
	//$query = "SELECT * from sheets_blocks WHERE id='$id'";
	//$data->text = db_single($query);
	//$response = $response->withJson($data, 201);
	//$response = $response->withJson($data, 201);
	//echo "FUCK2";
	return json_encode($data);;
}

function getSheetBlocks($sheetid) {
	//$link = new mysqli('localhost', 'srduser', 'these7enpillar');
	$id = $sheetid;
	$query = "SELECT * from sheets_blocks WHERE id='$id'";
	$data = db_single($query);
	//$result = $link->query($query);
	//$query = "SELECT * from sheets_blocks WHERE id='$id'";
	//$data->textblocks = db_single($query);
	//$response = $response->withJson($data, 201);
	//$response = $response->withJson($data, 201);
	return json_encode($data);;
}
?>


<html>
	
<head>
	<?php include WEB.'meta.php'; ?>
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
<div id="save-banner">
	<div class="save-color"></div>
	<div class="save-color"></div>
	<div class="save-color"></div>
	<div class="save-color"></div>
	<div class="save-color">Saved</div>
</div>
<?php 
$id = $sheetid;
	
$data = getSheet($id);
$sheet = json_decode($data);
$data = getSheetBlocks($id);
$sheet->text = json_decode($data);
	
$name = $sheet->Name;

function getMod($num) {
	$val = floor(($num - 10)/2);
	if ($val > 0)
		return "+".$val;
	else
		return $val;
}
?>
<script>
	var damagered = '{"damagered-1":{"type":"r","element":"fire","amount":"10"},"damagered-2":{"type":"i","element":"acid","amount":"0"},"damagered":{"type":"r","element":"cold","amount":"5"}}';
</script>
<div id="sheet-wrapper" class="sheet-static">
<form id="sheet" method="post">

	<div id="loading-overlay">
		<div class="cssload-bell">
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
		</div>
		<div class="csscssload-load-frame">
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
			<div class="cssload-dot"></div>
		</div>
	</div>
	
	
	
	<input type="Submit" value="Save" id="save-button"/>
	
	<div id="alert-success" class="save-alert">Saved</div>
	
	
	<div class="player-info">
		<div class="player-info-block double-wide"><input type="text" autocomplete="off" class="sheet-input" name="Name" title="Name" value="<?php echo "$sheet->Name"; ?>" />			<span class="info-row">Name</span></div>
		<div class="player-info-block double-wide"><input type="text" autocomplete="off" class="sheet-input" name="Player" title="Player" value="<?php echo "$sheet->Player"; ?>" />	<span class="info-row">Player</span></div>
		<div class="player-info-block double-wide"><input type="text" autocomplete="off" class="sheet-input" name="Class" title="Class" value="<?php echo "$sheet->Class"; ?>" />		<span class="info-row">Class</span></div>
		<div class="player-info-block double-wide"><input type="text" autocomplete="off" class="sheet-input" name="Race" title="Race" value="<?php echo "$sheet->Race"; ?>" />			<span class="info-row">Race</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Alignment" title="Alignment" value="<?php echo "$sheet->Alignment"; ?>" />	<span class="info-row">Alignment</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Campaign" title="Campaign" value="<?php echo "$sheet->Campaign"; ?>" />		<span class="info-row">Campaign</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Deity" title="Deity" value="<?php echo "$sheet->Deity"; ?>" />				<span class="info-row">Deity</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Level" title="Level" value="<?php echo "$sheet->Level"; ?>" />				<span class="info-row">Level</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Size" title="Size" value="<?php echo "$sheet->Size"; ?>" />				<span class="info-row">Size</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Age" title="Age" value="<?php echo "$sheet->Age"; ?>" />					<span class="info-row">Age</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Gender" title="Gender" value="<?php echo "$sheet->Gender"; ?>" />			<span class="info-row">Gender</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Height" title="Height" value="<?php echo "$sheet->Height"; ?>" />			<span class="info-row">Height</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Weight" title="Weight" value="<?php echo "$sheet->Weight"; ?>" />			<span class="info-row">Weight</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Eyes" title="Eyes" value="<?php echo "$sheet->Eyes"; ?>" />					<span class="info-row">Eyes</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Hair" title="Hair" value="<?php echo "$sheet->Hair"; ?>" />					<span class="info-row">Hair</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="XPCurrent" title="XPCurrent" value="<?php echo "$sheet->XPCurrent"; ?>" />	<span class="info-row">Current XP</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="XPNext" title="XPNext" value="<?php echo "$sheet->XPNext"; ?>" />			<span class="info-row">XP to next level</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="XPChange" title="XPChange" value="<?php echo "$sheet->XPChange"; ?>" />		<span class="info-row">XP Change</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="XPSpeed" title="XPSpeed" value="<?php echo "$sheet->XPSpeed"; ?>" />		<span class="info-row">XP Speed (S/M/F)</span></div>
		<div class="player-info-block"><input type="text" autocomplete="off" class="sheet-input" name="Mythic" title="Mythic" value="Trickster 1" />									<span class="info-row">Mythic</span></div>
	</div>
	
	<div class="ability-scores static-card">
		<div class="ability-block">
			<span class="info-row"> </span>
			<span class="info-row">Score</span>
			<span class="info-row">Mod</span>
			<span class="info-row">Temp</span>
			<span class="info-row">Temp Mod</span>
		</div>
		<div class="ability-block">
			<div class="header-block">STR</div>
			<input autocomplete="off" type="number" class="sheet-input" name="Str" title="Str" value="<?php echo "$sheet->Str"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="StrMod" title="StrMod" value="<?php echo getMod($sheet->Str); ?>" readonly />
			<input autocomplete="off" type="number" class="sheet-input" name="StrTemp" title="StrTemp" value="<?php echo "$sheet->StrTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="StrTempMod" title="StrTempMod" value="<?php echo getMod($sheet->StrTemp); ?>" readonly />
		</div>
		<div class="ability-block">
			<div class="header-block">DEX</div>
			<input autocomplete="off" type="number" class="sheet-input" name="Dex" title="Dex" value="<?php echo "$sheet->Dex"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="DexMod" title="DexMod" value="<?php echo getMod($sheet->Dex); ?>" readonly />
			<input autocomplete="off" type="number" class="sheet-input" name="DexTemp" title="DexTemp" value="<?php echo "$sheet->DexTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="DexTempMod" title="DexTempMod" value="<?php echo getMod($sheet->DexTemp); ?>" readonly />
		</div>
		<div class="ability-block">
			<div class="header-block">CON</div>
			<input autocomplete="off" type="number" class="sheet-input" name="Con" title="Con" value="<?php echo "$sheet->Con"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="ConMod" title="ConMod" value="<?php echo getMod($sheet->Con); ?>" readonly />
			<input autocomplete="off" type="number" class="sheet-input" name="ConTemp" title="ConTemp" value="<?php echo "$sheet->ConTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="ConTempMod" title="ConTempMod" value="<?php echo getMod($sheet->ConTemp); ?>" readonly />
		</div>
		<div class="ability-block">
			<div class="header-block">INT</div>
			<input autocomplete="off" type="number" class="sheet-input" name="IntScore" title="IntScore" value="<?php echo "$sheet->IntScore"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="IntMod" title="IntMod" value="<?php echo getMod($sheet->IntScore); ?>" readonly/>
			<input autocomplete="off" type="number" class="sheet-input" name="IntTemp" title="IntTemp" value="<?php echo "$sheet->IntTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="IntTempMod" title="IntTempMod" value="<?php echo getMod($sheet->IntTemp); ?>" readonly />
		</div>
		<div class="ability-block">
			<div class="header-block">WIS</div>
			<input autocomplete="off" type="number" class="sheet-input" name="Wis" title="Wis" value="<?php echo "$sheet->Wis"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="WisMod" title="WisMod" value="<?php echo getMod($sheet->Wis); ?>" readonly />
			<input autocomplete="off" type="number" class="sheet-input" name="WisTemp" title="WisTemp" value="<?php echo "$sheet->WisTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="WisTempMod" title="WisTempMod" value="<?php echo getMod($sheet->WisTemp); ?>" readonly />
		</div>
		<div class="ability-block">
			<div class="header-block">CHA</div>
			<input autocomplete="off" type="number" class="sheet-input" name="Cha" title="Cha" value="<?php echo "$sheet->Cha"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="ChaMod" title="ChaMod" value="<?php echo getMod($sheet->Cha); ?>" readonly />
			<input autocomplete="off" type="number" class="sheet-input" name="ChaTemp" title="ChaTemp" value="<?php echo "$sheet->ChaTemp"; ?>" />
			<input autocomplete="off" type="text" class="sheet-input" name="ChaTempMod" title="ChaTempMod" value="<?php echo getMod($sheet->ChaTemp); ?>" readonly />
		</div>
	</div>
	
	
	<div class="player-health static-card"> 
		
		<div class="health-block header-block">HP</div>
		<div class="health-block">
			<span class="info-row">Max HP</span>
			<input autocomplete="off" type="number" class="sheet-input" name="HP" title="HP" value="<?php echo "$sheet->HP"; ?>" />
		</div>
		<div class="health-block">
			<span class="info-row">Current HP</span>
			<input autocomplete="off" type="number" class="sheet-input" name="HPWounds" title="HPWounds" value="<?php echo "$sheet->HPWounds"; ?>" />
		</div>
		<div class="health-block">
			<span class="info-row">Temp HP</span>
			<input autocomplete="off" type="number" class="sheet-input" name="HPTemp" title="HPTemp" value="<?php echo "$sheet->HPTemp"; ?>" />
		</div>
		<div class="health-block">
			<span class="info-row">Nonlethal</span>
			<input autocomplete="off" type="number" class="sheet-input" name="HPNonlethal" title="HPNonlethal" value="<?php echo "$sheet->HPNonlethal"; ?>" />
		</div>
		<div class="health-block">
			<span class="info-row">HD</span>
			<input autocomplete="off" type="number" class="sheet-input" name="HPHD" title="HPHD" value="<?php echo "$sheet->HPHD"; ?>" />
		</div>
			
	</div>
	
	
	<div class="player-defense static-card">
		<div class="header-block defense-block">AC</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="AC" title="AC" value="<?php echo "$sheet->AC"; ?>" />
			<span class="add">=</span>
			<div class="info-row">TOTAL</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACArmor" title="ACArmor" value="<?php echo "$sheet->ACArmor"; ?>" />
			<span class="add">+</span>
			<div class="info-row">Armor</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACShield" title="ACShield" value="<?php echo "$sheet->ACShield"; ?>" />
			<span class="add">+</span>
			<div class="info-row">Shield</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACDex" title="ACDex" value="<?php echo "$sheet->ACDex"; ?>" />
			<span class="add">+</span>
			<div class="info-row">Dex</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACDodge" title="ACDodge" value="<?php echo "$sheet->ACDodge"; ?>" />
			<span class="add">+</span>
			<div class="info-row">Dodge</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACSize" title="ACSize" value="<?php echo "$sheet->ACSize"; ?>" />
			<span class="add">+</span>
			<div class="info-row">Size</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACNat" title="ACNat" value="<?php echo "$sheet->ACNat"; ?>" /> 
			<span class="add">+</span>
			<div class="info-row">Natural</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACDeflect" title="ACDeflect" value="<?php echo "$sheet->ACDeflect"; ?>" /> 
			<span class="add">+</span>
			<div class="info-row">Deflect</div>
		</div>
		<div class="defense-block">
			<input autocomplete="off" type="number" class="sheet-input ac-mod" name="ACMisc" title="ACMisc" value="<?php echo "$sheet->ACMisc"; ?>" />
			<div class="info-row">Misc.</div>
		</div>
	</div>
		
	
	
	<div class="saves static-card"> 
	
		<div class="saves-row info-row">
			<div class="saves-block">Saving Throws</div>
			<div class="saves-block">Total</div>
			<div class="saves-block">Base</div>
			<div class="saves-block">Ability Mod</div>
			<div class="saves-block">Magic Mod</div>
			<div class="saves-block">Misc Mod</div>
			<div class="saves-block">Temp Mod</div>
		</div>
		
		<div class="saves-row">
			<div class="saves-block">
				<div class="header-block">Fortitude</div><span></span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="Fort" title="Fort" value="<?php echo "$sheet->Fort"; ?>" />
				<span>=</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="FortBase" title="FortBase" value="<?php echo "$sheet->FortBase"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="FortAbility" title="FortAbility" value="<?php echo "$sheet->FortAbility"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="FortMagic" title="FortMagic" value="<?php echo "$sheet->FortMagic"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="FortMisc" title="FortMisc" value="<?php echo "$sheet->FortMisc"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="FortTemp" title="FortTemp" value="<?php echo "$sheet->FortTemp"; ?>" />
			</div>
		</div>
		
		<div class="saves-row">
			<div class="saves-block">
				<div class="header-block">Reflex</div>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="Reflex" title="Reflex" value="<?php echo "$sheet->Reflex"; ?>" />
				<span>=</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="ReflexBase" title="ReflexBase" value="<?php echo "$sheet->ReflexBase"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="ReflexAbility" title="ReflexAbility" value="<?php echo "$sheet->ReflexAbility"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="ReflexMagic" title="ReflexMagic" value="<?php echo "$sheet->ReflexMagic"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="ReflexMisc" title="ReflexMisc" value="<?php echo "$sheet->ReflexMisc"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="ReflexTemp" title="ReflexTemp" value="<?php echo "$sheet->ReflexTemp"; ?>" />
			</div>
		</div>
		<div class="saves-row">
			<div class="saves-block">
				<div class="header-block">Will</div>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="Will" title="Will" value="<?php echo "$sheet->Will"; ?>" />
				<span>=</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="WillBase" title="WillBase" value="<?php echo "$sheet->WillBase"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="WillAbility" title="WillAbility" value="<?php echo "$sheet->WillAbility"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="WillMagic" title="WillMagic" value="<?php echo "$sheet->WillMagic"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="WillMisc" title="WillMisc" value="<?php echo "$sheet->WillMisc"; ?>" />
				<span>+</span>
			</div>
			<div class="saves-block">
				<input autocomplete="off" type="number" class="sheet-input" name="WillTemp" title="WillTemp" value="<?php echo "$sheet->WillTemp"; ?>" />
			</div>
		</div>
	</div>
	<div>
		<input type="text" name="DamageRed" autofill="off" value="<?php echo "$sheet->DamageRed"; ?>" />
	</div>
	
	<div class="damage-reduction">
	<?php 
		
		//var_dump($_SERVER['PHP_SELF']);
		//var_dump(phpinfo());
		
		$dr = $sheet->DamageRed;
		$drlist = explode('#', $dr);
		foreach ($drlist as $item) {
			$type = '';
			$element = '';
			$amount = 0;
			$prop = explode(',', $item);
			if ($prop[0] == 'i') {
				$type = 'immune';
			}
			else if ($prop[0] == 'r') {
				$type = 'resist-element';
			}
			
			if ($prop[1] == 'fire') {
				$element = 'resist-fire';
			}
			else if ($prop[1] == 'acid') {
				$element = 'resist-acid';
			}
			else if ($prop[1] == 'cold') {
				$element = 'resist-cold';
			}
			$amount = intval($prop[2]);
			if ($type == 'immune') {
				echo "<div class='dr-item $type $element' data-gs-x='0' data-gs-y='2'>immune</div>";
				//echo "test";
			}
			else {
				echo "<div class='dr-item $type $element' data-gs-x='0' data-gs-y='2'>$amount resist</div>";
			}

		}
	?>
	</div>
	
	<div class="table bab">
		<div class="tr">
			<div class="td info-row"></div>
			<div class="td info-row">Total</div>
			<div class="td info-row">Base</div>
			<div class="td info-row">Str Mod</div>
			<div class="td info-row">Size Mod</div>
			<div class="td info-row">Misc Mod</div>
			<div class="td info-row">Temp Mod</div>
		</div>
		<div class="tr">
			<div class="th">MELEE</div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBAB" title="MBAB" value="<?php echo "$sheet->MBAB"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBABBase" title="MBABBase" value="<?php echo "$sheet->MBABBase"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBABStr" title="MBABStr" value="<?php echo "$sheet->MBABStr"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBABSize" title="MBABSize" value="<?php echo "$sheet->MBABSize"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBABMisc" title="MBABMisc" value="<?php echo "$sheet->MBABMisc"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="MBABTemp" title="MBABTemp" value="<?php echo "$sheet->MBABTemp"; ?>" /></div>
		</div>
		<div class="tr">
			<div class="th">CMB</div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBAB" title="CMBBAB" value="<?php echo "$sheet->CMBBAB"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBABBase" title="CMBBABBase" value="<?php echo "$sheet->CMBBABBase"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBABStr" title="CMBBABStr" value="<?php echo "$sheet->CMBBABStr"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBABSize" title="CMBBABSize" value="<?php echo "$sheet->CMBBABSize"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBABMisc" title="CMBBABMisc" value="<?php echo "$sheet->CMBBABMisc"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="CMBBABTemp" title="CMBBABTemp" value="<?php echo "$sheet->CMBBABTemp"; ?>" /></div>
		</div>
		<div class="tr">
			<div class="th">RANGED</div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBAB" title="RBAB" value="<?php echo "$sheet->RBAB"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBABBase" title="RBABBase" value="<?php echo "$sheet->RBABBase"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBABDex" title="RBABDex" value="<?php echo "$sheet->RBABDex"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBABSize" title="RBABSize" value="<?php echo "$sheet->RBABSize"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBABMisc" title="RBABMisc" value="<?php echo "$sheet->RBABMisc"; ?>" /></div>
			<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="RBABTemp" title="RBABTemp" value="<?php echo "$sheet->RBABTemp"; ?>" /></div>
		</div>
	</div>
	
	<div class="equipped" id="weapons">
	
		<?php 
			$sheet->text->Weapons = json_decode($sheet->text->Weapons);
			for ($i=0; $i<count($sheet->text->Weapons); $i++) {
				//var_dump($sheet->text->Weapons[$i]->Name);
				
				echo "<div class='weapon inventory-item equipped-item' id='weapon$i' data-weapon='$i'>";
				
				echo "<div class='weapon-info weapon-name double-wide'><div class='info-row'>Name</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponName[]' title='WeaponName$i' value='" . $sheet->text->Weapons[$i]->Name . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Attack Bonus</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponAB[]' title='WeaponAB$i' value='" . $sheet->text->Weapons[$i]->AB . "' /></div>";
				
				echo "<div class='weapon-info weapon-name double-wide'><div class='info-row'>Damage</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponDamage[]' title='WeaponDamage$i' value='" . $sheet->text->Weapons[$i]->Damage . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Crit Range</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponCrit[]' title='WeaponCrit$i' value='" . $sheet->text->Weapons[$i]->Crit . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Range</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponRange[]' title='WeaponRange$i' value='" . $sheet->text->Weapons[$i]->Range . "' /></div>";
				
				echo "<div class='weapon-info weapon-name double-wide'><div class='info-row'>Special Properties</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponSpecial[]' title='WeaponSpecial$i' value='" . $sheet->text->Weapons[$i]->Special . "' /></div>";
				
				echo "<div class='weapon-info weapon-name double-wide'><div class='info-row'>Ammo</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponAmmo[]' title='WeaponAmmo$i' value='" . $sheet->text->Weapons[$i]->Ammo . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Weight</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponWeight[]' title='WeaponWeight$i' value='" . $sheet->text->Weapons[$i]->Weight . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Size</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponSize[]' title='WeaponSize$i' value='" . $sheet->text->Weapons[$i]->Size . "' /></div>";
				
				echo "<div class='weapon-info weapon-name'><div class='info-row'>Type</div>";
				echo "<input type='text' autocomplete='off' class='sheet-input' name='WeaponType[]' title='WeaponType$i' value='" . $sheet->text->Weapons[$i]->Type . "' /></div>";
				
				echo "<div class='add-delete-box'>&#215;</div>";
				echo "<div class='move-up-box move-weapon-box'>▲</div>";
				echo "<div class='move-down-box move-weapon-box'>▼</div>";
				
				echo "</div>";	// End of weapon block
			}
		?>
		
		<div id="add-weapon" class="weapon equipped-item inventory-item blank-item blank-weapon" unselectable="on">+</div>
	</div>
	<?php //echo "test"; var_dump(json_decode($sheet->text->Skills)); ?>
	
	<div class='skills' id='skills'>
	
		<div class='skill info-row' id='skill-info'>
			<div class='skill-name skill-block'>Skill Name</div>
			<div class='skill-ability skill-block'>Ability Mod</div>
			<div class='skill-block skill-cs'>CS</div>
			<div class='skill-block'>Skill Mod</div>
			<div class='skill-block'>Ab Mod</div>
			<div class='skill-block'>Rank</div>
			<div class='skill-block'>Misc</div>
			<div class='skill-block'>ACP</div>
			<div class='function-buttons'>
				<div class="onoffswitch">
					<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="custom-cs-rules" checked>
					<label class="onoffswitch-label" for="custom-cs-rules" title="Use custom rules for class skills.  If checked, class skill ranks are capped at 2x player level instead of +3 for 1 rank.">
						<span class="onoffswitch-inner"></span>
						<span class="onoffswitch-switch"></span>
					</label>
				</div>
			</div>
		</div>
		
		
		<?php
		
			//var_dump($sheet->text->Skills);
			$sheet->text->Skills = json_decode($sheet->text->Skills);
			for ($i=0; $i<count($sheet->text->Skills); $i++) {
				echo "<div class='skill' id='skill$i'>";
				
				echo "<div class='skill-name skill-block'><input type='text' autocomplete='off' class='sheet-input' name='SkillName[]' title='SkillName$i' value='" . $sheet->text->Skills[$i]->Name . "' /></div>";
				
				switch (intval($sheet->text->Skills[$i]->Ability)) {
					case 0: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0' selected='selected'>Str</option><option value='1'>Dex</option><option value='2'>Con</option><option value='3'>Int</option><option value='4'>Wis</option><option value='5'>Cha</option></select></div> "; 
						break; }    
					case 1: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0'>Str</option><option value='1' selected='selected'>Dex</option><option value='2'>Con</option><option value='3'>Int</option><option value='4'>Wis</option><option value='5'>Cha</option></select></div> "; 
						break; }
					case 2: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0'>Str</option><option value='1'>Dex</option><option value='2' selected='selected'>Con</option><option value='3'>Int</option><option value='4'>Wis</option><option value='5'>Cha</option></select></div> "; 
						break; }
					case 3: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0'>Str</option><option value='1'>Dex</option><option value='2'>Con</option><option value='3' selected='selected'>Int</option><option value='4'>Wis</option><option value='5'>Cha</option></select></div> "; 
						break; }
					case 4: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0'>Str</option><option value='1'>Dex</option><option value='2'>Con</option><option value='3'>Int</option><option value='4' selected='selected'>Wis</option><option value='5'>Cha</option></select></div> "; 
						break; }
					case 5: {
						echo " <div class='skill-ability skill-block'> <select name='SkillAbility[]' value='" . $sheet->text->Skills[$i]->Ability . "' title='SkillAbility$i' class='sheet-dropdown skill-ability-select'><option value='0'>Str</option><option value='1'>Dex</option><option value='2'>Con</option><option value='3'>Int</option><option value='4'>Wis</option><option value='5' selected='selected'>Cha</option></select></div> "; 
						break; }
				}
			
					
				if ($sheet->text->Skills[$i]->CS == 'cs')
					echo " <div class='skill-block skill-cs'><input type='checkbox' autocomplete='off' name='SkillCS$i' title='SkillCS$i' value='cs' id='SkillCS$i' class='skill-cs-box' checked/><label for='SkillCS$i'></label></div>";
				else
					echo " <div class='skill-block skill-cs'><input type='checkbox' autocomplete='off' name='SkillCS$i' title='SkillCS$i' value='cs' id='SkillCS$i' class='skill-cs-box'/><label for='SkillCS$i'></label></div>";
				echo " <div class='skill-block'><input type='number' autocomplete='off' class='sheet-input skill-total' name='SkillTotal[]' title='SkillTotal$i' value='" . $sheet->text->Skills[$i]->Total . "' /></div>";
				echo " <div class='skill-block'><input type='number' autocomplete='off' class='sheet-input skill-abmod' name='SkillAbMod[]' title='SkillAbMod$i' value='" . $sheet->text->Skills[$i]->AbMod . "' /></div>";
				echo " <div class='skill-block'><input type='number' autocomplete='off' class='sheet-input skill-rank' name='SkillRank[]' title='SkillRank$i' value='" . $sheet->text->Skills[$i]->Rank . "' /></div>";
				echo " <div class='skill-block'><input type='number' autocomplete='off' class='sheet-input skill-misc' name='SkillMisc[]' title='SkillMisc$i' value='" . $sheet->text->Skills[$i]->Misc . "' /></div>";
				echo " <div class='skill-block'><input type='number' autocomplete='off' class='sheet-input skill-acp' name='SkillACP[]' title='SkillACP$i' value='" . $sheet->text->Skills[$i]->ACP . "' /></div>";
				echo "<div class='skill-block function-buttons'>";
					echo "<div class='move-skill-up'>▲</div>";
					echo "<div class='move-skill-down'>▼</div>";
					echo "<div class='delete-skill'>&#215;</div>";
				echo "</div>"; // end of function buttons
				
				echo "</div>"; // End of Skill
				
			}
		?>

		<div class='skill blank-skill'></div>
	</div>
	
	
	
</form>
</div>
<script src="/js/sheet-autofill.js"></script>
<script>
	
	$('.add-delete-box').click(function () {
		
		var weaponbox = $(this).parent();
		//weaponbox.insertBefore(weaponbox.prev());
		
		weaponbox.fadeOut(400);
		weaponbox.css('transform', 'ScaleY(.75)');
		setTimeout(function() {
			weaponbox.remove();
		}, 500);
		
	});
	
	$('.move-up-box').click(function() {
		var weaponbox = $(this).parent();
		//console.log(weaponbox.prev());
		weaponbox.insertBefore(weaponbox.prev());
	});
	$('.move-down-box').click(function() {
		var weaponbox = $(this).parent();
		//console.log(weaponbox.prev());
		weaponbox.insertAfter(weaponbox.next());
	});
	
	
	
	
	// Add new weapon to list
	$('.blank-weapon').click(function () {
		var weapon_template = $('.weapon-template').clone();
		var elem = $(this);
		$(this).removeClass('button-bounce');
		$(this).toggleClass('button-bounce');
		setTimeout(function() {
			elem.removeClass('button-bounce');
		}, 350);
		
		
		weapon_template = $('.weapon-template').clone().removeClass('weapon-template');
		
		// Change input info to match number
		var weapon_count = $('#weapons').children().length - 1;
		weapon_template.find('[name=WeaponNameT]').attr('name', 'WeaponName[]').attr('title', 'WeaponName'+weapon_count);
		weapon_template.find('[name=WeaponABT]').attr('name', 'WeaponAB'+weapon_count).attr('title', 'WeaponAB'+weapon_count);
		weapon_template.find('[name=WeaponDamageT]').attr('name', 'WeaponDamage'+weapon_count).attr('title', 'WeaponDamage'+weapon_count);
		weapon_template.find('[name=WeaponCritT]').attr('name', 'WeaponCrit'+weapon_count).attr('title', 'WeaponCrit'+weapon_count);
		weapon_template.find('[name=WeaponRangeT]').attr('name', 'WeaponRange'+weapon_count).attr('title', 'WeaponRange'+weapon_count);
		weapon_template.find('[name=WeaponSpecialT]').attr('name', 'WeaponSpecial'+weapon_count).attr('title', 'WeaponSpecial'+weapon_count);
		weapon_template.find('[name=WeaponAmmoT]').attr('name', 'WeaponAmmo'+weapon_count).attr('title', 'WeaponAmmo'+weapon_count);
		weapon_template.find('[name=WeaponWeightT]').attr('name', 'WeaponWeight'+weapon_count).attr('title', 'WeaponWeight'+weapon_count);
		weapon_template.find('[name=WeaponSizeT]').attr('name', 'WeaponSize'+weapon_count).attr('title', 'WeaponSize'+weapon_count);
		weapon_template.find('[name=WeaponTypeT]').attr('name', 'WeaponType'+weapon_count).attr('title', 'WeaponTypeT'+weapon_count);
		
		weapon_template.insertBefore($('#add-weapon'));
		weapon_template.fadeIn(250);
		weapon_template.addClass('bounce');
		rebindChange();	
	});
	
	
	
	$('.blank-skill').click(function () {
		var skill_template = $('.skill-template').clone();
		var elem = $(this);
		$(this).removeClass('button-bounce');
		$(this).toggleClass('button-bounce');
		setTimeout(function() {
			elem.removeClass('button-bounce');
		}, 350);
		
		
		skill_template = $('.skill-template').clone().removeClass('skill-template');
		
		// Change input info to match number
		var skill_count = $('#skills').children().length - 2;
		skill_template.find('[title=SkillNameT]').attr('title', 'SkillName'+skill_count);
		skill_template.find('[id=SkillNameT]').attr('id', 'SkillName'+skill_count);
		skill_template.find('[title=SkillAbilityT]').attr('title', 'SkillAbility'+skill_count);
		skill_template.find('[title=SkillCST]').attr('title', 'SkillCS'+skill_count);
		skill_template.find('[for=SkillCST]').attr('for', 'SkillCS'+skill_count);
		skill_template.find('[title=SkillTotalT]').attr('title', 'SkillTotal'+skill_count);
		skill_template.find('[title=SkillAbModT]').attr('title', 'SkillAbMod'+skill_count);
		skill_template.find('[title=SkillRankT]').attr('title', 'SkillRank'+skill_count);
		skill_template.find('[title=SkillMiscT]').attr('title', 'SkillMisc'+skill_count);
		skill_template.find('[title=SkillACPT]').attr('title', 'SkillACP'+skill_count);
		skill_template.insertBefore($('.blank-skill'));
		skill_template.fadeIn(250);
		skill_template.addClass('bounce');
		
		rebindChange();
		bindSkills();
	});
	
	
	
	$(document).keydown(function(event) {
        // If Control or Command key is pressed and the S key is pressed
        // run save function. 83 is the key code for S.
        if((event.ctrlKey || event.metaKey) && event.which == 83) {
            // Save Function
            event.preventDefault();
			$('#save-button').click();
            return false;
        };
    }
);
	$("#sheet").submit( function(e) {
		
        var str = $(this).serialize();
        /*
        $.ajax('http://srd.cclloyd.com/viewsheet/save.php', str, function(result){
            alert(result); // the result variable will contain any text echoed by getResult.php
        }*/
        e.preventDefault();

          	$.ajax({
            	type: 'post',
				url: 'save.php',
				data: $('#sheet').serialize(),
				success: function (result) {
					//alert(result);
					console.log(result);
					// Add SHEET SAVED notification that fades out
					$('.changed').each(function () {
						$(this).removeClass('changed');
					});
					if (result) {
						//$('#alert-success').fadeIn(100);
						//$('#alert-success').delay(2000).fadeOut(750);
						/*var el = $('.save-banner')
						var newone = el.clone(true);

						el.before(newone);
						$('.save-banner:last').remove();*/
						$('#save-banner').children().removeClass('run-save-anim');
						$('#save-banner').children().addClass('run-save-anim').delay(6000).queue(function (next) {
							$(this).removeClass('run-save-anim');
						});
					}
            	}
          	});
        return(false);
    });
	
	
	$(document).ready(function() {
		
		rebindChange();
		bindSkills();
		bindAC();
		initialCalc();
		setZero();
		$('#loading-overlay').delay(100).fadeOut(750);
		
	});
	

	
</script>
<div style="height: 1000px;"></div>



<div class="weapon inventory-item equipped-item weapon-template" style="display: none;">
			<div class="weapon-info weapon-name double-wide">
				<div class="info-row">Name</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponName[]" title="WeaponNameT" value="" />
			</div>
			<div class="weapon-info weapon-ab">
				<div class="info-row">Attack Bonus</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponAB[]" title="WeaponABT" value="0" />
			</div>
			<div class="weapon-info weapon-damage double-wide">
				<div class="info-row">Damage</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponDamage[]" title="WeaponDamageT" value="" />
			</div>
			<div class="weapon-info weapon-crit">
				<div class="info-row">Crit Range</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponCrit[]" title="WeaponCritT" value="20/x2" />
			</div>
			<div class="weapon-info weapon-range">
				<div class="info-row">Range</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponRange[]" title="WeaponRangeT" value="" />
			</div>
			<div class="weapon-info weapon-special double-wide">
				<div class="info-row">Special Properties</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponSpecial[]" title="WeaponSpecialT" value="" />
			</div>
			<div class="weapon-info weapon-ammo double-wide">
				<div class="info-row">Ammo</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponAmmo[]" title="WeaponAmmoT" value="" />
			</div>
			<div class="weapon-info weapon-weight">
				<div class="info-row">Weight</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponWeight[]" title="WeaponWeightT" value="" />
			</div>
			<div class="weapon-info weapon-size">
				<div class="info-row">Size</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponSize[]" title="WeaponSizeT" value="" />
			</div>
			<div class="weapon-info weapon-type">
			<div class="info-row">Type</div>
				<input type="text" autocomplete="off" class="sheet-input" name="WeaponType[]" title="WeaponTypeT" value="" />
			</div>
			
			<div class='add-delete-box'>&#215;</div>
			<div class='move-up-box move-weapon-box'>▲</div>
			<div class='move-down-box move-weapon-box'>▼</div>
		</div>
		
<div class='skill skill-template'>
	<div class='skill-name skill-block'><input type='text' autocomplete='off' class='sheet-input' name='SkillName[]' title='SkillNameT' value='' /></div>
	<div class='skill-ability skill-block'> <select name='SkillAbility[]' title='SkillAbilityT' class='sheet-dropdown'><option value='0'>Str</option><option value='1'>Dex</option><option value='2'>Con</option><option value='3'>Int</option><option value='4'>Wis</option><option value='5'>Cha</option></select></div>
	<div class='skill-block skill-cs'><input type='checkbox' autocomplete='off' name='SkillCS[]' title='SkillCST' value='1' id="SkillCST" checked="checked"/><label for='SkillCST'></label></div>
	<div class='skill-block'><input type='number' autocomplete='off' class='sheet-input' name='SkillTotal[]' title='SkillTotalT' value='' /></div>
	<div class='skill-block'><input type='number' autocomplete='off' class='sheet-input' name='SkillAbMod[]' title='SkillAbModT' value='' /></div>
	<div class='skill-block'><input type='number' autocomplete='off' class='sheet-input' name='SkillRank[]' title='SkillRankT' value='' /></div>
	<div class='skill-block'><input type='number' autocomplete='off' class='sheet-input' name='SkillMisc[]' title='SkillMiscT' value='' /></div>
	<div class='skill-block'><input type='number' autocomplete='off' class='sheet-input' name='SkillACP[]' title='SkillACPT' value='' /></div>
	<div class='skill-block function-buttons'><div class='move-skill-up'>▲</div><div class='move-skill-down'>▼</div><div class='delete-skill'>&#215;</div></div>
</div>
		
		
</body>
</html>




