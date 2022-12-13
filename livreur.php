<?php
class livreur
{ 
    private  $id_liv;
    private  $cin;
  private  $nom;
    private  $prenom;
  private  $image;
     
public function __construct($id_liv,$cin,$nom,$prenom,$image){
    $this->id_liv = $id_liv;
    $this->cin = $cin;
    $this->nom = $nom;
        $this->prenom = $prenom;
    $this->image = $image;
      
  
   
}

public function getid_liv(){
    return $this->id_liv ;
}
public function getcin(){
    return $this->cin ;
}
public function getnom(){
    return $this->nom ;
}
public function getprenom(){
    return $this->prenom ;
}
public function getimage(){
    return $this->image ;
}

    
}
?>