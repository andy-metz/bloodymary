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
			post("vueCoktails.php",{},".page-main");
		});

		var bindWatcher = function() {
			$(".aliment").click(function() {
				post("vueCoktails.php",{libaliment: $(this).text()},".page-main");
			});

			$(".recette").click(function() {
				post("vueCoktails.php",{librecette: $(this).text()},".page-main");
				alert($(this).text());
			});

			$(".favori").click(function() {
				post("vueCoktails.php"/*"AjoutFavori.php*/,{favori: $(this).attr("data-recette")},".page-main"/*"#modal"*/);
				$("#modal_ajout_recette").modal('open');
				//alert($(this).text());				
			});

			//$("#affichage_favoris").click(function() {});
			$("#affichage_accueil").click(function() {});
			$(".collection-item").click(function() {});
			$(".breadcrumb").click(function() {});

			$('.materialboxed').materialbox();
    		$('.modal').modal();
			$('.collapsible').collapsible();  
			$("#modal_ajout_recette").modal('open');
		}

		// function that execute the post request and bind the event watcher if success to new DOM content
		var post = function(url, args, cible) {
			$.post(url/*"vueCoktails.php"*/, args)
				.done(function(data) {
					//$(".page-main").html(data);
					$(cible).html(data);

					bindWatcher();
				})
				.fail(function() {
					alert('Une erreur de connexion s\' est produite.');
				})
		}

		var post2 = function(args) {
			$.post("AjoutFavori.php", args)
				.done(function(data) {
					$("#modal").html(data);
					bindWatcher();
					alert(data);
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

/*		$(".favori").click(function(){
			$.post2("AjoutFavori.php",
			{
				favori:'Mojito'
			},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$("#modal").html(data); 			

			});	
			$("#modal_ajout_recette").modal('open');		
		});	*/			
/*
		$(".collection-item").click(function(){
			$(this).hide();
		});	
    	*/
    	$('.materialboxed').materialbox();	
    	$('.modal').modal();
		$('.collapsible').collapsible();  
		$("#modal_ajout_recette").modal('open');
	});

