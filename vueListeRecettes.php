<div>
	<?= '<h5 class="center">Coktails contenant '.$_SESSION['aliment'].'</h>' ?>
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
					echo '<a class="btn-floating btn-large waves-effect waves-light red right favori" data-recette="'. $recette['librecette'].'"><i class="material-icons">add_shopping_cart</i></a>';
					$path_photo = str_replace(" ", "_", $recette['librecette']);					
					//echo '<img class="materialboxed" src="images/'.$path_photo.'.jpg" alt="" style="width:100px;height:100px;">';						
					echo '<span>';
					echo '<div class="row">';
				        echo '<div class="col s12 m6">';
				          echo '<div class="card blue-grey darken-1">';
				            echo '<div class="card-content white-text">';
				              echo '<span class="card-title">Ingrédients</span>';
									$ingredients = str_replace("|", "<br>", $ligne['composition']);
									echo $ingredients."<br><br>";  
				            echo '</div>';
				          echo '</div>';
				        echo '</div>';
				      echo '</div>';
					echo $ligne['preparation'];
					echo '</span>';
					echo'</div>';						
					echo '</li>';
				}			
			}
		}
		?>
	</ul>
</div>

