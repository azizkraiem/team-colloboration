<?php 
include_once '../../config.php';
include_once '../../model/livraison.php';
include_once'../../Controller/livraisonC.php';

if(!isset($_POST['id'])||!isset($_POST['adr'])||!isset($_POST['dat']))
{
	echo "erreur de ";
}

print($_POST['mail']);

$livraison=new livraison($_POST['idd'],1,$_POST['id'],$_POST['adr'],$_POST['dat']);


$LivraisonC=new LivraisonC();
$LivraisonC->AJouterliv($livraison);

$destinataire =$_POST['mail']; 
$sujet = "Confirmation de livraison"; // sujet du mail
$message ="Confirmation de livraison"; 
mail ($destinataire, $sujet, $message);




header('location:service.html');
?>