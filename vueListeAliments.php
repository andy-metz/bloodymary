<?php
session_start();
// Premier clic sur le bouton coktail
if(!isset($_SESSION['aliment']))
  $_SESSION['aliment'] = 'Aliment';

if(!isset($_SESSION['hierarchie_aliment']))
  $_SESSION['hierarchie_aliment'] = array("Aliment");

if(isset($_POST['libaliment'])) {
  $_SESSION['aliment'] = $_POST['libaliment'];
  echo 'toto';
  $_SESSION['hierarchie_aliment'] = array("Aliment");
}

?>
<div class="container">
	<div>
		<nav class="red">
			<div class="nav-wrapper">
				<div class="col s12">
					<a href="#!" class="breadcrumb">Aliment</a>
				</div>
			</div>
		</nav>
	</div>
	<div>
		<ul class="collection">
			<?php
			include 'modele.php';
			$aliments = getListeAliments($_SESSION['aliment']);
			if ($aliments !== false) {
				foreach($aliments as $alim) {
					echo '<li class="collection-item z-depth-4"><a class="aliment" href="#">' . $alim['libaliment'] . '</a></li>';
				}
			}
			?> 
		</ul>
	</div>
</div>