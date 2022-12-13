<?php

include 'config.php';

session_start();
$user_id = 1;
$req="SELECT * FROM `booking`";
$request_idb= $conn-> query($req);

if(isset($_POST['confirmer'])){

   $opt1 = $_POST['option1'];
   $opt2= $_POST['option2'];
   $opt3 = $_POST['option3'];
   $opt4 = $_POST['option4'];
   $opt5= $_POST['option5'];
   $id_book=$_POST['id_book'];



   $insert_order = $conn->prepare("INSERT INTO `opt`(opt1,opt2,opt3,opt4,opt5,id_book) VALUES(?,?,?,?,?,?)");
   $insert_order->execute([$opt1,$opt2,$opt3,$opt4,$opt5,$id_book]);

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

   <div id="contact" class="bestCar">
      <div class="container">
         <form class="main_form" method="POST">
            <div class="titlepage">
               <h2>ajoute des option</h2>
            </div>
            <div class="row">
               
               <div class="col-md-12">
               <div class="form-group">
                  <select name="id_book">
                  <?php
                     while($tab=$request_idb->fetch()){
                        echo'<option value="'.$tab[0].'">'.$tab[9].'</option>';
                     }
                  ?>
                  </select>
               </div>
               <input type="checkbox"  name="option1" value="yyyyy">
               <label for="date-picker1">Plein esance </label>
               <br>
               <input type="checkbox"  name="option2" value="az">
               <label for="date-picker1">option2</label>
               <br>
               <input type="checkbox" name="option3" value="aaaaaaa">
               <label for="date-picker1">option3</label>
               <br>
               <input type="checkbox" name="option4" value="hhhh">
               <label for="date-picker1">option 4</label>
               <br>
               <input type="checkbox"  name="option5" value="bbbbb">
               <label for="date-picker1">option 5</label>
               <br>
               </div>
           <input type="submit" name="confirmer" class="find_btn" value="confirmer">
              
            


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