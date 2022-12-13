<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<?php  
include '../controller/reclamationC.php';
$reclamationC = new reclamationC();
$row=$reclamationC->recupererMonReclamation($_GET["id"]);
ob_start();
require('menu.php'); 
?>



    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Modifier Reclamation</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="">Mes reclamation</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Modifier Reclamation</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">reclamation</h1>
            <div class="row">
                <div class="container  pb-3">
                    <div class="bg-light mb-4" style="padding: 30px;">
                            <div class="form-group">
                                <input value="<?= $row->user_subject; ?>" name="user_subject" id="user_subject" type="text" class="form-control p-4" placeholder="Subject" required="required">
                            </div>
                            <div class="display-4 text-center mb-3">
                            <?php  
                    $stars = $row->user_rating ;
                    $textwarning = 5-$stars;
                    for ($x = 1; $x <= 5; $x++) {         
                            if ($x > $stars){
                                echo '<i class="fas fa-star star-light submit_star mr-1" id="submit_star_'.$x .'" data-rating="'.$x .'"></i>';
                            }else{
                                echo '<i class="fas fa-star text-warning submit_star mr-1" id="submit_star_'.$x .'" data-rating="'.$x .'"></i>';
                            }
                    }                   
                    ?>
                            </div>
                            <div class="form-group">
                                <textarea name="user_review" id="user_review" class="form-control py-3 px-4" rows="5" placeholder="Message" required="required"><?= $row->user_review; ?></textarea>
                            </div>
                            <div>
                                <button id="save_review" class="btn btn-primary py-3 px-5" type="button">Send Message</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    <!-- Footer Start -->
    <?php  
require('footer.php'); 
?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<script>
$(document).ready(function() {

    var rating_data = '<?php echo $stars; ?>';


    $(document).on('mouseenter', '.submit_star', function() {

        var rating = $(this).data('rating');

        reset_background();

        for (var count = 1; count <= rating; count++) {

            $('#submit_star_' + count).addClass('text-warning');

        }

    });

    function reset_background() {
        for (var count = 1; count <= 5; count++) {

            $('#submit_star_' + count).addClass('star-light');

            $('#submit_star_' + count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function() {

        reset_background();

        for (var count = 1; count <= rating_data; count++) {

            $('#submit_star_' + count).removeClass('star-light');

            $('#submit_star_' + count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function() {

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function() {
        
    
        var UserID = "<?php echo 14; ?>";

        var user_review = $('#user_review').val();

        var user_subject = $('#user_subject').val();

        if (user_review == '' && user_subject == '') {
            alert("Please Fill Both Field");
            return false;
        } else {
            $.ajax({
                url: "../controller/reclamationC.php?update=<?php echo $_GET["id"]; ?>",
                method: "POST",
                data: {
                    rating_data: rating_data,
                    UserID: UserID,
                    user_review: user_review,
                    user_subject: user_subject
                },
               success: function(data) {
                     
                    window.location.replace('reclamation.php?login_err=www'); 
                    window.location.replace('mesReclamation.php');                 
                }
            })
        }

    });

    
});


</script>
