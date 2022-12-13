<?php
class Chauffeurs {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //register new chauffeur
    public function register($data){
        $this->db->query('INSERT INTO chauffeur (name, email, adress,tel) VALUES (:name, :email, :adress,:tel)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':adress', $data['adress']);
        $this->db->bind(':tel', $data['tel']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    // Get all chauff
    public function getAllChauff(){
        $this->db->query('SELECT * FROM chauffeur');
        $row = $this->db->resultSet();
        return $row;
    }
    public function getChauffById($id){
        $this->db->query('SELECT * FROM chauffeur WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    public function updateChauffeur($data){
        $this->db->query('UPDATE chauffeur SET name = :name, email= :email, adress= :adress , tel =:tel WHERE id = :id');
        $this->db->bind(':id',$data['id']);
        $this->db->bind(':name',$data['name']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':adress',$data['adress']);
        $this->db->bind(':tel',$data['tel']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
        //detele chauff
    public function deleteChauff($id){
        $this->db->query('DELETE FROM chauffeur WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}