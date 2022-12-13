<?php
class Avis {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //register new avis
    public function registerAv($data){
        $this->db->query('INSERT INTO avis (id_chauff, id_client, av) VALUES (:id_chauff, :id_client, :av)');
        $this->db->bind(':id_chauff', $data['id_chauff']);
        $this->db->bind(':id_client', $data['id_client']);
        $this->db->bind(':av', $data['av']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    // Get all avis
    public function getAllAvis(){
        $this->db->query('SELECT * FROM avis');
        $row = $this->db->resultSet();
        return $row;
    }

    public function getAvisByChauff($id){
        $this->db->query('SELECT * FROM avis av INNER JOIN chauffeur ch ON av.id_chauff = ch.id and av.id_chauff = :id; ');
        $this->db->bind(':id', $id);

        $row = $this->db->resultSet();

        return $row;
    }

}