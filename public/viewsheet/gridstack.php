<?php 
	include '/web/srd.cclloyd.com/settings.php'; 
	define('WEB', '/web/srd.cclloyd.com/public/');
?>


<html>
	
<?php include WEB.'meta.php'; ?>
<?php //include '/web/srd.cclloyd.com/public/meta.php'; ?>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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


	<div id="damage-reduction-card" class="sheet-card">
		<div class="card-wrapper">
			<div class="card-header">
				<div class="card-title">Damage Reduction</div>
				<div class="card-handle">&#9776;</div>
			</div>
			<div class="card-content">
				<ul id="damage-reduction">
				</ul>
			</div>
		</div>
	</div>
	<div class="damage-reduction resist-element resist-fire" id="resist-1">10 resist</div>
	<div class="damage-reduction resist-element resist-cold" id="resist-2">15 resist</div>
	<div class="damage-reduction resist-element resist-acid immune" id="resist-3">immune</div>
	
	<div id="ability-scores-card" class="sheet-card">
		<div class="card-wrapper">
			<div class="card-header">
				<div class="card-title">Ability Scores</div>
				<div class="card-handle">&#9776;</div>
			</div>
			<div class="card-content">
				<div class="table" id="ability-scores">
					<div class="tr">
						<div class="th">STR</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="Str" title="Str" value="<?php echo "$sheet->Str"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="StrMod" title="StrMod" value="<?php echo getMod($sheet->Str); ?>" readonly /></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="StrTemp" title="StrTemp" value="<?php echo "$sheet->StrTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="StrTempMod" title="StrTempMod" value="<?php echo getMod($sheet->StrTemp); ?>" readonly /></div>
					</div>
					<div class="tr">
						<div class="th">DEX</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="Dex" title="Dex" value="<?php echo "$sheet->Dex"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="DexMod" title="DexMod" value="<?php echo getMod($sheet->Dex); ?>" readonly /></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="DexTemp" title="DexTemp" value="<?php echo "$sheet->DexTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="DexTempMod" title="DexTempMod" value="<?php echo getMod($sheet->DexTemp); ?>" readonly /></div>
					</div>
					<div class="tr">
						<div class="th">CON</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="Con" title="Con" value="<?php echo "$sheet->Con"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="ConMod" title="ConMod" value="<?php echo getMod($sheet->Con); ?>" readonly /></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="ConTemp" title="ConTemp" value="<?php echo "$sheet->ConTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="ConTempMod" title="ConTempMod" value="<?php echo getMod($sheet->ConTemp); ?>" readonly /></div>
					</div>
					<div class="tr">
						<div class="th">INT</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="IntScore" title="IntScore" value="<?php echo "$sheet->IntScore"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="IntMod" title="IntMod" value="<?php echo getMod($sheet->IntScore); ?>" readonly/></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="IntTemp" title="IntTemp" value="<?php echo "$sheet->IntTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="IntTempMod" title="IntTempMod" value="<?php echo getMod($sheet->IntTemp); ?>" readonly /></div>
					</div>
					<div class="tr">
						<div class="th">WIS</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="Wis" title="Wis" value="<?php echo "$sheet->Wis"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="WisMod" title="WisMod" value="<?php echo getMod($sheet->Wis); ?>" readonly /></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="WisTemp" title="WisTemp" value="<?php echo "$sheet->WisTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="WisTempMod" title="WisTempMod" value="<?php echo getMod($sheet->WisTemp); ?>" readonly /></div>
					</div>
					<div class="tr">
						<div class="th">CHA</div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="Cha" title="Cha" value="<?php echo "$sheet->Cha"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="ChaMod" title="ChaMod" value="<?php echo getMod($sheet->Cha); ?>" readonly /></div>
						<div class="td"><input autocomplete="off" type="number" class="sheet-input" name="ChaTemp" title="ChaTemp" value="<?php echo "$sheet->ChaTemp"; ?>" /></div>
						<div class="td"><input autocomplete="off" type="text" class="sheet-input" name="ChaTempMod" title="ChaTempMod" value="<?php echo getMod($sheet->ChaTemp); ?>" readonly /></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<ul id="sheet-grid-container" class="gridster">
		<li class="sheet-card"  data-row="1" data-col="1" data-sizex="1" data-sizey="1"></li>
		<li class="sheet-card"  data-row="1" data-col="2" data-sizex="1" data-sizey="1"></li>
		<li class="sheet-card"  data-row="1" data-col="3" data-sizex="1" data-sizey="1"></li>
		<li class="sheet-card"  data-row="49" data-col="31" data-sizex="1" data-sizey="1">End</li>
	</ul>
	
	
</form>
<script type="text/javascript">
$(function () {
  
	
	var cs = 25; // cell size

	$("#sheet-grid-container").gridster({
        widget_margins: [4, 4],
        widget_base_dimensions: [cs, cs],
		min_cols: 32, //18 for 50px
		max_cols: 32,
		min_rows: 32,
		//extra_rows: 32,
		namespace: '#sheet-grid-container',
		shift_widgets_up: false,
		shift_larger_widgets_down: false,
		widget_selector: '.sheet-card',
		draggable: {
            handle: '.card-handle'
        }
    });
	
	$("#damage-reduction").gridster({
        widget_margins: [0, 2],
        widget_base_dimensions: [150, 20],
		max_cols: 1,
		min_rows: 5,
		max_rows: 10,
		namespace: '#sheet-grid-container #damage-reduction-card #damage-reduction',
		avoid_overlapped_widgets: true,
    });
	
	var gridster = $("#sheet-grid-container").gridster().data('gridster');
	gridster.add_widget($('#ability-scores-card'), 11, 7, 2, 10);
	
	
	
	var damage_reduction_gridster = $("#damage-reduction").gridster().data('gridster');
	damage_reduction_gridster.add_widget($('#resist-1'), 1, 1, 1, 1);
	damage_reduction_gridster.add_widget($('#resist-2'), 1, 1, 1, 2);
	damage_reduction_gridster.add_widget($('#resist-3'), 1, 1, 1, 3);
	
	gridster.add_widget($('#damage-reduction-card'), 7, 10, 16, 10);
});
	/*
$('.card-content').hover(function(){
	var parent = $(this).parent();
	setTimeoutConst = setTimeout(function(){
		parent.children('.card-header').fadeIn(250);
	}, 1000);
   	}, function() {
		clearTimeout(setTimeoutConst);
   });
		
$('.card-content').mouseout(function() {
	$(this).parent().children('.card-header').fadeOut(250);
});*/
	
$('.card-wrapper').hover(function(){
	var parent = $(this);
	setTimeoutConst = setTimeout(function(){
		parent.children('.card-header').fadeIn(250);
	}, 1000);
   	}, function() {
		clearTimeout(setTimeoutConst);
   });
		
$('.card-wrapper').mouseleave(function() {
	$(this).children('.card-header').fadeOut(250);
});
	
	
	
/* // DELAY MOUSE CHANGE ON HOVER
$(".damage-reduction").hover(function(){  
     setTimeout(changeMouse('.damage-reduction', 'move'), 1000);
});
$(".damage-reduction").mouseout(function(){  
     $(".damage-reduction").css('cursor', 'normal');
});

function changeMouse(element, mouseType) {
    $(element).css('cursor', mouseType);
}
*/

</script>

<div style="height: 1000px;"></div>
</body>
</html>