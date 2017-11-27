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
    echo '<ul class="collection">';
    while($row = $result->fetch_assoc()) 
	{	
        echo '<li class="collection-item z-depth-4"><a class="btn red">'.$row["libaliment"].'</a></li>';
	}
    echo '</ul>';
} 

$conn->close();
?> 
