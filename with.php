<?php

include 'config_rec.php';

session_start();
$user_id = 1;
if(isset($_POST['confirmer'])){
   $nom = $_POST['nom'];
   $location = $_POST['Search'];
   $date_debut= $_POST['date_d'];
   $date_fin = $_POST['date_f'];
   $method = $_POST['method'];
   $total = $_POST['total'];
   $etat='with driver';
   $confirmation = 'pending';


   $insert_order = $conn->prepare("INSERT INTO `booking`(user_id,location,date_debut,date_fin,method,total,etat,confirmation,nom) VALUES(?,?,?,?,?,?,?,?,?)");
   $insert_order->execute([$user_id, $location,$date_debut,$date_fin,$method,$total,$etat,$confirmation,$nom]);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>rento</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="#" /></div>
   </div>
   <!-- end loader -->
   <!-- header -->

   <div id="contact" class="bestCar">
      <div class="container">
         <form class="main_form" method="POST">
            <div class="titlepage">
               <h2>we offer the best car for rent</h2>
            </div>
            <div class="row">
            <div class="col-md-12">
                  <input class="contactus" placeholder="Votre nom & prenom" type="Search" name="nom" required="required">
               </div>
               <div class="col-md-12">
                  <input class="contactus" placeholder="location Ex : 13 rue el ghazali , el ghazela , Ariana " type="Search" name="Search" required="required">
               </div>
            </div>

            <div class="row">

               <div class="col-md-6">
                  <label for="date-picker1">Date de debut</label>
                  <div class="form-box">
                     <input type="date" name="date_d" class="contactus" id="date-picker"
                        placeholder="Date de depart" required="required" data-error="Date is required." />
                  </div>
               </div>
               <div class="col-6">
                  <label for="date-picker2">Date de finir</label>
                  <input type="date" name="date_f" class="contactus" id="date-picker" placeholder="Date retour"
                     required="required" data-error="Date is required." />

               </div>
            </div>



            <div class="row">
              

                  <div class="col-6 ">
                     <div class="form-group">
                        <label for="select1">Methode de paiment</label>
                        <select name="method"class="form-control nice-select" id="select1">
                        <option value="cash on delivery">cash on delivery</option>
                        <option value="credit card">credit card</option>
                        <option value="paypal">paypal</option>
                        </select>
                      </div>
                  </div>

                  <div class="col-6">
                     <label for="search">Total</label>
                     <input class="contactus" placeholder="total" type="Search" name="total"
                        required="required">
                  </div>
                  <input type="submit" name="confirmer" class="find_btn" value="confirmer">
              
            </div>


         </form>

         </div>
      </div>
   </div>
  
   <!-- end bestCar -->
   <!-- choose  section -->

   <!-- end footer -->
   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <script src="js/plugin.js"></script>
   <!-- sidebar -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>