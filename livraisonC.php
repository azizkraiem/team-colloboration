<?php

class LivraisonC {
    function afficherrelivraison(){
        $sql="SELECT * FROM livraison";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
        function afficherrelivraisonjoin(){
        $sql="SELECT * FROM livraison e inner join livreur d on d.id_liv= e.id_livreur  ";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
      
       
    function supprimerlivraison($id){
        $sql=" DELETE FROM livraison WHERE id_livraison =:id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id' , $id);
        try{
            $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }




function AJouterliv($res)
{
    $sqlc= "INSERT INTO `livraison` VALUES (:id,:cl,:liv,:adrs,:dat)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute(['id'=>$res->getid_livraison(),
            'cl'=>$res->getid_client(),
            'liv'=> $res->getid_livreur(),
           'adrs'=>$res->getadresse(),
            'dat'=>$res->getdate(),
            



    ]);
 }
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}
}


    function modifiermiv($adr,$id)
{
$sqlc= "UPDATE `livraison` SET adresse=:adr WHERE id_livraison=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute([  'id'=>$id,
            'adr'=>$adr,
          
                 
                 ]);
}
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}

}

  function afficherreseule($id){
        $sql="SELECT * FROM livraison WHERE id_livraison =$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
      function filtre($id){
        $sql="SELECT * FROM livraison WHERE id_livreur =$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
      

}
?>