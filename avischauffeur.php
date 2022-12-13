<?php require APPROOT .'./views/inc/header.php'; ?>
<div class="container">
<p> le nom de chauffeur est :  <?php echo $data[0]->name; ?>    </p>

les avis :
<?php 
$con = 1;
foreach ($data as $items) {?>
<div class="container">

    <p>  <?php echo $con; ?> :  <?php echo $items->av; ?>    </p>
</div>

<?php 
$con = $con+1;
} ?>


</div>


<?php require APPROOT .'./views/inc/footer.php'; ?>
