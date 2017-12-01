<div>
	<?= '<p>Coktails contenant '.$_SESSION['aliment'].'</p>' ?>
</div>
<div>

	<ul class="collapsible popout" data-collapsible="accordion">
		<?php
		$recettes = getListeRecettes($_SESSION['aliment']);
		if ($recettes !== false) {
			foreach($recettes as $recette){
				echo '<li>';
				echo '<div class="collapsible-header">'. $recette['librecette'].'</div>';
				$rec = getRecette($recette['librecette']);
				foreach($rec as $ligne){			
					echo '<div class="collapsible-body">';
echo '</div class="raw">';

	$path_photo = str_replace(" ", "_", $recette['librecette']);					
	echo "<img class='materialboxed left' src='images/".$path_photo.".jpg' alt='cocktail' style='width:100px;height:100px;'>";
					echo '<a class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add_shopping_cart</i></a>';

echo '</div>';
					echo '<span>';
					
	$ingredients = str_replace("|", "<br>", $ligne['composition']);
	echo $ingredients."<br><br>";    
	echo $ligne['preparation'].'</span>';
      



					echo '</div>';
					echo '</li>';
				}			
			}
		}
	?>
	</ul>



</div>

