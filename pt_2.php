<?php 
session_start();
if (isset($_POST['ajouter']))
	{

		$nom_v = $_FILES['vide']['name'];
		$fichier_tmp_v = $_FILES['vide']['tmp_name'];
		$extension_v = strrchr($nom_v,".");
		$ext_valide_v = array(".mp4", ".avi",".MP4", ".AVI", ".MOV", ".webm");
		$adresse_v = 'video/'.$nom_v;
		// if (in_array($extension_v, $ext_valide_v))
		// {
			
			echo $_SESSION['adresse'].'<br>';
			echo "$fichier_tmp_v".$fichier_tmp_v;
			if (move_uploaded_file($fichier_tmp_v, $adresse_v))
			{
				include ('connec.php');
				$req1 = $bdd->prepare('SELECT id_f FROM film WHERE image_f = :chemin');
				$req1-> execute(array(
									'chemin'=>$_SESSION['adresse']
				));
				while($id =$req1->fetch())
					{
						$req2 = $bdd->prepare('INSERT INTO video(id_miniature, video_f) VALUES(?,?)');
				if($req2->execute(array($id['id_f'],
										$adresse_v
				))) 
				{
					header("Location:index.php");
				}
					}
						
					

			}else echo "<h1>Veuillez remplir tous les champs !</h1>";
		// }
	}

 ?>