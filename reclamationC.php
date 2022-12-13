<?php
require_once dirname(__DIR__)."/controller/config.php";
require_once dirname(__DIR__)."/model/reclamation.php";
require_once dirname(__DIR__)."/model/reponse.php";

	class reclamationC{

		public function listreclam()
		{
			$sql="SELECT *,B.id as idR,B.status as status FROM reclamation B inner join user A on B.UserID = A.id ORDER BY B.id DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function deletereclamation($id)
		{
			$sql = "DELETE FROM reclamation WHERE id = :id";
			$db = config::getConnexion();
			$req = $db->prepare($sql);
			$req->bindValue(':id', $id);
	
			try {
				$req->execute();
			} catch (Exception $e) {
				die('Error:' . $e->getMessage());
			}
		}
		function deletereponse($id)
		{
			$sql = "DELETE FROM response WHERE id_reclamation = :id";
			$db = config::getConnexion();
			$req = $db->prepare($sql);
			$req->bindValue(':id', $id);
	
			try {
				$req->execute();
			} catch (Exception $e) {
				die('Error:' . $e->getMessage());
			}
		}

		function addReponse($reponse){
                
			$sql="INSERT INTO response (id_reclamation,id_admin,subject,message)
			VALUES (:id_reclamation,:id_admin,:subject,:message)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
	
				$query->execute([
					'id_reclamation' => $reponse->getid_reclamation(),
					'id_admin' => $reponse->getid_admin(),
					'subject' => $reponse->getsubject(),
					'message' => $reponse->getmessage()
	
				]);
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
	
		}
		function treated($id,$status){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET
						status = :status
					WHERE id = :id'
				);
				$query->execute([
					'status' => $status,
					'id' => $id
				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

		function modifierReponse($reponse,$id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE response SET
					id_admin = :id_admin,
					subject	 = :subject,
					message =:message
					WHERE id_reclamation = :id'
				);
				$query->execute([
					'id_admin' => $reponse->getid_admin(),
					'subject' => $reponse->getsubject(),
					'message' => $reponse->getmessage(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererMonReponse($id){
			$sql="SELECT * from response where id_reclamation=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$type = $query->fetch(PDO::FETCH_OBJ);
				return $type;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		
		}
		function recupererMonReclamation($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$type = $query->fetch(PDO::FETCH_OBJ);
				return $type;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		
		}
	}











$db = config::getConnexion();
if(isset($_GET["add"])&&isset($_POST["rating_data"])&&!empty($_POST["rating_data"]))
{
	$review = new reclamation(
		$_POST["UserID"],  
		$_POST["rating_data"],   
		$_POST["user_review"],  
		$_POST["user_subject"]  
		);


		$sql = "INSERT INTO reclamation
		(UserID, user_rating, user_review,datetime,status,user_subject) 
		VALUES (:UserID, :user_rating, :user_review,:datetime,:status,:user_subject)";
       
    
			$data = array(
			':UserID'		=>	$review->getuserID(),
			':user_rating'		=>	$review->getuser_rating(),
			':user_review'		=>	$review->getuser_review(),
			':datetime'			=>	time(),
			':status'			=>  "pending",
			':user_subject' 	=>  $review->getuser_subject()
		);		  
		$statement = $db->prepare($sql);

		$statement->execute($data);
		

    }
	if(isset($_GET["update"])&&isset($_POST["user_review"])&&isset($_POST["user_subject"]))
	{
		$review = new reclamation(
			$_POST["UserID"],  
			$_POST["rating_data"],   
			$_POST["user_review"],
			$_POST["user_subject"]   
			);
	
			$id_reclamation = $_GET["update"];
			$sql = "UPDATE reclamation SET `user_rating`=:user_rating,`user_review`=:user_review,`user_subject`=:user_subject,`datetime`=:datetime WHERE id=:id";
		   
		
				$data = array(
				':user_rating'		=>	$review->getuser_rating(),
				':user_review'		=>	$review->getuser_review(),
				':datetime'			=>	time(),
				':id'				=> $id_reclamation,
				':user_subject' 	=>  $review->getuser_subject()
			);		  
			$statement = $db->prepare($sql);
	
			$statement->execute($data);
			
	
		}
if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();
	$id=14;
	$query = "SELECT *,B.id as idR FROM reclamation B inner join user A on B.UserID = A.id where A.id=$id  ORDER BY B.datetime DESC ";
    $result = $db->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$status="";
		if($row["status"]=="pending"){
			$status="Pending";
		}else{
			$status="Treated - Check inbox";
		}
		$review_content[] = array(
			'user_name'		=>	$row["nom"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"]),
			'id' =>	$row["idR"],
			'user_subject'   =>	$row["user_subject"],
			'status'   =>	$status
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
?>






