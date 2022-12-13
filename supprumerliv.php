<?php
include_once '../../config.php';
include '../../controller/LivreurC.php';

$LivraisonC=new LivreurC();
$rec=$LivraisonC->supprimerlivreur($_POST['rec']);
header('location:livreur.php');

?>
