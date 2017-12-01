<div class="red">
	<nav>
		<div class="red nav-wrapper">
			<div>
				<?php
				foreach($_SESSION['hierarchie_aliment'] as $alim) 
					echo '<a href="#!" class="red breadcrumb aliment">'.$alim.'</a>';
				?>					
			</div>
		</div>
	</nav>
</div>
