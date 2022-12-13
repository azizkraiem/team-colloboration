<?php
class livraison
{ 
    private  $id_livraison;
    private  $id_client;
  private  $id_livreur;
    private  $adresse;
  private  $date;
   
public function __construct($id_livraison,$id_client,$id_livreur,$adresse,$date){
    $this->id_livraison = $id_livraison;
    $this->id_client = $id_client;
    $this->id_livreur = $id_livreur;
        $this->adresse = $adresse;
    $this->date = $date;
  
   
}

public function getid_livraison(){
    return $this->id_livraison ;
}
public function getid_client(){
    return $this->id_client ;
}
public function getid_livreur(){
    return $this->id_livreur ;
}
public function getadresse(){
    return $this->adresse ;
}
public function getdate(){
    return $this->date ;
}

    
}
?>