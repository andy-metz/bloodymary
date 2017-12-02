<div>
	<div>
		<?= '<h5 class="center">Aliments contenus dans '.$_SESSION['aliment'].'</h>' ?>
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
