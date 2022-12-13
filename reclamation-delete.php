<?PHP
	include "reclamationC.php";

    
    $reclamationC = new reclamationC();

    if (isset($_GET["delete"])){
		$reclamationC->deletereclamation($_GET["delete"]);
		header('Location:../view/admin/reclamation.php');
	}
	if (isset($_GET["id"])){
		$reclamationC->deletereclamation($_GET["id"]);
		header('Location:../view/mesReclamation.php');
	}
    if (isset($_GET["deleteReponse"])){
		$reclamationC->deletereponse($_GET["deleteReponse"]);
		$reclamationC->treated($_GET["deleteReponse"],"pending");
		header('Location:../view/admin/reclamation.php');
	}


?>
