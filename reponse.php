<?php


class reponse{
	private int $id ;	
	private int $id_reclamation ;
	private int $id_admin;	
  private string $message;
  private string $subject;	

	public function __construct($id_reclamation,$id_admin,$subject,$message){
		$this->id_reclamation = $id_reclamation;
    $this->id_admin = $id_admin;
    $this->subject = $subject; 
    $this->message = $message; 
	}

	public function getId()
	{
		return $this->id;
	}


	public function getid_reclamation()
	{
		return $this->id_reclamation;
	}
    public function setid_reclamation(int $id_reclamation)
	{
		$this->id_reclamation = $id_reclamation;
	}


	public function getid_admin()
	{
		return $this->id_admin;
	}
    public function setid_admin(int $id_admin)
	{
		$this->id_admin = $id_admin;
	}

  public function getmessage()
	{
		return $this->message;
	}
    public function getsubject()
	{
		return $this->subject;
	}

	

}

?>