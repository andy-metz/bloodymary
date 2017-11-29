  // Initialize collapse button
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
  
	$(document).ready(function() {
		$("#affichage_coktails").click(function() {
		// 	$.post("liste_recettes.php",
		// 	{
		// 		libaliment:'Aliment'
		// 	},
		// 	function(data, status){
		// 		//$("<p></p>").text("Text."); 
		// 		$(".page-main").html(data); 
		// 	});
		//
			post({});
		});

		var bindWatcher = function() {
			$(".aliment").click(function() {
				post({libaliment: $(this).text()});
			});

			$("#affichage_favoris").click(function() {});
			$("#affichage_accueil").click(function() {});
			$(".collection-item").click(function() {});
			$('.materialboxed').materialbox();
		}

		// function that execute the post request and bind the event watcher if success to new DOM content
		var post = function(args) {
			$.post("vueCoktails.php", args)
				.done(function(data) {
					$(".page-main").html(data);
					bindWatcher();
				})
				.fail(function() {
					alert('Une erreur de connexion s\' est produite.');
				})
		}

	/*	
		$("#affichage_favoris").click(function() {
			$.post("liste_aliments.php",
			{
				libaliment:'Aliment'
			},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$("#liste_aliments").html(data); 

			});
		});	
*/
		$("#affichage_accueil").click(function(){
			$.post("vueAccueil.php",
			{
				libaliment:'Aliment'
			},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$(".page-main").html(data); 

			});
		});				
/*
		$(".collection-item").click(function(){
			$(this).hide();
		});	
    	*/
    	$('.materialboxed').materialbox();	
	});

