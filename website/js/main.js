$(function(){

	var games = {
			'console': ['Atari','Microsoft','Nintendo','Sega','Sony','Autre'],
			'carte': ['Pokemon','Magic the gathering','Yu-Gi-Oh!','Poker','Autre'],
			'plateau': ['Warhammer','Warhammer 40 000','Risk','Donjon et dragon','Autre']
		};

	$('#gameType').on('change', function(){
		var choose = $('#gameType option:selected').data('val');
		
		updateSelect(games[choose]);

	});

	function updateSelect(value){
		$('#gamePlay').html('');
		$('#gamePlay').append('<option value="" disabled selected>Choisir</option>');
		for(var i=0; i<value.length; i++){
			$('#gamePlay').append('<option value="'+value[i]+'">'+value[i]+'</option>');
		}
	}

});