<?php
    $servname = "localhost"; $dbname = "integration"; $user = "root"; $pass = "";

        $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $allusers = $dbco->prepare('SELECT *FROM produits ORDER BY nom ');
        
        if (isset($_GET['envoyer']) and !empty ($_GET['envoyer']) )
{
    $rechecher = htmlspecialchars($_GET['s']);
    $allusers=$dbco->prepare("SELECT * FROM produits where produits.nom like '%$rech%'");


}
     
    
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<a class="navbar-brand" href="../car-rental-html-template/car.php">MonoShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link " style="font-weight: bold;" aria-current="page" href="afficherpagi.php">Produits</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" aria-current="page" href="nouveau.php">Nouveau</a>
        </li>
<!--
        <li class="nav-item">
        <a class="nav-link" href="supprimer.php">Suppression</a>
        </li>
-->
        <li class="nav-item">
          <a class="nav-link active" style="font-weight: bold;" href="catego.php">categorie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="barre de rechercher.php">rechercher</a>
        </li>
       

    </ul>
    <!--<div style="margin-right: 500px">
        <h5 style="color: #545659; opacity: 0.5;">Connecté en tant que: <?= $nom ?></h5>
    </div>-->
    <a href="../view/login.php" class="nav-item nav-link btn btn-danger">logout</a>
    </div>
</div>
</nav>

    <div class="container my-5">
        <form method="GET " class="row">
            <div class="col-auto">
                <label for="inputPassword2" class="visually-hidden">rechercher  une voiture</label>
                <input type="search" name ="s" class="form-control" id="inputPassword2" placeholder="rechercher  une voiture" autocomplete"off">
            </div>
            <div class="col-auto">
                <button type="submit" name ="envoyer " class="btn btn-primary mb-3">rechercher</button>
            </div>
        </form>
    


    <section class ="afficher ">
<?php
if($allusers->rowCount()>0)
{ 
    while ($u=$allusers->fetchAll())
    {
        ?>
        <p>
           <?=$u['nom'];?> <!--afficher la liste des voitures -->
    </p>
    <?php
   
    }
    ?>

    <?php
}
else
{

?>
<p>aucun voiture troué </p>
<?php
}
?>

    </section></div>
</body>
</html>