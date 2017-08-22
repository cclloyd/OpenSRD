// JavaScript Document
function getMod(num) {
	var val = Math.floor((num - 10)/2);
	if (val > 0) {
		return "+" + val;
	}
	else {
		return val;
	}
}
function getModInt(num) {
	return Math.floor((num - 10)/2);
}
function totalAC() {
	var total = 10;
	//total += getModInt($('[name="Dex"]').val());
	total += parseInt($('[name="ACArmor"]').val());
	total += parseInt($('[name="ACShield"]').val());
	total += parseInt($('[name="ACDex"]').val());
	total += parseInt($('[name="ACDodge"]').val());
	total += parseInt($('[name="ACSize"]').val());
	total += parseInt($('[name="ACNat"]').val());
	total += parseInt($('[name="ACDeflect"]').val());
	total += parseInt($('[name="ACMisc"]').val());
	return total;
}
/* Wasn't working when other js changed it.  Only when manually changed
$('[name="ACDex"]').bind("propertychange change keyup input paste", function(event){ 
	$('[name="AC"]').val(totalAC());	
	console.log(totalAC());
});*/ 
$('[name="Dex"]').bind("propertychange change keyup input paste", function(event){ 
	var dexmod = getModInt($('[name="Dex"]').val());
	
	//if (window.event && event.type == "propertychange" && event.propertyName != "value")
    //    return;
	$(this).data("timeout", setTimeout(function () {
    	$('[name="DexMod"]').val(getMod($('[name="Dex"]').val()));
		$('[name="ACDex"]').val(dexmod);
		$('[name="AC"]').val(totalAC());	
    }, 500));
	
	
});

$('[name="MBABBase"]').bind("propertychange change keyup input paste", function(event){ 
	
	$(this).data("timeout", setTimeout(function () {
		//console.log("test");
		var dexmod = getModInt($('[name="Dex"]').val());
		var bab = parseInt($('[name=MBABBase]').val());
		var totalbab = "";
		var babint = [];
		//var attacks = bab.split("/");
		//console.log(attacks);
		//if (window.event && event.type == "propertychange" && event.propertyName != "value")
		//    return;
		//console.log('bab: ' + bab);

		var strmod = getModInt($('[name="Str"]').val());
		
		do {
			babint.push(bab);
			bab -= 5;
		} while (bab > 0);
		//console.log(babint);
		
		
		for (var i=0; i<babint.length; i++) {
			if (babint[i] > 0) {
				totalbab += ('+' + babint[i]);
				console.log("greater than 0");
			}
			else {
				totalbab += babint[i];
			}
			if (babint[i] > 5) {
				totalbab += '/';
			}
		}
		/* 
		for (var i=0; i<attacks.length; i++) {
			totalbab += bab[i];
			if (bab -= 5 > 5) {
				
			}
		}*/
		/*
		attacks.forEach(function(element) {
			console.log(element);
			totalbab += element + '/';
		});*/
		$('[name=MBAB]').val(totalbab);
    }, 500));
	
	
});


// Update Modifiers when stat changes


$('[name="StrTemp"]').bind("propertychange change click keyup input paste", function(event){
	//var num = $('[name="StrTemp"]').val();
	//var isnum = /^\d+$/.test($('[name="StrTemp"]').val());
	if (!$('[name="StrTemp"]').val())
		$('[name="StrTempMod"]').val("");
	else
		$('[name="StrTempMod"]').val(getMod($('[name="StrTemp"]').val()));
});

$('[name="DexTemp"]').bind("propertychange change click keyup input paste", function(event){
	if (!$('[name="DexTemp"]').val())
		$('[name="DexTempMod"]').val("");
	else
		$('[name="DexTempMod"]').val(getMod($('[name="DexTemp"]').val()));
});

$('[name="ConTemp"]').bind("propertychange change click keyup input paste", function(event){
	if (!$('[name="ConTemp"]').val())
		$('[name="ConTempMod"]').val("");
	else
		$('[name="ConTempMod"]').val(getMod($('[name="ConTemp"]').val()));
});

$('[name="IntTemp"]').bind("propertychange change click keyup input paste", function(event){
	if (!$('[name="IntTemp"]').val())
		$('[name="IntTempMod"]').val("");
	else
		$('[name="IntTempMod"]').val(getMod($('[name="IntTemp"]').val()));
});

$('[name="WisTemp"]').bind("propertychange change click keyup input paste", function(event){
	if (!$('[name="WisTemp"]').val())
		$('[name="WisTempMod"]').val("");
	else
		$('[name="WisTempMod"]').val(getMod($('[name="WisTemp"]').val()));
});

$('[name="ChaTemp"]').bind("propertychange change click keyup input paste", function(event){
	if (!$('[name="ChaTemp"]').val())
		$('[name="ChaTempMod"]').val("");
	else
		$('[name="ChaTempMod"]').val(getMod($('[name="ChaTemp"]').val()));
});

var split = location.search.replace('?', '').split('=');

/*
$('.sheet-input').each(function() {
	
   var elem = $(this);
   // Save current value of element
   elem.data('oldVal', elem.val());
   // Look for changes in the value
   elem.bind("propertychange change click keyup input paste", function(event){
		// If value has changed...
		if (elem.data('oldVal') != elem.val()) {
			// Updated stored value
			elem.data('oldVal', elem.val());
			// Do action
			// Optional: Action goes here
			elem.addClass('changed');
		}
   });
});
*/

function rebindChange() {
	$('.sheet-input').each(function() {

		var elem = $(this);
		// Save current value of element
		elem.data('oldVal', elem.val());
		// Look for changes in the value
		elem.bind("propertychange change click keyup input paste", function(event){
			elem.data("timeout", setTimeout(function () {

				// If value has changed...
				if (elem.data('oldVal') !== elem.val()) {
					// Updated stored value
					elem.data('oldVal', elem.val()); 
					// Do action
					// Optional: Action goes here
					elem.addClass('changed');
				}
			}, 250));
		});
	});

}


$('[name="Str"]').bind("propertychange change keyup input paste", function(event) { 	
	$('[name="StrMod"]').val(getMod($('[name="Str"]').val())); // Str Modifier
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == '0') {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="Str"]').val()));
			skillTotal(parent);
		}
	});
});
$('[name="Dex"]').bind("propertychange change keyup input paste", function(event){
	$('[name="DexMod"]').val(getMod($('[name="Dex"]').val()));
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == 1) {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="Dex"]').val()));
			skillTotal(parent);
		}
	});
});
$('[name="Con"]').bind("propertychange change keyup input paste", function(event){	
	$('[name="ConMod"]').val(getMod($('[name="Con"]').val()));	
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == 2) {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="Con"]').val()));
			skillTotal(parent);
		}
	});
});
$('[name="IntScore"]').bind("propertychange change keyup input paste", function(event){	
	$('[name="IntMod"]').val(getMod($('[name="IntScore"]').val()));
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == 3) {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="IntScore"]').val()));
			skillTotal(parent);
		}
	});
});
$('[name="Wis"]').bind("propertychange change keyup input paste", function(event){	
	$('[name="WisMod"]').val(getMod($('[name="Wis"]').val()));	
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == 4) {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="Wis"]').val()));
			skillTotal(parent);
		}
	});
});
$('[name="Cha"]').bind("propertychange change keyup input paste", function(event){	
	$('[name="ChaMod"]').val(getMod($('[name="Cha"]').val())); 
	
	$('.skill-ability-select').each(function() {
		if ($(this).val() == 5) {
			var parent = $(this).parent().parent();
			parent.find('.skill-abmod').val(getModInt($('[name="Cha"]').val()));
			skillTotal(parent);
		}
	});
});


function skillTotal(skill) {
	var custom_cs = $('#custom-cs-rules').is(':checked');
	var skill_mod = 0;
	skill_mod += parseInt(skill.find('.skill-rank').val());
	skill_mod += parseInt(skill.find('.skill-abmod').val());
	skill_mod += parseInt(skill.find('.skill-misc').val());
	if (skill.find('.skill-cs-box').is(':checked'))
		if (!custom_cs)
			skill_mod += 3;
	skill.find('.skill-total').val(skill_mod);
	skill.find('.sheet-input').each(function() {
		if ($(this).val() == '0') 
			$(this).addClass('input-zero');
		else
			$(this).removeClass('input-zero');
	});
		
}

function setZero() {
	$('.sheet-input').each(function() {
		if ($(this).val() == '0') 
			$(this).addClass('input-zero');
		else
			$(this).removeClass('input-zero');
	});
	$('.sheet-input').bind("propertychange change keyup input paste", function(){
		if ($(this).val() == '0') 
			$(this).addClass('input-zero');
		else
			$(this).removeClass('input-zero');
	});
}


function initialCalc() {
	
	if (!$('[name="StrTemp"]').val())
		$('[name="StrTempMod"]').val("");
	else
		$('[name="StrTempMod"]').val(getMod($('[name="SteTemp"]').val()));
	
	if (!$('[name="DexTemp"]').val())
		$('[name="DexTempMod"]').val("");
	else
		$('[name="DexTempMod"]').val(getMod($('[name="DexTemp"]').val()));
	
	if (!$('[name="ConTemp"]').val())
		$('[name="ConTempMod"]').val("");
	else
		$('[name="ConTempMod"]').val(getMod($('[name="ConTemp"]').val()));
	
	if (!$('[name="IntTemp"]').val())
		$('[name="IntTempMod"]').val("");
	else
		$('[name="IntTempMod"]').val(getMod($('[name="IntTemp"]').val()));
	
	if (!$('[name="WisTemp"]').val())
		$('[name="WisTempMod"]').val("");
	else
		$('[name="WisTempMod"]').val(getMod($('[name="WisTemp"]').val()));
	
	if (!$('[name="ChaTemp"]').val())
		$('[name="ChaTempMod"]').val("");
	else
		$('[name="ChaTempMod"]').val(getMod($('[name="ChaTemp"]').val()));
}


function bindAC() {
	$('[name=ACArmor]').bind("propertychange change keyup input paste", function(event){
			var elem = $(this);
			$(this).data("timeout", setTimeout(ACTotal(elem.parent().parent()), 250));
	});
}

function ACTotal() {
	
}


function bindSkills() { 
		
		$('#custom-cs-rules').change(function() {
			$('#skills').children().each(function () {
				if (!$(this).hasClass('info-row')) {
					
					console.log($(this));
					skillTotal($(this));
				}
			});
		});
	 
		$('.skill-abmod').bind("propertychange change keyup input paste", function(event){
			var elem = $(this);
			$(this).data("timeout", setTimeout(skillTotal(elem.parent().parent()), 250));
		});
		
		$('.skill-rank').bind("propertychange change keyup input paste", function(event){
			var elem = $(this);
			$(this).data("timeout", setTimeout(skillTotal(elem.parent().parent()), 250));
		});
		$('.skill-misc').bind("propertychange change keyup input paste", function(event){
			var elem = $(this);
			$(this).data("timeout", setTimeout(skillTotal(elem.parent().parent()), 250));
		});
		
		$('.move-skill-up').click(function() {
			var skill = $(this).parent().parent();
			//console.log(weaponbox.prev());
			if (!skill.prev().hasClass('info-row')) {
				skill.insertBefore(skill.prev());
			}
		});
		$('.move-skill-down').click(function() {
			var skill = $(this).parent().parent();
			//console.log(weaponbox.prev());
			if (!skill.next().hasClass('blank-skill')) {
				skill.insertAfter(skill.next());
			}
		});
		$('.delete-skill').click(function () {

			var skill = $(this).parent().parent();
			//weaponbox.insertBefore(weaponbox.prev());

			skill.fadeOut(400);
			skill.css('transform', 'ScaleY(.75)');
			setTimeout(function() {
				skill.remove();
			}, 500);
			bindSkills();

		});
	}








