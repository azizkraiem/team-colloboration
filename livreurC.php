<?php

class LivreurC {
    function afficherrelivreur(){
        $sql="SELECT * FROM livreur";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
       function tri(){
        $sql="SELECT * FROM livreur order by nom";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    }
        function afficherrelivreurseule($id){
        $sql="SELECT * FROM livreur  WHERE id_liv=$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur:' . $e->getMessage());
        }
    } 
    function supprimerlivreur($id){
        $sql=" DELETE FROM livreur WHERE id_liv=:id";
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
    $sqlc= "INSERT INTO `livreur` VALUES (:id,:cin,:nom,:pre,:image)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute(['id'=>$res->getid_liv(),
            'cin'=>$res->getcin(),
            'nom'=> $res->getnom(),
           'pre'=>$res->getprenom(),
            'image'=>$res->getimage(),
          
            



    ]);
 }
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}
}


    function modifiermiv($res)
{
$sqlc= "UPDATE `livreur` SET cin=:ci,nom=:nm,prenom=:pre WHERE id_liv=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute([  'id'=>$res->getid_liv(),
            'ci'=>$res->getcin(),
            'nm'=>$res->getnom(),
            'pre'=>$res->getprenom(),
          
                 
                 ]);
}
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}

}

function recherche($search_value)
    {
        $sql="SELECT * FROM livreur where   (id_liv like '$search_value' or cin like '%$search_value%' or nom like '%$search_value%' or prenom like '%$search_value%') ";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function afficherrelivreurdispo($datee){
        $sql="SELECT * FROM livreur where id_liv in( select id_livreur from livraison where date not like '$datee') or id_liv not in (select id_livreur from livraison)  ";
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