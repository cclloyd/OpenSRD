/*
	$('#spell:contains("sorcerer")').each(function () {
	$(this).html($(this).html().replace(/sorcerer/gi,"<a href='http://www.d20pfsrd.com/classes/core-classes/sorcerer/' class='internal_url'>sorcerer</a>"));
});
*/
$('#spell:contains("Reflex")').each(function () {
	$(this).html($(this).html().replace(/Reflex/gi,"<a href='http://www.d20pfsrd.com/gamemastering/combat#TOC-Reflex' class='internal_url'>Reflex</a>"));
});


function replaceClass() {
	var replacements = ['bloodrager', 'sorcerer', 'magus', 'wizard'];
    var original_url = "<a href='http://www.d20pfsrd.com/classes/core-classes/REPLACE/' class='internal_url'>REPLACE</a>";

	for (var i=0; i<replacements.length; i++) {
		new_word = replacements[i];
		$('#spell:contains(' + new_word + ')').each(function () {
			new_url = original_url;
			new_word = replacements[i];
			// Replace word						// Regular expression 		// Replace with new word in url
			$(this).html($(this).html().replace(new RegExp(new_word, 'gi'), new_url.replace(/REPLACE/gi, new_word)));
		
		});
	}
}

function replaceMagicSchool() {
	var replacements = ['abjuration', 'conjuration', 'divination', 'enchantment', 'evocation', 'illusion', 'necromancy', 'transmutation'];
    var original_url = "<a href='http://www.d20pfsrd.com/magic#TOC-Replace' class='internal_url'>REPLACE</a>";

	for (var i=0; i<replacements.length; i++) {
		new_word = replacements[i];
		$('#spell:contains(' + new_word + ')').each(function () {
			new_url = original_url;
			new_word = replacements[i];
			// Replace word						// Word on page		 		// Replace with new word in url
			$(this).html($(this).html().replace(new RegExp(new_word, 'gi'), new_url.replace(/Replace/g, new_word.capitalize()).replace(/REPLACE/g, new_word)));
		
		});
	}
}

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}
String.prototype.lowercase = function() {
    return this.charAt(0).toLowerCase() + this.slice(1);
}

function replaceLinks(entries, url, textCase, html_id) {
	if (textCase == 0) {
		for (var i=0; i<entries.length; i++) {
		new_word = entries[i];
			$('#'+html_id+':contains(' + new_word + ')').each(function () {
			new_url = url;
			new_word = entries[i];
			// Replace word						// Word on page		 		// Replace with new word in url
			$(this).html($(this).html().replace(new RegExp(new_word, 'gi'), new_url.replace(/Replace/g, new_word.capitalize()).replace(/REPLACE/g, new_word)));
		
			});
		}
	}
	else if (textCase == 1) {
		for (var i=0; i<entries.length; i++) {
		new_word = entries[i];
			$('#'+html_id+':contains(' + new_word + ')').each(function () {
			new_url = url;
			new_word = entries[i];
			// Replace word						// Regular expression 		// Replace with new word in url
			$(this).html($(this).html().replace(new RegExp(new_word, 'gi'), new_url.replace(/REPLACE/gi, new_word)));
		
			});
		}	
	}
	else if (textCase == 2) {
		for (var i=0; i<entries.length; i++) {
			new_word = entries[i];
			var element = '#' + html_id;
			$('#'+html_id+':contains(' + new_word + ')').each(function () {
				new_url = url;
				new_word = entries[i];
				// Replace word						// Regular expression 		// Replace with new word in url
				$(this).html($(this).html().replace(new RegExp(new_word, 'gi'), new_url.replace(/Replace/g, new_word.lowercase()).replace(/REPLACE/g, new_word)));
				//console.log("replaced: " + new_word);
			});
		}	
	}
	else if (textCase == 3) {
		
	}
	else if (textCase == 4) {
		$('#'+html_id+':contains(' + new_word + ')').each(function () {
		// Replace word						// Regular expression 		// Replace with new word in url
		$(this).html($(this).html().replace(new RegExp(entries, 'gi'), url));
		});	
	}
}
	
var caseEnum = {
	NONE: 0,
	UPPERCASE: 1,
	LOWERCASE: 2,
	CAPITALIZE: 3,
	CUSTOM: 4
};

$(document).ready(function(){
	var url1 = "<a class='internal_url' href='http://www.d20pfsrd.com/" ;
    

	var classes = ['bloodrager', 'druid', 'sorcerer', 'magus', 'wizard'];
    var classes_url = url1+"classes/core-classes/REPLACE/'>REPLACE</a>";
	replaceLinks(classes, classes_url, caseEnum.LOWERCASE, 'spell-level');


	var magic_schools = ['abjuration', 'conjuration', 'divination', 'enchantment', 'evocation', 'illusion', 'necromancy', 'transmutation'];
	var magic_schools_url = url1+"magic#TOC-Replace'>REPLACE</a>";
	replaceLinks(magic_schools, magic_schools_url, caseEnum.UPPERCASE, 'spell-school');
	
	
	var domains = ['chaos', 'fire'];
	var domains_url = url1+"classes/core-classes/cleric/domains/paizo-domains/REPLACE-domain'>REPLACE</a>";
	replaceLinks(domains, domains_url, caseEnum.LOWERCASE, 'spell-domain');
	
	
	var elemental_schools = ['water', 'earth', 'air', 'fire', 'aether'];
	var elemental_schools_url = url1+"classes/core-classes/wizard/arcane-schools/paizo-arcane-schools/elemental-arcane-schools/REPLACE'>REPLACE</a>";
	replaceLinks(elemental_schools, elemental_schools_url, caseEnum.LOWERCASE, 'spell-elemental-school');
	
	var saves = ['fortitude', 'reflex', 'will'];
	var saves_url = url1+"gamemastering/combat#TOC-Reflex";
	
	replaceLinks('standard action', url1+"gamemastering/combat#TOC-Standard-Actions'>standard action</a>", caseEnum.CUSTOM, 'spell');
	
	
	console.log("completed replacement");
	
	
	// Need to check all spells to italicize any spell
	$('#spell-text:contains(' + $('spell-title').text() + ')').each(function () {
		// Replace word						// Regular expression 		// Replace with new word in url
		$(this).html($(this).html().replace(new RegExp(name, 'gi'), '<i>'+name.lowercase()+'</i>'));
	});	
	

});









