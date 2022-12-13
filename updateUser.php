<?php
include "../controller/database.php";
$stmt = $conn->prepare("SELECT * FROM user WHERE id=:id");
$stmt->bindValue(':id', $_GET['userid'], PDO::PARAM_INT);
$stmt->execute(); 
$updatedUser = $stmt->fetch();
// Register user

if(isset($_POST['update_user'])){ 
   $name = $_POST['prenom'];
   $lastname = $_POST['nom'];
   $email = $_POST['email'];
   $cin = $_POST['cin'];
   $age = $_POST['age'];
   $message = "";

   if ($name != "" && $email != "" && $cin != "" && $age != ""){
         $stmt = $conn->prepare("SELECT count(*) as users FROM user WHERE email=:email");
         $stmt->bindValue(':email', $email, PDO::PARAM_STR);
         $stmt->execute(); 
         $count = $stmt->fetchColumn();

         if( $count > 0 ){
            $stmt = $conn->prepare("UPDATE user
            SET prenom = :prenom ,nom = :nom ,email = :email ,cin = :cin ,age = :age , role_id = :role
            WHERE id=:id;
            ");
            $stmt->bindValue(':prenom', $name, PDO::PARAM_STR);
            $stmt->bindValue(':nom', $lastname, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->bindValue(':cin', $cin, PDO::PARAM_STR);
            $stmt->bindValue(':age', $age, PDO::PARAM_STR);
            $stmt->bindValue(':role', 2, PDO::PARAM_INT);
            $stmt->bindValue(':id', $_GET['userid'], PDO::PARAM_INT);

            $stmt->execute();

            header('Location: index.php');
         }else{
            $message = "User does not exist";
         }
   }else{
      $message = "All fields are required";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add user</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


    <!-- Custom styles for this template-->
    <link href="../car-rental-html-template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-secondary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update User!</h1>
                            </div>
                            <?php  
                                if(isset($message))  
                                {  
                                    echo '<label class="text-danger">'.$message.'</label>';  
                                }  
                            ?>  
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="prenom" id="exampleFirstName"
                                            placeholder="First Name" value="<?php echo $updatedUser['prenom']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="nom" id="exampleLastName"
                                            placeholder="Last Name" value="<?php echo $updatedUser['nom']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                        placeholder="Email Address" value="<?php echo $updatedUser['email']; ?>">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="cin"
                                            placeholder="CIN" value="<?php echo $updatedUser['cin']; ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" name="age" 
                                            placeholder="Age" value="<?php echo $updatedUser['age']; ?>">
                                    </div>
                                </div>
                                <input type="submit" name="update_user" class="btn btn-secondary btn-user btn-block" value="Submit" />  
                                <hr>
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

