<?php
include_once '../../config.php';
include '../../controller/livraisonC.php';

$LivraisonC=new LivraisonC();
$rec=$LivraisonC->supprimerlivraison($_POST['rec']);
header('location:Livraison.php');

?>
