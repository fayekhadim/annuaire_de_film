<!DOCTYPE html>
<html lang="en">
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
     img{
            width: 145px;
            height: 193px;
        }
        li{
            list-style: none;
        }
        #carouselExampleFade,#zz{
            height: 400px;
        }
        
         </style>
</head>
<body>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/photo.jpg" class="d-block w-100" alt="..." id="zz">
    </div>
    <div class="carousel-item">
      <img src="images/iron.jpg" class="d-block w-100" alt="..." id="zz">
    </div>
    <div class="carousel-item">
      <img src="images/avenger.jpg" class="d-block w-100" alt="..." id="zz">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     <div class="main">         
  <a href="index.php"><h1 align="center" >Annuaire Film</h1></a>
         <div class="container">
         <div class="row">
             <div class="col-lg-2 col-md-2 zonedesc">
             <form method="post" action="pt_3.php">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Genre</label>
                      <select name="choix" class="form-control" id="exampleFormControlSelect1">
                        <option value="action">action</option>
                        <option value="comedie">comédie</option>
                        <option value="drame">Drame</option>
                        <option value="fiction">Fiction</option>
                        <option value="romance">Romance</option>
                      </select>
                    </div>
                   <button type="submit" class="btn btn-primary mt-5">OK</button>
                 </form>
             </div>
             <div class="col-lg-8 col-md-8 zonefilm">
                 <ul class="d-flex flex-wrap">
                     <?php 
                        function card( $titre,$annee,$urlfoto,$id)
          {
              echo '<li><div class="card">
                <a href="singulier.php?rout='.$urlfoto.'&ib='.$id.'"><img src="'.$urlfoto.'" alt=""></a>-
                 <p>'.$titre.'</p>
                 <h6>('.$annee.')</h4>
              </div></li>';
                                     
          }
                            include 'connec.php';
                        $rep = $bdd->query('SELECT * FROM film');
                        while ($elemt = $rep->fetch())
                        {
                            card($elemt['titre_f'],$elemt['annee'],$elemt['image_f'],$elemt['id_f']);
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
                   
                 </form>
        
         </div>
        </div>
         
             
         </div>
     </div>
     <footer>
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
            <p class="pull-left copyright"> Copyright © my film 2020. All right reserved. </p>
       
        </div>
    </div>
    <!--/.footer-bottom--> 

</footer>
</body>
</html>