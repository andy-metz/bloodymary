<?php
if(!isset($_POST['libaliment']))
{
	$libaliment = 'Aliment';
}
else
{
	$libaliment = $_POST['libaliment'];
}




// Create connection
$conn = mysqli_connect("127.0.0.1", "root", "", "myDB");
mysqli_set_charset($conn,("UTF8"));


// requete pour trouver les sous-aliments
$sql = "select af.libaliment from aliment af, aliment a, estfils f where f.idaliment = a.idaliment and a.libaliment = '".$libaliment."' and f.id_souscat = af.idaliment order by af.libaliment";


$result = $conn->query($sql);



if($result) 
{


		echo	'<div class="container">
				<div class="row">
					<div class="col s5 m4 l4"> 
						<div id="hierarchie" class="red">
							  <nav class="red">
								<div class="nav-wrapper">
								  <div class="col s12">
									<a href="#!" class="breadcrumb">'.$libaliment.'</a>
								  </div>
								</div>
							  </nav>						
						</div>';

    echo '<ul class="collection">';
    while($row = $result->fetch_assoc()) 
	{	
        echo '<li class="collection-item z-depth-4"><a class="btn waves-effect waves-light" onclick="alert()">'.$row["libaliment"].'</a></li>';
	}
    echo '</ul>';
	
	echo'</div>
	</div>	
	<div class="col s7 m8 l8">
		<div id="Coktails" class="red">	
			  <nav class="red">
				<div class="nav-wrapper">
				  <div class="col s12">
					<a href="#!" class="breadcrumb" id="entete_liste_recettes">Coktails pour '.$libaliment.'</a>
				  </div>
				</div>
			  </nav>
		</div>';
		
	echo '<ul class="collection">';	
    while($row = $result->fetch_assoc()) 
	{	
        echo '<li class="collection-item z-depth-4">'.$row["libaliment"].'</li>';
	}
    echo '</ul>';
	echo '</div>
				</div>				
			</div>';
} 

$conn->close();
?> 
