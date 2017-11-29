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
				$(".page-main").html(data); 
			});
		});

		$(".aliment").click(function(){
			var $this = $(this);
//			alert();
			$.post("vueCoktails.php",
			{
				libaliment: $this.text()				
			},
			function(data, status){
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

		$(".collection-item").click(function(){
			$(this).hide();
		});	
	});
	

