<?php 
session_start();

	if (isset($_POST['ajout']))
	{

		$titre = htmlspecialchars($_POST['titre']) ;
		$annee = htmlspecialchars($_POST['annee']) ;
		$description = htmlspecialchars($_POST['description']) ;
		$realisateur = htmlspecialchars($_POST['realisateur']) ;
		$genre = htmlspecialchars($_POST['genre']) ;



		$nom_m = $_FILES['miniature']['name'];
		$erreur_m = $_FILES['miniature']['error'];
		$fichier_tmp_m = $_FILES['miniature']['tmp_name'];
		$extension_m = strrchr($nom_m,".");
		$ext_valide_m = array(".png", ".jpg", "JFIF", "jpeg", "PNG","jfif");
		$adresse_m = 'miniatures/'.$nom_m;
		$_SESSION['adresse'] = $adresse_m ;


		// if (in_array($extension_m, $ext_valide_m))
		// {
		
			$memo1 = move_uploaded_file($fichier_tmp_m, $adresse_m);
			if ($memo1)
			{
				include 'connec.php';
				$req = $bdd->prepare('INSERT INTO film(titre_f, annee, description, realisateur, genre, image_f) VALUES(?,?,?,?,?,?)');
				if($req->execute(array($titre, $annee, $description, $realisateur, $genre, $adresse_m
					))) 
				{
					header("Location:formulaire2.html");
				}
			// }else echo "extension";
		}else echo "extension";
	}

	

 ?>						