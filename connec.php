<?php 
try
{
	$bdd = new PDO('mysql:host=promo-38.codeur.online;dbname=khadimf_films;charset=utf8','khadimf','v16p/OtH3Dz4mQ==');
}
catch(Exeption $e)
	{
		die('Erreur '.$e->getMessage());
	}
 ?>