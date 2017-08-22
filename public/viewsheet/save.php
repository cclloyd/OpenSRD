<?php
	define('WEB', '/web/srd.cclloyd.com/api/v1/');
	/*
	function db_array($query) {
		$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');
		if (!$link) die ("Error: Unable to connect to MySQL." . PHP_EOL);
		$result = $link->query($query);
		$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		return $data;
	}
	
	function db_single($query) {
		$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');
		if (!$link) die ("Error: Unable to connect to MySQL." . PHP_EOL);
		$result = $link->query($query);
		$data = mysqli_fetch_assoc($result);
		return $data;
	}*/
	
	
	
	session_start();
	$sheet->id = $_SESSION['currentSheetID'];
	$link = mysqli_connect('localhost', 'root', 'these7enpillar', 'websrd');
	if (!$link) {
		echo "Error connecting to database.";
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	echo "Database connection succcessful\n";
	
	$sheet->Name = $_POST['Name'];
	$sheet->Player = $_POST['Player'];
	$sheet->Alignment = $_POST['Alignment'];
	$sheet->Class = $_POST['Class'];
	$sheet->Race = $_POST['Race'];
	$sheet->Campaign = $_POST['Campaign'];
	$sheet->Deity = $_POST['Deity'];
	$sheet->Level = $_POST['Level'];
	$sheet->Size = $_POST['Size'];
	$sheet->Age = $_POST['Age'];
	$sheet->Gender = $_POST['Gender'];
	$sheet->Height = $_POST['Height'];
	$sheet->Weight = $_POST['Weight'];
	$sheet->Eyes = $_POST['Eyes'];
	$sheet->Hair = $_POST['Hair'];
	$sheet->XPCurrent = $_POST['XPCurrent'];
	$sheet->XPNext = $_POST['XPNext'];
	$sheet->XPChange = $_POST['XPChange'];
	$sheet->XPSpeed = $_POST['XPSpeed'];
	$sheet->Mythic = $_POST['Mythic'];

	
	$sheet->Str = $_POST['Str'];
	$sheet->Dex = $_POST['Dex'];
	$sheet->Con = $_POST['Con'];
	$sheet->IntScore = $_POST['IntScore'];
	$sheet->Wis = $_POST['Wis'];
	$sheet->Cha = $_POST['Cha'];

	$sheet->HP = $_POST['HP'];
	$sheet->HPWounds = $_POST['HPWounds'];
	$sheet->HPTemp = $_POST['HPTemp'];
	$sheet->HPNonlethal = $_POST['HPNonlethal'];
	$sheet->HPHD = $_POST['HPHD'];

	$sheet->DamageRed = $_POST['DamageRed'];

	$sheet->AC = $_POST['AC'];
	$sheet->ACArmor = $_POST['ACArmor'];
	$sheet->ACShield = $_POST['ACShield'];
	$sheet->ACDex = $_POST['ACDex'];
	$sheet->ACDodge = $_POST['ACDodge'];
	$sheet->ACSize = $_POST['ACSize'];
	$sheet->ACNat = $_POST['ACNat'];
	$sheet->ACDeflect = $_POST['ACDeflect'];
	$sheet->ACMisc = $_POST['ACMisc'];
	
	$sheet->Fort = $_POST['Fort'];
	$sheet->FortBase = $_POST['FortBase'];
	$sheet->FortAbility = $_POST['FortAbility'];
	$sheet->FortMagic = $_POST['FortMagic'];
	$sheet->FortMisc = $_POST['FortMisc'];
	$sheet->FortTemp = $_POST['FortTemp'];
	
	$sheet->Reflex = $_POST['Reflex'];
	$sheet->ReflexBase = $_POST['ReflexBase'];
	$sheet->ReflexAbility = $_POST['ReflexAbility'];
	$sheet->ReflexMagic = $_POST['ReflexMagic'];
	$sheet->ReflexMisc = $_POST['ReflexMisc'];
	$sheet->ReflexTemp = $_POST['ReflexTemp'];
	
	$sheet->Will = $_POST['Will'];
	$sheet->WillBase = $_POST['WillBase'];
	$sheet->WillAbility = $_POST['WillAbility'];
	$sheet->WillMagic = $_POST['WillMagic'];
	$sheet->WillMisc = $_POST['WillMisc'];
	$sheet->WillTemp = $_POST['WillTemp'];

	$sheet->MBAB = $_POST['MBAB'];
	$sheet->MBABBase = $_POST['MBABBase'];
	$sheet->MBABStr = $_POST['MBABStr'];
	$sheet->MBABSize = $_POST['MBABSize'];
	$sheet->MBABMisc = $_POST['MBABMisc'];
	$sheet->MBABTemp = $_POST['MBABTemp'];
	$sheet->CMBBAB = $_POST['CMBBAB'];
	$sheet->CMBBABBase = $_POST['CMBBABBase'];
	$sheet->CMBBABStr = $_POST['CMBBABStr'];
	$sheet->CMBBABSize = $_POST['CMBBABSize'];
	$sheet->CMBBABMisc = $_POST['CMBBABMisc'];
	$sheet->CMBBABTemp = $_POST['CMBBABTemp'];
	$sheet->RBAB = $_POST['RBAB'];
	$sheet->RBABBase = $_POST['RBABBase'];
	$sheet->RBABDex = $_POST['RBABDex'];
	$sheet->RBABSize = $_POST['RBABSize'];
	$sheet->RBABMisc = $_POST['RBABMisc'];
	$sheet->RBABTemp = $_POST['RBABTemp'];

	
	
	
	//$query = "UPDATE sheets SET Name = $sheet->Name, Player = $sheet->Player, Alignment = $sheet->Alignment WHERE id = $sheet->id";
	//$query = "UPDATE sheets SET Name='$sheet->Name', Player='$sheet->Player', Alignment='$sheet->Alignment' WHERE id='$sheet->id'";
	$query = "UPDATE sheets SET 
	
	Name='$sheet->Name', 
	Player='$sheet->Player', 
	Alignment='$sheet->Alignment', 
	Class='$sheet->Class', 
	Race='$sheet->Race', 
	Campaign='$sheet->Campaign', 
	Deity='$sheet->Deity', 
	Level='$sheet->Level', 
	Size='$sheet->Size', 
	Age='$sheet->Age', 
	Gender='$sheet->Gender', 
	Height='$sheet->Height', 
	Weight='$sheet->Weight', 
	Eyes='$sheet->Eyes', 
	Hair='$sheet->Hair', 
	XPCurrent='$sheet->XPCurrent', 
	XPNext='$sheet->XPNext', 
	XPChange='$sheet->XPChange', 
	XPSpeed='$sheet->XPSpeed', 
	Mythic='$sheet->Mythic', 
	
	Str='$sheet->Str', 
	Dex='$sheet->Dex', 
	Con='$sheet->Con', 
	IntScore='$sheet->IntScore', 
	Wis='$sheet->Wis', 
	Cha='$sheet->Cha', 
	
	HP='$sheet->HP' , 
	HPWounds='$sheet->HPWounds', 
	HPTemp='$sheet->HPTemp', 
	HPNonlethal='$sheet->HPNonlethal', 
	HPHD='$sheet->HPHD', 

	DamageRed='$sheet->DamageRed', 

	AC='$sheet->AC', 
	ACArmor='$sheet->ACArmor', 
	ACShield='$sheet->ACShield', 
	ACDex='$sheet->ACDex', 
	ACDodge='$sheet->ACDodge', 
	ACSize='$sheet->ACSize', 
	ACNat='$sheet->ACNat', 
	ACDeflect='$sheet->ACDeflect', 
	ACMisc='$sheet->ACMisc', 


	Fort='$sheet->Fort', 
	FortBase='$sheet->FortBase', 
	FortAbility='$sheet->FortAbility', 
	FortMagic='$sheet->FortMagic', 
	FortMisc='$sheet->FortMisc', 
	FortTemp='$sheet->FortTemp', 
	
	Reflex='$sheet->Reflex', 
	ReflexBase='$sheet->ReflexBase', 
	ReflexAbility='$sheet->ReflexAbility', 
	ReflexMagic='$sheet->ReflexMagic', 
	ReflexMisc='$sheet->ReflexMisc', 
	ReflexTemp='$sheet->ReflexTemp', 
	
	Will='$sheet->Will', 
	WillBase='$sheet->WillBase', 
	WillAbility='$sheet->WillAbility', 
	WillMagic='$sheet->WillMagic', 
	WillMisc='$sheet->WillMisc', 
	WillTemp='$sheet->WillTemp',  

	MBAB='$sheet->MBAB', 
	MBABBase='$sheet->MBABBase', 
	MBABStr='$sheet->MBABStr', 
	MBABSize='$sheet->MBABSize', 
	MBABMisc='$sheet->MBABMisc', 
	MBABTemp='$sheet->MBABTemp', 
	CMBBAB='$sheet->CMBBAB', 
	CMBBABBase='$sheet->CMBBABBase', 
	CMBBABStr='$sheet->CMBBABStr', 
	CMBBABSize='$sheet->CMBBABSize', 
	CMBBABMisc='$sheet->CMBBABMisc', 
	CMBBABTemp='$sheet->CMBBABTemp', 
	RBAB='$sheet->RBAB', 
	RBABBase='$sheet->RBABBase', 
	RBABDex='$sheet->RBABDex', 
	RBABSize='$sheet->RBABSize', 
	RBABMisc='$sheet->RBABMisc', 
	RBABTemp='$sheet->RBABTemp' 

	WHERE id='$sheet->id'";
	//$query = "UPDATE sheets SET Int=$sheet->IntScore' WHERE id='$sheet->id'";
	//$query = "UPDATE sheets SET Name='$sheet->Name', Player='$sheet->Player', Alignment='$sheet->Alignment', XPCurrent='$sheet->XPCurrent', XPNext='$sheet->XPNext', XPChange='$sheet->XPChange', Str=$sheet->Str, Dex='$sheet->Dex', Con='$sheet->Con', Int='$sheet->Int', Wis='$sheet->Wis', Cha='$sheet->Cha' WHERE id='$sheet->id'";
	echo $query;
	//Int='$sheet->Int'
	$result = $link->query($query);
	echo "\nQuery result: " . json_encode($result);
	//echo mysqli_error($link);
	
	
	// $sheet->Wis = $_POST['Wis'];
	$sheet = new stdClass();
	//$sheet = null;
	$sheet->id = $_SESSION['currentSheetID'];
	//$link = mysqli_connect('localhost', 'srduser', 'these7enpillar', 'websrd');
	if (!$link) {
		echo "Error connecting to database.";
		die ("Error: Unable to connect to MySQL." . PHP_EOL);
	}
	echo "Database connection succcessful\n";
		
	$failed = false;
	$i = 0;
	$sheet->WeaponName = $_POST["WeaponName"];
	$sheet->WeaponAB = $_POST["WeaponAB"];
	$sheet->WeaponDamage = $_POST["WeaponDamage"];
	$sheet->WeaponCrit = $_POST["WeaponCrit"];
	$sheet->WeaponRange = $_POST["WeaponRange"];
	$sheet->WeaponSpecial = $_POST["WeaponSpecial"];
	$sheet->WeaponAmmo = $_POST["WeaponAmmo"];
	$sheet->WeaponWeight = $_POST["WeaponWeight"];
	$sheet->WeaponSize = $_POST["WeaponSize"];
	$sheet->WeaponType = $_POST["WeaponType"];
	do {
		$sheet->Weapons[$i]->Name = $sheet->WeaponName[$i];
		if ($sheet->Weapons[$i]->Name == null) {
			$failed = true; break;
		}
		$sheet->Weapons[$i]->AB = $sheet->WeaponAB[$i];
		$sheet->Weapons[$i]->Damage = $sheet->WeaponDamage[$i];
		$sheet->Weapons[$i]->Crit = $sheet->WeaponCrit[$i];
		$sheet->Weapons[$i]->Range = $sheet->WeaponRange[$i];
		$sheet->Weapons[$i]->Special = $sheet->WeaponSpecial[$i];
		$sheet->Weapons[$i]->Ammo = $sheet->WeaponAmmo[$i];
		$sheet->Weapons[$i]->Weight = $sheet->WeaponWeight[$i];
		$sheet->Weapons[$i]->Size = $sheet->WeaponSize[$i];
		$sheet->Weapons[$i]->Type = $sheet->WeaponType[$i];
		$i++;
	} while (!$failed);
	unset($sheet->Weapons[count($sheet->Weapons)-1]);
	$sheet->Weaponsjson = json_encode($sheet->Weapons).serialize();


	$failed = false;
	$i = 0;

	$sheet->SkillName = $_POST["SkillName"];
	$sheet->SkillAbility = $_POST["SkillAbility"];
	//$sheet->SkillCS = $_POST["SkillCS"];
	$sheet->SkillTotal = $_POST["SkillTotal"];
	$sheet->SkillAbMod = $_POST["SkillAbMod"];
	$sheet->SkillRank = $_POST["SkillRank"];
	$sheet->SkillMisc = $_POST["SkillMisc"];
	$sheet->SkillACP = $_POST["SkillACP"];
	print_r($sheet->SkillCS);

	do {
		//echo "SKILL CS: ". print_r($_POST['SkillCS'][$i]);
		$sheet->Skills[$i]->Name = $sheet->SkillName[$i];
		if ($sheet->Skills[$i]->Name == null) {
			$failed = true; break;
		}
		//echo isset($_POST['SkillCS'][$i]);
		if ($_POST["SkillCS$i"] == 'cs')
			$sheet->Skills[$i]->CS = 'cs';
		else 
			$sheet->Skills[$i]->CS = '';
		/*
		if (isset($_POST['SkillCS'][$i]))
			$sheet->Skills[$i]->CS = 'cs';
		else
			$sheet->Skills[$i]->CS = '';
			*/
		
		$sheet->Skills[$i]->Ability = $sheet->SkillAbility[$i];
		$sheet->Skills[$i]->Total = $sheet->SkillTotal[$i];
		$sheet->Skills[$i]->AbMod = $sheet->SkillAbMod[$i];
		$sheet->Skills[$i]->Rank = $sheet->SkillRank[$i];
		$sheet->Skills[$i]->Misc = $sheet->SkillMisc[$i];
		$sheet->Skills[$i]->ACP = $sheet->SkillACP[$i];
		//print_r($sheet->Skills[$i]);
	$i++;
	} while (!$failed);
	array_pop($sheet->Skills);
	//unset($sheet->Skills[count($sheet->Skills)]);
	//unset($sheet->Skills[count($sheet->Skills)]);

	$sheet->Skillsjson = json_encode($sheet->Skills).serialize();




	$query = "UPDATE sheets_blocks SET 

	Weapons='$sheet->Weaponsjson', 
	Skills='$sheet->Skillsjson'  

	WHERE id='$sheet->id'";
	echo $query;

	$result = $link->query($query);
	echo "\nQuery result: " . json_encode($result);
	
?>






