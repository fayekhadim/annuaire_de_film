<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="pt.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<style>
        .card{
            width: 145px;
            height: 289px;
            margin: 5px;
        }
        #desc{
            width: 400px;
            height: 300px;
            margin: 30px;
        }
     img{
            width: 145px;
            height: 193px;
        }
        li{
            list-style: none;
        }
        
         </style>
</head>
<body>
    
     <div class="main">
     <a href="index.php"><h1 align="center" >Annuaire Film</h1></a>
         <div class="container">
         <div class="row">
             <div class="col-lg-2 col-md-2 zonedesc">
                
             </div>
             <div class="col-lg-8 col-md-8 zonefilm">
                 <ul class="d-flex flex-wrap">
                     <?php 
                        function card( $titre,$annee,$urlfoto)
          {
              echo '<li><div class="card">
                <img src="'.$urlfoto.'" alt="">-
                 <p>'.$titre.'</p>
                 <h6>('.$annee.')</h4>
              </div></li>';
                                     
          }
                         function description( $genre,$relisateur,$descrip)
          {
              echo '<li>
                      <div class="card" id="desc">  
                         <h4><span>Genre</span> : '.$genre.'</h4>
                         <h5><span>De</span> : '.$relisateur.'</h5>
                         <p>'.$descrip.'</p>
                      </div>
                     </li>';
                                     
          }
                            include 'connec.php';
                        $rep = $bdd->prepare('SELECT * FROM film WHERE image_f = :rout');
                        $rep->execute(array(
                                            'rout'=>$_GET['rout']
                        ));
                        while ($elemt = $rep->fetch())
                        {
                            card($elemt['titre_f'],$elemt['annee'],$elemt['image_f']);
                            description($elemt['genre'],$elemt['realisateur'],$elemt['description']);
                        }


                       ?>
                 </ul>
             </div>
            
             <div class="col-lg-2 col-md-2 zonelogin">
                 <h4>connexion</h4>
                 <form method="post" action="acces.php">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mot de pass</label>
                        <input type="password" name="mdp" class="form-control" id="exampleFormControlInput1" placeholder="mot de pass">
                        <button type="submit" name="acces" class="btn btn-primary mt-5">connexion</button>
                    </div>
                    <div class="form-group">
                 </form>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                <?php 
                    include ('connec.php');
                    $rep2 = $bdd->prepare('SELECT * FROM film as f INNER JOIN video as v ON v.id_miniature = :ib LIMIT 0 ,1');
                    $rep2->execute(array(
                                            'ib'=>$_GET['ib']
                        ));
                    while($chem = $rep2->fetch())
                    {?>

                 <a href="<?php echo $chem['video_f']; ?>" name="acces" class="btn btn-primary mt-5">Télécharger</a>
                 <?php
             }
             ?>
             </div>
         </div>
        </div>
        
     </div>
     <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <h4> My Film</h4>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                    <h3> Contact </h3>
                    <ul>
                        <li><a class="email"href="#"> annuairefilm@gmail.com </a></li>
                        <br/>
                        <li> <p> Adresse Point E </p> </li>
                        <li> <p> adresse Dakar center </p> </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-2 col-xs-3">
                    <ul>
                        <li> <h5> <a href="#" style="margin-top: 5em"> A Propos</a> <h5></li>
                        <li> <h5><a href="#"> SERIES </a> <h5></li>
                        <li> <h5><a href="#"> VOIR </a> <h5></li>
                        <li> <h5><a href="#"> ARCHIVE </a> <h5></li>
                    </ul>
                </div>
               
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
                          
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left copyright"> Copyright © Footer 2020. All right reserved. </p>
       
        </div>
    </div>
    <!--/.footer-bottom--> 

</footer>
</body>
</html>