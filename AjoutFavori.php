<?php
//session_start();

if(isset($_POST['favori']))
{
echo '  
	<div id="modal_ajout_recette" class="modal">
    <div class="modal-content">
      <h5 class="center ">Information</h5>
      <p>'.$message_confirmation.'</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"><i class="material-icons left">close</i></a>
    </div>
  </div>';	

}


//include 'modele.php';


?>