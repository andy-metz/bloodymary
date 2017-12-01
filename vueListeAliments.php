<div>
	<div>
		<?= '<p>Aliments contenus dans '.$_SESSION['aliment'].'</p>' ?>
	</div>	
	<ul class="collection">
		<?php
		$aliments = getListeAliments($_SESSION['aliment']);
		if ($aliments !== false) {
			foreach($aliments as $alim) {
				echo '<li class="collection-item z-depth-4"><a class="aliment" href="#">' . $alim['libaliment'] . '</a></li>';
			}
		}
		?> 
	</ul>
</div>
