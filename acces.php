<?php 

	if(isset($_POST['acces']))
	{
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];

		if($pseudo == "user" && $mdp == "root")
		{
			header("Location:formilaire.html");
		}else
		{
			header("Location:index.php");
		}
	}

 ?>