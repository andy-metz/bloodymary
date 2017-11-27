  // Initialize collapse button
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  $('.collapsible').collapsible();
  
	$(document).ready(function(){
		$("#affichage_coktails").click(function(){
		// 	$.post("liste_recettes.php",
		// 	{
		// 		libaliment:'Aliment'
		// 	},
		// 	function(data, status){
		// 		//$("<p></p>").text("Text."); 
		// 		$(".page-main").html(data); 
		// 	});
		//

			$.post("vueCoktails.php",
			{},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$(".page-main").html(data); 
			});
		});
		
		$("#affichage_favoris").click(function(){
			$.post("liste_aliments.php",
			{
				libaliment:'Aliment'
			},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$("#liste_aliments").html(data); 

			});
		});	

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
		$("a").click(function(){
			$.post("liste_recettes.php",
			{
				libaliment:'Aliment'
			},
			function(data, status){
				//$("<p></p>").text("Text."); 
				$(".page-main").html(data); 
				alert(data);
			});
		});		
*/		
		$(".collection-item").click(function(){
			$(this).hide();
		});	
	});
	

