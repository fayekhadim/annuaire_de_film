
<?php

 include ('connec.php');
				$req1 = $bdd->query('SELECT id_f, MAX(id_f) as ma FROM film WHERE id_f = ma');
				
					while($id =$req1->fetch() )
					{
						echo $id['id_f'];

					}

				?>