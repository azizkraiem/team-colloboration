<?PHP
    use PHPMailer\PHPMailer\PHPMailer;
    require_once __DIR__."/../config.php";
    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

	if (isset($_GET["id"])){
        $id=$_GET["id"];
		$sql="SELECT *,B.id as idR,C.subject as subjectC FROM reclamation B inner join user A on B.UserID = A.id inner join response C on C.id_reclamation=B.id where id_reclamation=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
	
				$type = $query->fetch(PDO::FETCH_OBJ);
				
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
            $alert = '';
            $mail = new PHPMailer(true);
			try{

				$mail->isSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->SMTPAuth = true;
				$mail->Username = 'p8490466@gmail.com'; // Gmail address which you want to use as SMTP server
				$mail->Password = 'cxifeavvuhksltvr'; // Gmail address Password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
				$mail->Port = '587';
			  
				$mail->setFrom('p8490466@gmail.com'); // Gmail address which you used as SMTP server
			  
			  
				$mail->addAddress($type->email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
				 
				$mail->isHTML(true);
				$mail->Subject = $type->subjectC;
				$mail->Body = "    
                <div style='font-size: 25px; color:black;'><h3>Hello " .$type->nom." ".$type->prenom."<br>" .$type->message.".<br><br>Admin.</h3></div>";			  
				$mail->send();
				$alert = '<div id="hideMe" class="alert-success">
							 <span>Message envoyé! Merci de nous contacter.</span>
							</div>';
			  } catch (Exception $e){
				$alert = '<div id="hideMe" class="alert-error">
							<span>'.$e->getMessage().'</span>
						  </div>';
			  }
              header('Location:../view/admin/reclamation.php');
            
	
	}



?>
