$(document).ready(function(){

	startpage();
	
	//olika knappar som hämtar olika funktioner
	$('#buttonlist').on('click', function(){
		add_new_list();
	});
	$('#buttonitem').on('click', function(){
		add_new_item();
	});

	$('.fa-times').on('click', function(){
		delete_item($(this));
	});

	$('.delete_list').on('click', function(){
		delete_list($(this));
	});

	$('.back').on('click', function(){
		window.location.href = 'dashboard.php';
	});

	$('#logout').on('click', function(){
		window.location.href = 'index.php';
	});

});

//gömmer och visar det som ska synas på startsidan
function startpage() {
	//gömmer login och reistreringsboxarna
	$('#login-form').hide();
	$('#registrate-form').hide();

	//tar fram login och registreringsboxar när man tryker på logga in respektive registrera
	$('#box1').click(function(){
		$('#login-form').show();
	});
	$('#box2').click(function(){
		$('#registrate-form').show();
	});
}

//lägger till listor
function add_new_list(){
	var new_list = $('#add_new_list input[name=new-list]').val();

	if(new_list != '') {
		$.post('new_list.php', {list:new_list},
		
		function(data){
			$('#add_new_list input[name=new-list]').val('');
			//lägger till listan överst i listan av listor
			$('#lists ul').prepend('<li><a href="show_list.php?id='+data+'">'+new_list+'</a></li>');
		});
	}
	return false;
}

//lägger till objekt
function add_new_item(){
	var new_item = $('#add_new_item input[name=new-item]').val();
	var list_id = $('#add_new_item input[name=list_id]').val();

	if(new_item != '') {
		$.post('new_item.php', { new_item:new_item, list_id:list_id  },
		
		function(data){
			//tömmer inputen
			$('#add_new_item input[name=new-item]').val('');
			//lägger till objekt överst i listan
			$('#items ul').prepend('<li><span>'+new_item+'</span><i id="'+data+'"class="fa fa-times"></i></li>');
			//tar bort det valda objektet
			$('.fa-times').on('click', function(){
				delete_item($(this));
			});
			console.log(data);
		});
	}
	return false;
}

//tar bort den aktuella listan
function delete_list(item) {
		
	var current_list = item;
	var id = item.attr('id');

	$.post('delete_list.php', {list_id:id},
	function(){
		current_list.parent().fadeOut("fast", function(){
			item.remove();
			//när man tar bort listan, skickas man tillbaka till de andra listorna i dashboard
			window.location.href = 'dashboard.php';
		});

	});

	
}

//tar bort objekt från listan
function delete_item(item) {
		
	var current_element = item;
	var id = item.attr('id');

	$.post('delete_item.php', {item_id:id},
	function(){
		current_element.parent().fadeOut("fast", function(){
			item.remove();

		});
	});
}